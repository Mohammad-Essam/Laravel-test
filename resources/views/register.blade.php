<x-guest-layout title="Register">

    <div class="box base">
        <form method="POST" action="/register">
            @csrf
            <input placeholder="username" type="text" name="name" id="name">
            <input placeholder="Email" type="email" name="email" id="email">
            <input placeholder="password" type="password" name="password" id="password">
            <input placeholder="confirm password" type="password" name="password_confirmation" id="password_confirmation">
            <input type="submit" value="Register">
        </form>
    </div>
</x-guest-layout>
