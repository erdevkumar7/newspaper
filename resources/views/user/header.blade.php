<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <a href="#">Login | Register</a>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-cart-fill"></i></a>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                @if ($page->logo_img)
                    <img src="{{ asset('/public/images/static_img') . '/' . $page->logo_img }}" alt="">
                @else
                    <img src="{{ asset('/public/assets/img/logo-new.png') }}" alt="">
                @endif
            </a>
        </div>

    </div>

    <div class="mymenu d-flex align-items-center">
        <div class="container d-flex justify-content-center">
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li class="current--menu"><a href="#hero" class="active">Home<br></a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Subscribe</a></li>
                    <li><a href="#">Archives</a></li>
                    <li><a href="#">Store</a></li>
                    <!--<li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
          </ul>
        </li>-->
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div><!-- End Top Bar -->

</header>
