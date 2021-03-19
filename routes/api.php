<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Payments
    Route::apiResource('payments', 'PaymentApiController');

    // Stk Requests
    Route::apiResource('stk-requests', 'StkRequestApiController');

    // Stk Responses
    Route::apiResource('stk-responses', 'StkResponseApiController');
});
