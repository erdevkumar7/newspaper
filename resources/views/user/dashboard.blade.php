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
                                            <button type="button" class="btn btn-warning">Profile</button>
                                        </a>
                                        <a href="{{ route('user.viewQR', $user->id) }}">
                                            <button type="button" class="btn btn-default" style="background: #2ec2fa">QR-Code</button>
                                        </a>
                                    </div>
                                    <h3 class="mb-4 text-center text-uppercase flex-grow-1">My Profile Details</h3>
                                    <div>
                                        @if ($user->status)
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
                                        <input type="text" value="{{ $user->first_name ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" value="{{ $user->last_name ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="text" value="{{ $user->email ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Contact Number *</label>
                                        <input type="text" value="{{ $user->phone_number ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Current City </label>
                                        <input type="text" value="{{ $user->city ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Gender </label>
                                        <input type="text" value="{{ $user->gender ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">State of the JNV Last Attended </label>
                                        <input type="text" value="{{ $user->state ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">JNV District Last Attended </label>
                                        <input type="text" value="{{ $user->district ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Year Of Passing </label>
                                        <input type="text" value="{{ $user->passout_batch ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>

                                    <div class="form-outline col-md-6 mb-3">
                                        <label class="form-label">Profession </label>
                                        <input type="text" value="{{ $user->profession ?? 'Not Available' }}"
                                            class="form-control" disabled>
                                    </div>
                                    <hr>

                                    {{-- <div class="d-flex justify-content-center">
                                        @if ($user->status)
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
@endsection
