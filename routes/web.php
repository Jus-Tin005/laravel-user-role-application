<?php
Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

# Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', '\App\Http\Controllers\Admin\HomeController@index')->name('home');

    # Permissions
    Route::delete('permissions/destroy', 'App\Http\Controllers\Admin\PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', '\App\Http\Controllers\Admin\PermissionsController');

    # Roles
    Route::delete('roles/destroy', '\App\Http\Controllers\Admin\RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', '\App\Http\Controllers\Admin\RolesController');

    # Users
    Route::delete('users/destroy', '\App\Http\Controllers\Admin\UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', '\App\Http\Controllers\Admin\UsersController');

    # Features
    Route::delete('features/destroy', '\App\Http\Controllers\Admin\FeaturesController@massDestroy')->name('features.massDestroy');
    Route::resource('features', '\App\Http\Controllers\Admin\FeaturesController');

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'App\Http\Controllers\Auth', 'middleware' => ['auth']], function () {
    # Change password
    if (file_exists(app_path('Http\Controllers\Auth\ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});











