<nav>
    <ul>
        <li><strong><a href="/dashboard">Controway</a></strong></li>
    </ul>
    <ul>
        @if (auth()->user()->role == "admin")
            <li>
                <a href="/approve" role="button">Approve new Registered user</a>
            </li>
        @endif

        <li>
            <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="Logout">
        </form>
        </li>
    </ul>

</nav>
