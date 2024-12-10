<header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <a href="{{ route('user.login') }}">Login | </a>
                <a href="{{ route('user.register') }}"> Register</a>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-cart-fill"></i></a>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                {{--  --}}
                @if ($logo_setting !== null)
                    <img src="{{ asset('/public/images/static_img') . '/' . $logo_setting }}" alt="">
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
                    <li><a href="{{ route('home') }}" class="menu-link">Home</a></li>
                    <li><a href="{{ route('aboutUs') }}" class="menu-link">About</a></li>
                    <li><a href="{{ route('subscribe')}}" class="menu-link">Subscribe</a></li>
                    <li><a href="/archives" class="menu-link">Archives</a></li>
                    <li><a href="/store" class="menu-link">Store</a></li>
                    <li><a href="{{ route('contactUs') }}" class="menu-link">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>

    <script>
        // JavaScript to add 'active' class to the current menu item
        document.addEventListener('DOMContentLoaded', () => {
            const normalizePath = (path) => path.endsWith('/') && path.length > 1 ? path.slice(0, -1) : path;

            const currentPath = normalizePath(window.location.pathname);
            const menuLinks = document.querySelectorAll('.menu-link');

            menuLinks.forEach(link => {
                const linkPath = normalizePath(new URL(link.href).pathname);
                if (linkPath === currentPath || (linkPath === '/' && currentPath === '')) {
                    link.classList.add('active');
                    link.parentElement.classList.add('current--menu'); // Adds class to the parent <li>
                }
            });
        });
    </script>

    <!-- End Top Bar -->
</header>
