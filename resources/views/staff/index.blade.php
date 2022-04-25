<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View All Loans') }}
        </h2>
    </x-slot>

    @if (session('status'))
    <div class="alert alert-success">
        {!! session('status') !!}
    </div>
    @endif



<div  class = "mx-auto" style="width: 80%; margin-top: 10px;">
    <table id="example" class="table table-striped"> 
    <thead>
      <tr>
        <th scope="col" style="text-align: left;">#</th>
        <th scope="col" style="text-align: left;">Name</th>
        <th scope="col" style="text-align: left;">Email</th>
        <th scope="col" style="text-align: left;">Role</th>
        <th scope="col" style="text-align: left;">Actions</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
</div>

<!--<div class = "mx-auto" style="width: 1000px; margin-bottom:15px;"></div>-->
</x-app-layout>

<!-- Bootstrap JavaScript -->

<!-- DataTables -->
@section('java')

<script>
  $(function(){
      $('#example').DataTable({
          processing: true,
          serverSide: true,
          ajax : '{{ route('api.staff.index') }}',
          
          columns: [
              {data : "id", },
              {data : "name", },
              {data : "email", },
              {data : "role" },
              {data: 'action', name: 'action', orderable: false, searchable: false},
             
          ]
          
      });
  });
</script>
