@extends('admin.layout')

@section('page_content')

    <!-- page content -->

    <div class="right_col" role="main">

        <div class="page-title">

            <div class="title_left">

                <h3>Update Alumni</h3>

            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">

                <div class="x_panel">

                    <div class="x_content">

                        <br />

                        <form action="{{ route('admin.editusersubmit', $user->id) }}" method="POST">

                            @csrf

                            @method('PUT')

                            <div class="item form-group">

                                <div class="col-md-4 col-sm-4 ">

                                    <label class="form-label">First Name *</label>

                                    <input type="text" id="form3Example1m"

                                        value="{{ old('first_name', $user->first_name) }}" name="first_name"

                                        class="form-control" oninput="removeError('first_nameErr')">

                                    @error('first_name')

                                        <span class="text-danger" id="first_nameErr">{{ $message }}</span>

                                    @enderror

                                </div>



                                <div class="col-md-4 col-sm-4 ">

                                    <label class="form-label">Last Name *</label>

                                    <input type="text" id="form3Example1n" placeholder="Last Name"

                                        value="{{ old('last_name', $user->last_name) }}" name="last_name"

                                        class="form-control" oninput="removeError('last_nameErr')" />

                                    @error('last_name')

                                        <span class="text-danger" id="last_nameErr">{{ $message }}</span>

                                    @enderror

                                </div>



                                <div class="col-md-4 col-sm-4 ">

                                    <label class="form-label">Email *</label>

                                    <input type="text" id="form3Example97" class="form-control" name="email"

                                        value="{{ old('email', $user->email) }}" placeholder="Email"

                                        oninput="removeError('emailErr')" />

                                    @error('email')

                                        <span class="text-danger" id="emailErr">{{ $message }}</span>

                                    @enderror

                                </div>

                            </div>



                            <div class="item form-group">

                                <div class="col-md-4 col-sm-4 ">

                                    <label class="form-label">Contact Number *</label>

                                    <input type="text" id="phone_number" name="phone_number"

                                        value="{{ old('phone_number', $user->phone_number) }}"

                                        oninput="removeError('phone_numberErr')" class="form-control" />

                                    @error('phone_number')

                                        <span class="text-danger" id="phone_numberErr">{{ $message }}</span>

                                    @enderror

                                </div>

                                <div class="col-md-4 col-sm-4">

                                    <label class="form-label">Current City </label>

                                    <input type="text" id="city" name="city"

                                        value="{{ old('city', $user->city) }}" class="form-control"

                                        oninput="removeError('cityErr')" />

                                    @error('city')

                                        <span class="text-danger" id="cityErr">{{ $message }}</span>

                                    @enderror

                                </div>

                                <div class="col-md-4 col-sm-4">

                                    <label class="form-label">Gender </label>

                                    <select id="gender" class="form-control" name="gender"

                                        oninput="removeError('genderErr')">

                                        <option value="" selected> --- Select Gender --- </option>

                                        <option value="Male"

                                            {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>

                                            Male</option>

                                        <option value="Female"

                                            {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>

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

                                    <label for="inputState4" class="form-label">State of the JNV Last

                                        Attended</label>

                                    <select id="inputState4" class="form-control" name="state"

                                        oninput="populateDistricts()">

                                        <option value="" selected>--- Select State ---</option>

                                        @foreach ($jnvSchools as $state => $districts)

                                            <option value="{{ $state }}"

                                                {{ old('state', $user->state) == $state ? 'selected' : '' }}>

                                                {{ $state }}

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('state')

                                        <span class="text-danger" id="stateErr">{{ $message }}</span>

                                    @enderror

                                </div>



                                <div class="col-md-4 col-sm-4 ">

                                    <label for="inputDistrict4" class="form-label">JNV District Last

                                        Attended</label>

                                    <select id="inputDistrict4" class="form-control" name="district">

                                        <option value="" selected>--- Select District ---</option>

                                    </select>

                                    @error('district')

                                        <span class="text-danger" id="districtErr">{{ $message }}</span>

                                    @enderror

                                </div>



                                <div class="col-md-4 col-sm-4 ">

                                    <label for="inputBatch4" class="form-label">Year Of Passing:</label>

                                    <select id="inputBatch4" class="form-control" name="passout_batch"

                                        oninput="removeError('passout_batchErr')">

                                        <option value="" selected>--- Select Batch ---</option>

                                        @for ($year = 1954; $year <= 2024; $year++)

                                            <option value="{{ $year }}"

                                                {{ old('passout_batch', $user->passout_batch) == $year ? 'selected' : '' }}>

                                                {{ $year }}

                                            </option>

                                        @endfor

                                    </select>

                                    @error('passout_batch')

                                        <span class="text-danger" id="passout_batchErr">{{ $message }}</span>

                                    @enderror

                                </div>

                            </div>



                            <div class="item form-group">

                                <div class="col-md-4 col-sm-4 ">

                                    <label class="form-label">Profession </label>

                                    <input type="text" id="profession" placeholder="Your profession"
                                    value="{{ old('profession', $user->profession) }}" name="profession" class="form-control"
                                    oninput="removeError('professionErr')">
                                    @error('profession')
                                        <span class="text-danger" id="professionErr">{{ $message }}</span>
                                    @enderror                            

                                </div>

                            </div>

                           

                            {{-- submit --}}

                            <div class="item form-group">

                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">

                                    <a href="{{ route('admin.alluser') }}"> <button class="btn btn-primary"

                                            type="button">Cancel</button></a>

                                    <button type="submit" class="btn btn-success">Submit</button>

                                </div>

                            </div>

                        </form>





                    </div>

                </div>

            </div>

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



        <script>

            const jnvSchools = @json($jnvSchools); // Pass PHP array to JavaScript

            const oldState = "{{ old('state', $user->state) }}"; // Get old or current state

            const oldDistrict = "{{ old('district', $user->district) }}"; // Get old or current district



            // Function to populate districts based on selected state

            function populateDistricts() {

                const stateSelect = document.getElementById('inputState4');

                const districtSelect = document.getElementById('inputDistrict4');

                const selectedState = stateSelect.value;



                // Clear existing district options

                districtSelect.innerHTML = '<option value="" selected>--- Select District ---</option>';



                // Populate districts if state is selected

                if (selectedState && jnvSchools[selectedState]) {

                    jnvSchools[selectedState].forEach(district => {

                        const option = document.createElement('option');

                        option.value = district;

                        option.textContent = district;

                        if (district === oldDistrict) {

                            option.selected = true;

                        }

                        districtSelect.appendChild(option);

                    });

                }

            }



            // Populate districts on page load based on old state

            document.addEventListener('DOMContentLoaded', populateDistricts);

        </script>

    </div>

    <!-- /page content -->

@endsection

