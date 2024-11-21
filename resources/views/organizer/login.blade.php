@extends('user.layout')
@section('page_content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <form action="{{ route('organizer.loginSubmit') }}" method="POST" enctype="multipart/form-data">
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
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-4 text-black">
                                    <h3 class="mb-4 text-uppercase">Organizer Login Form </h3>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example97">Email ID *</label>
                                        <input type="text" id="form3Example97" class="form-control" name="email"
                                            value="{{ old('email') }}" oninput="removeError('emailErr')" />
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="orgPassword">Password *</label>
                                        <input type="Password" name="password" class="form-control" id="orgPassword"
                                            oninput="removeError('PasswordErr')">
                                        @error('password')
                                            <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="Password" name="password" class="form-control" id="password"
                                                    placeholder="Password" oninput="removeError('PasswordErr')">
                                                @error('password')
                                                    <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="Password" name="password_confirmation" class="form-control"
                                                    id="password_confirm" placeholder="Confirm password"
                                                    oninput="removeError('confirmPasswordErr')">
                                                @error('password_confirmation')
                                                    <span class="text-danger" id="ConfirmPasswordErr">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}


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
