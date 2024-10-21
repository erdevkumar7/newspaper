@extends('admin.layout')
@section('page_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>User Details</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <form>
                        <span class="section">Malling Address</span>
                        <div class="item form-group">
                            <div class="col-md-4 col-sm-4 ">
                                <label for="name"> Name * </label>
                                <input type="text" class="form-control" value="{{ $user->name ?? 'Not Available'}}" disabled>
                            </div>

                            <div class="col-md-4 col-sm-4 ">
                                <label for="address">Address </label>
                                <input type="text" class="form-control" value="{{ $user->address ?? 'Not Available' }}" disabled>
                            </div>

                            <div class="col-md-4 col-sm-4 ">
                                <label for="state">State *</label>
                                <input type="text" class="form-control" value="{{ $user->state ?? 'Not Available' }}" disabled>
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-4 col-sm-4 ">
                                <label for="city">City *</label>
                                <input type="text" class="form-control" value="{{ $user->city ?? 'Not Available' }}" disabled>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" class="form-control" value="{{ $user->zip_code ?? 'Not Available' }}" disabled>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <label for="email">Email *</label>
                                <input type="text" class="form-control" value="{{ $user->email ?? 'Not Available' }}" disabled>
                            </div> 
                        </div>

                        <br />
                        <span class="section">Billing Address</span>
                        <div class="item form-group">
                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_name"> Name * </label>
                                <input type="text" class="form-control" value="{{ $user->billing_name ?? 'Not Available' }}" disabled>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_address">Address </label>
                                <input type="text" class="form-control" value="{{ $user->billing_address ?? 'Not Available' }}" disabled>
                            </div>

                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_state">State *</label>
                                <input type="text" class="form-control" value="{{ $user->billing_state ?? 'Not Available' }}" disabled>
                            </div>
                        </div>

                        <div class="item form-group">

                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_city">City *</label>
                                <input type="text" class="form-control" value="{{ $user->billing_city ?? 'Not Available' }}" disabled>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_zip_code">Zip Code</label>
                                <input type="text" class="form-control" value="{{ $user->billing_zip_code ?? 'Not Available' }}" disabled>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <label for="email">Email *</label>
                                <input type="text" class="form-control" value="{{ $user->email ?? 'Not Available' }}" disabled>
                            </div>   
                        </div>

                        <!-- <div class="item form-group">                                                 
                            <div class="col-md-4 col-sm-4">
                                <label for="password">Password * </label>
                                <input type="text" class="form-control" value="{{ $user->original_password ?? 'Not Available' }}" disabled>
                            </div> 
                        </div> -->
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection