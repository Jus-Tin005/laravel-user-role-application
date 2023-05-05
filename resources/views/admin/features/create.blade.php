@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.feature.title_singular') }}
    </div>

    <form method="POST" action="{{ route('admin.features.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="name" class="text-xs required">{{ trans('cruds.feature.fields.title') }}</label>
                <div class="form-group">
                    <input type="text" id="name" name="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.feature.fields.title_helper') }}</span>
            </div>
            
            <div class="mb-3">
                <label>{{ trans('cruds.feature.fields.permissions') }}<label class="text-xs required"></label>  <br>
                        @foreach($permissions as $id => $permissions)
                            <input type="checkbox" name="permissions[]" value="{{ $id }}" id="permissions" class="form-control {{ $errors->has('permissions') ? ' is-invalid' : '' }}" {{ in_array($id, old('permissions', [])) ? 'checked' : '' }}> {{ $permissions }} &nbsp;&nbsp;
                        @endforeach
                </label>
                @if($errors->has('permissions'))
                    <p class="invalid-feedback">{{ $errors->first('permissions') }}</p>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.permissions_helper') }}</span>
            </div>              
        </div>
        <div class="footer btn-group">
            <button type="submit" class="submit-button btn-primary">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection