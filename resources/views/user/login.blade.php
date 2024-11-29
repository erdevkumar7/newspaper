@extends('user.layout')
@section('page_content')
    {{-- <main class="main">
        <!-- Membership Section -->
        <section id="" class="my-membership section">
            <div class="container">
                <div class="row gy-4">
                    <div class="forms-set login_form">
                        <h1>Login Now</h1>
                        <form action="{{ route('user.loginSubmit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                               
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}" oninput="removeError('emailPassErr')">
                                </div>
                                
                                <div class="col-md-12 col-sm-12">
                                    <label for="password">Password *</label>
                                    <div style="position: relative;">
                                        <input type="password" name="password" class="form-control" id="password"
                                            oninput="removeError('emailPassErr')">
                                        <i class="fa fa-eye eye-icon-position" id="eyeIcon"
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                    </div>

                                    @if ($errors->has('email') || $errors->has('password'))
                                        <span class="text-danger" id="emailPassErr">
                                            {{ $errors->first('email') ?: $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="separator mt-2">
                                <p class="change_link">Don't have account ?
                                    <a href="{{ route('user.register') }}" class="to_register"> Register </a>
                                </p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="item btn-form form-group">
                                <div class="col-md-12 col-sm-12 mt-4">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                            <p class="text-center text-muted mt-3 mb-0"> <a href="{{ route('user.password.request') }}"
                                    class="text-body"><u>Forgot Password</u></a></p>
                        </form>
                    </div>
                </div>
            </div>

        </section><!-- /Membership Section -->
     
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        <script>
            function removeError(id) {
                var errElement = document.getElementById(id);
                if (errElement) {
                    errElement.style.display = 'none'
                }
            }
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
        </script>
    </main> --}}


    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <form action="" method="POST">
                @csrf
                <div class="col">
                    <div class="card card-registration my-4">
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
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-4 text-black">
                                    <h3 class="mb-4 text-uppercase">Alumni Login Form </h3>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example97">Email ID *</label>                                        
                                        <input type="text" id="form3Example97" class="form-control" name="email"
                                            value="{{ old('email') }}" oninput="removeError('emailErr')" />
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-outline mb-4">
                                        <label class="form-label" for="orgPassword">Password *</label>
                                        <input type="Password" name="password" class="form-control" id="orgPassword"
                                            oninput="removeError('PasswordErr')">
                                        @error('password')
                                            <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                        @enderror
                                    </div> --}}

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="phone_number">Contact Number *</label>
                                        <input type="hidden" value="Dev@123" name="password">
                                        <input type="text" id="phone_number" name="phone_number"
                                            value="{{ old('phone_number') }}" oninput="removeError('phone_numberErr')" class="form-control" />
                                        @error('phone_number')
                                            <span class="text-danger" id="phone_numberErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class="separator">
                                            <p class="change_link">Don't have Alumni ?
                                                <a href="{{ route('user.register') }}" class="to_register"> Register
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif
    </div>
@endsection
