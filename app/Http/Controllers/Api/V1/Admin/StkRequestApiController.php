<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStkRequestRequest;
use App\Http\Requests\UpdateStkRequestRequest;
use App\Http\Resources\Admin\StkRequestResource;
use App\Models\StkRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StkRequestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stk_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StkRequestResource(StkRequest::all());
    }

    public function store(StoreStkRequestRequest $request)
    {
        $stkRequest = StkRequest::create($request->all());

        return (new StkRequestResource($stkRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StkRequest $stkRequest)
    {
        abort_if(Gate::denies('stk_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StkRequestResource($stkRequest);
    }

    public function update(UpdateStkRequestRequest $request, StkRequest $stkRequest)
    {
        $stkRequest->update($request->all());

        return (new StkRequestResource($stkRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StkRequest $stkRequest)
    {
        abort_if(Gate::denies('stk_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stkRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
