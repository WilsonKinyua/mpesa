<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStkResponseRequest;
use App\Http\Requests\StoreStkResponseRequest;
use App\Http\Requests\UpdateStkResponseRequest;
use App\Models\StkResponse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StkResponseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stk_response_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stkResponses = StkResponse::all();

        return view('admin.stkResponses.index', compact('stkResponses'));
    }

    public function create()
    {
        abort_if(Gate::denies('stk_response_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stkResponses.create');
    }

    public function store(StoreStkResponseRequest $request)
    {
        $stkResponse = StkResponse::create($request->all());

        return redirect()->route('admin.stk-responses.index');
    }

    public function edit(StkResponse $stkResponse)
    {
        abort_if(Gate::denies('stk_response_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stkResponses.edit', compact('stkResponse'));
    }

    public function update(UpdateStkResponseRequest $request, StkResponse $stkResponse)
    {
        $stkResponse->update($request->all());

        return redirect()->route('admin.stk-responses.index');
    }

    public function show(StkResponse $stkResponse)
    {
        abort_if(Gate::denies('stk_response_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stkResponses.show', compact('stkResponse'));
    }

    public function destroy(StkResponse $stkResponse)
    {
        abort_if(Gate::denies('stk_response_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stkResponse->delete();

        return back();
    }

    public function massDestroy(MassDestroyStkResponseRequest $request)
    {
        StkResponse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
