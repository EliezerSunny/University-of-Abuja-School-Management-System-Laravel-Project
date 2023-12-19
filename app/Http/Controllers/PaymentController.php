<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Countdown;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    

    // payment_section Controller End
    public function payment_section(Request $request) {

        if (Auth::guard('web')->check()) {

        $payments = Payment::where('faculty_id', Auth::guard('web')->user()->faculty_id)->get();

        $countDownTime = Countdown::where('id', '=', 1)->first();


        return view('payment_section', compact('payments', 'countDownTime',));
    }


}
// payment_section Controller End


    // payment_section Controller End
    public function payments_section(Request $request) {

        if (Auth::guard('web')->check()) {

            $payments = Payment::where('faculty_id', Auth::guard('web')->user()->faculty_id)->get();

        $selectedPayment = $request->input('payment');


        $payment = '/payment_preview?p=' . $selectedPayment;

        if ($payment) {
            return redirect($payment);
        }

        return view('payment_section', compact('payments', 'payment'));
    }

}
// payment_section Controller End






// payment_preview Controller
public function payment_preview(Request $request, Payment $payment) {

    if (Auth::guard('web')->check()) {

        // $paymentss = Payment::all();

        $payments = $request->query('p');

    $payment = '/payment_preview?p=' . $payments;

    $countDownTime = Countdown::where('id', '=', 1)->first();

    return view('payment_preview', compact('payments', 'payment', 'countDownTime',));
}

}






public function payments_preview(Request $request) {

    if (Auth::guard('web')->check()) {

        

        for ($i=0; $i < 20; $i++) { 
            $token = Str::random(10);
            $tokenss = Str::random(25);
        }

        $tokens = md5($token);

        $time = rand(time(), 100);

        $tokensss = base64_encode($tokens);

    $payments = $request->input('p');

    $payment = '/payment' . '/' . $payments . '?r=' . $token . 't=' . $time . 'ses=' . $tokens . 'sem=' . $tokenss . '&h=' . $tokensss;

    if (isset($payment)) {
        return redirect($payment);
    }

    return view('payment_preview', compact('payments', 'payment', 'token', 'tokens'));
}


}
// payment_preview Controller End





// payment_section Controller End
public function payment(Request $request, $payments) {

    if (Auth::guard('web')->check()) {


    $paymentsss = Payment::where('faculty_id', Auth::guard('web')->user()->faculty_id)->where('payment_url', '=', $payments)->first();

    if ($paymentsss) {

        $amount = $paymentsss->amount;

        $payment_name = $paymentsss->payment_name;

        $countDownTime = Countdown::where('id', '=', 1)->first();

        return view('payment', compact('payments', 'amount', 'payment_name', 'countDownTime',));

    }

        
}

}
// payment_section Controller End



}
