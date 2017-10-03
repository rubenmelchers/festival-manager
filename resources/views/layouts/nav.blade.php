<nav class="navigation">
    {{-- <div class="container"> --}}
    {{-- <div class="grid-12">
        <div class="col-12 navigation__wrapper"> --}}
            <ul class="navigation__menu grid-12">
                <li class="navigation__menu-item col-2">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="navigation__menu-content">
                            Festival Manager
                        </span>
                    </a>
                </li>

                <li class="col-3 navigation__menu-item" data-push-left="off-4" class="navigation__menu-item">
                    <a href="/festivals" role="button" aria-expanded="false">
                        <span class="navigation__menu-content">
                            Festivals
                        </span>
                    </a>
                </li>

                @guest
                    <li class=" col-1 navigation__menu-item"><a href="/login">
                        <span class="navigation__menu-content">
                            Login
                        </span>
                    </a></li>
                    <li class=" col-2 navigation__menu-item"><a href="/register">
                        <span class="navigation__menu-content">
                            Register
                        </span>
                    </a></li>
                @else

                    <li class=" col-3 navigation__menu-item navigation__menu-item--dropdown">
                        <a href="/users/{{ Auth::user()->id }}" role="button" aria-expanded="false">
                            <span class="navigation__menu-content">
                                {{ Auth::user()->name }}
                                <span class="navigation__dropdown-arrow"></span>
                            </span>
                        </a>

                        <ul class="navigation__accountmenu">
                            @if( Auth::user()->isAdmin() )

                                <li class="navigation__menu-item">
                                    <a href="/admin" role="button" aria-expanded="false">
                                        <span class="navigation__menu-content">
                                            adminpanel
                                        </span>
                                    </a>
                                </li>

                            @endif
                            <li class="navigation__menu-item ">
                                <a href="/users/{{ Auth::user()->id }}">
                                    <span class="navigation__menu-content">
                                        Account page
                                    </span>
                                </a>
                            </li>

                            <li class="navigation__menu-item ">
                                <a href="/logout">
                                    <span class="navigation__menu-content">
                                        Logout
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endguest
            </ul>
        {{-- </div>
    </div> --}}

    {{-- </div> --}}
</nav>
