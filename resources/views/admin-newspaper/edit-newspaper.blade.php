@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Update New-paper</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">      
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form action="{{route('admin.editNewsPaperSubmit', $paper->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="item form-group">
                                {{-- title --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="title"> Title * </label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ old('title', $paper->title)}}" oninput="removeError('titleErr')">
                                    @error('title')
                                        <span class="text-danger" id="titleErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- author --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="author">Author * </label>
                                    <input type="text" class="form-control" id="author" name="author"
                                        value="{{ old('author', $paper->author) }}" oninput="removeError('authorErr')">
                                    @error('author')
                                        <span class="text-danger" id="authorErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="publication_date">Publication Date *</label>
                                    <div class='input-group date' id='myDatepicker2'>
                                        <input type='text' class="form-control" name="publication_date"
                                        value="{{ old('publication_date', $paper->publication_date) }}" oninput="removeError('publication_dateErr')" />
                                        <span class="input-group-addon">
                                           <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    @error('publication_date')
                                        <span class="text-danger" id="publication_dateErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-8 col-sm-8 ">
                                    <label for="description">Description *</label>
                                    <textarea class="form-control" id="description" name="description" oninput="removeError('descriptionErr')">{{ old('description', $paper->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger" id="descriptionErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="pdf_upload">Upload pdf *</label>
                                    <input type="file" class="form-control" id="pdf_upload" name="pdf_upload"
                                        accept="application/pdf" oninput="removeError('pdf_uploadErr')">

                                    @error('pdf_upload')
                                        <span class="text-danger" id="pdf_uploadErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- submit --}}
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                    <a href="{{ route('admin.allnewspaper') }}"> <button class="btn btn-primary"
                                            type="button">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Submit</button>
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
