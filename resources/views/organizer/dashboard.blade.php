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
                                        <a href="{{ route('organizer.QrScan') }}">
                                            <button type="button" class="btn btn-default"
                                                style="background: #2ec2fa">QR-Scan</button>
                                        </a>
                                    </div>
                                    <h3 class="mb-4 text-center text-uppercase flex-grow-1 qr-head">My Profile Details</h3>
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
                                <div class="row">
                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" value="{{ $organizer->first_name ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" value="{{ $organizer->last_name ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="text" value="{{ $organizer->email ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Contact Number *</label>
                                        <input type="text" value="{{ $organizer->phone_number ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>


                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Gender </label>
                                        <input type="text" value="{{ $organizer->gender ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Team Role </label>
                                        <input type="text" value="{{ $organizer->role ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>
                                    <hr>
                                    {{-- <div class="d-flex justify-content-center">
                                        @if ($organizer->status)
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success">Profile Verified</button>
                                        @else
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-warning">Verification Pending</button>
                                        @endif

                                    </div> --}}
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
