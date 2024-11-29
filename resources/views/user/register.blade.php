@extends('user.layout')
@section('page_content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <form action="{{ route('user.registerSubmit') }}" method="POST" enctype="multipart/form-data">
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
                                            value="{{ old('email') }}" placeholder="Email"
                                            oninput="removeError('emailErr')" />
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                {{-- <label class="form-label" for="mobile_number">Mobile Number</label> --}}
                                                <input type="text" id="phone_number" name="phone_number"
                                                    value="{{ old('phone_number') }}"
                                                    oninput="removeError('phone_numberErr')" placeholder="Contact Number"
                                                    class="form-control" />
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
                                                oninput="removeError('genderErr')" value="Male"
                                                {{ old('gender') == 'Male' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                                oninput="removeError('genderErr')" value="Female"
                                                {{ old('gender') == 'Female' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        @error('gender')
                                            <span class="text-danger" id="genderErr">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="inputState4" class="form-label">State of JNV</label>
                                            <select id="inputState4" class="form-select" name="state"
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

                                        <div class="col-md-6 mb-4">
                                            <label for="inputDistrict4" class="form-label">District of JNV</label>
                                            <select id="inputDistrict4" class="form-select" name="district"
                                                oninput="removeError('districtErr')"
                                                data-old-district="{{ old('district') }}">
                                                <option value="" selected> --- Select District --- </option>
                                            </select>
                                            @error('district')
                                                <span class="text-danger" id="districtErr">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="inputBatch4" class="form-label">Year of 12th Pass</label>
                                            <select id="inputBatch4" class="form-select" name="passout_batch"
                                                oninput="removeError('passout_batchErr')">
                                                <option value="" selected> --- Select Batch --- </option>
                                                @for ($year = 1992; $year <= 2024; $year++)
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


                                        <div class="col-md-6 mb-4">
                                            <label class="form-label" for="profession">Profession</label>
                                            <input type="text" id="profession" placeholder="Your profession"
                                                value="{{ old('profession') }}" name="profession" class="form-control"
                                                oninput="removeError('professionErr')">
                                            @error('profession')
                                                <span class="text-danger" id="professionErr">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-md-flex justify-content-start align-items-center mb-2 py-2">
                                        <p class="mb-0 me-4">Do you want contribute for Navotsav-3.0 ?</p>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="contribute"
                                                id="yescontribute" oninput="removeError('contributeErr')" value="Yes"
                                                {{ old('contribute') == 'Yes' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="malecontribute">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="contribute"
                                                id="nocontribute" oninput="removeError('contributeErr')" value="No"
                                                {{ old('contribute') == 'No' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="nocontribute">No</label>
                                        </div>
                                        @error('contribute')
                                            <div class="text-danger" id="contributeErr">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="d-md-flex justify-content-start align-items-center mb-2 py-2">
                                        <p class="mb-0 me-4">Do you want MAAN T-Shirt ?</p>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="t_shirt"
                                                id="tshirtYes" value="Yes" onchange="toggleSizeOptions()"
                                                {{ old('t_shirt') == 'Yes' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="malet_shirt">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="t_shirt"
                                                id="tshirtNo" value="No" onchange="toggleSizeOptions()"
                                                {{ old('t_shirt') == 'No' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="not_shirt">No</label>
                                        </div>

                                        <div id="sizeOptions" style="display: none;">
                                            <select id="tshirtSize" name="tshirt_size" class="form-select">
                                                <option value="">Choose Size</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>

                                        <script>
                                            function toggleSizeOptions() {
                                                const tshirtYes = document.getElementById('tshirtYes');
                                                const sizeOptions = document.getElementById('sizeOptions');
    
                                                if (tshirtYes.checked) {
                                                    sizeOptions.style.display = 'block'; 
                                                } else {
                                                    sizeOptions.style.display = 'none';
                                                }
                                            }
                                        </script>
                                    </div> --}}


                                    <div class="d-md-flex justify-content-start align-items-center mb-2 py-2">
                                        <p class="mb-0 me-4">Do you want MAAN T-Shirt?</p>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="t_shirt" id="tshirtYes"
                                                value="{{ old('tshirt_size') }}"
                                                onchange="toggleSizeOptions(), removeError('t_shirtErr')"
                                                {{ old('t_shirt') && old('t_shirt') !== 'No' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="tshirtYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="t_shirt" id="tshirtNo"
                                                value="No" onchange="toggleSizeOptions(), removeError('t_shirtErr')"
                                                {{ old('t_shirt') == 'No' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="tshirtNo">No</label>
                                        </div>

                                        <div id="sizeOptions"
                                            style="display: {{ old('t_shirt') && old('t_shirt') !== 'No' ? 'block' : 'none' }};">
                                            <select id="tshirtSize" name="tshirt_size" class="form-select"
                                                onchange="updateTshirtValue()">
                                                <option value="">Choose Size</option>
                                                <option value="S" {{ old('tshirt_size') == 'S' ? 'selected' : '' }}>S
                                                </option>
                                                <option value="M" {{ old('tshirt_size') == 'M' ? 'selected' : '' }}>M
                                                </option>
                                                <option value="L" {{ old('tshirt_size') == 'L' ? 'selected' : '' }}>L
                                                </option>
                                                <option value="XL" {{ old('tshirt_size') == 'XL' ? 'selected' : '' }}>
                                                    XL</option>
                                                <option value="XXL"
                                                    {{ old('tshirt_size') == 'XXL' ? 'selected' : '' }}>XXL</option>
                                            </select>
                                        </div>

                                        @error('t_shirt')
                                            <div class="text-danger" id="t_shirtErr">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <script>
                                        function toggleSizeOptions() {
                                            const tshirtYes = document.getElementById('tshirtYes');
                                            const sizeOptions = document.getElementById('sizeOptions');
                                            const tshirtSize = document.getElementById('tshirtSize');

                                            if (tshirtYes.checked) {
                                                sizeOptions.style.display = 'block'; // Show size options
                                                tshirtYes.value = tshirtSize.value; // Set initial value based on current size
                                            } else {
                                                sizeOptions.style.display = 'none'; // Hide size options
                                                tshirtYes.value = ""; // Reset value
                                            }
                                        }

                                        function updateTshirtValue() {
                                            const tshirtYes = document.getElementById('tshirtYes');
                                            const tshirtSize = document.getElementById('tshirtSize');
                                            tshirtYes.value = tshirtSize.value; // Update the radio button value with the selected size
                                        }
                                    </script>





                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <p class="change_link">Already Alumni ?
                                            <a href="{{ route('user.login') }}" class="to_register"> Login </a>
                                        </p>
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-warning ms-2">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
    </div>
@endsection
