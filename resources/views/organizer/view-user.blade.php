@extends('organizer.layout')
@section('page_content')
    <div class="container">
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

                                    <div class="d-flex justify-content-center gap-3">
                                        @if ($user->status == 1)
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success update-status" data-id="{{ $user->id }}"
                                                data-status="1">Verified</button>
                                        @else
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-warning update-status" data-id="{{ $user->id }}"
                                                data-status="0">Pending</button>
                                        @endif
                                        <a href="{{route('organizer.dashboard')}}"><button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-warning">Back</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).on('click', '.update-status', function() {
                var userId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus == 1 ? 0 : 1; // Toggle status

                $.ajax({
                    url: "{{ route('organizer.updateuserstatus') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: userId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            // Toggle the button text and class based on the new status
                            if (newStatus == 1) {
                                $('button[data-id="' + userId + '"]').removeClass('btn-warning').addClass(
                                    'btn-success').text('Verified');
                            } else {
                                $('button[data-id="' + userId + '"]').removeClass('btn-success').addClass(
                                    'btn-warning').text('Pending');
                            }
                            $('button[data-id="' + userId + '"]').data('status',
                                newStatus); // Update the data-status attribute

                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Status updated successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Handle any errors
                    }
                });
            });
        </script>
    </div>
@endsection
