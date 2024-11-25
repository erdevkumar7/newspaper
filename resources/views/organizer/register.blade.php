@extends('organizer.layout')
@section('page_content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <form action="{{ route('organizer.registerSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <div class="card card-registration my-2">
                        {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="{{ asset('/public/images/allumni_img/allumni3.jpg') }}" alt="Sample photo"
                                    class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height: 95%;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-4 text-black">
                                    <h3 class="mb-4 text-uppercase">Organizer Registration Form </h3>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                {{-- <label class="form-label" for="form3Example1m">First name</label> --}}
                                                <input type="text" id="form3Example1m" placeholder="First Name"
                                                    value="{{ old('first_name') }}" name="first_name" class="form-control"
                                                    oninput="removeError('first_nameErr')">
                                                @error('first_name')
                                                    <span class="text-danger" id="first_nameErr">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                {{-- <label class="form-label" for="form3Example1n">Last name</label> --}}
                                                <input type="text" id="form3Example1n" placeholder="Last Name"
                                                    value="{{ old('last_name') }}" name="last_name" class="form-control"
                                                    oninput="removeError('last_nameErr')" />
                                                @error('last_name')
                                                    <span class="text-danger" id="last_nameErr">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        {{-- <label class="form-label" for="form3Example97">Email ID</label> --}}
                                        <input type="text" id="form3Example97" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="Email"
                                            oninput="removeError('emailErr')" />
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                {{-- <label class="form-label" for="mobile_number">Mobile Number</label> --}}
                                                <input type="text" id="phone_number" name="phone_number"
                                                    value="{{ old('phone_number') }}"
                                                    oninput="removeError('phone_numberErr')" placeholder="Contact Number"
                                                    class="form-control" />
                                                @error('phone_number')
                                                    <span class="text-danger" id="phone_numberErr">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <select id="roleId" class="form-select" name="role"
                                                oninput="removeError('roleErr')">
                                                <option value="" selected> --- Select your team role --- </option>
                                                <option value="Accommodation"
                                                    {{ old('role') == 'Accommodation' ? 'selected' : '' }}>
                                                    Accommodation</option>

                                                <option value="Accounting and auditing "
                                                    {{ old('role') == 'Accounting and auditing ' ? 'selected' : '' }}>
                                                    Accounting and auditing </option>

                                                <option value="Cultral performance and event flow"
                                                    {{ old('role') == 'Cultral performance and event flow' ? 'selected' : '' }}>
                                                    Cultral performance and event flow</option>

                                                <option value="Decoration"
                                                    {{ old('role') == 'Decoration' ? 'selected' : '' }}>
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

                                    </div>


                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                        <h6 class="mb-0 me-4">Gender: </h6>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                                oninput="removeError('genderErr')" value="male"
                                                {{ old('gender') == 'male' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                                oninput="removeError('genderErr')" value="female"
                                                {{ old('gender') == 'female' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        @error('gender')
                                            <span class="text-danger" id="genderErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <div style="position: relative;">
                                                    <input type="Password" name="password" class="form-control"
                                                        id="password" placeholder="Password"
                                                        oninput="removeError('PasswordErr')">
                                                    <i class="bi bi-eye eye-icon-position" id="eyeIcon"
                                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                </div>
                                                @error('password')
                                                    <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <div style="position: relative;">
                                                    <input type="Password" name="password_confirmation"
                                                        class="form-control" id="password_confirmation"
                                                        placeholder="Confirm password"
                                                        oninput="removeError('confirmPasswordErr')">
                                                    <i class="bi bi-eye eye-icon-position" id="eyeIconConfirm"
                                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                </div>
                                                @error('password_confirmation')
                                                    <span class="text-danger"
                                                        id="ConfirmPasswordErr">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class="separator">
                                            <p class="change_link">Already an Organizer ?
                                                <a href="{{ route('organizer.login') }}" class="to_register"> Log in </a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end pt-3">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-warning ms-2">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <script>
            // Password field toggle
            document.getElementById('eyeIcon').addEventListener('click', function() {
                var passwordField = document.getElementById('password');
                var icon = document.getElementById('eyeIcon');
                // bi bi-eye
                // bi bi-eye-slash
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    passwordField.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });

            // Confirm password field toggle
            document.getElementById('eyeIconConfirm').addEventListener('click', function() {
                var confirmPasswordField = document.getElementById('password_confirmation');
                var icon = document.getElementById('eyeIconConfirm');

                if (confirmPasswordField.type === 'password') {
                    confirmPasswordField.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    confirmPasswordField.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });
        </script>
    </div>
@endsection
