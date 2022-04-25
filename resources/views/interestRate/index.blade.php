<x-app-layout>
    <x-slot name="header">
       <center> <h2 class="font-bold text-xl text-yellow-400 leading-tight">
            <b>{{ __('Loan Status Management') }}
        </h2></center>

        @if (session('status'))
            <div class="alert alert-success">
                {!! session('status') !!}
            </div>
        @endif
    </x-slot>
 

<div class="p-2 mx-auto" style="width: 1000px;">
  <a href="{{ route("interestRate.create") }}">
    <button role="button" class="btn btn-primary" type="submit" >Add Interest Rate</button>
  </a> 

</div>

<div  class = "mx-auto" style="width: 1000px;">
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Rate</th>
        <th scope="col">Minimum</th>
        <th scope="col">Maximum</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
        @foreach($rates as $rate)
        <tr>
            <td>{{ $rate->rate }}</td>
            <td>{{ $rate->minimum }}</td>
            <td>{{ $rate->maximum }}</td>
            <td>
                <div class="container">
                    <div class="row" >
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">   
                            <a href="{{ route("interestRate.edit",['interestRate' => $rate->id]) }}">
                                <button role="button" class="btn btn-success" type="submit" >Edit</button>
                            </a> 
                        </div>
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">
                            <form action="{{ route("interestRate.destroy",['interestRate' => $rate->id]) }}" method="POST">
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