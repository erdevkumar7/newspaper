@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Alumni Details</h3>
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
                                <div class="col-md-4 col-sm-4 ">
                                    <label>First Name * </label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->first_name ?? 'Not Available' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label>Last Name </label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->last_name ?? 'Not Available' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label> Gender </label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->gender ?? 'Not Available' }}" disabled>
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="state"> State of the JNV Last Attended </label>
                                    <input type="text" class="form-control" value="{{ $user->state ?? 'Not Available' }}"
                                        disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label>JNV District Last Attended</label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->district ?? 'Not Available' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="city">Current city *</label>
                                    <input type="text" class="form-control" value="{{ $user->city ?? 'Not Available' }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 ">
                                    <label> Year Of Passing: </label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->passout_batch ?? 'Not Available' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label> Profession </label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->profession ?? 'Not Available' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="email">Email *</label>
                                    <input type="text" class="form-control" value="{{ $user->email ?? 'Not Available' }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 ">
                                    <label> Contact Number</label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->phone_number ?? 'Not Available' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                </div>

                                <div class="col-md-4 col-sm-4 ">
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
