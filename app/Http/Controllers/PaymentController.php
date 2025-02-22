<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentSuccessful;
use App\Models\Countdown;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentSuccess;
use NumberFormatter;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    

    // payment_section Controller End
    public function payment_section(Request $request) {

        if (Auth::guard('web')->check() && Auth::guard('web')->user()->hasPermissionTo('dashboard_s')) {

        $payments = Payment::where('faculty_id', Auth::guard('web')->user()->faculty_id)->get();

        $countDownTime = Countdown::where('id', '=', 1)->first();

        $paymentSuccess = PaymentSuccessful::where('matric_no', Auth::guard('web')->user()->matric_no)->orwhere('name', '=', Auth::guard('web')->user()->name)->get();

        for ($i=0; $i < 20; $i++) { 
            $tokenss = Str::random(100);
        }

        $time = rand(time(), 100);

        $tokensss = base64_encode($tokenss);

        return view('payment_section', compact('payments', 'time', 'tokensss', 'paymentSuccess', 'countDownTime',));
    }


}
// payment_section Controller End


    // payment_section Controller End
    public function payments_section(Request $request) {

        if (Auth::guard('web')->check() && Auth::guard('web')->user()->hasPermissionTo('dashboard_s')) {

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

    if (Auth::guard('web')->check() && Auth::guard('web')->user()->hasPermissionTo('dashboard_s')) {

        // $paymentss = Payment::all();

        $payments = $request->query('p');

    $payment = '/payment_preview?p=' . $payments;

    $countDownTime = Countdown::where('id', '=', 1)->first();

    $paymentSuccess = PaymentSuccessful::where('matric_no', Auth::guard('web')->user()->matric_no)->orwhere('name', '=', Auth::guard('web')->user()->name)->get();

    for ($i=0; $i < 20; $i++) { 
        $tokenss = Str::random(100);
    }
    
    $time = rand(time(), 100);

    $tokensss = base64_encode($tokenss);

    return view('payment_preview', compact('payments',  'time', 'tokensss', 'paymentSuccess', 'payment', 'countDownTime',));
}

}






public function payments_preview(Request $request) {

    if (Auth::guard('web')->check() && Auth::guard('web')->user()->hasPermissionTo('dashboard_s')) {

        
        
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

    if (Auth::guard('web')->check() && Auth::guard('web')->user()->hasPermissionTo('dashboard_s')) {

        $paymentSuccess = PaymentSuccessful::where('matric_no', Auth::guard('web')->user()->matric_no)->orwhere('name', '=', Auth::guard('web')->user()->name)->get();

    $paymentsss = Payment::where('faculty_id', Auth::guard('web')->user()->faculty_id)->where('payment_url', '=', $payments)->first();

    if ($paymentsss) {

        $amount = $paymentsss->amount;

        $payment_name = $paymentsss->payment_name;

        $countDownTime = Countdown::where('id', '=', 1)->first();

        

        return view('payment', compact('payments', 'paymentSuccess', 'amount', 'payment_name', 'countDownTime',));

    }

        
}

}
// payment_section Controller End










// payment_preview Controller
public function payment_successful_page(Request $request, PaymentSuccessful $paymentSuccesss) {

    if (Auth::guard('web')->check() && Auth::guard('web')->user()->hasPermissionTo('dashboard_s')) {

        $matric = Auth::guard('web')->user()->unique_id;

        $name = Auth::guard('web')->user()->name;


        $paymentSuccess = PaymentSuccessful::where('matric_no', $matric)->where('name', $name)->where('id', $paymentSuccesss->id)->first();
        
        
        if (! $paymentSuccess) {
            return redirect('dashboard')->with('error', 'Unauthorized Access!!!');
        }
    return view('payment_successful', compact('paymentSuccess', 'paymentSuccesss',));
}

}






// Payment Successful Controller



// public function payment_successful(Request $request, PaymentSuccessful $paymentSuccesss) {

//     if (Auth::guard('web')->check()) {

//         if (empty($request['name']) || empty($request['email']) || empty($request['faculty']) || empty($request['department']) || empty($request['matric_no']) || empty($request['programme']) || empty($request['level']) || empty($request['academic_section']) || empty($request['payment_name']) || empty($request['amount_paid'])) {
//             return back()->with('error', 'Input can\'t be empty!');
//         }


//     $requests = $request->validate([
//         'matric_no' => ['required', 'min:1', 'max:200'],
//         'name' => ['required', 'min:1', 'max:200'],
//         'email' => ['required', 'min:1', 'max:200'],
//         'faculty' => ['required', 'min:1', 'max:200'],
//         'department' => ['required', 'min:1', 'max:200'],
//         'programme' => ['required', 'min:1', 'max:200'],
//         'level' => ['required', 'min:1', 'max:200'],

//         'payment_name' => ['required', 'min:1', 'max:200'],
//         'academic_section' => ['required', 'min:1', 'max:200'],
//         'amount_paid' => ['required', 'min:1', 'max:200'],
//     ]);

// $amount_in_words = $this->convertNumberToWords($request->amount_paid);

//     // Generate receipt number
//     $year = date('Y');
//     $month = date('m');
//     $day = date('d');
//     $rand_time = rand(100000, 999999);

//     $receipt_no = $year . $month . $day . $rand_time;

//     // $reference = mt_rand(1, 1000000000);


//     $payment = PaymentSuccessful::create([
//         'matric_no' => $request->matric_no,
//         'name' => $request->name,
//         'email' => $request->email,
//         'faculty' => $request->faculty,
//         'department' => $request->department,
//         'programme' => $request->programme,
//         'level' => $request->level,
//         'payment_name' => $request->payment_name,
//         'academic_section' => $request->academic_section,
//         'amount_paid' => $request->amount_paid,
//         'amount_in_words' => $amount_in_words,
//         'receipt_no' => $receipt_no,
//         'reference_no' => $request->reference,
//     ]);
    
    
//     // Mail::to($paymentSuccessful['email'])->send(new PaymentSuccess($paymentSuccessful));


//     return back()->with('success', 'Payment Successfully Made!');
//      return response()->json(['success' => true, 'message' => 'Payment saved successfully!']);
// }

// }





// Private function for number-to-words conversion
private function convertNumberToWords($number) 
{
    $words = [
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 
        6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten',
        11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen',
        15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty', 40 => 'forty',
        50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
    ];

    if ($number < 1000000) {
        return ucfirst($words[floor($number / 1000)] . ' Thousand Naira Only' . ($number % 1000 ? ' and ' . $this->convertNumberToWords($number % 1000) : ''));
    } elseif ($number < 1000000000) {
        return ucfirst($words[floor($number / 10000)] . ' Million Naira Only' . ($number % 10000 ? ' and ' . $this->convertNumberToWords($number % 10000) : ''));
    } else {
        return "Number too large to convert";
    }
}





public function payment_successful(Request $request)
{
    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'You must be logged in to proceed.'], 401);
    }

    $validatedData = $request->validate([
        'matric_no' => 'required|string|max:200',
        'name' => 'required|string|max:200',
        'email' => 'required|email|max:200',
        'faculty' => 'required|string|max:200',
        'department' => 'required|string|max:200',
        'programme' => 'required|string|max:200',
        'level' => 'required|string|max:200',
        'payment_name' => 'required|string|max:200',
        'academic_section' => 'required|string|max:200',
        'amount_paid' => 'required|numeric|min:1',
        'reference_no' => 'required|string|max:200|unique:payment_successfuls,reference_no',
    ]);

    $amount_in_words = $this->convertNumberToWords($request->amount_paid);

    // Generate receipt number
    $year = date('Y');
    $month = date('m');
    $day = date('d');
    $rand_time = rand(100000, 999999);

    $receipt_no = $year . $month . $day . $rand_time;

    $validatedData['receipt_no'] = $receipt_no;
    $validatedData['amount_in_words'] = $amount_in_words;

    // Store payment in the database
    $paymentSuccessful = PaymentSuccessful::create($validatedData);

    // Send Payment Confirmation Email
    Mail::to($paymentSuccessful['email'])->send(new PaymentSuccess($paymentSuccessful));


    return response()->json(['success' => true, 'message' => 'Payment saved successfully!']);
}





}
