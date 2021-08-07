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
        Candidate Approval
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
            <!--</table>-->
            <table class=" table table-bordered table-hover datatable datatable-candidate">
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
                            Approval
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidates as $key => $candidate)
                        <tr data-entry-id="{{ $candidate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $candidate->manager_name ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->id ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->team_name ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->fan_club ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->linkby ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->dob ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->gender ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ strval($candidate->phone) ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->created_at ?? '' }}
                            </td>
                            <td>
                                {{ strval($candidate->bank) ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->account_no  ?? '' }}
                            </td>
                            <td>
                                <style>
                                    #imgg{
                                        cursor: pointer;
                                        transition: all .2s ease-in-out;
                                        z-index: 1;
                                    }
                                    #imgg:hover{
                                        transform: scale(8, 13);  
                                    }
                                </style>
                                @if($candidate->transaction)
                                    <img id="imgg" src="{{ $candidate->transaction->getUrl() }}" id="{{$candidate->id}}" width="50px" height="50px" style="display: inline-block; " onclick="showimg({{$candidate->id}},'{{ $candidate->transaction->getUrl() }}', '{{$candidate->manager_name}}')"/>
                                @else
                                    <img src="" />
                                @endif
                            </td>
                            <td>
                                @if($candidate->status === 0)
                                    <span class="badge badge-info badge-sm">Pendding</span>
                                @endif
                                @if($candidate->status === 1)
                                    <span class="badge badge-success badge-sm">Aproved</span>
                                @endif
                                @if($candidate->status === 2)
                                    <span class="badge badge-danger badge-sm">Rejected</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @can('candidate_aprove')
                                    @if ($candidate->status === 1)
                                        <button class="btn btn-sm btn-danger" onclick="reject({{$candidate->id}})">
                                            Reject
                                        </button>
                                    @elseif($candidate->status === 2)
                                        <button class="btn btn-sm btn-primary" onclick="approve({{$candidate->id}})">
                                            Aprove
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-primary" onclick="approve({{$candidate->id}})">
                                            Aprove
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="reject({{$candidate->id}})">
                                            Reject
                                        </button>
                                    @endif
                                @endcan
                            </td>
                            <td>
                                @can('candidate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.candidates.show', $candidate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('candidate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.candidates.edit', $candidate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('candidate_delete')
                                    <form action="{{ route('admin.candidates.destroy', $candidate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
        <div class="modal-body">
            <img src="" class="modal-content1" id="img01" width="100%">
        </div>
      </div>
    </div>
  </div>
{{-- <div id="myModal" class="modal">
  <span class="close mt-5">&times;</span>
  <img class="modal-content" id="img01" width="50%">
  <div id="caption"></div>
</div> --}}
@endsection
@section('scripts')
<script>
function showimg(id, url, name){
    Swal.fire({
    imageUrl: url,
    imageWidth: '70%',
    imageHeight: '70%',
    imageAlt: name
    })
//   $('#myModal').modal('toggle');
//   $('#img01').attr('src', url);
//   $('.modal-title').text(name);
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
            extend: 'csv',
            className: 'btn-default',
            text: csvButtonTrans,
            exportOptions: {
              columns: [2, 1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            }
          },
          {
            extend: 'copy',
            className: 'btn-default',
            text: copyButtonTrans,
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
              columns: [2, 1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            },    
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

    $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [[ 2, 'desc' ]],
        pageLength: 25,
    });
    let table = $('.datatable-candidate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
<script>
    function approve(id){
        let _token = $('input[name="_token"').val();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        
        swalWithBootstrapButtons.fire({
        title: 'Will you approve?',
        text: "This Player will be approve.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, approve it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "/fantasy/admin/approval/update/"+id,
                data: {
                    id: id,
                    _token: _token
                },
                beforeSend: function(){
                    $('.loading').removeAttr('hidden');
                },
                success: function (response) {
                    if(response){
                        // swalWithBootstrapButtons.fire(
                        //     'Approved!',
                        //     'This player has been appoved.',
                        //     'success'
                        // )    
                        // $('.loading').removeAttr('hidden');
                        setTimeout(function(){
                            location.reload();
                        }, 1200);
                    }
                }
            }); 
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    }

    function reject(id){
        let _token = $('input[name="_token"').val();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        
        swalWithBootstrapButtons.fire({
        title: 'Will you reject?',
        text: "This Player will be reject.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, rejct it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "/fantasy/admin/approval/reject/"+id,
                data: {
                    id: id,
                    _token: _token
                },
                beforeSend: function(){
                    $('.loading').removeAttr('hidden');
                },
                success: function (response) {
                    if(response){
                        // swalWithBootstrapButtons.fire(
                        //     'Approved!',
                        //     'This player has been appoved.',
                        //     'success'
                        // )    
                        // $('.loading').removeAttr('hidden');
                        setTimeout(function(){
                            location.reload();
                        }, 1200);
                    }
                }
            }); 
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    }
</script>
@endsection

