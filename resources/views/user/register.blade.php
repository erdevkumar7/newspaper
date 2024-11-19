@extends('user.layout')
@section('page_content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <form action="{{route('user.registerSubmit')}}" method="POST" enctype="multipart/form-data">
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
                            <img src="{{asset('/public/images/allumni_img/allumni3.jpg')}}"
                                alt="Sample photo" class="img-fluid"
                                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height: 95%;" />
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body p-md-4 text-black">
                                <h3 class="mb-4 text-uppercase">Alumni Registration Form </h3>

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
                                    <input type="hidden" value="Dev@123" name="password">
                                    <input type="text" id="form3Example97" class="form-control" name="email"
                                        value="{{ old('email') }}" placeholder="Email" oninput="removeError('emailErr')" />
                                    @error('email')
                                        <span class="text-danger" id="emailErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            {{-- <label class="form-label" for="mobile_number">Mobile Number</label> --}}
                                            <input type="text" id="phone_number" name="phone_number"
                                                value="{{ old('phone_number') }}" oninput="removeError('phone_numberErr')"
                                                placeholder="Contact Number" class="form-control" />
                                            @error('phone_number')
                                                <span class="text-danger" id="phone_numberErr">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <input type="text" id="city" name="city" placeholder="Current City"
                                            value="{{ old('city') }}" class="form-control"
                                            oninput="removeError('cityErr')" />
                                        @error('city')
                                            <span class="text-danger" id="cityErr">{{ $message }}</span>
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
                                        <label for="inputState4" class="form-label">State of the JNV Last Attended</label>
                                        <select id="inputState4" class="form-select" name="state"
                                            oninput="removeError('stateErr')">
                                            <option value="" selected> --- Select State --- </option>
                                            <option value="madhyapradesh"
                                                {{ old('state') == 'madhyapradesh' ? 'selected' : '' }}> Madhya Pradesh
                                            </option>
                                            <option value="other" {{ old('state') == 'other' ? 'selected' : '' }}> Other
                                            </option>
                                        </select>
                                        @error('state')
                                            <span class="text-danger" id="stateErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="inputDistrict4" class="form-label">JNV District Last Attended</label>
                                        <select id="inputDistrict4" class="form-select" name="district"
                                            oninput="removeError('districtErr')">
                                            <option value="" selected> --- Select District --- </option>
                                            <option value="indore">Indore</option>
                                            <option value="dewas">Dewas</option>
                                            <option value="ujjain">Ujjain</option>
                                            <option value="sehore"> Sehore </option>
                                        </select>
                                        @error('district')
                                            <span class="text-danger" id="districtErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="inputBatch4" class="form-label">Year Of Passing:</label>
                                        <select id="inputBatch4" class="form-select" name="passout_batch"
                                            oninput="removeError('passout_batchErr')">
                                            <option value="" selected> --- Select Batch --- </option>
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                        @error('passout_batch')
                                            <span class="text-danger" id="passout_batchErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="Profession">Profession</label>
                                        <select id="Profession" class="form-select" name="profession"
                                            oninput="removeError('professionErr')">
                                            <option value="" selected> --- Select Profession --- </option>
                                            <option value="student"
                                                {{ old('profession') == 'student' ? 'selected' : '' }}>Student</option>
                                            <option value="bussiness"
                                                {{ old('profession') == 'bussiness' ? 'selected' : '' }}>Bussiness</option>
                                            <option value="self-Employeed"
                                                {{ old('profession') == 'self-Employeed' ? 'selected' : '' }}>
                                                Self-Employeed</option>
                                            <option value="doctor" {{ old('profession') == 'doctor' ? 'selected' : '' }}>
                                                Doctor</option>
                                            <option value="enginner"
                                                {{ old('profession') == 'enginner' ? 'selected' : '' }}>Enginner</option>
                                            <option value="govt-employee"
                                                {{ old('profession') == 'govt-employee' ? 'selected' : '' }}>Govt. Employee
                                            </option>
                                            <option value="other" {{ old('profession') == 'other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                        @error('profession')
                                            <span class="text-danger" id="professionErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-outline mb-4">
                                    <label class="form-label" for="ProfessionSp">Specialization (optional)</label>
                                    <input type="text" id="ProfessionSp" class="form-control"
                                        value="{{ old('profession_specialization') }}" name="profession_specialization"
                                        oninput="removeError('ProfessionSpErr')" />
                                    @error('profession_specialization')
                                        <span class="text-danger" id="ProfessionSpErr">{{ $message }}</span>
                                    @enderror
                                </div> --}}


                                <div class="d-flex justify-content-end pt-3">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-warning btn-lg ms-2">Submit</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
