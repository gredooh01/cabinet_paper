@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.cabinetPaper.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.cabinet-papers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('cabinet_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.cabinetPaper.fields.cabinet_type') }}</label>
                            <select class="form-control" name="cabinet_type" id="cabinet_type" required>
                                <option value disabled {{ old('cabinet_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\CabinetPaper::CABINET_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('cabinet_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cabinet_type'))
                                <span class="help-block" role="alert">{{ $errors->first('cabinet_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cabinetPaper.fields.cabinet_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cabinet_num') ? 'has-error' : '' }}">
                            <label class="required" for="cabinet_num">{{ trans('cruds.cabinetPaper.fields.cabinet_num') }}</label>
                            <input class="form-control" type="text" name="cabinet_num" id="cabinet_num" value="{{ old('cabinet_num', '') }}" required>
                            @if($errors->has('cabinet_num'))
                                <span class="help-block" role="alert">{{ $errors->first('cabinet_num') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cabinetPaper.fields.cabinet_num_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cabinet_title') ? 'has-error' : '' }}">
                            <label class="required" for="cabinet_title">{{ trans('cruds.cabinetPaper.fields.cabinet_title') }}</label>
                            <input class="form-control" type="text" name="cabinet_title" id="cabinet_title" value="{{ old('cabinet_title', '') }}" required>
                            @if($errors->has('cabinet_title'))
                                <span class="help-block" role="alert">{{ $errors->first('cabinet_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cabinetPaper.fields.cabinet_title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cabinet_ministry') ? 'has-error' : '' }}">
                            <label class="required" for="cabinet_ministry">{{ trans('cruds.cabinetPaper.fields.cabinet_ministry') }}</label>
                            <input class="form-control" type="text" name="cabinet_ministry" id="cabinet_ministry" value="{{ old('cabinet_ministry', '') }}" required>
                            @if($errors->has('cabinet_ministry'))
                                <span class="help-block" role="alert">{{ $errors->first('cabinet_ministry') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cabinetPaper.fields.cabinet_ministry_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('issue_date') ? 'has-error' : '' }}">
                            <label class="required" for="issue_date">{{ trans('cruds.cabinetPaper.fields.issue_date') }}</label>
                            <input class="form-control date" type="text" name="issue_date" id="issue_date" value="{{ old('issue_date') }}" required>
                            @if($errors->has('issue_date'))
                                <span class="help-block" role="alert">{{ $errors->first('issue_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cabinetPaper.fields.issue_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dispatch_date') ? 'has-error' : '' }}">
                            <label class="required" for="dispatch_date">{{ trans('cruds.cabinetPaper.fields.dispatch_date') }}</label>
                            <input class="form-control date" type="text" name="dispatch_date" id="dispatch_date" value="{{ old('dispatch_date') }}" required>
                            @if($errors->has('dispatch_date'))
                                <span class="help-block" role="alert">{{ $errors->first('dispatch_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cabinetPaper.fields.dispatch_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('archive_date') ? 'has-error' : '' }}">
                            <label class="required" for="archive_date">{{ trans('cruds.cabinetPaper.fields.archive_date') }}</label>
                            <input class="form-control date" type="text" name="archive_date" id="archive_date" value="{{ old('archive_date') }}" required>
                            @if($errors->has('archive_date'))
                                <span class="help-block" role="alert">{{ $errors->first('archive_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cabinetPaper.fields.archive_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection