@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stkRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stk-requests.update", [$stkRequest->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="request">{{ trans('cruds.stkRequest.fields.request') }}</label>
                <input class="form-control {{ $errors->has('request') ? 'is-invalid' : '' }}" type="text" name="request" id="request" value="{{ old('request', $stkRequest->request) }}" required>
                @if($errors->has('request'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkRequest.fields.request_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="msisdn">{{ trans('cruds.stkRequest.fields.msisdn') }}</label>
                <input class="form-control {{ $errors->has('msisdn') ? 'is-invalid' : '' }}" type="text" name="msisdn" id="msisdn" value="{{ old('msisdn', $stkRequest->msisdn) }}" required>
                @if($errors->has('msisdn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('msisdn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkRequest.fields.msisdn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.stkRequest.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $stkRequest->amount) }}" step="0.01">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkRequest.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid">{{ trans('cruds.stkRequest.fields.paid') }}</label>
                <input class="form-control {{ $errors->has('paid') ? 'is-invalid' : '' }}" type="number" name="paid" id="paid" value="{{ old('paid', $stkRequest->paid) }}" step="1">
                @if($errors->has('paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkRequest.fields.paid_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection