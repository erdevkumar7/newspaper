<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">MAAN(NAVOTSAV-3.0)</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li><a href="#" class="active">About</a></li>
                <li><a href="#" class="active">Events</a></li>
                <li><a href="#" class="active">Contact</a></li>
                @if (Auth::guard('web')->check())
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <li>
                            <button type="submit" class="btn btn-warning">Logout</button>
                        </li>
                    </form>
                @else
                    <li><a href="{{ route('user.register') }}" class="active"><button
                                class="btn btn-warning">Register</button></a></li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- @if (Auth::guard('web')->check())
            <div class="header-social-links">
                <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-warning">Logout</button>
                </form>
            </div>
        @else
            <div class="header-social-links">
                <a href="{{ route('user.register') }}">
                    <button class="btn btn-warning">Register</button>
                </a>

                <a href="{{ route('user.login') }}">
                    <button class="btn btn-default" style="background: #2ec2fa">Login</button>
                </a>
            </div>
        @endif --}}


        {{-- <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        </div> --}}

    </div>
</header>
