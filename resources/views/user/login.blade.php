@extends('user.layout')
@section('page_content')
<main class="main">



    <!-- Membership Section -->
    <section id="" class="my-membership section">

        <div class="container">
            <div class="row gy-4">
                <div>
                    <h1 >Login Now</h1>
                    <form action="{{route('user.loginSubmit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="item form-group">
                            {{-- email --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email') }}" oninput="removeError('emailErr')">
                             
                            </div>
                            {{-- password --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="password">Password * </label>
                                <input type="Password" name="password" class="form-control" id="password"
                                    oninput="removeError('PasswordErr')">
                                {{-- <i class="fa fa-eye eye-icon-position" id="eyeIcon"></i> --}}
                                @error('email')
                                <span class="text-danger" id="emailErr">{{ $message }}</span>
                            @enderror
                            </div>                        
                        </div>

                        <div class="separator mt-2">
                            <p class="change_link">Don't have account ?
                                <a href="{{route('user.register')}}" class="to_register"> Register </a>
                            </p>
    
                            <div class="clearfix"></div>
                            <br />
                        </div>

                        {{-- submit --}}
                        <div class="item form-group">
                            <div class="col-md-4 col-sm-4 mt-3">                          
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