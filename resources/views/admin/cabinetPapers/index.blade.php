@extends('layouts.admin')
@section('content')
<div class="content">
    @can('cabinet_paper_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.cabinet-papers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.cabinetPaper.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.cabinetPaper.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CabinetPaper">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.cabinet_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.cabinet_num') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.cabinet_title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.cabinet_ministry') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.issue_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.dispatch_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.archive_date') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cabinetPapers as $key => $cabinetPaper)
                                    <tr data-entry-id="{{ $cabinetPaper->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $cabinetPaper->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\CabinetPaper::CABINET_TYPE_SELECT[$cabinetPaper->cabinet_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cabinetPaper->cabinet_num ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cabinetPaper->cabinet_title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cabinetPaper->cabinet_ministry ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cabinetPaper->issue_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cabinetPaper->dispatch_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cabinetPaper->archive_date ?? '' }}
                                        </td>
                                        <td>
                                            @can('cabinet_paper_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.cabinet-papers.show', $cabinetPaper->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('cabinet_paper_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.cabinet-papers.edit', $cabinetPaper->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('cabinet_paper_delete')
                                                <form action="{{ route('admin.cabinet-papers.destroy', $cabinetPaper->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('cabinet_paper_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cabinet-papers.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-CabinetPaper:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection