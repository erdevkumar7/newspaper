@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New Organizer</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form action="{{ route('admin.addOrganizerSubmit') }}" method="POST">
                            @csrf
                            <div class="item form-group">
                                {{-- name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="form3Example1m">First Name * </label>
                                    <input type="text" id="form3Example1m" value="{{ old('first_name') }}"
                                        name="first_name" class="form-control" oninput="removeError('first_nameErr')">
                                    @error('first_name')
                                        <span class="text-danger" id="first_nameErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- address --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="form3Example1n">Last Name * </label>
                                    <input type="text" id="form3Example1n" value="{{ old('last_name') }}"
                                        name="last_name" class="form-control" oninput="removeError('last_nameErr')" />
                                    @error('last_name')
                                        <span class="text-danger" id="last_nameErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="gender">Gender </label>
                                    <select id="gender" class="form-control" name="gender"
                                        oninput="removeError('genderErr')">
                                        <option value="" selected> --- Select Gender --- </option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                            Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger" id="genderErr">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="phone_number">Contact Number *</label>
                                    <input type="text" id="phone_number" name="phone_number"
                                        value="{{ old('phone_number') }}" oninput="removeError('phone_numberErr')"
                                        class="form-control" />
                                    @error('phone_number')
                                        <span class="text-danger" id="phone_numberErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="roleId">Team Role </label>
                                    <select id="roleId" class="form-control" name="role"
                                        oninput="removeError('roleErr')">
                                        <option value="" selected> --- Select your team role --- </option>
                                        <option value="Accommodation"
                                            {{ old('role') == 'Accommodation' ? 'selected' : '' }}>
                                            Accommodation</option>

                                        <option value="Accounting and auditing"
                                            {{ old('role') == 'Accounting and auditing' ? 'selected' : '' }}>
                                            Accounting and auditing </option>

                                        <option value="Cultral performance and event flow"
                                            {{ old('role') == 'Cultral performance and event flow' ? 'selected' : '' }}>
                                            Cultral performance and event flow</option>

                                        <option value="Decoration" {{ old('role') == 'Decoration' ? 'selected' : '' }}>
                                            Decoration</option>

                                        <option value="Food" {{ old('role') == 'Food' ? 'selected' : '' }}>
                                            Food</option>

                                        <option value="Registration Desk"
                                            {{ old('role') == 'Registration Desk' ? 'selected' : '' }}>
                                            Registration Desk</option>

                                        <option value="Stage management"
                                            {{ old('role') == 'Stage management' ? 'selected' : '' }}>
                                            Stage management</option>

                                        <option value="Social Media and Marketing"
                                            {{ old('role') == 'Social Media and Marketing' ? 'selected' : '' }}>
                                            Social Media and Marketing</option>

                                        <option value="Teams coordinator"
                                            {{ old('role') == 'Teams coordinator' ? 'selected' : '' }}>
                                            Teams coordinator</option>

                                        <option value="Transportation"
                                            {{ old('role') == 'Transportation' ? 'selected' : '' }}>
                                            Transportation</option>

                                        <option value="Venue Coordinator"
                                            {{ old('role') == 'Venue Coordinator' ? 'selected' : '' }}>
                                            Venue Coordinator</option>

                                        <option value="Other" {{ old('role') == 'Other' ? 'selected' : '' }}>
                                            Other</option>
                                    </select>
                                    @error('role')
                                        <span class="text-danger" id="roleErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="form3Example97">Email *</label>
                                    <input type="hidden" value="Dev@123" name="password">
                                    <input type="text" id="form3Example97" class="form-control" name="email"
                                        value="{{ old('email') }}" oninput="removeError('emailErr')" />
                                    @error('email')
                                        <span class="text-danger" id="emailErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="password">Password * </label>
                                    <input type="Password" name="password" class="form-control" id="password"
                                        oninput="removeError('PasswordErr')">
                                    <i class="fa fa-eye eye-icon-position" id="eyeIcon"></i>
                                    @error('password')
                                        <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
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
                                    <a href="{{ route('admin.allOrganizer') }}"> <button class="btn btn-primary"
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


    </div>
    <!-- /page content -->
@endsection
