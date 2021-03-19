@extends('layouts.admin')
@section('content')
@can('stk_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.stk-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.stkRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.stkRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-StkRequest">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.stkRequest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.stkRequest.fields.request') }}
                        </th>
                        <th>
                            {{ trans('cruds.stkRequest.fields.msisdn') }}
                        </th>
                        <th>
                            {{ trans('cruds.stkRequest.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.stkRequest.fields.paid') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stkRequests as $key => $stkRequest)
                        <tr data-entry-id="{{ $stkRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $stkRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $stkRequest->request ?? '' }}
                            </td>
                            <td>
                                {{ $stkRequest->msisdn ?? '' }}
                            </td>
                            <td>
                                {{ $stkRequest->amount ?? '' }}
                            </td>
                            <td>
                                {{ $stkRequest->paid ?? '' }}
                            </td>
                            <td>
                                @can('stk_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.stk-requests.show', $stkRequest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('stk_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.stk-requests.edit', $stkRequest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('stk_request_delete')
                                    <form action="{{ route('admin.stk-requests.destroy', $stkRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('stk_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.stk-requests.massDestroy') }}",
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
  let table = $('.datatable-StkRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection