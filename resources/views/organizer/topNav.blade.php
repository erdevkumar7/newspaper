<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('organizer.home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">MAAN(NAVOTSAV-3.0)</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('organizer.home') }}" class="active">Home</a></li>
                <li><a href="#" class="active">About</a></li>
                <li><a href="#" class="active">Events</a></li>
                <li><a href="#" class="active">Contact</a></li>
                @if (Auth::guard('organizer')->check())
                    <form action="{{ route('organizer.logout') }}" method="post">
                        @csrf
                        <li>
                            <button type="submit" class="btn btn-warning">Logout</button>
                        </li>
                    </form>
                @else
                    <li><a href="{{ route('organizer.register') }}" class="active"><button
                                class="btn btn-warning">Register</button></a></li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        </div> --}}

    </div>
</header>
