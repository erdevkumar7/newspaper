@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Update Page</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form action="{{ route('admin.updatepagesubmit', $page->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4">
                                    <label for="title"> Title * </label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ old('title', $page->title) }}" oninput="removeError('titleErr')" disabled>
                                    @error('title')
                                        <span class="text-danger" id="titleErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="image"> Image </label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        accept="image/*" oninput="removeError('imageErr')">
                                    @error('image')
                                        <span class="text-danger" id="imageErr">{{ $message }}</span>
                                    @enderror
                                </div>                              
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label for="description">Description *</label>
                                    <textarea class="form-control" id="description" style="height: 200px;" name="description"
                                        oninput="removeError('descriptionErr')">{{ old('description', $page->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger" id="descriptionErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- submit --}}
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                    <a href="{{ route('admin.allpage') }}"> <button class="btn btn-primary"
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
