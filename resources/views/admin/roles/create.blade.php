@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
    </div>

    <form method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="title" class="text-xs required">{{ trans('cruds.role.fields.title') }}</label>
                <div class="form-group">
                    <input type="text" id="title" name="title" class="{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required>
                </div>
                @if($errors->has('title'))
                    <p class="invalid-feedback">{{ $errors->first('title') }}</p>
                @endif
                <span class="block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            
            <div class="mb-3">
                <label>{{ trans('cruds.role.fields.permissions') }}<label class="text-xs required"></label> <br>
                        @foreach($permissions as $id => $permissions)
                            <input type="checkbox" name="permissions[]" value="{{ $id }}" id="permissions" class="form-control {{ $errors->has('users') ? ' is-invalid' : '' }}" {{ in_array($id, old('permissions', [])) ? 'checked' : '' }}> {{ $permissions }}
                        @endforeach
                </label>
                @if($errors->has('permissions'))
                    <p class="invalid-feedback">{{ $errors->first('permissions') }}</p>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>              
        </div>
        <div class="footer btn-group">
            <button type="submit" class="submit-button btn-primary">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection