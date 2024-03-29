<?php

namespace App\Http\Requests;

use App\Models\StkRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStkRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stk_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stk_requests,id',
        ];
    }
}
