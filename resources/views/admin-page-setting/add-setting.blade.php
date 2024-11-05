@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New-Setting</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form action="{{route('admin.addPageSettingSubmit')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4">
                                    <label for="name"> Name * </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" oninput="removeError('nameErr')">
                                    @error('name')
                                        <span class="text-danger" id="nameErr">{{ $message }}</span>
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
                                <div class="col-md-8 col-sm-8 ">
                                    <label for="content">Content *</label>
                                    <textarea class="form-control" id="content" name="content"
                                        oninput="removeError('contentErr')">{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="text-danger" id="contentErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>                   

                            {{-- submit --}}
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                    <a href=""> <button class="btn btn-primary"
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
