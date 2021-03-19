@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stkRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stk-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stkRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $stkRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkRequest.fields.request') }}
                        </th>
                        <td>
                            {{ $stkRequest->request }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkRequest.fields.msisdn') }}
                        </th>
                        <td>
                            {{ $stkRequest->msisdn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkRequest.fields.amount') }}
                        </th>
                        <td>
                            {{ $stkRequest->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkRequest.fields.paid') }}
                        </th>
                        <td>
                            {{ $stkRequest->paid }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stk-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection