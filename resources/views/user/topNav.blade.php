<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

          @if (Auth::guard('web')->check())
            <a href="{{ route('user.viewQR') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!--<img src="{{ asset('public/images/allumni_img/maan-logo.jpg') }}" alt="">-->
                <h1 class="sitename">
                    NAVOTSAV 3.0 – A MAAN Initiative
                </h1>
            </a>
        @else
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!--<img src="{{ asset('public/images/allumni_img/maan-logo.jpg') }}" alt="">-->
                <h1 class="sitename">
                    NAVOTSAV 3.0 – A MAAN Initiative
                </h1>
            </a>
        @endif

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
                    <li><a href="{{ route('user.login') }}" class="active">Alumni Login</a></li>
                @endif

                <li><a href="{{ route('user.imageGenerate') }}" class="active">Create DP</a></li>
                <li><a href="{{ route('contactUs') }}" class="active">Contact</a></li>
                @if (Auth::guard('web')->check())
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <li>
                            <a href="" class="active">
                                <button type="submit" class="btn btn-warning">Logout</button></a>
                        </li>
                    </form>
                @else
                    <li><a href="{{ route('home') }}" class="active">
                            <button id="blinking-button" class="btn btn-warning">Alumni Registration</button></a>
                    </li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
