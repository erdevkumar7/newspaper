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
                                    <input type="Password" name="password" class="form-control" id="password"
                                        oninput="removeError('PasswordErr')">
                                    {{-- <i class="fa fa-eye eye-icon-position" id="eyeIcon"></i> --}}
                                    @error('PasswordErr')
                                        <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 col-sm-12 mb-3">
                                    <label for="password_confirmation">Confirm Password * </label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" oninput="removeError('password_confirmationErr')">
                                    {{-- <i class="fa fa-eye eye-icon-position" id="eyeIcon"></i> --}}

                                    @if ($errors->any())
                                    <span class="text-danger">
                                        <ul style="list-style-type: none;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </span>                                    
                                    @endif
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

    </main>
@endsection
