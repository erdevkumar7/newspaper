@extends('admin.layout')
@section('page_content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Pages</h2>
                        {{-- <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.addpage') }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Add-Page">
                                    Add Page
                                </button>
                            </a>
                        </div> --}}
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
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>View </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($allpages->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">No data available</td>
                                                </tr>
                                            @else
                                                @foreach ($allpages as $page)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $page->title ?? 'Not Available' }}</td>
                                                        <td>{{ $page->description ?? 'Not Available' }} </td>                                                       
                                                        <td>
                                                            @if ($page->status == 1)
                                                                <button type="button"
                                                                    class="btn btn-success btn-sm update-status"
                                                                    data-id="{{ $page->id }}"
                                                                    data-status="1">Active</button>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm update-status"
                                                                    data-id="{{ $page->id }}"
                                                                    data-status="0">Inactive</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('admin.editpage', $page->id)}}">
                                                                <button class="btn btn-info btn-sm" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a href="{{route('admin.viewpage', $page->id)}}">
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

        <script>
            $(document).on('click', '.update-status', function() {
                var pageId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus == 1 ? 0 : 1; // Toggle status

                $.ajax({
                    url: "{{ route('admin.updatepagestatus') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        page_id: pageId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            // Toggle the button text and class based on the new status
                            if (newStatus == 1) {
                                $('button[data-id="' + pageId + '"]').removeClass('btn-warning').addClass(
                                    'btn-success').text('Active');
                            } else {
                                $('button[data-id="' + pageId + '"]').removeClass('btn-success').addClass(
                                    'btn-warning').text('Inactive');
                            }
                            $('button[data-id="' + pageId + '"]').data('status',
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
