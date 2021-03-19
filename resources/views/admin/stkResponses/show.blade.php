@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stkResponse.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stk-responses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stkResponse.fields.id') }}
                        </th>
                        <td>
                            {{ $stkResponse->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkResponse.fields.receipt') }}
                        </th>
                        <td>
                            {{ $stkResponse->receipt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkResponse.fields.checkout_request') }}
                        </th>
                        <td>
                            {{ $stkResponse->checkout_request }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkResponse.fields.phone') }}
                        </th>
                        <td>
                            {{ $stkResponse->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkResponse.fields.amount') }}
                        </th>
                        <td>
                            {{ $stkResponse->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stkResponse.fields.transaction_date') }}
                        </th>
                        <td>
                            {{ $stkResponse->transaction_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stk-responses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection