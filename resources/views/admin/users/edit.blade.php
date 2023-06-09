@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <form method="POST" action="{{ route('admin.users.update', [$user->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf   
        <div class="body">
            <div class="mb-3">
                <label for="name" class="text-xs required">{{ trans('cruds.user.fields.name') }}</label>

                <div class="form-group">
                    <input type="text" id="name" name="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', $user->name) }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="email" class="text-xs required">{{ trans('cruds.user.fields.email') }}</label>

                <div class="form-group">
                    <input type="email" id="email" name="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', $user->email) }}" required>
                </div>
                @if($errors->has('email'))
                    <p class="invalid-feedback">{{ $errors->first('email') }}</p>
                @endif
                <span class="block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="password" class="text-xs required">{{ trans('cruds.user.fields.password') }}</label>

                <div class="form-group">
                    <input type="password" id="password" name="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">
                </div>
                @if($errors->has('password'))
                    <p class="invalid-feedback">{{ $errors->first('password') }}</p>
                @endif
                <span class="block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="mb-3">
                <label>{{ trans('cruds.user.fields.roles') }} <label class="text-xs required"></label><br>
                    @foreach($roles as $roleId => $roleName)
                        <input type="radio" name="roles[]" value="{{ $roleId }}" id="role_{{ $roleId }}" class="form-control role-checkbox {{ $errors->has('roles') ? ' is-invalid' : '' }}"  {{ (in_array($user->roles->id, old('roles', [])) || $user->roles->id === $roleId) ? 'checked' : '' }}>
                        <label for="role_{{ $roleId }}">{{ $roleName }}</label> &nbsp;&nbsp;
                    @endforeach
                </label>
                @if($errors->has('roles'))
                    <p class="invalid-feedback">{{ $errors->first('roles') }}</p>
                @endif
                <span class="block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>

        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>

@endsection
