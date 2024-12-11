<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        @if (Auth::guard('organizer')->check())
        <a href="{{ route('organizer.QrScan') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!--<img src="{{ asset('public/images/allumni_img/maan-logo.jpg') }}" alt=""> -->
            <h1 class="sitename">
                NAVOTSAV 3.0 – A MAAN Initiative
            </h1>
        </a>
        @else
        <a href="{{ route('organizer.login') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!--<img src="{{ asset('public/images/allumni_img/maan-logo.jpg') }}" alt=""> -->
            <h1 class="sitename">
                NAVOTSAV 3.0 – A MAAN Initiative
            </h1>
        </a>
        @endif  

        <nav id="navmenu" class="navmenu">
            <ul>
                @if (Auth::guard('organizer')->check())
                    {{-- <li><a href="{{ route('organizer.dashboard') }}" class="active">My-Profile</a></li> --}}
                    <li><a href="{{ route('organizer.QrScan') }}" class="active">QR-Scan</a></li>
                @endif

                @if (Auth::guard('organizer')->check())
                    <form action="{{ route('organizer.logout') }}" method="post">
                        @csrf
                        <li>
                            <a href="" class="active">
                                <button type="submit" class="btn btn-warning">Logout</button></a>
                        </li>
                    </form>
                @else
                    <li><a href="{{ route('organizer.login') }}" class="active"><button
                                class="btn btn-warning">Volunteer Login</button></a></li>
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
