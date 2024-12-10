@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Organizer Details</h3>
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
                                    <label for="form3Example1m">First Name * </label>
                                    <input type="text" id="form3Example1m" value="{{ $organizer->first_name ?? '' }}"
                                        name="first_name" class="form-control" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="form3Example1n">Last Name * </label>
                                    <input type="text" id="form3Example1n" value="{{ $organizer->last_name ?? '' }}"
                                        name="last_name" class="form-control" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="gender">Gender </label>
                                    <input type="text" id="gender" value="{{ $organizer->gender ?? '' }}"
                                        name="gender" class="form-control" disabled>
                                </div>

                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="phone_number">Contact Number *</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control"
                                        value="{{ $organizer->phone_number ?? '' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="roleId">Team Role </label>
                                    <input type="text" id="roleId" name="phone_number" class="form-control"
                                        value="{{ $organizer->role ?? '' }}" disabled>
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="form3Example97">Email *</label>
                                    <input type="text" id="form3Example97" class="form-control" name="email"
                                        value="{{ $organizer->email ?? '' }}" disabled>
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="password">Password * </label>
                                    <input type="text" value="{{$organizer->original_password ?? ''}}" name="password" class="form-control" id="password" disabled>
                                </div>
                            </div>


                            {{-- submit --}}
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-5 mt-3">
                                    <a href="{{ route('admin.allOrganizer') }}"> <button class="btn btn-primary"
                                            type="button">Go Back</button></a>
                                    {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
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
