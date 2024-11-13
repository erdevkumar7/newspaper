<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.headerCSS')
</head>

<body class="login">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ route('admin.registerSubmit') }}" method="POST">
                    @csrf
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" name="name" class="form-control" placeholder="Name" oninput="removeErr('nameError')" />
                        @error('name')
                        <span class="text-danger" id="nameError">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Email" oninput="removeErr('emailError')" />
                        @error('email')
                        <span class="text-danger" id="emailError">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" oninput="removeErr('passwordError')" />
                        @error('password')
                        <span class="text-danger" id="passwordError">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" oninput="removeErr('conf_passwordError')">
                        @error('password_confirmation')
                        <span class="text-danger" id="conf_passwordError">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="adm-sbmit-btn">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="{{ route('admin.login') }}" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />
                    </div>
                </form>
            </section>
        </div>
    </div>
    <script>
        function removeErr(id) {
            var errElement = document.getElementById(id);
            if (errElement) {
                errElement.style.display = 'none'
            }
        }
    </script>
</body>

</html>