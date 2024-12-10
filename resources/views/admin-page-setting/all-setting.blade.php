@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Update Setting</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form action="{{ route('admin.upadteAllPageSetting') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4">
                                    <label for="email"> Email </label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ old('email', $email->content ?? '') }}" oninput="removeError('nameErr')">
                                    @error('email')
                                        <span class="text-danger" id="nameErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" class="form-control" name="telephone" id="teleohone"
                                        value="{{ old('telephone', $telephone->content ?? '') }}"
                                        oninput="removeError('telErr')">
                                    @error('telephone')
                                        <span class="text-danger" id="telErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <label for="logo_img">Logo</label>
                                    <div style="text-align: center; padding:4px;  border: 1px solid #e9ecef">
                                        <img src="{{ asset('public/images/static_img') . '/' . $logo->image }}"
                                            width="50px" height="50px">
                                    </div>
                                    <input type="file" class="form-control" id="image" name="image"
                                        accept="image/*" oninput="removeError('imageErr')">
                                    @error('image')
                                        <span class="text-danger" id="imageErr">{{ $message }}</span>
                                    @enderror
                                </div>
                             
                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4">
                                    <label for="connect">Connect link</label>
                                    <input type="text" class="form-control" name="connect" id="connect"
                                        value="{{ old('connect', $connect->content ?? '') }}"
                                        oninput="removeError('connectErr')">
                                    @error('connect')
                                        <span class="text-danger" id="connectErr">{{ $message }}</span>
                                    @enderror
                                </div>                         

                                <div class="col-md-4 col-sm-4">
                                    <lable for="address"> Address </lable>
                                    <textarea class="form-control" id="address" name="address" oninput="removeError('contentErr')">{{ old('address', $address->content ?? '') }}</textarea>
                                    @error('address')
                                        <span class="text-danger" id="contentErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <lable for="payment_option"> Payment Options </lable>
                                    <textarea class="form-control" id="payment_option" name="payment_option" oninput="removeError('paymentErr')">{{ old('payment_option', $payment_option->content ?? '') }}</textarea>
                                    @error('payment_option')
                                        <span class="text-danger" id="paymentErr">{{ $message }}</span>
                                    @enderror
                                </div>                      

                            </div>

                            {{-- submit --}}
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                    <a href="{{ route('admin.dashboard') }}"> <button class="btn btn-primary"
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
