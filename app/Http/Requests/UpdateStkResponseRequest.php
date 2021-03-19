<?php

namespace App\Http\Requests;

use App\Models\StkResponse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStkResponseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stk_response_edit');
    }

    public function rules()
    {
        return [
            'receipt'          => [
                'string',
                'nullable',
            ],
            'checkout_request' => [
                'string',
                'nullable',
            ],
            'phone'            => [
                'string',
                'nullable',
            ],
            'amount'           => [
                'string',
                'nullable',
            ],
            'transaction_date' => [
                'string',
                'nullable',
            ],
        ];
    }
}
