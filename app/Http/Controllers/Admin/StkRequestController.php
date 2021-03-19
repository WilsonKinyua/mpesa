<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStkRequestRequest;
use App\Http\Requests\StoreStkRequestRequest;
use App\Http\Requests\UpdateStkRequestRequest;
use App\Models\StkRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StkRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stk_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stkRequests = StkRequest::all();

        return view('admin.stkRequests.index', compact('stkRequests'));
    }

    public function create()
    {
        abort_if(Gate::denies('stk_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stkRequests.create');
    }

    public function store(StoreStkRequestRequest $request)
    {
        $stkRequest = StkRequest::create($request->all());

        return redirect()->route('admin.stk-requests.index');
    }

    public function edit(StkRequest $stkRequest)
    {
        abort_if(Gate::denies('stk_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stkRequests.edit', compact('stkRequest'));
    }

    public function update(UpdateStkRequestRequest $request, StkRequest $stkRequest)
    {
        $stkRequest->update($request->all());

        return redirect()->route('admin.stk-requests.index');
    }

    public function show(StkRequest $stkRequest)
    {
        abort_if(Gate::denies('stk_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stkRequests.show', compact('stkRequest'));
    }

    public function destroy(StkRequest $stkRequest)
    {
        abort_if(Gate::denies('stk_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stkRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyStkRequestRequest $request)
    {
        StkRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
