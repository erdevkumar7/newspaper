@extends('user.layout')
@section('page_content')

<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col">
        <div class="card card-registration my-4">
            <div class="row g-0">
                <div class="col-xl-12 d-flex justify-content-center align-items-center" > 
                    <!-- Use Flexbox and height -->
                    <div class="card-body p-md-5 text-black text-center">
                        <!-- Add text-center for horizontal alignment -->
                        <h2 class="qr-head">Welcome, {{ $user->first_name }}!</h2>
                        <p>Your QR code has been generated. You can use it for further verification.</p>
                        <div>
                            <img src="{{ asset('/public/qrcodes') . '/' . $user->qr_code_image }}" alt="QR Code">
                        </div>

                        <button type="submit" class="btn btn-warning mt-4" >QR Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
