<x-app-layout>

    <x-slot name="header">
        <h2 class="font-bold text-xl text-yellow-400 leading-tight">
            <center><b>{{ __('USER ROLES') }}</b></center>
        </h2>
    
    
    </x-slot>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    @if (session('status'))
    <div class="alert alert-danger">
        {!! session('status') !!}
    </div>
    @endif
    
    
    <!-- Page content -->
    <div class="container" style="margin-top:20px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Main Category') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}" >
                            @csrf
                            
                            <div class="form-group row">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old("name") }}" required autocomplete="start_date" autofocus>
 
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-group row">
                                    <label for="display_name" class="col-md-4 col-form-label text-md-right">{{ __('Display Name') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="display_name" type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" value="{{ old("display_name") }}" required autocomplete="start_date" autofocus>
    
                                        @error('display_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old("description") }}" required autocomplete="start_date" autofocus>
    
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                <div class="col-md-10 text-left">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    </x-app-layout>