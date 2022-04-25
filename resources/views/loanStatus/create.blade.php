<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-red-800 leading-tight">
            <b>{{ __('Loan Status Management') }}
        </h2>
    </x-slot>

<div  class = "mx-auto" style="margin-top: 50px; width: 1000px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Loan Status') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loanStatus.store') }}" > 
                            @csrf

                                                                                                                                                                        
                            <div class="form-group row">
                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old("status") }}" required autocomplete="start_date" autofocus>

                                        @error('status')
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