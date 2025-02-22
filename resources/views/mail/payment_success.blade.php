<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Uniabuja integrated portal">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/Uniabuja.png')}}">
    <title>{{$paymentSuccessful->name}}, Your Payment Made Successful</title>
    {{-- <link rel="stylesheet" href="{{asset('assets/css/payment_successfull.css')}}"> --}}
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.receipt-container {
    background-color: white;
    width: 80%;
    max-width: 600px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
}

.watermark{
    background-image: url('assets/images/logo/Uniabuja.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: 150px;
    opacity: 0.1;
    background-attachment: fixed;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.logo {
    width: 100px;
    height: auto;
    margin-bottom: 10px;
}

h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

.header p {
    margin: 5px 0;
    color: #666;
    font-size: 14px;
}

.content {
    line-height: 1.6;
    color: #333;
}

.content p {
    margin: 5px 0;
}

.content strong {
    color: #000;
}

.photo-container {
    text-align: center;
    margin: 20px 0;
}

.photo {
    width: 100px;
    height: 100px;
    border-radius: 8px;
}

.print-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    margin-top: 20px;
}

.print-button:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <img src="{{asset('assets/images/logo/Uniabuja.png')}}" class="logo" alt="Uniabuja">
            <h1>UNIVERSITY OF ABUJA</h1>
            <p>P.M.B. 117, ABUJA - NIGERIA</p>
            <p>BURSARY DEPARTMENT</p>
        </div>

        <div class="content">
            <p><strong>Received From:</strong></p>
            <p>Reg/Matriculation No: {{$paymentSuccessful->matric_no}}</p>
            <p>Full-Name: {{$paymentSuccessful->name}}</p>
            <p>Faculty/College: {{$paymentSuccessful->faculty}}</p>
            <p>Department: {{$paymentSuccessful->department}}</p>
            <p>Programme: {{$paymentSuccessful->programme}}</p>
            <p>Level: {{$paymentSuccessful->level}}</p>

            <p><strong>Receipt Number:</strong> {{$paymentSuccessful->receipt_no}}</p>
            <p><strong>Reference No:</strong> {{$paymentSuccessful->reference_no}}</p>
            <p><strong>Payment Date:</strong> {{$paymentSuccessful->created_at}}</p>

            <p><strong>Being Payment for:</strong> {{$paymentSuccessful->payment_name}}</p>
            <p><strong>Academic Session:</strong> {{$paymentSuccessful->academic_section}}</p>
            <p><strong>Amount Paid:</strong> {{$paymentSuccessful->amount_paid}}</p>
            <p><strong>Amount in words:</strong> {{$paymentSuccessful->amount_in_words}}</p>

            <div class="photo-container">
                <img src="{{asset('assets/images/students/' . $paymentSuccessful->picture)}}" alt="{{$paymentSuccessful->name}}">
            </div>
        </div>

        {{-- <button class="print-button">Print</button> --}}
    </div>
    {{-- <script>
        document.querySelector('.print-button').addEventListener('click', () => window.print());
    </script> --}}
</body>
</html>