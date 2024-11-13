@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Page Details</h3>
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
                                <div class="col-md-6 col-sm-6">
                                    <label for="title"> Title * </label>
                                    <input type="text" class="form-control" name="title" value="{{ $page->title }}"
                                        disabled>
                                </div>                      
                            </div>

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label for="image">Image</label>
                                    <div style="text-align: center; padding:4px;  border: 1px solid #e9ecef">
                                        <img src="{{ asset('public/images/page_img') . '/' . $page->images }}"
                                            alt="Page" width="50px" height="50px">
                                    </div>
                                    {{-- <div>
                                        <img src="{{ asset('public/images/static_img') . '/' . $page->images }}" width="50px"
                                            height="50px" alt="content_img">
                                    </div> --}}
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label for="description">Description *</label>
                                    <textarea class="form-control" id="description" name="description" style="height: 200px;" disabled>{{ $page->description }}</textarea>
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
