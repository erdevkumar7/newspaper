@extends('user.layout')
@section('page_content')
    <main class="main">
        <!-- Slider Section -->
        <section id="slider" class="slider section dark-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">

                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>

                    <div class="swiper-wrapper">

                        <div class="swiper-slide"
                            style="background-image: url('{{ asset('public/mytheme/assets/img/jnv1.jpg') }}');">
                            <div class="content">
                                <h2>The Best Way To Connect Alumni(keep Smile)</h2>
                                <p>The purpose of this portal is to facilitate interaction among NVS Alumni and connecting
                                    Alumni to JNVs</p>
                            </div>
                        </div>

                        <div class="swiper-slide"
                            style="background-image: url('{{ asset('public/mytheme/assets/img/jnv3.jpg') }}');">
                            <div class="content">
                                <h2>Register and participate and contribute to Alumni</h2>
                                <p>You are encouraged to register and participate and contribute to this portal not just a
                                    cog in the wheel but as a interwoven thread in the colourful fabric called NVS.</p>
                            </div>
                        </div>

                        <div class="swiper-slide"
                            style="background-image: url('{{ asset('public/mytheme/assets/img/jnv8.jpeg') }}');">
                            <div class="content">
                                <h2>"Food" & "Cultural Events"</h2>
                                <p>Participate in interactive sessions, cultural programs, and networking activities that
                                    will rekindle the Navodaya spirit.</p>
                            </div>
                        </div>

                        <div class="swiper-slide"
                            style="background-image: url('{{ asset('public/mytheme/assets/img/jnv9.jpeg') }}');">
                            <div class="content">
                                <h2>"Mentoring" & "Extension of Support"</h2>
                                <p>The "Mentoring" & "Extension of Support" features of the portal acts as platform for one
                                    to support the students' & JNV through various ways & mechanisms.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Slider Section -->

        <!-- Lifestyle Category Section -->
        <section id="lifestyle-category" class="lifestyle-category section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <div class="section-title-container d-flex align-items-center justify-content-between">
                    <h3>NAVOTSAV-3.0</h3>
                    {{-- <p>Hello</p> --}}
                    <p><a href="{{ route('user.register') }}">Join Navotsav-3.0</a></p>
                </div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5">
                    <div class="col-lg-12">
                        <div class="post-list lg">
                            <h3>Welcome to the NVS Alumni Community!</h3>
                            <p class="mb-4 d-block">We are thrilled to invite you to reconnect, reminisce, and relive the
                                cherished memories of your time at Navodaya. This meet is an opportunity to celebrate our
                                shared legacy, strengthen bonds, and create new memories together. You are encouraged to
                                register and participate and contribute to this
                                portal not just a cog in the wheel but as a interwoven thread in the colourful fabric called
                                NVS and bring one another closer to each other, proving once again "the whole is greater
                                than the sum of its individual parts"</p>
                        </div>

                        <div class="post-list lg">
                            <h4 class="mb-4">To ensure smooth participation, we have introduced a seamless registration
                                process:</h4>
                            <h4>1. Fill the Registration Form:</h4>
                            <p class="mb-4 d-block">Begin by providing your details through our online registration form.
                                This will help us gather accurate information to organize the event efficiently.</p>

                            <h4>2. Receive Your QR Code:</h4>
                            <p>Once you submit the form, a unique QR code will be generated for you based on the information
                                provided. If You want download the QR code You can download this QR code immediately after
                                its generation.</p>

                            <h4>3. Verification at the Event:</h4>
                            <p>Once You have reciewed Your unique QR Code that will be verfied by any of our orgaizer. On
                                the day of the meet, the organizers will verify your QR code to confirm your registration.
                                Please ensure you have your QR code ready for a hassle-free experience.</p>
                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Lifestyle Category Section -->
    </main>
@endsection
