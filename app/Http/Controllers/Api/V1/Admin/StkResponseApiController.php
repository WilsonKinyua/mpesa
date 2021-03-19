<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStkResponseRequest;
use App\Http\Requests\UpdateStkResponseRequest;
use App\Http\Resources\Admin\StkResponseResource;
use App\Models\StkResponse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StkResponseApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stk_response_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StkResponseResource(StkResponse::all());
    }

    public function store(StoreStkResponseRequest $request)
    {
        $stkResponse = StkResponse::create($request->all());

        return (new StkResponseResource($stkResponse))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StkResponse $stkResponse)
    {
        abort_if(Gate::denies('stk_response_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StkResponseResource($stkResponse);
    }

    public function update(UpdateStkResponseRequest $request, StkResponse $stkResponse)
    {
        $stkResponse->update($request->all());

        return (new StkResponseResource($stkResponse))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StkResponse $stkResponse)
    {
        abort_if(Gate::denies('stk_response_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stkResponse->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
