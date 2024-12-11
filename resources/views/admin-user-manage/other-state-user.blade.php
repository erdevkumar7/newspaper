@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Other-State Alumni<small>(registered)</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.adduser') }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Alumni">
                                    Add Alumni
                                </button>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Contact</th>
                                                <th>State</th>
                                                <th>District</th>
                                                <th>City</th>
                                                <th>Passout-Year</th>
                                                <th>Profession</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>View User</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($allusers->isEmpty())
                                                <tr>
                                                    <td colspan="9" class="text-center">No Alumni Available</td>
                                                </tr>
                                            @else
                                                @foreach ($allusers as $user)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $user->first_name ?? 'Not Available' }}</td>
                                                        <td>{{ $user->last_name ?? 'Not Available' }}</td>
                                                        <td>{{ $user->phone_number ?? 'Not Available' }} </td>
                                                        <td>{{ $user->state ?? 'Not Available' }} </td>
                                                        <td>{{ $user->district ?? 'Not Available' }}</td>
                                                        <td>{{ $user->city ?? 'Not Available' }}</td>
                                                        <td>{{ $user->passout_batch ?? 'Not Available' }} </td>
                                                        <td>{{ $user->profession ?? 'Not Available' }}</td>
                                                        <td>
                                                            @if ($user->status == 1)
                                                                <button type="button"
                                                                    class="btn btn-success btn-sm update-status"
                                                                    data-id="{{ $user->id }}"
                                                                    data-status="1">Verified</button>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm update-status"
                                                                    data-id="{{ $user->id }}"
                                                                    data-status="0">Pending</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.edituser', $user->id) }}">
                                                                <button class="btn btn-info btn-sm" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>

                                                            <button class="btn btn-danger btn-sm delete-user"
                                                                data-toggle="tooltip" data-placement="top"
                                                                data-delete-id="{{ $user->id }}" title="Delete">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </button>


                                                        </td>

                                                        <td>
                                                            <a href="{{ route('admin.viewuser', $user->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-primary">view</button></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- sweetalert2 JS --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script>
            $(document).on('click', '.delete-user', function(e) {
                e.preventDefault();
                var userId = $(this).data('delete-id');
                var row = $(this).closest('tr'); // Get the row of the clicked delete button

                // Show SweetAlert confirmation
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.deleteuser') }}",
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}",
                                user_id: userId
                            },
                            success: function(response) {
                                if (response.success) {
                                    row.remove();
                                    // Swal.fire({
                                    //     title: "Deleted!",
                                    //     text: "The user has been deleted.",
                                    //     icon: "success"
                                    // }).then(() => {
                                    //     row.remove(); 
                                    // });
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: response.message,
                                        icon: "error"
                                    });
                                }
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: "Error!",
                                    text: "An error occurred while deleting the user.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        </script>


        {{-- Update user status active/Inactive --}}
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
        <script>
            $(document).on('click', '.update-status', function() {
                var userId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus == 1 ? 0 : 1; // Toggle status

                $.ajax({
                    url: "{{ route('admin.updateuserstatus') }}",
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

@push('js')
<script src="{{ asset('public/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('public/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('public/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<!--<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>-->
<script src="{{ asset('public/build/js/colVis.min.js') }}"></script>
@endpush
