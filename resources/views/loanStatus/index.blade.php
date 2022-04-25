<x-app-layout>
    <x-slot name="header">
       <center> <h1 class="font-bold text-xl text-blue-400 leading-tight">
            <b>{{ __('Loan Status Management') }}
        </h1></center>

        @if (session('status'))
            <div class="alert alert-success">
                {!! session('status') !!}
            </div>
        @endif
    </x-slot>
 

<div class="p-2 mx-auto" style="width: 1000px;">
  <a href="{{ route("loanStatus.create") }}">
    <button role="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" type="submit">
        ADD Status
    </button>
  </a> 

</div>

<div  class = "mx-auto" style="width: 1000px;">
    <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col" style="text-align: left;">Status</th>
        <th scope="col" style="text-align: left;">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
        @foreach($statuses as $status)
        <tr>
            <td>{{ $status->status }}</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">   
                            <a href="{{ route("loanStatus.edit",['loanStatus' => $status->id]) }}">
                                <button role="button" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out" type="submit">
                                    Edit
                                </button>
                            </a> 
                        </div>
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">
                            <form action="{{ route("loanStatus.destroy",['loanStatus' => $status->id]) }}" method="POST">
                                @csrf
                                @method("Delete")
                                <button role="button" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <td>
        </tr>
        @endforeach
    
    </tbody>
    </table>
</div>

  
</x-app-layout>