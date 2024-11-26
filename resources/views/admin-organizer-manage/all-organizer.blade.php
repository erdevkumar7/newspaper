@extends('admin.layout')
@section('page_content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Organizers<small>(registered)</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{route('admin.addOrganizer')}}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Organizer">
                                    Add Organizer
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
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Team Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>View User</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($allorganizer->isEmpty())
                                                <tr>
                                                    <td colspan="8" class="text-center">No data available</td>
                                                </tr>
                                            @else
                                                @foreach ($allorganizer as $user)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $user->first_name ?? 'Not Available' }}</td>
                                                        <td>{{ $user->email ?? 'Not Available' }} </td>
                                                        <td>{{ $user->phone_number ?? 'Not Available' }} </td>
                                                        <td>{{ $user->role ?? 'Not Available' }} </td>
                                                        <td>
                                                            @if ($user->status == 1)
                                                                <button type="button"
                                                                    class="btn btn-success btn-sm update-status"
                                                                    data-id="{{ $user->id }}"
                                                                    data-status="1">Active</button>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm update-status"
                                                                    data-id="{{ $user->id }}"
                                                                    data-status="0">Inactive</button>
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
                                                            <a href="{{ route('admin.viewOrganizer', $user->id) }}">
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
                            url: "{{ route('admin.deleteOrganizer') }}",
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}",
                                user_id: userId
                            },
                            success: function(response) {
                                if (response.success) {
                                    row.remove(); 
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

        <script>
            $(document).on('click', '.update-status', function() {
                var userId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus == 1 ? 0 : 1; // Toggle status

                $.ajax({
                    url: "{{ route('admin.updateOrganizerStatus') }}",
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
                                    'btn-success').text('Active');
                            } else {
                                $('button[data-id="' + userId + '"]').removeClass('btn-success').addClass(
                                    'btn-warning').text('Inactive');
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
