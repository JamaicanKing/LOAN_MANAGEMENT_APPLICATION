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

    <div id="search" style="display: none" class="">
        <div class="max-w-sm w-full place-content-center lg:max-w-full lg:flex">
            <div
                class="border-r border-b border-l border-gray-400 lg:border-l lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">Target</th>
                            <th scope="col" style="text-align: center;">Search text</th>
                            <th scope="col" style="text-align: center;">Treat as regex</th>
                            <th scope="col" style="text-align: center;">Use smart search</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="filter_global">
                            <td scope="col" style="text-align: center;">Global search</td>
                            <td scope="col" style="text-align: center;"><input type="text" class="global_filter"
                                    id="global_filter"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="global_filter"
                                    id="global_regex"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="global_filter"
                                    id="global_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col1" data-column="0">
                            <td scope="col" style="text-align: center;">Column - id</td>
                            <td scope="col" style="text-align: center;"><input type="text" class="column_filter"
                                    id="col0_filter"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col0_regex"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col0_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col2" data-column="1">
                            <td scope="col" style="text-align: center;">Column - Name</td>
                            <td scope="col" style="text-align: center;"><input type="text" class="column_filter"
                                    id="col1_filter"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col1_regex"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col1_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col3" data-column="2">
                            <td scope="col" style="text-align: center;">Column - Loan Amount</td>
                            <td scope="col" style="text-align: center;"><input type="text" class="column_filter"
                                    id="col2_filter"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col2_regex"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col2_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col4" data-column="3">
                            <td scope="col" style="text-align: center;">Column - Interest Rate</td>
                            <td scope="col" style="text-align: center;"><input type="text" class="column_filter"
                                    id="col3_filter"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col3_regex"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col3_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col5" data-column="4">
                            <td scope="col" style="text-align: center;">Column - Loan Release Date</td>
                            <td scope="col" style="text-align: center;"><input type="text" class="column_filter"
                                    id="col4_filter"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col4_regex"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col4_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col5"
                            data-column="5                                                                                        ">
                            <td scope="col" style="text-align: center;">Column - Status</td>
                            <td scope="col" style="text-align: center;"><input type="text" class="column_filter"
                                    id="col4_filter"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col4_regex"></td>
                            <td scope="col" style="text-align: center;"><input type="checkbox" class="column_filter"
                                    id="col4_smart" checked="checked"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="mx-auto" style="width: 80%; margin-top: 10px;">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="text-align: left;">#</th>
                    <th scope="col" style="text-align: left;">Name</th>
                    <th scope="col" style="text-align: left;">Loan Amount</th>
                    <th scope="col" style="text-align: left;">Interest Rate</th>
                    <th scope="col" style="text-align: left;">Balance</th>
                    <th scope="col" style="text-align: left;">Loan Released Date</th>
                    <th scope="col" style="text-align: left;">Due Date</th>
                    <th scope="col" style="text-align: left;">Status</th>
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
    <script type="text/javascript">
        function htmlDecode(data) {
            var txt = document.createElement('textarea');
            txt.innerHTML = data;
            return txt.value
        }
    </script>
    <script>
        function filterGlobal() {
            $('#example').DataTable().search(
                $('#global_filter').val(),
                $('#global_regex').prop('checked'),
                $('#global_smart').prop('checked')
            ).draw();
        }

        function filterColumn(i) {
            $('#example').DataTable().column(i).search(
                $('#col' + i + '_filter').val(),
                $('#col' + i + '_regex').prop('checked'),
                $('#col' + i + '_smart').prop('checked')
            ).draw();
        }

        $(function() {
            $('#example').DataTable({
                ajax: '{{ route('api.loanDetail.index') }}',
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
                        'pdf',
                        {
                            text: 'Advance Search',
                            action: function showHideSearch(e, dt, node, config) {
                                var x = document.getElementById("search");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                        }
                    ],
          
                columns: [{
                        data: "loanId",
                    },
                    {
                        data: "name",
                    },
                    {
                        data: "loan_amount"
                    },
                    {
                        data: "rate"
                    },
                    {
                        data: "balance"
                    },
                    {
                        data: "interest_start_date"
                    },
                    {
                        data: "due_date"
                    },
                    {
                        data: "status"
                    },
                    {
                        data: "actions",
                        render: function(data) {
                            return htmlDecode(data);
                        }
                    }
                ]

            });

            $('input.global_filter').on('keyup click', function() {
                filterGlobal();
            });

            $('input.column_filter').on('keyup click', function() {
                filterColumn($(this).parents('tr').attr('data-column'));
            });


        });
    </script>
