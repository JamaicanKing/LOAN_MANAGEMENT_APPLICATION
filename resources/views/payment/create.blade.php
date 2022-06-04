
<x-app-layout>
    <x-slot name="header">
       <center> <h1 class="font-bold text-xl text-blue-400 leading-tight">
            <b>{{ __('Add Payment') }}
        </h1></center>

        @if (session('status'))
            <div class="alert alert-success">
                {!! session('status') !!}
            </div>
        @endif
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>{{ __('Add Payment') }}</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("payment.store",['id' => $loanID]) }}">
                            @csrf

                            

                            <div class="form-group row">
                                <label for="loan_detail_id" class="col-md-4 col-form-label text-md-right">{{ __('loan ID') }}</label>

                                <div class="col-md-6">
                                    <input id="loan_detail_id" type="text" readonly class="form-control @error('loan_detail_id') is-invalid @enderror" name="loan_detail_id" value="{{ $loanID }}" autocomplete="loan_detail_id" autofocus>

                                    @error('market')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="collection_date" class="col-md-4 col-form-label text-md-right">{{ __('Collection Date') }}</label>

                                <div class="col-md-6">
                                    <input id="collection_date" type="text" readonly class="form-control @error('collection_date') is-invalid @enderror" name="collection_date" value="" autocomplete="collection_date" autofocus>

                                    @error('collection_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="paid_amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount Paid') }}</label>

                                <div class="col-md-6">
                                    <input id="paid_amount" type="text" class="form-control @error('paid_amount') is-invalid @enderror" name="paid_amount" value="{{ old('paid_amount') }}"  autocomplete="paid_amount" autofocus>

                                    @error('paid_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="proof_of_payment" class="col-md-4 col-form-label text-md-right">{{ __('Proof Of Payment') }}</label>

                                <div class="col-md-6">
                                    <input id="proof_of_payment" type="text" class="form-control @error('proof_of_payment') is-invalid @enderror" name="proof_of_payment" value="{{ old('proof_of_payment') }}"  autocomplete="proof_of_payment" autofocus>

                                    @error('proof_of_payment')
                                        <span class="invalid-feedback" role="alert">vendor
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="method_of_payment" class="col-md-4 col-form-label text-md-right">{{ __('Method of Payment') }}</label>

                                <div class="col-md-6">
                                    <input id="method_of_payment" type="text" class="form-control @error('method_of_payment') is-invalid @enderror" name="method_of_payment" value="{{ old('method_of_payment') }}" autocomplete="method_of_payment" autofocus>

                                    @error('method_of_payment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

      
                            <div class="form-group row">
                                <label for="payment_location" class="col-md-4 col-form-label text-md-right">{{ __('Payment Location') }}</label>

                                <div class="col-md-6">
                                    <input id="payment_location" type="text" class="form-control @error('payment_location') is-invalid @enderror" name="payment_location" value="{{ old('payment_location') }}" autocomplete="payment_location" autofocus>

                                    @error('payment_location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time_of_payment" class="col-md-4 col-form-label text-md-right">{{ __('Time Of Payment') }}</label>

                                <div class="col-md-6">
                                    <input id="time_of_payment" type="text" class="form-control @error('time_of_payment') is-invalid @enderror" name="time_of_payment" value="{{ old('time_of_payment') }}"  autocomplete="time_of_payment" autofocus>

                                    @error('time_of_payment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reference_number" class="col-md-4 col-form-label text-md-right">{{ __('Reference Number') }}</label>

                                <div class="col-md-6">
                                    <input id="reference_number" type="text" class="form-control @error('reference_number') is-invalid @enderror" name="reference_number" value="{{ old('reference_number') }}" autocomplete="reference_number" autofocus>

                                    @error('reference_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @if(Auth::user()->hasRole('superadministrator') || Auth::user()->hasRole('administrator'))
                            <div class="form-group row">
                                <label for="confirmed" class="col-md-4 col-form-label text-md-right">{{ __('Confirmed?') }}</label>
                            
                                <div class="col-md-6">
                                    <select class="
                                    dropdown-toggle
                                    px-6
                                    py-2.5
                                    bg-blue-600
                                    text-white
                                    font-medium
                                    text-xs
                                    leading-tight
                                    uppercase
                                    rounded
                                    shadow-md
                                    hover:bg-blue-700 hover:shadow-lg
                                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-blue-800 active:shadow-lg active:text-white
                                    transition
                                    duration-150
                                    ease-in-out
                                    flex
                                    items-center
                                    whitespace-nowrap
                                  " aria-label="Default select example" id="confirmed"  name="confirmed" >
                                        <option value="">PLEASE SELECT YES OR NO</option>
                                                <option value="Yes">{{ __('YES') }}</option>  
                                                <option value="NO">{{ __('NO') }}</option> 
                                    </select>
                                    @error("confirmed")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        {{ __('Submit Payment') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>