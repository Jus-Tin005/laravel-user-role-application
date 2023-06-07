<?php
Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);


    #Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => '\App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    # Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController')->except(['index', 'create', 'store']);
  

    # Roles
        // Route::group(['middleware' => ['canView:role','canCreate:role','canUpdate:role','canDelete:role']], function () {
            Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
            Route::resource('roles', 'RolesController');
        // });

     # Users
        // Route::group(['middleware' => ['canView:user','canCreate:user','canUpdate:user','canDelete:user']], function () {
            Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
            Route::resource('users', 'UsersController');
        // });
    
    # Features
        Route::delete('features/destroy', 'FeaturesController@massDestroy')->name('features.massDestroy');
        Route::resource('features', 'FeaturesController')->except(['index', 'create', 'store']);
});





Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'App\Http\Controllers\Auth', 'middleware' => ['auth']], function () {
    # Change password
    if (file_exists(app_path('Http\Controllers\Auth\ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});











