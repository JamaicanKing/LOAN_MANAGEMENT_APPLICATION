
@yield('styling')
<style>
    {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        margin-top: 20px;
        font-family: Raleway;
        padding: 40px;
        width: 85%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;

    }
    

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
        margin-right: 6px;
        margin-top: 5px;
    }

    #nextBtn {
        background-color: blue;
        margin-right: 6px;
        margin-top: 5px;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }

</style>
<x-app-layout>

    <x-slot name="header">
        <h1 class="font-bold text-xl text-blue-400 leading-tight">
            <center><b>{{ __('Loan Form') }}</b></center>
        </h1>


    </x-slot>

    @if (session('status'))
        <div class="alert alert-success">
            {!! session('status') !!}
        </div>
    @endif

    <form method="POST" id="regForm"  action="{{ route('loan.store') }}"  runat="server" enctype="multipart/form-data">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">

            <div class="tab">Personal Information:
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="firstname"
                                class="block text-sm font-medium text-gray-700">{{ __('First Name') }}</label>
                            <input id="firstname" oninput="this.className = ''" type="text"
                                class="form-control @error('firstname') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="firstname" value="{{ $customerDetail[0]->firstname ?? ''  }}" autocomplete="firstname" autofocus>

                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-span-6 sm:col-span-3">
                            <label for="lastname"
                                class="block text-sm font-medium text-gray-700">{{ __('Last Name') }}</label>
                            <input id="lastname" oninput="this.className = ''" type="text"
                                class="form-control @error('lastname') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="lastname" value="{{ $customerDetail[0]->lastname ?? '' }}" autocomplete="lastname" autofocus>

                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                            <input id="email" oninput="this.className = ''" type="text"
                                class="form-control @error('email') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="email" value="{{ $customerDetail[0]->email ?? '' }}" autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">vendor
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-span-6 sm:col-span-1">
                            <label for="phone_number"
                                class="block text-sm font-medium text-gray-700">{{ __('Person Number') }}</label>

                            <input id="phone_number" oninput="this.className = ''" type="text"
                                class="form-control @error('phone_number') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="phone_number" value="{{ $customerDetail[0]->phone_number ?? '' }}" autocomplete="phone_number"
                                autofocus>

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-span-6 sm:col-span-6">
                            <label for="address"
                                class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>

                            <input id="address" oninput="this.className = ''" type="text"
                                class="form-control @error('address') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="address" value="{{ $customerDetail[0]->address ?? '' }}" autocomplete="address" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <label for="street_address"
                                class="block text-sm font-medium text-gray-700">{{ __('Street') }}</label>

                            <input id="street_address" oninput="this.className = ''" type="text"
                                class="form-control @error('street_address') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="street_address" value="{{ $customerDetail[0]->street_address ?? '' }}"
                                autocomplete="street_address" autofocus>

                            @error('street_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-span-6 sm:col-span-1">
                            <label for="city"
                                class="block text-sm font-medium text-gray-700">{{ __('City') }}</label>

                            <input id="city" oninput="this.className = ''" type="text"
                                class="form-control @error('city') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="city" value="{{ $customerDetail[0]->city ?? '' }}" autocomplete="city" autofocus>

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <label for="state"
                                class="block text-sm font-medium text-gray-700">{{ __('State/Province') }}</label>

                            <input id="state" oninput="this.className = ''" type="text"
                                class="form-control @error('state') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="state" value="{{ $customerDetail[0]->state ?? '' }}" autocomplete="state" autofocus>

                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <label for="postal"
                                class="block text-sm font-medium text-gray-700">{{ __('Postal/Zip Code') }}</label>

                            <input id="postal" oninput="this.className = ''" type="text"
                                class="form-control @error('postal') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="postal" value="{{ $customerDetail[0]->postal ?? '' }}" autocomplete="postal" autofocus>

                            @error('postal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <label for="trn"
                                class="block text-sm font-medium text-gray-700">{{ __('TRN') }}</label>

                            <input id="trn" oninput="this.className = ''" type="text" minlength="9" maxlength="9"
                                pattern="{_}{_}{_}-{_}{_}{_}-{_}{_}{_}"
                                class="form-control @error('trn') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="trn" value="{{ $customerDetail[0]->trn ?? '' }}" autocomplete="trn" autofocus>

                            @error('trn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <div class="image-upload">
                                <label for="identification"
                                    class="block text-sm font-medium text-gray-700">{{ __('INSERT IDENTIFICATION HERE') }}</label>
                                


                                <div>
                                    <input type="file" oninput="this.className = ''" id="file" name="file">
                                </div>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="identification_number"
                                class="block text-sm font-medium text-gray-700">{{ __('Identification Number ') }}</label>

                            <input id="identification_number" oninput="this.className = ''" type="text"
                                class="form-control @error('identification_number') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="identification_number" value="{{ $customerDetail[0]->identification_number ?? '' }}"
                                autocomplete="identification_number" autofocus>

                            @error('identification_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="identification_expiration"
                                class="block text-sm font-medium text-gray-700">{{ __('Identification Expiration ') }}</label>
                            <input oninput="this.className = ''" type="date" id="identification_expiration"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="identification_expiration" value="{{ $customerDetail[0]->identification_expiration ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">Contact Person Information:
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label for="contact_person_name"
                                class="block text-sm font-medium text-gray-700">{{ __('Contact Person Name') }}</label>

                            <input id="contact_person_name" oninput="this.className = ''" type="text"
                                class="form-control @error('contact_person_name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="contact_person_name" value="{{ $customerDetail[0]->contact_person_name ?? '' }}"
                                autocomplete="contact_person_name" autofocus>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="contact_person_address"
                                class="block text-sm font-medium text-gray-700">{{ __('Contact Person Address') }}</label>

                            <input id="contact_person_address" oninput="this.className = ''" type="text"
                                class="form-control @error('contact_person_address') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="contact_person_address" value="{{ $customerDetail[0]->contact_person_address ?? '' }}"
                                autocomplete="contact_person_address" autofocus>

                            @error('contact_person_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="contact_person_number"
                                class="block text-sm font-medium text-gray-700">{{ __('Contact Person Number') }}</label>

                            <input id="contact_person_number" oninput="this.className = ''" type="text"
                                class="form-control @error('contact_person_number') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="contact_person_number" value="{{ $customerDetail[0]->contact_person_number ?? '' }}"
                                autocomplete="contact_person_number" autofocus>

                            @error('contact_person_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="kinship"
                                class="block text-sm font-medium text-gray-700">{{ __('Kinship') }}</label>

                            <input id="kinship" oninput="this.className = ''" type="text"
                                class="form-control @error('kinship') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="kinship" name="kinship" value="{{ $customerDetail[0]->kinship ?? '' }}" autocomplete="kinship"
                                autofocus>

                            @error('kinship')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="length_of_relationship"
                                class="block text-sm font-medium text-gray-700">{{ __('Length Of Relationship') }}</label>

                            <input id="length_of_relationship" oninput="this.className = ''" type="text"
                                class="form-control @error('length_of_relationship') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="length_of_relationship" value="{{ $customerDetail[0]->length_of_relationship ?? '' }}"
                                autocomplete="length_of_relationship" autofocus>

                            @error('length_of_relationship')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab">Employment Information:
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label for="name_of_employer"
                                class="block text-sm font-medium text-gray-700">{{ __('Name Of Employer') }}</label>

                            <input id="name_of_employer" oninput="this.className = ''" type="text"
                                class="form-control @error('name_of_employer') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="name_of_employer" value="{{ $customerDetail[0]->name_of_employer ?? '' }}"
                                autocomplete="name_of_employer" autofocus>

                            @error('name_of_employer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="address_of_employer"
                                class="block text-sm font-medium text-gray-700">{{ __('Address Of Employer') }}</label>

                            <input id="address_of_employer" oninput="this.className = ''" type="text"
                                class="form-control @error('address_of_employer') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="address_of_employer" value="{{ $customerDetail[0]->address_of_employer ?? '' }}"
                                autocomplete="address_of_employer" autofocus>

                            @error('address_of_employer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="position_held"
                                class="block text-sm font-medium text-gray-700">{{ __('Position Held') }}</label>


                            <input id="position_held" oninput="this.className = ''" type="text"
                                class="form-control @error('position_held') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="position_held" value="{{ $customerDetail[0]->position_held ?? '' }}" autocomplete="position_held"
                                autofocus>

                            @error('position_held')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="tenure"
                                class="block text-sm font-medium text-gray-700">{{ __('Tenure') }}</label>

                            <input id="tenure" oninput="this.className = ''" type="text"
                                class="form-control @error('tenure') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="tenure" value="{{ $customerDetail[0]->tenure ?? '' }}" autocomplete="tenure" autofocus>

                            @error('tenure')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">Loan Information:
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label for="loan_amount"
                                class="block text-sm font-medium text-gray-700">{{ __('Loan Amount') }}</label>

                            <input id="loan_amount" oninput="this.className = ''" type="text"
                                class="form-control @error('loan_amount') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="loan_amount" value="{{ old('loan_amount') }}" autocomplete="loan_amount"
                                autofocus>

                            @error('loan_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="loan_amount_string"
                                class="block text-sm font-medium text-gray-700">{{ __('Loan Amount In Words') }}</label>

                            <input id="loan_amount_string" oninput="this.className = ''" type="text"
                                class="form-control @error('loan_amount_string') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="loan_amount_string" value="{{ old('loan_amount_string') }}"
                                autocomplete="loan_amount_string" autofocus>

                            @error('loan_amount_string')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="repayment_cycle" class="block text-sm font-medium text-gray-700"><b>{{ __('Repayment Cycle') }}</b></label>
                            <div style="visibility:hidden; color:red; " id="chk_option_error">
                                Please select at least one option.
                                </div>
                            
                            <input type="checkbox" id="cycle_weekly" name="repayment_cycle" value="Weekly">
                            <label for="cycle">Weekly</label><br>
                            <input type="checkbox" id="cycle_fortnightly" name="repayment_cycle" value="Fortnighty">
                            <label for="cycle">Fortnightly</label><br>
                            <input type="checkbox" id="cycle_monthly" name="repayment_cycle" value="monthly">
                            <label for="cycle">Monthly</label><br>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="repayment_cycle" class="block text-sm font-medium text-gray-700"><b>{{ __('Method in which you would like to receive loan?') }}</b></label>
                            <div style="visibility:hidden; color:red; " id="chk_option_error2">
                                Please select at least one option.
                            </div>
                            
                            <input type="checkbox" id="bank_transfer" name="receive_method" value="Bank transfer">
                            <label for="cycle">Bank Tranfer</label><br>
                            <input type="checkbox" id="cash_in_hand" onchange="showHideBankingInfo(this.value)" name="receive_method" value="cash in hand ">
                            <label for="cycle">Cash In Hand</label><br>
                        </div>

                        <div id="bankingInfo" class="col-span-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="maintainace_branch"
                                    class="block text-sm font-medium text-gray-700">{{ __('Branch In which the Account was created') }}</label>

                                <input id="maintainace_branch" oninput="this.className = ''" type="text"
                                    class="form-control @error('maintainace_branch') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    name="maintainace_branch" value="{{ old('maintainace_branch') }}"
                                    autocomplete="maintainace_branch" autofocus>

                                @error('maintainace_branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="name_on_account"
                                    class="block text-sm font-medium text-gray-700">{{ __('Name On Account') }}</label>

                                <input id="name_on_account" oninput="this.className = ''" type="text"
                                    class="form-control @error('name_on_account') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    name="name_on_account" value="{{ old('name_on_account') }}"
                                    autocomplete="name_on_account" autofocus>

                                @error('name_on_account')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="account_number"
                                    class="block text-sm font-medium text-gray-700">{{ __('Account Number') }}</label>

                                <input id="account_number" oninput="this.className = ''" type="text"
                                    class="form-control @error('account_number') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    name="account_number" value="{{ old('account_number') }}"
                                    autocomplete="account_number" autofocus>

                                @error('account_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="account_type"
                                    class="block text-sm font-medium text-gray-700">{{ __('Account Type') }}</label>

                                <input id="account_type" oninput="this.className = ''" type="text"
                                    class="form-control @error('account_number') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    name="account_type" value="{{ old('account_type') }}"
                                    autocomplete="account_number" autofocus>

                                @error('account_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700"
                              >Special Notes</label
                            >
                            <textarea
                              class="
                                form-control
                                block
                                w-full
                                px-7
                                py-7
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                sm:col-span-6
                              "
                              id="notes"
                                name="note"
                              placeholder="Your message to us"
                            ></textarea>
                          </div>

                    </div>
                </div>

            </div>
        </div>

        <button type="button" id="prevBtn"
            class="inline-block px-6 py-2.5 bg-gray-200 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
            onclick="nextPrev(-1)">Previous</button>

        <button type="button" id="nextBtn"
            class="inline-block mt-2 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            onclick="nextPrev(1)">Next</button>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>

    </form>

</x-app-layout>
@section('java')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, z, valid = true;

            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "" && y[i].id != "maintainace_branch" && y[i].id != "name_on_account" && y[i].id != "account_number" && y[i].id != "account_type") {
                   // add an "invalid" class to the field:
                   y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            
                if(y["cycle_weekly"]  && document.querySelector('#cycle_weekly:checked') !== null || y["cycle_monthly"] && document.querySelector('#cycle_monthly:checked') !== null ||  y["cycle_fortnightly"] && document.querySelector('#cycle_fortnightly:checked') !== null ){
                   valid = true;
                   
                }else if(y["cycle_weekly"]  && document.querySelector('#cycle_weekly:checked') === null || y["cycle_monthly"] && document.querySelector('#cycle_monthly:checked') === null ||  y["cycle_fortnightly"] && document.querySelector('#cycle_fortnightly:checked') === null ){
                    document.getElementById("chk_option_error").style.visibility = "visible";
                    y[i].className += " invalid";
                    valid = false;
                }

                if(y["bank_transfer"]  && document.querySelector('#bank_transfer:checked') !== null || y["cash_in_hand"] && document.querySelector('#cash_in_hand:checked') !== null){
                   valid = true;
                   
                }else if(y["bank_transfer"]  && document.querySelector('#bank_transfer:checked') === null || y["cash_in_hand"] && document.querySelector('#cash_in_hand:checked') === null){
                    document.getElementById("chk_option_error2").style.visibility = "visible";
                    y[i].className += " invalid";
                    valid = false;
                }         
              
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
                
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }

            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        function showHideBankingInfo(value){
            var x = document.getElementById("bankingInfo");
            
            if(document.querySelector('#cash_in_hand:checked') !== null){
                x.style.display = "none";
            }else{
                x.style.display = "block";
            }
        }

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#file').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
        $("#image").change(function(){
            readURL(this);
        });
    </script>

