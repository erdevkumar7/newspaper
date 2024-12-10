<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Remnant Review</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('public/assets/img/') }}" rel="icon">
    <link href="{{ asset('public/assets/img/') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('public/assets/css/main.css') }}" rel="stylesheet">


</head>

<body class="index-page">

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
                    <img src="{{ asset('/public/assets/img/logo-new.png') }}" alt="">
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

    <main class="main">

        <!-- Hero Section -->
        <section id="" class="hero-sliders slight-background">

            <!-- Carousel Start -->
            <div class="container-fluid p-0 mb-5">
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100" src="{{ asset('/public/assets/img/bg-1.png') }}" alt="Image">
                            <div class="carousel-caption d-flex align-items-center">
                                <div class="container">
                                    <div class="row align-items-center justify-content-center justify-content-lg-start">
                                        <div class="col-10 col-lg-7 text-center text-lg-start text-slides">
                                            <h1 class="display-3 text-black mb-2 pb-2 animated slideInDown">Get help
                                                from the expert consultants.</h1>
                                            <p class="text-black mt-2 mb-4">With lots of unique blocks, you can easily
                                                build a page without coding. Build your next consultancy website within
                                                few minutes.</p>
                                            <a href=""
                                                class="btn btn-primary py-3 px-5 animated slideInDown">Read More<i
                                                    class="fa fa-arrow-right ms-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="assets/img/bg-1.png" alt="Image">
                            <div class="carousel-caption d-flex align-items-center">
                                <div class="container">
                                    <div
                                        class="row align-items-center justify-content-center justify-content-lg-start">
                                        <div class="col-10 col-lg-7 text-center text-lg-start text-slides">
                                            <h1 class="display-3 text-black mb-2 pb-2 animated slideInDown">Get help
                                                from the expert consultants.</h1>
                                            <p class="text-black mt-2 mb-4">With lots of unique blocks, you can easily
                                                build a page without coding. Build your next consultancy website within
                                                few minutes.</p>
                                            <a href=""
                                                class="btn btn-primary py-3 px-5 animated slideInDown">Learn More<i
                                                    class="fa fa-arrow-right ms-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img class="w-100" src="assets/img/bg-1.png" alt="Image">
                            <div class="carousel-caption d-flex align-items-center">
                                <div class="container">
                                    <div
                                        class="row align-items-center justify-content-center justify-content-lg-start">
                                        <div class="col-10 col-lg-7 text-center text-lg-start text-slides">
                                            <h1 class="display-3 text-black mb-2 pb-2 animated slideInDown">Get help
                                                from the expert consultants.</h1>
                                            <p class="text-black mt-2 mb-4">With lots of unique blocks, you can easily
                                                build a page without coding. Build your next consultancy website within
                                                few minutes.</p>
                                            <a href=""
                                                class="btn btn-primary py-3 px-5 animated slideInDown">Learn More<i
                                                    class="fa fa-arrow-right ms-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->

        </section><!-- /Hero Section -->


        <!-- Services Section -->
        <section id="" class="services section">


            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-9 col-lg-8 col-md-12" data-aos="fade-up" data-aos-delay="100">

                        <!-- Section Title -->
                        <div class="my-title" data-aos="fade-up">
                            <h2>View Sample Paper</h2>
                        </div><!-- End Section Title -->

                        <div class="row">

                            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="service-item  position-relative">
                                    <div class="image">
                                        <!--<iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/d2a9f1c444.html" style="border: 1px solid lightgray; width: 100%; height: 412px;"></iframe>-->
                                        <a href="https://www.flipbookpdf.net/web/site/b6b9b15ae6cb325505042c53a43410152d46ef6d202410.pdf.html"
                                            target="_blank"><img
                                                src="{{ asset('/public/assets/img/sample-paper.png') }}"
                                                width="300px"></a>
                                    </div>
                                    <div class="contents">
                                        <a href="https://www.flipbookpdf.net/web/site/b6b9b15ae6cb325505042c53a43410152d46ef6d202410.pdf.html"
                                            target="_blank" class="stretched-link">
                                            <h3>View Sample</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Service Item -->

                    <aside class="col-xl-3 col-lg-4 col-md-4">

                        <div class="my-title" data-aos="fade-up">
                            <h2>Current Issue</h2>
                        </div><!-- End Section Title -->

                        <div class="newsissue" data-aos="fade-up" data-aos-delay="100">
                            <div class="newsissue-item  position-relative">
                                <div class="image">
                                    <img class="w-100" src="{{ asset('/public/assets/img/current-issue.png') }}"
                                        alt="Image">
                                </div>
                                <div class="contents">
                                    <div class="subscribed">
                                        <a href="#" class="stretched-link">
                                            <h3>Subscribe</h3>
                                        </a>
                                    </div>
                                    <div class="dwnload">
                                        <a href="#" class="stretched-link">
                                            <h3>Download Pdf</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </aside>

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Membership Section -->
        <section id="" class="my-membership section">

            <div class="container">
                <div class="row gy-4">
                    <div class="text-center">
                        <h1 class="mb-5">Choose From 3 Subscription Options:</h1>
                        <p class="">Each Creation Illustrated magazine subscription includes invigorating
                            GETAWAYS to
                            nature and Creation for the whoe family in 4 Quarterly editions packed  with stunning
                            photography and uplifting biblical
                            articles on animals, birds, outdoor adventures, the Creation week, gardening, a children’s
                            story, photo and coloring contests,
                            poetry, a study guide, and even wholesome recipes!</p>
                    </div>
                </div>

                <div class="row block-mem">
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0 aos-init aos-animate" data-aos="fade"
                        data-aos-delay="">
                        <div class="block-2-item">
                            <figure class="image">
                                <img src="{{ asset('/public/assets/img/membership1.png') }}" alt=""
                                    class="img-fluid">
                            </figure>
                            <div class="text">
                                <h3>Subscribe for Yourself</h3>
                                <p>Each PRINT Subscription also Includes a FREE Digital Subscription (a $12.95 value)
                                </p>
                                <a href="#">SUBSCRIBE NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0 aos-init aos-animate" data-aos="fade"
                        data-aos-delay="100">
                        <div class="block-2-item">
                            <figure class="image">
                                <img src="{{ asset('/public/assets/img/membership2.png') }}" alt=""
                                    class="img-fluid">
                            </figure>
                            <div class="text">
                                <h3>Give Gift Subscriptions</h3>
                                <p>Each PRINT Subscription also Includes a FREE Digital Subscription (a $12.95 value)
                                </p>
                                <a href="#">SUBSCRIBE NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0 aos-init aos-animate" data-aos="fade"
                        data-aos-delay="200">
                        <div class="block-2-item">
                            <figure class="image">
                                <img src="{{ asset('/public/assets/img/membership3.png') }}" alt=""
                                    class="img-fluid">
                            </figure>
                            <div class="text">
                                <h3>Digital Subscription Only</h3>
                                <p>Each PRINT Subscription also Includes a FREE Digital Subscription (a $12.95 value)
                                </p>
                                <a href="#">SUBSCRIBE NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Membership Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-3 footer-links">
                    <h4>ABOUT US</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Subscribe</a></li>
                        <li><a href="#">Archive</a></li>
                        <li><a href="#">Store</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Advertise With Us</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-3 footer-about">
                    <h4>CUSTOMER SERVICE</h4>
                    <div class="footer-contact">
                        <div class="footer-address">
                            <div class="icn-addr">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="icn-cont">
                                <p>Remant Review</p>
                                <p>P.O. Box 1134</p>
                                <p>Battle Creek, MI 49014</p>
                            </div>
                        </div>
                        <p class="mt-3"><i class="bi bi-telephone"></i> <strong>Tel:</strong>
                            <span>1844.707.1844</span></p>
                        <p><i class="bi bi-envelope"></i> <strong>Email:</strong> <span>support@remnantreview.co</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 footer-links">
                    <h4>PAYMENT OPTIONS</h4>
                    <div class="footer-contact ">
                        <p>Credit Card, Debit Card, Internet Banking,<br>
                            Wallets, DD & Cheque, NEFT/RTGS, UPI</p>
                    </div>
                    <div class="footer-pay pt-3">

                    </div>
                    <div class="footer-contact">
                        CONNECT WITH US
                        <div class="social-links d-flex mt-3">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>Remnant Review is a product of The Pilgrim’s Key Publishing Association<br> Copyright 2024
            </p>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('public/assets/js/main.js') }}"></script>


</body>

</html>
