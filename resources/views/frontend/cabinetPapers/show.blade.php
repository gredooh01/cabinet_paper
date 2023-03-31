@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.cabinetPaper.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.cabinet-papers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $cabinetPaper->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.cabinet_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\CabinetPaper::CABINET_TYPE_SELECT[$cabinetPaper->cabinet_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.cabinet_num') }}
                                    </th>
                                    <td>
                                        {{ $cabinetPaper->cabinet_num }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.cabinet_title') }}
                                    </th>
                                    <td>
                                        {{ $cabinetPaper->cabinet_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.cabinet_ministry') }}
                                    </th>
                                    <td>
                                        {{ $cabinetPaper->cabinet_ministry }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.issue_date') }}
                                    </th>
                                    <td>
                                        {{ $cabinetPaper->issue_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.dispatch_date') }}
                                    </th>
                                    <td>
                                        {{ $cabinetPaper->dispatch_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cabinetPaper.fields.archive_date') }}
                                    </th>
                                    <td>
                                        {{ $cabinetPaper->archive_date }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.cabinet-papers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection