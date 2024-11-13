@extends('user.layout')
@section('page_content')
    <main class="main">
        <!-- Membership Section -->
        <section id="" class="my-membership section">
            <div class="container d-flex justify-content-center mt-5 mb-5">
                <form action="{{ route('payment.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <h3>Choose Your Subscroption</h3>
                            <div class="card payment-view">
                                <div class="card-body payment-card-body">
                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-12 creation-text">
                                            <input type="radio" name="plan" value="19.95" required checked>
                                            US Subscription to Creation Illustrated - $19.95
                                        </div>
                                        <div class="col-md-12 creation-text">
                                            <input type="radio" name="plan" value="36.95" required>
                                            US 2 Year Subscription **BEST DEAL** - $36.95
                                        </div>
                                        <div class="col-md-12 creation-text">
                                            <input type="radio" name="plan" value="12.95" required>
                                            Digital Subscription to Creation Illustrated - $12.95
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h3>Your Information</h3>
                            <div class="card payment-view">
                                <div class="card">
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <!-- Mailing Address Form -->
                                        <div class="card-body payment-card-body">
                                            <h4 class="text-black">Mailing Address</h4>
                                            <div class="row mt-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="name">FULL NAME *</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{ old('name') }}"
                                                        oninput="removeError('nameErr'); syncAddress('name')">
                                                    @error('name')
                                                        <span class="text-danger" id="nameErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="address">ADDRESS</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        value="{{ old('address') }}"
                                                        oninput="removeError('addressErr'); syncAddress('address')">
                                                    @error('address')
                                                        <span class="text-danger" id="addressErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="state">STATE *</label>
                                                    <select class="form-control" id="state" name="state"
                                                        onchange="removeError('stateErr'); syncAddress('state')">
                                                        <option value="">-- Select state --</option>
                                                        <option value="state1"
                                                            {{ old('state') == 'state1' ? 'selected' : '' }}>state1</option>
                                                        <option value="state2"
                                                            {{ old('state') == 'state2' ? 'selected' : '' }}>state2</option>
                                                    </select>
                                                    @error('state')
                                                        <span class="text-danger" id="stateErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="city">CITY *</label>
                                                    <select class="form-control" id="city" name="city"
                                                        onchange="removeError('cityErr'); syncAddress('city')">
                                                        <option value="">-- Select City --</option>
                                                        <option value="city1"
                                                            {{ old('city') == 'city1' ? 'selected' : '' }}>city1</option>
                                                        <option value="city2"
                                                            {{ old('city') == 'city2' ? 'selected' : '' }}>city2</option>
                                                    </select>
                                                    @error('city')
                                                        <span class="text-danger" id="cityErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="zipcode">ZIP CODE *</label>
                                                    <input type="text" class="form-control" name="zip_code"
                                                        id="zipcode" value="{{ old('zip_code') }}"
                                                        oninput="removeError('zip_codeErr'); syncAddress('zipcode')">
                                                    @error('zip_code')
                                                        <span class="text-danger" id="zip_codeErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email">EMAIL *</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        value="{{ old('email') }}" oninput="removeError('emailErr')">
                                                    @error('email')
                                                        <span class="text-danger" id="emailErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>                              

                                        <!-- Billing Address Form -->
                                        <div id="billingAddress" class="card-body payment-card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="me-3 text-black">Billing Address</h4>
                                                <div class="form-check d-inline-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input" id="sameAsMailing"
                                                        onclick="syncMailingToBilling()">
                                                    <label class="form-check-label ms-1" for="sameAsMailing">Same as
                                                        Mailing Address</label>
                                                </div>
                                            </div>

                                            <div class="row mt-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="billing_name">FULL NAME *</label>
                                                    <input type="text" class="form-control" name="billing_name"
                                                        id="billing_name" value="{{ old('billing_name') }}"
                                                        oninput="removeError('billing_nameErr'); syncAddress('billing_name')">
                                                    @error('billing_name')
                                                        <span class="text-danger"
                                                            id="billing_nameErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="billing_address">ADDRESS</label>
                                                    <input type="text" class="form-control" id="billing_address"
                                                        name="billing_address" value="{{ old('billing_address') }}"
                                                        oninput="removeError('billing_addressErr'); syncAddress('billing_address')">
                                                    @error('billing_address')
                                                        <span class="text-danger"
                                                            id="billing_addressErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="billing_state">STATE *</label>
                                                    <select class="form-control" id="billing_state" name="billing_state"
                                                        onchange="removeError('billing_stateErr'); syncAddress('billing_state')">
                                                        <option value="">-- Select state --</option>
                                                        <option value="state1"
                                                            {{ old('billing_state') == 'state1' ? 'selected' : '' }}>state1
                                                        </option>
                                                        <option value="state2"
                                                            {{ old('billing_state') == 'state2' ? 'selected' : '' }}>state2
                                                        </option>
                                                    </select>
                                                    @error('billing_state')
                                                        <span class="text-danger"
                                                            id="billing_stateErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="billing_city">CITY *</label>
                                                    <select class="form-control" id="billing_city" name="billing_city"
                                                        onchange="removeError('billing_cityErr'); syncAddress('billing_city')">
                                                        <option value="">-- Select City --</option>
                                                        <option value="city1"
                                                            {{ old('billing_city') == 'city1' ? 'selected' : '' }}>city1
                                                        </option>
                                                        <option value="city2"
                                                            {{ old('billing_city') == 'city2' ? 'selected' : '' }}>city2
                                                        </option>
                                                    </select>

                                                    @error('billing_city')
                                                        <span class="text-danger"
                                                            id="billing_cityErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="billing_zipcode">ZIP CODE *</label>
                                                    <input type="text" class="form-control" name="billing_zip_code"
                                                        id="billing_zipcode" value="{{ old('billing_zip_code') }}"
                                                        oninput="removeError('billing_zipcodeErr'); syncAddress('billing_zipcode')">
                                                    @error('billing_zip_code')
                                                        <span class="text-danger"
                                                            id="billing_zipcodeErr">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h3>Payment Information</h3>
                            <div class="card">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header p-0" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button
                                                    class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom"
                                                    type="button" data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <img src="https://i.imgur.com/7kQEsHU.png" width="40">
                                                        <span>PAYPAL </span>
                                                    </div>
                                                </button>
                                            </h2>

                                            <div class="p-3 d-flex justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <span>Total Amount (USD)</span>
                                                </div>
                                                <span id="total-amount">$19.95</span>
                                            </div>
                                        </div>
                                        <div class="p-3" style="align-self: center">
                                            <button type="submit" class="btn free-button">Place
                                                Your Order</button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </section>
        <script>
            // Select all radio buttons and the total amount display element
            const planOptions = document.querySelectorAll('input[name="plan"]');
            const totalAmountDisplay = document.getElementById('total-amount');

            // Add an event listener to each radio button
            planOptions.forEach(option => {
                option.addEventListener('change', () => {
                    // Update the displayed total amount based on the selected plan
                    totalAmountDisplay.textContent = `$${option.value}`;
                });
            });
        </script>

        <!-- JavaScript for Real-Time Synchronization -->
        <script>
            function syncMailingToBilling() {
                const isSame = document.getElementById('sameAsMailing').checked;
                if (isSame) {
                    syncAllFields();
                } else {
                    clearBillingFields();
                }
            }

            function syncAddress(field) {
                const isSame = document.getElementById('sameAsMailing').checked;
                const mailingField = document.getElementById(field);
                const billingField = document.getElementById(`billing_${field.split('_')[1] || field}`);

                if (isSame && billingField) {
                    billingField.value = mailingField.value;
                    removeError(`billing_${field.split('_')[1] || field}Err`);
                }
            }

            function syncAllFields() {
                const fields = ['name', 'address', 'state', 'city', 'zipcode'];
                fields.forEach(field => {
                    const mailingField = document.getElementById(field);
                    const billingField = document.getElementById(`billing_${field}`);
                    if (billingField && mailingField) {
                        billingField.value = mailingField.value;
                        removeError(`billing_${field}Err`);
                    }
                });
            }

            function clearBillingFields() {
                const fields = ['name', 'address', 'state', 'city', 'zipcode'];
                fields.forEach(field => {
                    const billingField = document.getElementById(`billing_${field}`);
                    if (billingField) {
                        billingField.value = '';
                    }
                });
            }
        </script>


        <!-- JavaScript to Remove Error -->
        <script>
            function removeError(id) {
                var errElement = document.getElementById(id);
                if (errElement) {
                    errElement.style.display = 'none';
                }
            }
        </script>

        <!-- /Membership Section -->
    </main>
@endsection
