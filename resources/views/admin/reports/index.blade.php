@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h3 class="title">Report</h3>
        <div class="col-md-8">
            <span class="input-group-addon">From</span>
            <input type="text" class="input-sm datetime form-control" name="startt" value="{{ Carbon\Carbon::now()->format('m/d/Y') }}" />
            <span class="input-group-addon">to</span>
            <input type="text" class="input-sm datetime form-control" name="endt" value="{{ Carbon\Carbon::now()->format('m/d/Y') }}"/>
            <button type="button" id="dateSearch" class="btn mt-3 btn-sm btn-primary">Search</button>
        </div>
    </div>
    <div class="col-md-4"> 
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Summary</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <ion-icon name="checkmark-sharp"></ion-icon>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> 12%
                    </span>
                    <span class="text-muted">APPROVED</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-danger text-xl">
                    <ion-icon name="close-sharp"></ion-icon>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                    </span>
                    <span class="text-muted">REJECTED</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-primary text-xl">
                    <ion-icon name="people-sharp"></ion-icon>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> 1%
                    </span>
                    <span class="text-muted">REGISTRATION TOTAL</span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
        </div>
    </div>
    <table class="table table-bordered datatable">
        <thead>
            <tr>
                <td>
                </td>
                <td>
                    <input class="search" type="text" placeholder="{{ trans('global.search') }} Manger Name">
                </td>
                <td>
                    <input class="search" type="text" placeholder="{{ trans('global.search') }} Team Name">
                </td>
                <td>
                    <select class="search" strict="true">
                        <option value>{{ trans('global.all') }} Fan Club</option>
                        @foreach(App\Models\Candidate::FANCLUB_SELECT as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input class="search" type="text" placeholder="{{ trans('global.search') }} Link By">
                </td>
                <td>
                </td>
                <td>
                    <select class="search" strict="true">
                        <option value>{{ trans('global.all') }} Gender</option>
                        @foreach(App\Models\Candidate::GENDER_SELECT as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input class="search" type="text" placeholder="{{ trans('global.search') }} Email">
                </td>
                <td>
                    <input class="search" type="text" placeholder="{{ trans('global.search') }} Phone">
                </td>
                <td>
                </td>
                <td>
                    <select class="search" strict="true">
                        <option value>{{ trans('global.all') }} Bank</option>
                        @foreach(App\Models\Candidate::BANK_SELECT as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input class="search" type="text" placeholder="{{ trans('global.search') }} Account">
                </td>
                <td>
                </td>
            </tr>
        </thead>
    </table>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Report">
                        <thead>
                            <tr>
                                <th width="10">
                                    ID
                                </th>
                                <th>
                                  Full-Name
                                </th>
                                <th>
                                    Team Name
                                </th>
                                <th>
                                    Fan Club
                                </th>
                                
                                <th>
                                    Link By
                                </th>
                                <th>
                                    DOB
                                </th>
                                <th>
                                    Gender
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Apply Date
                                </th>
                                <th>
                                    Bank
                                </th>
                                <th>
                                    Bank Account
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.search').addClass('form-control');
        let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
        let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        let printButtonTrans = '{{ trans('global.datatables.print') }}'
        let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
        let selectAllButtonTrans = '{{ trans('global.select_all') }}'
        let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
        $.extend(true, $.fn.dataTable.defaults, {
            columnDefs: [
                {
                    targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    visible: true
                }
            ],
            select: {
                style:    'multi+shift',
                selector: 'td:first-child'
            },
            order: [],
            scrollX: true,
            paging: true,
            lengthMenu: [[25, 50, 100, -1], [25, 50, 100, "All"]],
            pagingType: "full_numbers",
            pageLength: 50,
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn-default',
                    text: copyButtonTrans,
                    exportOption: {
                        columns: ':visible',
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn-default',
                    text: excelButtonTrans,
                    exportOption: {
                        columns: ':visible'
                    },
                    customizeData: function ( data ) {
                        for (var i=0; i<data.body.length; i++){
                            for (var j=0; j<data.body[i].length; j++ ){
                                data.body[i][j] =  data.body[i][j] + '\u200C';
                            }
                        }
                    } 
                    
                },
                {
                    className: 'btn-default',
                    text: 'Excel All',
                    action: function( e, dt ){
                        location.href = '/admin/candidates/export';
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn-default',
                    text: colvisButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                }
            ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
        
    })
</script>
<script>
    $(document).ready(function(){
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        let dtOverrideGlobals = {
            buttons: dtButtons,
            bProcessing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('admin.reports.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'manager_name', name: 'manager_name' },
                { data: 'team_name', name: 'team_name' },
                { data: 'fan_club', name: 'fan_club' },
                { data: 'linkby', name: 'linkby' },
                { data: 'dob', name: 'dob' },
                { data: 'gender', name: 'gender' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'apply_date', name: 'created_at', type:"date"},
                { data: 'bank', name: 'bank' },
                { data: 'account_no', name: 'account_no' },
                { data: 'status', name: 'status ' },
            ],
            orderCellsTop: true,
            order: [[ 0, 'desc']],
            paging: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            pagingType: "full_numbers",
            pageLength: 50,
        };

        let table = $('.datatable-Report').DataTable(dtOverrideGlobals);

        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        let visibleColumnsIndexes = null;

        $('.datatable thead').on('input', '.search', function () {
            let strict = $(this).attr('strict') || false
            let value = strict && this.value ? "^" + this.value + "$" : this.value

            let index = $(this).parent().index()
            if (visibleColumnsIndexes !== null) {
                index = visibleColumnsIndexes[index]
            }

            table
                .column(index)
                .search(value, strict)
                .draw()
        });

        table.on('column-visibility.dt', function(e, settings, column, state) {
            visibleColumnsIndexes = []
            table.columns(":visible").every(function(colIdx) {
                visibleColumnsIndexes.push(colIdx);
            });
        })
        
    })
</script>
@endsection