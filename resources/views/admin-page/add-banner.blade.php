@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Banner Images</h3>
                <!-- Add Image Form-->
                {{-- <form class="adminAdd-picture-form" action="{{ route('admin.AddBannerSubmit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-lg-3 menu-item">
                        <span onclick="document.getElementById('addImageInput').click();">
                            <p class="add-photo-admin">Add Image <i class="fa fa-upload" aria-hidden="true"></i></p>
                        </span>
                        <input type="file" id="addImageInput" accept="image/*" name="pictures[]" multiple
                            style="display: none;" onchange="this.form.submit()">
                    </div>
                </form> --}}
            </div>

            <div class="title_right">
                <!-- Add Image Form-->
                <form class="adminAdd-picture-form" action="{{ route('admin.AddBannerSubmit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-lg-3 menu-item nav navbar-right panel_toolbox">
                        <span onclick="document.getElementById('addImageInput').click();">
                            <p class="add-photo-admin">Add Image <i class="fa fa-upload" aria-hidden="true"></i></p>
                        </span>
                        <input type="file" id="addImageInput" accept="image/*" name="pictures[]" multiple
                            style="display: none;" onchange="this.form.submit()">
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">

                        <div class="row admin-escort-pics">
                            @if ($pictures->isEmpty())
                                <div class="col-lg-3 menu-item no-pic-available">
                                    <h4>No Banner Image vailable</h4>
                                </div>
                            @else
                                @foreach ($pictures as $picture)
                                    <div class="col-lg-3 menu-item inener-pic-data">
                                        <form action="{{ route('admin.DeleteBanner', $picture->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="name" value="{{ $picture->name }}">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-times" aria-hidden="true"></i></button>

                                            <img src="{{ asset('/public/images/static_img/banner_img') . '/' . $picture->name }}"
                                                alt="" width="200px" height="200px" />
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /page content -->

    {{-- <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Form Upload </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Dropzone multiple file uploader</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p>Drag multiple files to the box below for multi upload or click to select files. This is for
                                demonstration purposes only, the files are not uploaded to any server.</p>
                            <form action="form_upload.html" class="dropzone"></form>
                            <br />
                            <br />
                            <br />
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
