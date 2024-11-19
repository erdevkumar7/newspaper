@extends('user.layout')
@section('page_content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
            <div class="card card-registration my-2">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="card-body p-md-4 text-black">
                            <h3 class="mb-4 text-center text-uppercase">Alumni Detail's </h3>
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

                                <div class="d-flex justify-content-center">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-warning">Verify Alumni</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
