@extends('admin.layout')
@section('page_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Update User</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <form action="{{route('admin.editusersubmit', $user->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <span class="section">Malling Address</span>
                        <div class="item form-group">
                            {{-- name --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="name"> Name * </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $user->name }}" oninput="removeError('nameErr')">
                                @error('name')
                                <span class="text-danger" id="nameErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- address --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="address">Address </label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $user->address }}" oninput="removeError('addressErr')">
                                @error('address')
                                <span class="text-danger" id="addressErr">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 col-sm-4 ">
                                <label for="state">State *</label>
                                <select class="form-control" id="state" name="state"
                                    oninput="removeError('stateErr')">
                                    <option value="">Select state</option>
                                    <option value="state1" {{ old('state') == 'state1' ? 'selected' : '' }}>state1
                                    </option>
                                    <option value="state2" {{ old('state') == 'state2' ? 'selected' : '' }}>state2
                                    </option>
                                </select>
                                @error('state')
                                <span class="text-danger" id="stateErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item form-group">

                            <div class="col-md-4 col-sm-4 ">
                                <label for="city">City *</label>
                                <select class="form-control" id="city" name="city"
                                    oninput="removeError('cityErr')">
                                    <option value="">Select City</option>
                                    <option value="city1" {{ old('city') == 'city1' ? 'selected' : '' }}>city1
                                    </option>
                                    <option value="city2" {{ old('city') == 'city2' ? 'selected' : '' }}>city2
                                    </option>
                                </select>
                                @error('city')
                                <span class="text-danger" id="cityErr">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" class="form-control" name="zip_code" id="zip_code"
                                    value="{{ $user->zip_code }}" oninput="removeError('zip_codeErr')">
                                @error('zip_code')
                                <span class="text-danger" id="zip_codeErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <br />
                        <span class="section">Billing Address</span>
                        <div class="item form-group">
                            {{-- name --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_name"> Name * </label>
                                <input type="text" class="form-control" name="billing_name" id="billing_name"
                                    value="{{ $user->billing_name }}" oninput="removeError('billing_nameErr')">
                                @error('billing_name')
                                <span class="text-danger" id="billing_nameErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- address --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_address">Address </label>
                                <input type="text" class="form-control" id="billing_address" name="billing_address"
                                    value="{{ $user->billing_address }}" oninput="removeError('billing_addressErr')">
                                @error('billing_address')
                                <span class="text-danger" id="billing_addressErr">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_state">State *</label>
                                <select class="form-control" id="billing_state" name="billing_state"
                                    oninput="removeError('billing_stateErr')">
                                    <option value="">Select state</option>
                                    <option value="billing_state1" {{ old('billing_state') == 'billing_state1' ? 'selected' : '' }}>state1
                                    </option>
                                    <option value="billing_state2" {{ old('billing_state') == 'billing_state2' ? 'selected' : '' }}>state2
                                    </option>
                                </select>
                                @error('billing_state')
                                <span class="text-danger" id="billing_stateErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item form-group">

                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_city">City *</label>
                                <select class="form-control" id="billing_city" name="billing_city"
                                    oninput="removeError('billing_cityErr')">
                                    <option value="">Select city</option>
                                    <option value="billing_city1" {{ old('billing_city') == 'billing_city1' ? 'selected' : '' }}>city1
                                    </option>
                                    <option value="billing_city2" {{ old('billing_city') == 'billing_city2' ? 'selected' : '' }}>city2
                                    </option>
                                </select>
                                @error('billing_city')
                                <span class="text-danger" id="billing_cityErr">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <label for="billing_zip_code">Zip Code</label>
                                <input type="text" class="form-control" name="billing_zip_code" id="billing_zip_code"
                                    value="{{ $user->billing_zip_code }}" oninput="removeError('billing_zip_codeErr')">
                                @error('billing_zip_code')
                                <span class="text-danger" id="billing_zip_codeErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="item form-group">
                            {{-- email --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ $user->email }}" oninput="removeError('emailErr')">
                                @error('email')
                                <span class="text-danger" id="emailErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- password --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="password">Password * </label>
                                <input type="Password" name="password" class="form-control" id="pass"
                                    oninput="removeError('PasswordErr')">
                                @error('password')
                                <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- password_confirmation --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="password_confirmation">Confirm Password * </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" oninput="removeError('C_PasswordErr')">
                                @error('password_confirmation')
                                <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- submit --}}
                        <div class="item form-group">
                            <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                <a href=""> <button class="btn btn-primary"
                                        type="button">Cancel</button></a>
                                <button class="btn btn-primary" type="reset">Reset</button>
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