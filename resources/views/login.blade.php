<x-guest-layout title="Login">

    <div class="box base">
        <form method="POST" action="/login">
            @csrf
            <input placeholder="Email or Username" type="text" name="email" id="email">
            <input placeholder="password" type="password" name="password" id="password">
            <input type="submit" value="Login">
            <label style="margin-top: 6px" for="remember"><input type="checkbox" name="remember" id="remember"> remember me </label>
            <span style="width: 100%; display:flex" >have no account? &nbsp; <a href="register" style="margin-left:auto">Just Register</a></span>

        </form>
    </div>
</x-guest-layout>
