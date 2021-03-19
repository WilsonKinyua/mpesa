@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stkResponse.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stk-responses.update", [$stkResponse->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="receipt">{{ trans('cruds.stkResponse.fields.receipt') }}</label>
                <input class="form-control {{ $errors->has('receipt') ? 'is-invalid' : '' }}" type="text" name="receipt" id="receipt" value="{{ old('receipt', $stkResponse->receipt) }}">
                @if($errors->has('receipt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkResponse.fields.receipt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="checkout_request">{{ trans('cruds.stkResponse.fields.checkout_request') }}</label>
                <input class="form-control {{ $errors->has('checkout_request') ? 'is-invalid' : '' }}" type="text" name="checkout_request" id="checkout_request" value="{{ old('checkout_request', $stkResponse->checkout_request) }}">
                @if($errors->has('checkout_request'))
                    <div class="invalid-feedback">
                        {{ $errors->first('checkout_request') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkResponse.fields.checkout_request_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.stkResponse.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $stkResponse->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkResponse.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.stkResponse.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="text" name="amount" id="amount" value="{{ old('amount', $stkResponse->amount) }}">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkResponse.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction_date">{{ trans('cruds.stkResponse.fields.transaction_date') }}</label>
                <input class="form-control {{ $errors->has('transaction_date') ? 'is-invalid' : '' }}" type="text" name="transaction_date" id="transaction_date" value="{{ old('transaction_date', $stkResponse->transaction_date) }}">
                @if($errors->has('transaction_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transaction_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stkResponse.fields.transaction_date_helper') }}</span>
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