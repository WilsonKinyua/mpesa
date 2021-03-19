<?php

namespace App\Http\Requests;

use App\Models\StkRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStkRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stk_request_create');
    }

    public function rules()
    {
        return [
            'request' => [
                'string',
                'required',
            ],
            'msisdn'  => [
                'string',
                'required',
            ],
            'paid'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
