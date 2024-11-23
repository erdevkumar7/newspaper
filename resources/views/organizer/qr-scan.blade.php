@extends('organizer.layout')
@section('page_content')
    <script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>
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
                                            <button type="button" class="btn btn-warning">Profile</button>
                                        </a>
                                        <a href="{{route('organizer.QrScan')}}">
                                            <button type="button" class="btn btn-default"
                                                style="background: #2ec2fa">QR-Scan</button>
                                        </a>
                                    </div>
                                    <h3 class="mb-4 text-center text-uppercase flex-grow-1 qr-head">Welcome, Organizer!</h3>
                                        {{-- <p>Thanks for Your Support for the event.</p> --}}
                                    <div>
                                        @if ($organizer->status)
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success"> Verified </button>
                                        @else
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-warning">Pending</button>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                             
                                    <div class="card-body p-md-5 text-black text-center">
                                        <h1>QR Code Scanner</h1>
                                        <button class="btn btn-primary" id="startScannerBtn">Start Scanner</button>
                                        <div id="qr-reader" style="display: none;"></div>
                                        <p><strong>Scanned QR Code:</strong> <span id="qr-result">None</span></p>

                                        <script>
                                            const startScannerBtn = document.getElementById('startScannerBtn');
                                            const qrReaderElement = document.getElementById('qr-reader');
                                            const qrResultElement = document.getElementById('qr-result');

                                            startScannerBtn.addEventListener('click', () => {
                                                qrReaderElement.style.display = 'block';
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
                                                        // When a QR code is scanned
                                                        qrResultElement.innerText = decodedText;

                                                        // Stop scanning after a successful scan
                                                        html5QrCode.stop().then(() => {
                                                            console.log("QR Code scanning stopped.");
                                                            // Redirect to the scanned URL
                                                            window.location.href = decodedText;
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
@endsection
