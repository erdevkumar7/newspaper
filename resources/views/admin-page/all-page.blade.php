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
    </div>

@endsection
