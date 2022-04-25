<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-red-800 leading-tight">
            <b>{{ __('Interest Rate Management') }}
        </h2>
    </x-slot>

<div  class = "mx-auto" style="margin-top: 50px; width: 1000px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Interest Rate') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('interestRate.store') }}" > 
                            @csrf

                                                                                                                                                                        
                            <div class="form-group row">
                                <div class="form-group row">
                                    <label for="rate" class="col-md-4 col-form-label text-md-right">{{ __('Interest Rate %') }}</label>

                                    <div class="col-md-6">
                                        <input id="rate" type="text" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{ old("rate") }}" required autocomplete="start_date" autofocus>

                                        @error('rate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>  
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="minimum" class="col-md-4 col-form-label text-md-right">{{ __('Minimum') }}</label>

                                    <div class="col-md-6">
                                        <input id="minimum" type="text" class="form-control @error('minimum') is-invalid @enderror" name="minimum" value="{{ old("minimum") }}" required autocomplete="start_date" autofocus>

                                        @error('minimum')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>  
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="maximum" class="col-md-4 col-form-label text-md-right">{{ __('Maximum') }}</label>

                                    <div class="col-md-6">
                                        <input id="maximum" type="text" class="form-control @error('maximum') is-invalid @enderror" name="maximum" value="{{ old("maximum") }}" required autocomplete="start_date" autofocus>

                                        @error('maximum')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>  
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0" style="margin-top: 10px;">
                                    <div class="col-md-6 offset-md-4">
                                    <button type="submit" id='submit'  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit
                                    </button> 
                                    </div>      
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>