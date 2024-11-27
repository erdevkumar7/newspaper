<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
             <img src="{{asset('public/images/allumni_img/maan-logo.jpg')}}" alt="">
            <h1 class="sitename">MAAN(NAVOTSAV-3.0)</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                @if (Auth::guard('web')->check())
                    <li><a href="{{ route('user.dashboard') }}" class="active">My-Profile</a></li>
                @else
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                @endif

                @if (Auth::guard('web')->check())
                    <li><a href="{{ route('user.viewQR') }}" class="active">My-QR-Code</a></li>
                @else
                    <li><a href="{{route('user.login')}}" class="active">Alumni Login</a></li>
                @endif

                {{-- <li><a href="#" class="active">Events</a></li> --}}
                <li><a href="#" class="active">Contact</a></li>
                @if (Auth::guard('web')->check())
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <li>
                            <a href="" class="active">
                                <button type="submit" class="btn btn-warning">Logout</button></a>
                        </li>
                    </form>
                @else
                    <li><a href="{{ route('user.register') }}" class="active">
                            <button class="btn btn-warning">Alumni Registration</button></a>
                    </li>
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
