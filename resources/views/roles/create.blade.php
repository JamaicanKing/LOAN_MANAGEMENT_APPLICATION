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
    

    <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">

            <div class="tab">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">

                            <label for="name"
                                class="block text-sm font-medium text-gray-700">{{ __('Role Name') }}</label>
                            <input id="name" oninput="this.className = ''" type="text"
                                class="form-control @error('name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="name" value="{{ old('name') }}" autocomplete="firstname"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                            <label for="lastname"
                                class="block text-sm font-medium text-gray-700">{{ __('Display Name') }}</label>
                            <input id="display_name" oninput="this.className = ''" type="text"
                                class="form-control @error('display_name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="display_name" value="{{ old('display_name') }}" autocomplete="display_name" autofocus>

                            @error('display_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="description"
                                class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                            <input id="description" type="text"
                                class="form-control @error('description') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                name="description" value="{{ old('description') }}" autocomplete="email" required autofocus>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>     
            </div>
           
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" id='submit' class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
            </button>
                
            
        </div>
    </form>
    
    
    </x-app-layout>