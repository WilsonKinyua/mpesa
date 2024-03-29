<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\StkRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payments = Payment::all();

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payments.create');
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());

        $phone = $request->input("phone");
        $amount = 1;
        $BusinessShortCode = '174379';
        $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType = "CustomerPayBillOnline";
        $PartyA = $phone;
        $PartyB = $BusinessShortCode;
        $CallBackURL = 'https://0c2adb76560c.ngrok.io/api/test';
        $AccountReference = 'ACC1';
        $TransactionDesc = 'test 1';
        $Remarks = '';

        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $stkPushSimulation=$mpesa->STKPushSimulation(
                                                            $BusinessShortCode,
                                                            $LipaNaMpesaPasskey, $TransactionType, $amount, $PartyA, $PartyB,
                                                            $phone, $CallBackURL, $AccountReference,
                                                            $TransactionDesc, $Remarks);

        $stkPushSimulation = json_decode($stkPushSimulation);

        StkRequest::create([
            'request' => $stkPushSimulation->CheckoutRequestID,
            'amount' => $amount,
            'msisdn' => $phone,
        ]);

        return json_encode($stkPushSimulation);

        return redirect()->route('admin.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payments.edit', compact('payment'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
