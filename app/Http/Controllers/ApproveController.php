<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function index()
    {
        return view('unapproved-users',[
            'users' => User::where('is_approved',false)->get()
        ]);
    }

    public function update(User $user)
    {
        $user->is_approved = true;
        $user->save();
        return redirect()->back();
    }
}
