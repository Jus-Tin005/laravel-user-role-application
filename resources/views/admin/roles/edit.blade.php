@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}
    </div>

    <form method="POST" action="{{ route('admin.roles.update', [$role->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="name" class="text-xs required">{{ trans('cruds.role.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="name" name="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', $role->name) }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="role_per">{{ trans('cruds.role.fields.permissions') }}<label class="text-xs required"></label> <br>

                @foreach($features as $key => $feature)
                        <div class="mb-3"> <strong>{{$feature->name}}</strong> &nbsp;&nbsp;
                            @foreach($permissions as $id => $permission)
                            <label for="role_per_in">
                                    @if($feature->id === $permission->feature_id)
                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}"  class="form-control {{ $errors->has('permissions') ? ' is-invalid' : '' }}" {{ in_array( $permission->id, old('permissions', [])) || $role->permissions->contains( $permission->id) ? 'checked' : ''  }}> {{ $permission->title }} &nbsp;&nbsp;
                                    @endif
                            </label>
                            @endforeach
                        </div>
                @endforeach

                </label>
                @if($errors->has('permissions'))
                    <p class="invalid-feedback">{{ $errors->first('permissions') }}</p>
                @endif
                <span class="block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection