@extends('admin.layout')
@section('page_content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>All Users<small>(registered)</small></h2>
                    <div class="nav navbar-right panel_toolbox">
                        <a href="{{route('admin.adduser')}}">
                            <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add User">
                                Add User
                            </button>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>View User</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($allusers->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">No data available</td>
                                        </tr>
                                        @else
                                        @foreach ($allusers as $user)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $user->name ?? 'Not Available'}}</td>
                                            <td>{{ $user->email ?? 'Not Available' }}</< /td>
                                            <td>{{ $user->state ?? 'Not Available' }}</< /td>
                                            <td>{{ $user->city ?? 'Not Available' }}</< /td>
                                            <td>{{ $user->status ? 'Active' : 'In-active' }}</< /td>
                                            <td>
                                                <a href="{{route('admin.edituser', $user->id)}}">
                                                    <button data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>

                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#deleteConfirmModal"
                                                    data-deleted-id="{{ $user->id }}"
                                                    class="delete-escort-btn" title="Delete">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                                <form id="deleteConfirmForm" method="POST"
                                                    style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>

                                            <td>
                                                <a href="{{route('admin.viewuser', $user->id)}}">
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

    {{-- sweetalert2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- delete confirm  script --}}
    <script>     
        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(event) {
                if (event.target.closest('.delete-escort-btn')) {
                    const deleteId = event.target.closest('.delete-escort-btn').getAttribute(
                        'data-deleted-id');

                    // Show SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        console.log('rrrrrr', result)
                        if (result.isConfirmed) {
                            // If confirmed, submit the delete form
                            const deleteForm = document.getElementById('deleteConfirmForm');
                            deleteForm.action = `/admin/delete-user/${deleteId}`;
                            deleteForm.submit();
                        }
                    });
                }
            });
        });
    </script>
</div>

@endsection