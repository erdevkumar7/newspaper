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
                                <div class="col-md-4 col-sm-4">
                                    <label for="title"> Title * </label>
                                    <input type="text" class="form-control" name="title" value="{{ $page->title }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label for="description">Description *</label>
                                    <textarea class="form-control" id="description" name="description" style="height: 200px;" disabled>{{ $page->description }}</textarea>
                                </div>
                            </div>

                            {{-- <div class="col-md-12 col-sm-12 ">
                                <div id="editor-one" class="editor-wrapper"></div>
                                <textarea name="descr" id="descr" style="display:none;">{{ $page->description }}</textarea>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /page content -->
@endsection
