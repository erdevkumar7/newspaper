@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>News-paper Details</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form>
                            <div class="item form-group">
                                {{-- title --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="title"> Title * </label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ $paper->title ?? 'Not Available' }}" disabled>
                                </div>
                                {{-- author --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="author">Author * </label>
                                    <input type="text" class="form-control" id="author" name="author"
                                        value="{{ $paper->author ?? 'Not Available' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="publication_date">Publication Date *</label>
                                    <div class='input-group date' id='myDatepicker2'>
                                        <input type='text' class="form-control" name="publication_date"
                                            value="{{ $paper->publication_date ?? 'Not Available' }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-8 col-sm-8 ">
                                    <label for="description">Description *</label>
                                    <textarea class="form-control" id="description" name="description" disabled>{{ $paper->description ?? 'Not Available' }}</textarea>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="pdf_upload">Uploaded pdf </label>
                                    @if ($paper->pdf_upload)
                                        <a href="{{route('admin.newspaper.download', $paper->id)}}" class="btn btn-app form-control">
                                            <i class="fa fa-file-pdf-o" style="font-size: 20px; color: red;"></i> Download Pdf
                                        </a>
                                    @else
                                        <a class="btn btn-app form-control">
                                            <i class="fa fa-file-pdf-o" style="font-size: 20px;"></i> No News-paper
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /page content -->
@endsection
