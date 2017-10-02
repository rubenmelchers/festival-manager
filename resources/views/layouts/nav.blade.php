<nav class="navigation">
    <div class="container">

        <ul>
            <li>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Festival Manager
                </a>
            </li>

            <li>
                <a href="/festivals">Festivals</a>
            </li>

            @guest
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @else
                <li>
                    <a href="#" role="button" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        Logout
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
