@extends('user.layout')
@section('page_content')
    <main class="main">
        <!-- Hero Section -->
        <section id="" class="hero-sliders slight-background">
            <!-- Carousel Start -->
            <div class="container-fluid p-0 mb-5">
                <div id="header-carousel" class="carousel slide cust-slider" data-bs-ride="carousel">
                    @if ($allbanner->isEmpty())
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100" src="{{ asset('/public/assets/img/bg-1.png') }}" alt="Image">
                                <div class="carousel-caption d-flex align-items-center">
                                    <div class="container">
                                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                                            <div class="col-10 col-lg-7 text-lg-start text-slides">
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
                                <img class="w-100" src="{{ asset('/public/assets/img/bg-1.png') }}" alt="Image">
                                <div class="carousel-caption d-flex align-items-center">
                                    <div class="container">
                                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                                            <div class="col-10 col-lg-7 text-lg-start text-slides">
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
                                <img class="w-100" src="{{ asset('/public/assets/img/bg-1.png') }}" alt="Image">
                                <div class="carousel-caption d-flex align-items-center">
                                    <div class="container">
                                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                                            <div class="col-10 col-lg-7 text-lg-start text-slides">
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
                    @else
                        <div class="carousel-inner">
                            @foreach ($allbanner as $banner)
                                <div class="carousel-item active">
                                    <img class="w-100"
                                        src="{{ asset('/public/images/static_img/banner_img') . '/' . $banner->name }}"
                                        alt="Image">
                                    <div class="carousel-caption d-flex align-items-center">
                                        <div class="container">
                                            <div
                                                class="row align-items-center justify-content-center justify-content-lg-start">
                                                <div class="col-10 col-lg-7 text-lg-start text-slides">
                                                    <h1 class="display-3 text-black mb-2 pb-2 animated slideInDown">Get help
                                                        from the expert consultants.</h1>
                                                    <p class="text-black mt-2 mb-4">With lots of unique blocks, you can
                                                        easily
                                                        build a page without coding. Build your next consultancy website
                                                        within
                                                        few minutes.</p>
                                                    <a href=""
                                                        class="btn btn-primary py-3 px-5 animated slideInDown">Read More<i
                                                            class="fa fa-arrow-right ms-3"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

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
        </section>
        <!-- /Hero Section -->
        <!-- Services Section -->
        <section id="" class="services section">
            <div class="container">
                <div class="row gy-4 justify-content-center">
                    <div class="col-xl-5 col-lg-8 col-md-12" data-aos="fade-up" data-aos-delay="100">
                        <!-- Section Title -->
                        <div class="my-title" data-aos="fade-up">
                            <h2>Sample</h2>
                        </div><!-- End Section Title -->
                        <div class="paper-blocks" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item">
                                <div class="image">
                                    <!--<iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/d2a9f1c444.html" style="border: 1px solid lightgray; width: 100%; height: 412px;"></iframe>-->
                                    <a href="https://www.flipbookpdf.net/web/site/b6b9b15ae6cb325505042c53a43410152d46ef6d202410.pdf.html"
                                        target="_blank"><img src="{{ asset('/public/assets/img/sample-paper.png') }}"
                                            width="300px"></a>
                                </div>
                            </div>
                            <div class="contents">
                                <a href="https://www.flipbookpdf.net/web/site/b6b9b15ae6cb325505042c53a43410152d46ef6d202410.pdf.html"
                                    target="_blank">
                                    <h3>VIEW</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <aside class="col-xl-5 col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="my-title" data-aos="fade-up">
                            <h2>Current Issue</h2>
                        </div><!-- End Section Title -->

                        <div class="newsissue" data-aos="fade-up" data-aos-delay="100">
                            <div class="newsissue-item">
                                <div class="image">
                                    <img class="w-100" src="{{ asset('/public/assets/img/current-issue.png') }}"
                                        alt="Image">
                                </div>
                            </div>
                            <div class="contents">
                                <div class="subscribed">
                                    <a href="#">
                                        <h3>SUBSCRIBE</h3>
                                    </a>
                                </div>
                                <div class="dwnload">
                                    <a href="#" download>
                                        <h3>DOWNLOAD</h3>
                                    </a>
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
        </section>
        <!-- /Membership Section -->

    </main>
@endsection
