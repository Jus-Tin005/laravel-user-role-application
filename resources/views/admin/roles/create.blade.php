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
                <label for="username" class="text-xs required">{{ trans('cruds.role.fields.title') }}</label>
                <div class="form-group">
                    <input type="text" id="name" name="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            
            <div class="mb-3">
                <label for="role_per">{{ trans('cruds.role.fields.permissions') }}<label class="text-xs required"></label> <br>
               
                @foreach($features as $id => $feature)
                        <div class="mb-3"> <strong>{{$feature->name}}</strong> &nbsp;&nbsp;
                                @foreach($permissions as $key => $permission)
                                <label for="role_per_in">
                                   @if($feature->id === $permission->feature_id)
                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}"  class="form-control {{ $errors->has('permissions') ? ' is-invalid' : '' }}"> {{ $permission->title }} &nbsp;&nbsp;
                                   @endif
                                </label>
                                @endforeach
                        </div>
               
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