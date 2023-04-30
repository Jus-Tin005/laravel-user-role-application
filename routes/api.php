<?php
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    # Permissions
    Route::apiResource('permissions', '\App\Http\Controllers\Api\PermissionsApiController');

    # Roles
    Route::apiResource('roles', '\App\Http\Controllers\Api\RolesApiController');

    # Users
    Route::apiResource('users', '\App\Http\Controllers\Api\UsersApiController');

    # Features
    Route::apiResource('features', '\App\Http\Controllers\Api\FeaturesApiController');

});
