@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Candidate
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-hover datatable datatable-candidate">
                <thead>
                    <tr>
                        <th>

                        </th>
                        <th>
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
                            Name ACC
                        </th>
                        <th>
                            Account No
                        </th>
                        <th>
                            Ref ID
                        </th>
                        <th>
                            Status
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
                                {{ $candidate->id ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->manager_name ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->team_name ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->fan_club ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->dob ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->gender ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->Email ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->phone ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->Bank ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->account_name ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->account_no ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->ref_id ?? '' }}
                            </td>
                            <td>
                                @if($candidate->status === 0)
                                    <span class="badge badge-info badge-sm">Processing</span>
                                @endif
                                @if($candidate->status === 1)
                                    <span class="badge badge-success badge-sm">Aproved</span>
                                @endif
                                @if($candidate->status === 2)
                                    <span class="badge badge-danger badge-sm">Rejected</span>
                                @endif
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
@endsection
@section('scripts')
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
            targets: [0, 1, 2, 3, 4, 10, 11, 12, 13, 14, 15],
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
        pageLength: 100,
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
              columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
            }
          },
          {
            extend: 'csv',
            className: 'btn-default',
            text: csvButtonTrans,
            exportOptions: {
              columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
            }
          },
          {
            extend: 'excel',
            className: 'btn-default',
            text: excelButtonTrans,
            exportOptions: {
              columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
            }
          },
          {
            extend: 'pdf',
            className: 'btn-default',
            text: pdfButtonTrans,
            exportOptions: {
              columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
            }
          },
          {
            extend: 'print',
            className: 'btn-default',
            text: printButtonTrans,
            exportOptions: {
              columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
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

    $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [[ 1, 'desc' ]],
        pageLength: 100,
    });
    let table = $('.datatable-candidate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  
})

</script>
@endsection