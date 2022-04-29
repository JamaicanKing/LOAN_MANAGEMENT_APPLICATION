@json($loan)
@yield('styling')
<style>
    .links {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .links button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .links button:hover {
    background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .links button.active {
    background-color: #ccc;
    }
   
    *{
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

    #reject{
        background-color: red;
        
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

    <form method="POST" id="regForm"  action="{{ route('loan.update',['loan' => $loan[0]->loanId]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">

            <div class="tab" id="personal_info">Personal Information:
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="firstname"
                                class="block text-sm font-medium text-gray-700">{{ __('First Name') }}</label>
                            <input id="firstname" oninput="this.className = ''" type="text"
                                class="form-control @error('firstname') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="firstname" value="{{ $loan[0]->firstname }}" autocomplete="firstname" autofocus>

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
                                name="lastname" value="{{ $loan[0]->lastname }}" autocomplete="lastname" autofocus>

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
                                name="email" value="{{ $loan[0]->email }}" autocomplete="email" autofocus>

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
                                name="phone_number" value="{{ $loan[0]->phone_number }}" autocomplete="phone_number"
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
                                name="address" value="{{ $loan[0]->address }}" autocomplete="address" autofocus>

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
                                name="street_address" value="{{ $loan[0]->street_address }}"
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
                                name="city" value="{{ $loan[0]->city }}" autocomplete="city" autofocus>

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
                                name="state" value="{{ $loan[0]->state }}" autocomplete="state" autofocus>

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
                                name="postal" value="{{ $loan[0]->postal }}" autocomplete="postal" autofocus>

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
                                name="trn" value="{{ $loan[0]->trn }}" autocomplete="trn" autofocus>

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
                                <img src="data:image;base64, " alt="Image" />


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
                                name="identification_number" value="{{ $loan[0]->identification_number }}"
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
                                name="identification_expiration" value="{{ $loan[0]->identification_expiration }}"
                                autocomplete="identification_expiration" autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab" id="contact_person_info">Contact Person Information:
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label for="contact_person_name"
                                class="block text-sm font-medium text-gray-700">{{ __('Contact Person Name') }}</label>

                            <input id="contact_person_name" oninput="this.className = ''" type="text"
                                class="form-control @error('contact_person_name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="contact_person_name" value="{{ $loan[0]->contact_person_name }}"
                                autocomplete="contact_person_name" autofocus>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="contact_person_address"
                                class="block text-sm font-medium text-gray-700">{{ __('Contact Person Address') }}</label>

                            <input id="contact_person_address" oninput="this.className = ''" type="text"
                                class="form-control @error('contact_person_address') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="contact_person_address" value="{{ $loan[0]->contact_person_address }}"
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
                                name="contact_person_number" value="{{ $loan[0]->contact_person_number }}"
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
                                name="kinship" name="kinship" value="{{ $loan[0]->kinship }}" autocomplete="kinship"
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
                                name="length_of_relationship" value="{{ $loan[0]->length_of_relationship }}"
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

            <div class="tab" id="employment_info">Employment Information:
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label for="name_of_employer"
                                class="block text-sm font-medium text-gray-700">{{ __('Name Of Employer') }}</label>

                            <input id="name_of_employer" oninput="this.className = ''" type="text"
                                class="form-control @error('name_of_employer') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="name_of_employer" value="{{ $loan[0]->name_of_employer }}"
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
                                name="address_of_employer" value="{{ $loan[0]->address_of_employer }}"
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
                                name="position_held" value="{{ $loan[0]->position_held }}" autocomplete="position_held"
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
                                name="tenure" value="{{ $loan[0]->tenure }}" autocomplete="tenure" autofocus>

                            @error('tenure')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab" id="loan_info">Loan Information:
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label for="loan_amount"
                                class="block text-sm font-medium text-gray-700">{{ __('Loan Amount') }}</label>

                            <input id="loan_amount" oninput="this.className = ''" type="text"
                                class="form-control @error('loan_amount') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="loan_amount" value="{{ $loan[0]->loan_amount }}" autocomplete="loan_amount"
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
                                name="loan_amount_string" value="{{ $loan[0]->loan_amount_string }}"
                                autocomplete="loan_amount_string" autofocus>

                            @error('loan_amount_string')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="repayment_cycle" class="block text-sm font-medium text-gray-700">{{ __('Repayment Cycle') }}</label>
                        
                            <div class="col-span-2 sm:col-span-2">
                                <select class="dropdown-toggle inline-block px-7 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg active:text-white transition duration-150 ease-in-out flex items-center whitespace-nowrap" aria-label="Default select example" name="repayment_cycle" id="repayment_cycle"  for="repayment_cycle" >
                                    <option value="">{{ $loan[0]->repayment_cycle }}</option>
                                    <option value="weekly">{{ __("Weekly") }}</option>
                                    <option value="fortnightly">{{ __("Fortnightly") }}</option>
                                    <option value="monthly">{{ __("Monthly") }}</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="received_method" class="block text-sm font-medium text-gray-700">{{ __('Method in which you would like to receive loan?') }}</label>
                        
                            <div class="col-span-2 sm:col-span-2">
                                <select class="dropdown-toggle inline-block px-7 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg active:text-white transition duration-150 ease-in-out flex items-center whitespace-nowrap" aria-label="Default select example"  onchange="showHideBankingInfo(this.value)" name="received_method" id="received_method"  for="received_method" onchange="showHideBankingInfo(this.value)" name="received_method" id="received_method"  for="received_method" >
                                    <option value="">{{ $loan[0]->receive_method }}</option>
                                    <option value="Cash In Hand">{{ __("Cash In Hand") }}</option>
                                    <option value="Bank Tranfer">{{ __("Bank Transfer") }}</option>
                                </select>
                            </div>


                        </div>
                        <div id="bankingInfo" class="col-span-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="maintainace_branch"
                                    class="block text-sm font-medium text-gray-700">{{ __('Branch In which the Account was created') }}</label>

                                <input id="maintainace_branch" oninput="this.className = ''" type="text"
                                    class="form-control @error('maintainace_branch') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    name="maintainace_branch" value="{{ $loan[0]->maintainace_branch }}"
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
                                    name="name_on_account" value="{{ $loan[0]->name_on_account }}"
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
                                    name="account_number" value="{{ $loan[0]->account_number }}"
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
                                    name="account_type" value="{{ $loan[0]->account_type }}"
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
                            >{{ $loan[0]->note }}</textarea>
                        </div>

                        <input id=status name="status" type="hidden" value="">
                        <input id=client_id name="client_id" type="hidden" value="{{ $loan[0]->client_id }}">

                    </div>
                </div>
                
            </div>
            <div class="links">
                <button type='button' class="tablinks" onclick="openForm(event, 'personal_info')">Personal Information</button>
                <button type='button'class="tablinks" onclick="openForm(event, 'contact_person_info')">Contact Perosn Information</button>
                <button type='button'class="tablinks" onclick="openForm(event, 'employment_info')">Employment Information</button>
                <button type='button' class="tablinks" onclick="openForm(event, 'loan_info')">Loan Information</button>  
                <div class="container">

                    <button type='button' onclick="rejectApplication()" id="rejected" style=" background-color: red; float:right; margin-left:5px; margin-top: 2px; "class="inline-block px-6 py-2.5 inset-y-0 right-0 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                        Reject
                    </button>

                    <button type='button' onclick="approveApplication()" id="Approved" style=" background-color: green; float:right; margin-top: 2px;" class="inline-block px-6 py-2.5 inset-y-0 right-0 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" >
                        Approved
                    </button>
                </div>   
            </div>
            

        

        <!--<button type="button" id="prevBtn"
            class="inline-block px-6 py-2.5 bg-gray-200 text-black font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
            onclick="nextPrev(-1)">Previous</button>

        <button type="button" id="nextBtn"
            class="inline-block mt-2 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            onclick="nextPrev(1)">Next</button>

         Circles which indicates the steps of the form: -->
        

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
        }

        function openForm(evt, sectionName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(sectionName).style.display = "block";
        evt.currentTarget.className += " active";
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
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
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("tablinks")[currentTab].className += " finish";
            }
            return valid; // return the valid status

            if (valid) {
              document.getElementsByClassName("tablinks")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("tablinks");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        function showHideBankingInfo(value){
            var x = document.getElementById("bankingInfo");
            
            if(value ==  "Cash In Hand"){
                x.style.display = "none";
            }else{
                x.style.display = "block";
            }
        }

        function rejectApplication(){

            var x = document.getElementById("status");
            x.value = 3;
            document.forms['regForm'].action = "{{ route('loan.update',['loan' => $loan[0]->loanId]) }}";
            document.forms['regForm'].submit();

        }

        function approveApplication(){

        var x = document.getElementById("status");
        x.value = 4;
        document.forms['regForm'].action = "{{ route('loan.update',['loan' => $loan[0]->loanId]) }}";
            document.forms['regForm'].submit();
        }
    </script>
