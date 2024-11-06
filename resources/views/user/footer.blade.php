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
                            @if ($address_setting !== null)
                                <p>{!! nl2br(e($address_setting)) !!}</p>
                            @else
                                <p>Remant Review</p>
                                <p>P.O. Box 1134</p>
                                <p>Battle Creek, MI 49014</p>
                            @endif
                        </div>
                    </div>
                    <p class="mt-3"><i class="bi bi-telephone"></i> <strong>Tel:</strong>
                        @if ($telephone_setting !== null)
                            <span>{{ $telephone_setting }}</span>
                        @else
                            <span>1844.707.1844</span>
                        @endif
                    </p>
                    <p><i class="bi bi-envelope"></i> <strong>Email:</strong>
                        @if ($email_setting !== null)
                            <span>{{ $email_setting }}</span>
                        @else
                            <span>support@remnantreview.co</span>
                        @endif
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-3 footer-links">
                <h4>PAYMENT OPTIONS</h4>
                <div class="footer-contact ">
                    @if ($payment_option_setting !== null)
                        <p>{!! nl2br(e($payment_option_setting)) !!}</p>
                    @else
                        <p>Credit Card, Debit Card, Internet Banking,<br>
                            Wallets, DD & Cheque, NEFT/RTGS, UPI</p>
                    @endif
                </div>
                <div class="footer-pay pt-3">

                </div>
                <div class="footer-contact">
                    CONNECT WITH US
                    <div class="social-links d-flex mt-3">
                        <a href="{{ $connect_setting ?? '' }}"><i class="bi bi-twitter-x"></i></a>
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
