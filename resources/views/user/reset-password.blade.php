@extends('user.layout')
@section('page_content')
    <main class="main">
        <!-- Membership Section -->
        <section id="" class="my-membership section">

            <div class="container">
                <div class="row gy-4">
                    <div class="forms-set login_form">
                        <h1>Reset Password</h1>
                        <form action="{{ route('user.password.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="item form-group">
                                {{-- email --}}
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <label for="password">Password * </label>
                                    <div style="position: relative;">
                                        <input type="password" name="password" class="form-control" id="password"
                                            oninput="removeError('CpassPassErr')">
                                        <i class="fa fa-eye eye-icon-position" id="eyeIcon"
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 mb-3">
                                    <label for="password_confirmation">Confirm Password *</label>
                                    <div style="position: relative;">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" oninput="removeError('CpassPassErr')">
                                        <i class="fa fa-eye eye-icon-position" id="eyeIconConfirm"
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                    </div>

                                    @if ($errors->any())
                                        <span class="text-danger">
                                            <ul style="list-style-type: none;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </span>
                                    @endif

                                    {{-- @if ($errors->has('password_confirmation') || $errors->has('password'))
                                        <span class="text-danger" id="CpassPassErr">
                                            {{ $errors->first('email') ?: $errors->first('password') }}
                                        </span>
                                    @endif --}}
                                </div>
                            </div>

                            {{-- submit --}}
                            <div class="item btn-form form-group">
                                <div class="col-md-12 col-sm-12 mt-4">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section><!-- /Membership Section -->

        <script>
            function removeError(id) {
                var errElement = document.getElementById(id);
                if (errElement) {
                    errElement.style.display = 'none'
                }
            }
        </script>

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

    </main>
@endsection
