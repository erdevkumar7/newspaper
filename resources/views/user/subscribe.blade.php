@extends('user.layout')
@section('page_content')
    <main class="main">
        <!-- Membership Section -->
        <section id="" class="my-membership section">
            <div class="container">
                <div class="row gy-4">
                    <form action="" method="POST" id="subscription-payment-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <span>Payment Method</span>
                                <div class="card">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header p-0" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button
                                                        class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom"
                                                        type="button" data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <span>Paypal</span>
                                                            <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                                                        </div>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder="Paypal email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header p-0">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-light btn-block text-left p-3 rounded-0"
                                                        data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <span>Credit card</span>
                                                            <div class="icons">
                                                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                                                <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                                                <img src="https://i.imgur.com/35tC99g.png" width="30">
                                                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                                            </div>
                                                        </div>
                                                    </button>
                                                </h2>
                                            </div>


                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body payment-card-body">
                                                    <span class="font-weight-normal card-text">Card Details</span>

                                                    <!-- Card Element will be inserted here -->
                                                    <div id="card-element" class="form-control"
                                                        style="padding: 10px; border: 1px solid #ccc;">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>

                                                    <!-- Error message placeholder -->
                                                    <div id="card-errors" role="alert" style="color: red;"></div>

                                                    <span class="text-muted certificate-text">
                                                        <i class="fa fa-lock"></i> Your transaction is secured with SSL
                                                        certificate
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <span>Summary</span>
                                <div class="card">
                                    <div class="d-flex justify-content-between p-3">
                                        <div class="d-flex flex-column">
                                            <span>Pro(Billed Monthly) <i class="fa fa-caret-down"></i></span>
                                            {{-- <a href="#" class="billing">Save 20% with annual billing</a> --}}
                                        </div>
                                        <div class="mt-1">
                                            {{-- <sup class="super-price">{{$ads->price}} chf</sup> --}}
                                            {{-- <span class="super-month">/{{$ads->time_duration}} Days</span> --}}
                                        </div>
                                    </div>

                                    <hr class="mt-0 line">

                                    <div class="p-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Refferal Bonouses</span>
                                            <span>0 chf</span>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <span>Vat <i class="fa fa-clock-o"></i></span>
                                            <span>0%</span>
                                        </div>
                                    </div>
                                    <hr class="mt-0 line">

                                    <div class="p-3 d-flex justify-content-between">
                                        <div class="d-flex flex-column">
                                            <span>Today you pay(CHF)</span>
                                            {{-- <small>You pay for {{$ads->name}} </small> --}}
                                        </div>
                                        {{-- <span>{{$ads->price}}</span> --}}
                                    </div>


                                    <div class="p-3">
                                        <button type="submit" class="btn btn-primary btn-block free-button">Pay
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /Membership Section -->
    </main>
@endsection
