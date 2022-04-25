
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    

@if (session('status'))
    <div class="alert alert-success">
        {!! session('status') !!}
    </div>
@endif

<div class="p-2 mx-auto" style="width: 1000px;">
    <a href="{{ route("roles.create") }}">
      <button role="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" type="submit">
        ADD Role
      </button>
    </a> 
  
  </div>

<div  class = "mx-auto" style="width: 1500px; margin-top: 10px;">
    <table id="example" class="table table-striped table-bordered" > 
    <thead>
      <tr>
        <th scope="col" style="text-align: left;">#</th>
        <th scope="col" style="text-align: left;">Name</th>
        <th scope="col" style="text-align: left;">Display Name</th>
        <th scope="col" style="text-align: left;">Description</th>
        <th scope="col" style="text-align: left;">Actions</th>
        
        
      </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
</div>
</x-app-layout>
<!--<div class = "mx-auto" style="width: 1000px; margin-bottom:15px;"></div>-->


<!-- Bootstrap JavaScript -->

<!-- DataTables -->
@section('java')
<script src="//code.jquery.com/jquery.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script>
  $(function(){
      $('#example').DataTable({
          processing: true,
          serverSide: true,
          ajax : '{{ route('api.role.index') }}',
          
          columns: [
              {data : "id", },
              {data : "name", },
              {data : "display_name" },
              {data : "description"},
              {data: 'action', name: 'action', orderable: false, searchable: false},
             
          ]
          
      });
  });
</script>