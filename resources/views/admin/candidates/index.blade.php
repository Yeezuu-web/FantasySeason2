@extends('layouts.admin')
@section('styles')
<style>
.modal{
    background-color: #071b2dcf;
}
    /* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #ff0000;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: rgb(19, 1, 1);
  text-decoration: none;
  cursor: pointer;
}

.imgg{
    cursor: pointer;
    transition: all .2s ease-in-out;
    z-index: 1;
}
.imgg:hover{
    transform: scale(5, 8);  
}
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-exclamation-triangle"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Candidate Pendding</span>
        <span class="info-box-number" id="pedding">
          {{ $candidates ? $candidates->where('status', '=', 0)->count() : '' }}
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Candidate Rejected</span>
        <span class="info-box-number" id="rejected">{{ $candidates ? $candidates->where('status', '=', 2)->count() : '' }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Candidate Approved</span>
        <span class="info-box-number" id="approved">{{ $candidates ? $candidates->where('status', '=', 1)->count() : '' }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Candidate</span>
        <span class="info-box-number" id="total">{{ $candidates ? $candidates->count() : '' }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<div class="card">
    <div class="card-header">
        Candidate
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <!--<table class="float-right mb-4 col-md-4">-->
            <!--    <thead>-->
            <!--      <tr>-->
            <!--        <td>-->
            <!--          <input type="text" class="form-control form-control-sm filter-input" data-column="12" placeholder="Search by Bank Account...">-->
            <!--        </td>-->
            <!--        <td>-->
            <!--      </tr>-->
            <!--    </thead>-->
            <!-- </table>-->
            <table class=" table table-bordered table-hover ajaxTable datatable datatable-Candidate">
                <thead>
                    <tr>
                        <th>

                        </th>
                        <th>
                          Full-Name
                        </th>
                        <th>
                            ID
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
                            Transaction
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  function showimg(param){
    let url = $(param).attr('src');
    let name = $(param).attr('alt');
      Swal.fire({
      imageUrl: url,
      imageWidth: '70%',
      imageHeight: '70%',
      imageAlt: name
      })
  }
</script>
<script>
    $(function() {
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
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }, {
                orderable: false,
                searchable: false,
                targets: -1
            }, {
            targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
            visible: true,
        }],
        select: {
          style:    'multi+shift',
          selector: 'td:first-child'
        },
        order: [],
        scrollX: true,
        stateSave: true,
        paging: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        pagingType: "full_numbers",
        pageLength: 25,
        dom: 'lBfrtip<"actions">',
        buttons: [
          {
            extend: 'selectAll',
            className: 'btn-primary',
            text: selectAllButtonTrans,
            exportOptions: {
              columns: ':visible'
            },
            action: function(e, dt) {
              e.preventDefault()
              dt.rows().deselect();
              dt.rows({ search: 'applied' }).select();
            }
          },
          {
            extend: 'selectNone',
            className: 'btn-primary',
            text: selectNoneButtonTrans,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'copy',
            className: 'btn-default',
            text: copyButtonTrans,
            exportOptions: {
              columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            }
          },
          {
            extend: 'csv',
            className: 'btn-default',
            text: csvButtonTrans,
            exportOptions: {
              columns: [2, 1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            }
          },
          {
            className: 'btn-default',
            text: excelButtonTrans,
            action: function( e, dt ){
              location.href = '/admin/candidates/export';
            }
          },
          {
            extend: 'print',
            className: 'btn-default',
            text: printButtonTrans,
            exportOptions: {
              columns: [2, 1, 3, 4, 5, 6, 7, 8, 9, 10],
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
    });

</script>
<script>
  $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('candidate_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.candidates.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
            var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                return entry.id
            });

            if (ids.length === 0) {
                alert('{{ trans('global.datatables.zero_selected') }}')

                return
            }

            if (confirm('{{ trans('global.areYouSure') }}')) {
                $.ajax({
                headers: {'x-csrf-token': _token},
                method: 'POST',
                url: config.url,
                data: { ids: ids, _method: 'DELETE' }})
                .done(function () { 
                  table.draw(); 
                  $('#total').load('/admin/candidates/total'); 
                  $('#pedding').load('/admin/approval/pedding'); 
                  $('#rejected').load('/admin/approval/rejected'); 
                  $('#approved').load('/admin/approval/approved'); 
                })
            }
            }
        }
        dtButtons.push(deleteButton)
    @endcan
    let dtOverrideGlobals = {
    buttons: dtButtons,
    bProcessing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.candidates.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'manager_name', name: 'manager_name' },
        { data: 'id', name: 'id' },
        { data: 'team_name', name: 'team_name' },
        { data: 'fan_club', name: 'fan_club' },
        { data: 'linkby', name: 'linkby' },
        { data: 'dob', name: 'dob' },
        { data: 'gender', name: 'gender' },
        { data: 'email', name: 'email' },
        { data: 'phone', name: 'phone' },
        { data: 'apply_date', name: 'created_at' },
        { data: 'bank', name: 'bank' },
        { data: 'account_no', name: 'account_no' },
        { data: 'transaction', name: 'Transaction', sortable: false, searchable: false  },
        { data: 'status', name: 'status ' },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    stateSave: true,
    paging: true,
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    pagingType: "full_numbers",
    pageLength: 25,
    };
    let table = $('.datatable-Candidate').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
      
    $('.filter-input').keyup(function(){
      table.column( $(this).data('column') )
        .search( $(this).val() )
        .draw()
    });

    
  })
</script>
@endsection