@extends('user.layout')
@section('page_content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
            <div class="card card-registration my-4">
                <div class="row g-0">
                    <div class="col-xl-12 d-flex justify-content-center align-items-center">
                        <!-- Use Flexbox and height -->
                        <div class="card-body p-md-5 text-black text-center">
                            <!-- Add text-center for horizontal alignment -->
                            <h2 class="qr-head">Welcome, Alumni!</h2>
                            <p>Thanks for visting, please register your-self.</p>
                            {{-- {{ QrCode::size(250)->generate($url) }} --}}
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
