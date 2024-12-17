@extends('organizer.layout')

@section('page_content')
    <script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>
    {{-- <script src="{{asset('/public/mytheme/assets/js/html5-qrcode.min.js')}}"></script> --}}
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-4">
                    <div class="row g-0">
                        <div class="col-xl-12">
                            <div class="card-body p-md-4 text-black">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ route('organizer.dashboard') }}">
                                            <button type="button" class="btn btn-warning">My-Profile</button>
                                        </a>
                                    </div>
                                    <h3 class="mb-4 text-center text-uppercase flex-grow-1 qr-head">Welcome, Volunteer!</h3>

                                    <div>
                                        <a href="{{ route('organizer.QrScan') }}">
                                            <button type="button" class="btn btn-default"
                                                style="background: #2ec2fa">QR-Scan</button>
                                        </a>
                                    </div>
                                </div>
                                <hr>

                                <div class="card-body p-md-5 text-black text-center" style="height: 400px">
                                    <h1>QR Code Scanner</h1>
                                    <button class="btn btn-primary" id="startScannerBtn">Start Scanner</button>
                                    <div id="qr-reader" style="width: 100%; max-width: 500px; margin: auto; display: none;">
                                    </div>

                                    <div id="getUserByPhoneNumber" class="mt-2">
                                        <h2>OR</h2>
                                        <form action="{{ route('organizer.userByPhoneNumber') }}" method="GET">
                                            {{-- <input type="text" name="phone_number" placeholder="Mobile Number" required>
                                            <button type="submit">View</button> --}}

                                            <input type="text" id="phone_number" name="phone_number"
                                                value="{{ old('phone_number') }}" oninput="removeError('phone_numberErr')"
                                                placeholder="Mobile Number" required />
                                            <button type="submit">View</button>
                                            @error('phone_number')
                                                <div class="text-danger" id="phone_numberErr">{{ $message }}</div>
                                            @enderror
                                        </form>
                                    </div>

                                    <script>
                                        const startScannerBtn = document.getElementById('startScannerBtn');
                                        const qrReaderElement = document.getElementById('qr-reader');
                                        const userByPhone_number = document.getElementById('getUserByPhoneNumber');

                                        startScannerBtn.addEventListener('click', () => {
                                            qrReaderElement.style.display = 'block';
                                            userByPhone_number.style.display = 'block';

                                            const html5QrCode = new Html5Qrcode("qr-reader");

                                            // Start QR Code scanning
                                            html5QrCode.start({
                                                    facingMode: "environment"
                                                }, // Use the back camera

                                                {
                                                    fps: 10, // Scans per second
                                                    qrbox: 250 // Scanning box size
                                                },

                                                (decodedText) => {
                                                    // Redirect to the scanned URL
                                                    html5QrCode.stop().then(() => {
                                                        window.location.href = decodedText; // Redirect to URL
                                                    }).catch(err => console.error("Error stopping QR code scanner:", err));

                                                },

                                                (errorMessage) => {
                                                    // Error handling for failed scans
                                                    console.log("QR Code scanning error:", errorMessage);
                                                }
                                            ).catch(err => {
                                                console.error("Unable to start scanning:", err);
                                            });
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
