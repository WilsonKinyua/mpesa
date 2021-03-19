<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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

Route::post("test", function(Request $request) {
    Storage::put("stk_response.json", json_encode($request->all()));

    $response = $request->all();
    $response = $response['Body'];
    $request_id = $response['stkCallback']['CheckoutRequestID'];
    $response_code = $response['stkCallback']['ResultCode'];
    $response_desc = $response['stkCallback']['ResultDesc'];
    $merchant_request_id = $response['stkCallback']['MerchantRequestID'];

    $stkRequest = \App\Models\StkRequest::where('request',$request_id)->first();

    if(!$stkRequest) {
        return 'does not exist';
    }

    if($response_code == 0) {
        $amount = $response['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
        $receipt = $response['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
        $transactionDate = $response['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
        $phone = $response['stkCallback']['CallbackMetadata']['Item'][4]['Value'];

        \App\Models\StkResponse::create([
            'receipt' => $receipt,
            'checkout_request' => $request_id,
            'phone' => $phone,
            'amount' =>$amount,
            'transaction_date' =>$transactionDate,
        ]);

        $stkRequest->update(["paid" => 1]);

    } else{
       \App\Models\StkResponse::create([
            'merchant_request_id' => $merchant_request_id,
            'result_code' => $response_code,
            'result_description' => $response_desc
        ]);
    }

});
