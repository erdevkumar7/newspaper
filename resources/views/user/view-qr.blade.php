@extends('user.layout')
@section('page_content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-2">
                    <div class="row g-0">
                        <div class="col-xl-12">
                            <div class="card-body p-md-4 text-black">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ route('user.dashboard') }}">
                                            <button type="button" class="btn btn-warning">My-Profile</button>
                                        </a>
                                    </div>
                                    <h3 class="mb-4 text-center text-uppercase flex-grow-1">My QR-Code</h3>
                                    <div>
                                        @if ($user->status)
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success"> Verified </button>
                                        @else
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-warning"> Not-Verified</button>
                                        @endif
                                    </div>
                                </div>
                                <hr>

                                <div class="card-body p-md-5 text-black text-center">
                                    <h2 class="qr-head">Welcome, {{ auth()->user()->first_name }}!</h2>
                                    <p>Your QR code has been generated. You can use it for further verification.</p>
                                    <div>
                                        <img src="{{ asset('/public/qrcodes') . '/' . auth()->user()->qr_code_image }}"
                                            alt="QR Code">
                                    </div>
                                    <form action="{{ route('user.qrdownload', auth()->user()->id) }}" method="GET"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="btn btn-warning mt-4">QR Download</button>
                                    </form>
                                    <div class="mt-4 text-center">
                                        <button class="btn btn-default" style="background: #58cdd1" onclick="shareRegistration()">Share with other
                                            Alumni</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <script>
        function shareRegistration() {
            if (navigator.share) {
                navigator.share({
                        title: 'Join NAVOTSAV-3.0!',
                        text: 'I just registered as MAAN, you can also Register',
                        url: '{{ url('https://www.iammaan.com/user/register') }}'
                    })
                    .then(() => console.log('Thanks for sharing!'))
                    .catch(console.error);
            } else {
                // Fallback: Show modal with link
                const shareModal = document.getElementById('shareModal');
                shareModal.style.display = 'block';
            }
        }
    </script>
@endsection
