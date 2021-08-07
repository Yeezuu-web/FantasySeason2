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
                <span class="info-box-number">
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
                <span class="info-box-number">{{ $candidates ? $candidates->where('status', '=', 2)->count() : '' }}</span>
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
                <span class="info-box-number">{{ $candidates ? $candidates->where('status', '=', 1)->count() : '' }}</span>
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
                <span class="info-box-number">{{ $candidates ? $candidates->count() : '' }}</span>
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

      let languages = {
        'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
      };

      $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
      $.extend(true, $.fn.dataTable.defaults, {
        language: {
          url: languages['{{ app()->getLocale() }}']
        },
        columnDefs: [{
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
            }, { 
            targets: '_all',
            visible: false
            }],
            select: {
            style:    'multi+shift',
            selector: 'td:first-child'
        },
        order: [],
        scrollX: true,
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
            extend: 'excel',
            className: 'btn-default',
            text: excelButtonTrans,
            exportOptions: {
              columns: [2, 1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            },
            customizeData: function ( data ) {
                for (var i=0; i<data.body.length; i++){
                    for (var j=0; j<data.body[i].length; j++ ){
                        data.body[i][j] = '\u200C' + data.body[i][j];
                    }
                }
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
            var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                return $(entry).data('entry-id')
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
                .done(function () { location.reload() })
            }
            }
        }
        dtButtons.push(deleteButton)
    @endcan

    let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.candidates.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'manager_name', name: 'Manager Name' },
        { data: 'id', name: 'ID' },
        { data: 'team_name', name: 'Team Name' },
        { data: 'fan_club', name: 'Fan Club' },
        { data: 'link_by', name: 'Link By' },
        { data: 'dob', name: 'DOB' },
        { data: 'gender', name: 'Gender' },
        { data: 'email', name: 'Email' },
        { data: 'phone', name: 'Phone' },
        { data: 'apply_date', name: 'Apply Date' },
        { data: 'bank', name: 'Bank' },
        { data: 'account_no', name: 'Bank Account' },
        { data: 'transaction', name: 'Transaction', sortable: false, searchable: false  },
        { data: 'status', name: 'Status ' },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
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
      })
    
  })
</script>
@endsection