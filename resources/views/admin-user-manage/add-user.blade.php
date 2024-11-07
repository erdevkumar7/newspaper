@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New User</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form action="{{ route('admin.adduserSubmit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <span class="section">Malling Address</span>
                            <div class="item form-group">
                                {{-- name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="name"> Name * </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" oninput="removeError('nameErr')">
                                    @error('name')
                                        <span class="text-danger" id="nameErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- address --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="address">Address </label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ old('address') }}" oninput="removeError('addressErr')">
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
                                        value="{{ old('zip_code') }}" oninput="removeError('zip_codeErr')">
                                    @error('zip_code')
                                        <span class="text-danger" id="zip_codeErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <br />
                            <span class="section">
                                Billing Address
                                <div class="form-check form-check-inline">
                                    <small>
                                        <input type="checkbox" class="form-check-input" id="same-details"
                                            onclick="copyMailingDetails()">
                                        <label class="form-check-label" for="same-details">Same as Mailing Address</label>
                                    </small>
                                </div>
                            </span>
                            <div class="item form-group">
                                {{-- name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="billing_name"> Name * </label>
                                    <input type="text" class="form-control" name="billing_name" id="billing_name"
                                        value="{{ old('billing_name') }}" oninput="removeError('billing_nameErr')">
                                    @error('billing_name')
                                        <span class="text-danger" id="billing_nameErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- address --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="billing_address">Address </label>
                                    <input type="text" class="form-control" id="billing_address" name="billing_address"
                                        value="{{ old('billing_address') }}" oninput="removeError('billing_addressErr')">
                                    @error('billing_address')
                                        <span class="text-danger" id="billing_addressErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="billing_state">State *</label>
                                    <select class="form-control" id="billing_state" name="billing_state"
                                        oninput="removeError('billing_stateErr')">
                                        <option value="">Select state</option>
                                        <option value="state1" {{ old('billing_state') == 'state1' ? 'selected' : '' }}>
                                            state1
                                        </option>
                                        <option value="state2" {{ old('billing_state') == 'state2' ? 'selected' : '' }}>
                                            state2
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
                                        <option value="city1" {{ old('billing_city') == 'city1' ? 'selected' : '' }}>
                                            city1
                                        </option>
                                        <option value="city2" {{ old('billing_city') == 'city2' ? 'selected' : '' }}>
                                            city2
                                        </option>
                                    </select>
                                    @error('billing_city')
                                        <span class="text-danger" id="billing_cityErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="billing_zip_code">Zip Code</label>
                                    <input type="text" class="form-control" name="billing_zip_code"
                                        id="billing_zip_code" value="{{ old('billing_zip_code') }}"
                                        oninput="removeError('billing_zip_codeErr')">
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
                                        value="{{ old('email') }}" oninput="removeError('emailErr')">
                                    @error('email')
                                        <span class="text-danger" id="emailErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- password --}}
                                <div class="col-md-4 col-sm-4">
                                    <label for="password">Password * </label>
                                    <input type="Password" name="password" class="form-control" id="password"
                                        oninput="removeError('PasswordErr')">
                                    <i class="fa fa-eye eye-icon-position" id="eyeIcon"></i>
                                    @error('password')
                                        <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- password_confirmation --}}
                                <div class="col-md-4 col-sm-4">
                                    <label for="password_confirmation">Confirm Password * </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" oninput="removeError('C_PasswordErr')">
                                    <i class="fa fa-eye eye-icon-position" id="eyeIconConfirm"></i>
                                    @error('password_confirmation')
                                        <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- submit --}}
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                    <a href="{{ route('admin.alluser') }}"> <button class="btn btn-primary"
                                            type="button">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>


        <script>
            // Password field toggle
            document.getElementById('eyeIcon').addEventListener('click', function() {
                var passwordField = document.getElementById('password');
                var icon = document.getElementById('eyeIcon');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });

            // Confirm password field toggle
            document.getElementById('eyeIconConfirm').addEventListener('click', function() {
                var confirmPasswordField = document.getElementById('password_confirmation');
                var icon = document.getElementById('eyeIconConfirm');

                if (confirmPasswordField.type === 'password') {
                    confirmPasswordField.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    confirmPasswordField.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        </script>

        <script>
            function copyMailingDetails() {
                const isChecked = document.getElementById("same-details").checked;

                if (isChecked) {
                    // Copy values from Mailing Address to Billing Address
                    document.getElementById("billing_name").value = document.getElementById("name").value;
                    document.getElementById("billing_address").value = document.getElementById("address").value;
                    document.getElementById("billing_zip_code").value = document.getElementById("zip_code").value;

                    const mailingState = document.getElementById("state").value;
                    document.getElementById("billing_state").value = mailingState;

                    const mailingCity = document.getElementById("city").value;
                    document.getElementById("billing_city").value = mailingCity;

                } else {
                    // Clear Billing Address fields if unchecked
                    document.getElementById("billing_name").value = "";
                    document.getElementById("billing_address").value = "";
                    document.getElementById("billing_state").value = "";
                    document.getElementById("billing_city").value = "";
                    document.getElementById("billing_zip_code").value = "";
                }
            }
        </script>
    </div>
    <!-- /page content -->
@endsection
