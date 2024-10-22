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
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Newspaper">
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
                                                        <td>{{ $paper->pdf_upload ?? 'Not Available' }}</td>
                                                    
                                                        <td>
                                                            <a href="">
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
                                                            <a href="">
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

    </div>

@endsection
