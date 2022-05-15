
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
    <table id="example" class="table table-striped table-bordered"> 
    <thead>
      <tr>
        <th scope="col" style="text-align: left;">#</th>
        <th scope="col" style="text-align: left;">Name</th>
        <th scope="col" style="text-align: left;">Loan Amount</th>
        <th scope="col" style="text-align: left;">Interest Rate</th>
        <th scope="col" style="text-align: left;">Loan Released Date</th>
        <th scope="col" style="text-align: left;">Status</th>
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
<script>
  $(function(){
      $('#example').DataTable({
        ajax : '{{ route('api.loanDetail.index') }}',
            dom: 'Bfrtip',
          processing: true,
          serverSide: true,
          /*"searching":true,
          "paging": true,
            "order": true,*/
            buttons: [
                'copy',
                'excel',
                'csv',
                'pdf'
            ],
            columns: [
            {data : "loanId", },
            {data : "name", },
            {data : "loan_amount" },
            {data : "rate"},
            {data: "interest_start_date"},
            {data: "status"},
            ]  
            
          
        
          
      });

  });

  
</script>