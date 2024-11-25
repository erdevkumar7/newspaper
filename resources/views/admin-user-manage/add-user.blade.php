@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New Alumni</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form action="{{ route('admin.adduserSubmit') }}" method="POST">
                            @csrf
                            <div class="item form-group">
                                {{-- name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="form3Example1m">First Name * </label>
                                    <input type="text" id="form3Example1m" value="{{ old('first_name') }}"
                                        name="first_name" class="form-control" oninput="removeError('first_nameErr')">
                                    @error('first_name')
                                        <span class="text-danger" id="first_nameErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- address --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="form3Example1n">Last Name * </label>
                                    <input type="text" id="form3Example1n" value="{{ old('last_name') }}"
                                        name="last_name" class="form-control" oninput="removeError('last_nameErr')" />
                                    @error('last_name')
                                        <span class="text-danger" id="last_nameErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-sm-4 ">
                                    <label for="form3Example97">Email *</label>
                                    <input type="hidden" value="Dev@123" name="password">
                                    <input type="text" id="form3Example97" class="form-control" name="email"
                                        value="{{ old('email') }}" oninput="removeError('emailErr')" />
                                    @error('email')
                                        <span class="text-danger" id="emailErr">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="phone_number">Contact Number *</label>
                                    <input type="text" id="phone_number" name="phone_number"
                                        value="{{ old('phone_number') }}" oninput="removeError('phone_numberErr')"
                                        class="form-control" />
                                    @error('phone_number')
                                        <span class="text-danger" id="phone_numberErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="city">Current City *</label>
                                    <input type="text" id="city" name="city" value="{{ old('city') }}"
                                        class="form-control" oninput="removeError('cityErr')" />
                                    @error('city')
                                        <span class="text-danger" id="cityErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="gender">Gender </label>
                                    <select id="gender" class="form-control" name="gender"
                                        oninput="removeError('genderErr')">
                                        <option value="" selected> --- Select Gender --- </option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                            Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
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
                                    <label for="inputState4">State of the JNV Last Attended</label>
                                    <select id="inputState4" class="form-control" name="state"
                                        oninput="removeError('stateErr')">
                                        <option value="" selected> --- Select State --- </option>
                                        @foreach ($jnvSchools as $state => $districts)
                                            <option value="{{ $state }}"
                                                {{ old('state') == $state ? 'selected' : '' }}>{{ $state }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                        <span class="text-danger" id="stateErr">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                <div class="col-md-4 col-sm-4">
                                    <label for="inputDistrict4">JNV District Last Attended</label>
                                    <select id="inputDistrict4" class="form-control" name="district"
                                        oninput="removeError('districtErr')" data-old-district="{{ old('district') }}">
                                        <option value="" selected> --- Select District --- </option>
                                    </select>
                                    @error('district')
                                        <span class="text-danger" id="districtErr">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                <div class="col-md-4 col-sm-4">
                                    <label for="inputBatch4" >Year Of Passing</label>
                                    <select id="inputBatch4" class="form-control" name="passout_batch"
                                        oninput="removeError('passout_batchErr')">
                                        <option value="" selected> --- Select Batch --- </option>
                                        @for ($year = 1954; $year <= 2024; $year++)
                                            <option value="{{ $year }}"
                                                {{ old('passout_batch') == $year ? 'selected' : '' }}>
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
                                    <label for="Profession">Profession</label>
                                    <select id="Profession" class="form-control" name="profession"
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
                                        <option value="Other" {{ old('profession') == 'Other' ? 'selected' : '' }}>
                                            Other</option>
                                    </select>
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


        <script>
            const jnvSchools = @json($jnvSchools);

            const stateSelect = document.getElementById('inputState4');
            const districtSelect = document.getElementById('inputDistrict4');

            function populateDistricts(state, oldDistrict = null) {
                // Clear previous options
                districtSelect.innerHTML = '<option value="" selected> --- Select District --- </option>';

                // Populate districts
                if (jnvSchools[state]) {
                    jnvSchools[state].forEach(function(district) {
                        const option = document.createElement('option');
                        option.value = district;
                        option.textContent = district;

                        // Mark the old value as selected
                        if (district === oldDistrict) {
                            option.selected = true;
                        }

                        districtSelect.appendChild(option);
                    });
                }
            }

            // Handle state change
            stateSelect.addEventListener('change', function() {
                populateDistricts(this.value);
            });

            // Populate districts on page load (if there's an old value)
            const oldState = stateSelect.value;
            const oldDistrict = districtSelect.getAttribute('data-old-district');

            if (oldState) {
                populateDistricts(oldState, oldDistrict);
            }
        </script>
    </div>
    <!-- /page content -->
@endsection
