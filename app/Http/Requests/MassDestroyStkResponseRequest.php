<?php

namespace App\Http\Requests;

use App\Models\StkResponse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStkResponseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stk_response_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stk_responses,id',
        ];
    }
}
