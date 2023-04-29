<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //TODO: separate The Validation Logic into a request class
        //with new custom validation rule.
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:users,name,'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['between:8,20', 'confirmed',]
        ]);

        //Get the domain of the email
        $email_domain = explode('@', $request->email)[1];
        $email_domain = explode('.', $email_domain)[0];
        if($email_domain == 'gmail')
            return redirect()->back()->withErrors(['email' => 'gmail is not allowed as a domain.']);

        //Check if the domain is not unique
        $not_unique = User::where('email','like','%'.$email_domain.'%')->first();
        if($not_unique)
            return redirect()->back()->withErrors(['email' => 'duplicated email domain. This domain is already registered.']);

        //Password validation logic
        $hasCapital = preg_match('/[A-Z]/', $request->password);
        $hasNumber = preg_match('/[0-9]/', $request->password);
        $hasSpecialChars = preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $request->password);
        if(!( $hasCapital && $hasNumber && $hasSpecialChars))
            return redirect()->back()->withErrors(['password' => 'Password must contain at least one capital letter, one number and one special character.']);
        //End of validation logic



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
