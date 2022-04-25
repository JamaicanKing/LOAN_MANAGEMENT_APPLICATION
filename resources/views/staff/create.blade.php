@yield('styling')
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
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




button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;

}
}

button:hover {
  opacity: 0.8;
}

#submit {
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
        <h2 class="font-bold text-xl text-yellow-400 leading-tight">
            <center><b>{{ __('Loan Form') }}</b></center>
        </h2>


    </x-slot>

    @if (session('status'))
        <div class="alert alert-success">
            {!! session('status') !!}
        </div>
    @endif

        <form method="POST" id="regForm" action="{{ route('staff.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="tab">Staff Information:
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="fitstname"
                                    class="block text-sm font-medium text-gray-700">{{ __('First Name') }}</label>
                                <input id="firstname" oninput="this.className = ''" type="text"
                                    class="form-control @error('fitstname') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    name="firstname" value="{{ old('fitstname') }}" autocomplete="firstname"
                                    autofocus>

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
                                    name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-span-6 sm:col-span-4">
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    name="email" value="{{ old('emal') }}" autocomplete="email" required autofocus>
                            </div>
                            
                            @include('components.dropDown2',
                                [
                                    'fieldLabel' => 'Role',
                                    'fieldName' => 'role_id',
                                    'defaultDropDownOption' => 'Please Select Role',
                                    'options' => $roles,
                                ])

                            <div class="col-span-6 sm:col-span-4">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>

                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                class="form-control @error('password') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    name="password" value="{{ old('pasword') }}" autocomplete="password" autofocus
                                                required autocomplete="new-password" />
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
