<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Uniabuja integrated portal">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/Uniabuja.png')}}">
    <title>{{$paymentSuccesss->name}} Payment Successful</title>
    <link rel="stylesheet" href="{{asset('assets/css/payment_successfull.css')}}">
</head>
<body>
    <div class="receipt-container">
        
        @include('layouts.messages')

        <div class="header">
            <img src="{{asset('assets/images/logo/Uniabuja.png')}}" class="logo" alt="Uniabuja">
            <h1>UNIVERSITY OF ABUJA</h1>
            <p>P.M.B. 117, ABUJA - NIGERIA</p>
            <p>BURSARY DEPARTMENT</p>
        </div>

        <div class="content">
            <p><strong>Received From:</strong></p>
            <p>Reg/Matriculation No: {{$paymentSuccesss->matric_no}}</p>
            <p>Full-Name: {{$paymentSuccesss->name}}</p>
            <p>Faculty/College: {{$paymentSuccesss->faculty}}</p>
            <p>Department: {{$paymentSuccesss->department}}</p>
            <p>Programme: {{$paymentSuccesss->programme}}</p>
            <p>Level: {{$paymentSuccesss->level}}</p>

            <p><strong>Receipt Number:</strong> {{$paymentSuccesss->receipt_no}}</p>
            <p><strong>Reference No:</strong> {{$paymentSuccesss->reference_no}}</p>
            <p><strong>Payment Date:</strong> {{$paymentSuccesss->created_at}}</p>

            <p><strong>Being Payment for:</strong> {{$paymentSuccesss->payment_name}}</p>
            <p><strong>Academic Session:</strong> {{$paymentSuccesss->academic_section}}</p>
            <p><strong>Amount Paid:</strong> {{$paymentSuccesss->amount_paid}}</p>
            <p><strong>Amount in words:</strong> {{$paymentSuccesss->amount_in_words}}</p>

            <div class="photo-container">
                <img style="width: 100px" src="{{asset('assets/images/students/' . Auth::guard('web')->user()->picture)}}" alt="{{$paymentSuccesss->name}}" title="{{$paymentSuccesss->name}}">
            </div>
        </div>

        <button class="print-button">Print</button>
    </div>
    <script>
        document.querySelector('.print-button').addEventListener('click', () => window.print());
    </script>
</body>
</html>