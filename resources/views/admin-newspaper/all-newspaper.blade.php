@extends('admin.layout')
@section('page_content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Newspaper</h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.addnewspaper') }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Add Newspaper">
                                    Add Newspaper
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
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Publication Date</th>
                                                <th>PDF File</th>
                                                <th>Action</th>
                                                <th>View Paper</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($allnewspaper->isEmpty())
                                                <tr>
                                                    <td colspan="7" class="text-center">No data available</td>
                                                </tr>
                                            @else
                                                @foreach ($allnewspaper as $paper)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $paper->title ?? 'Not Available' }}</td>
                                                        <td>{{ $paper->author ?? 'Not Available' }} </td>
                                                        <td>{{ $paper->publication_date ?? 'Not Available' }} </td>
                                                        <td style="text-align: center">
                                                            @if ($paper->pdf_upload)
                                                                <a href="{{route('admin.newspaper.download', $paper->id)}}">
                                                                    <i class="fa fa-file-pdf-o"
                                                                        style="font-size: 20px; color: red;"></i>
                                                                </a>
                                                            @else
                                                                <a>
                                                                    <i class="fa fa-file-pdf-o"
                                                                        style="font-size: 20px;"></i>
                                                                </a>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('admin.editnewspaper', $paper->id) }}">
                                                                <button class="btn btn-info btn-sm" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>

                                                            <button class="btn btn-danger btn-sm delete-paper"
                                                                data-toggle="tooltip" data-placement="top"
                                                                data-delete-id="{{ $paper->id }}" title="Delete">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </button>


                                                        </td>

                                                        <td>
                                                            <a href="{{ route('admin.viewnewspaper', $paper->id) }}">
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
            $(document).on('click', '.delete-paper', function(e) {
                e.preventDefault();
                var paperId = $(this).data('delete-id');
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
                            url: "{{ route('admin.deleteNeswPaper') }}",
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}",
                                paper_id: paperId
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
                                    text: "An error occurred while deleting the paper.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        </script>
    </div>

@endsection
