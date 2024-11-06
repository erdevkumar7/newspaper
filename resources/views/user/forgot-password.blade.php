@extends('user.layout')
@section('page_content')
    <main class="main">
        <!-- Membership Section -->
        <section id="" class="my-membership section">
            <div class="container">
                <div class="row gy-4">
                    <div class="forms-set login_form">
                        <h1>Forgot Password</h1>
                        <form action="{{route('user.password.email')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                {{-- email --}}
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}" oninput="removeError('emailErr')">
                                    @error('email')
                                        <span class="text-danger input100" id="emailErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- submit --}}
                            <div class="item btn-form form-group">
                                <div class="col-md-12 col-sm-12 mt-4">
                                    <button type="submit" class="btn btn-success">Send Reset Link</button>
                                </div>
                            </div>

                            <p class="text-center text-muted mt-3 mb-0"> <a href="{{ route('user.login') }}"
                                    class="text-body"><u>Back To Login</u></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- /Membership Section -->
    </main>
@endsection
