<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Your password has been changed || {{ config('app.name') }}</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #28A745;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            padding: 20px;
            color: #333333;
        }
        .content p {
            line-height: 1.6;
        }
        .content img {
            max-width: 100%;
            border-radius: 5px;
            margin: 20px 0;
        }
        .content a.button {
            display: inline-block;
            padding: 5px 10px;
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777777;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>{{ config('app.name') }}</h1>
        </div>
  
        
        <div class="content">
            
           <div style="text-align: center"> 
            <img src="{{asset('https://portal.uniabuja.edu.ng/assets/images/banner.png')}}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" 
           style="width: 120px;"
            >
            </div>
            
            <p>Hi {{ $admin->name }},</p>
            
            <h3>Your password has been changed successfully</h3>            
            
            <p style="white-space: pre-wrap;">Your password has been successfully reset in {{ config('app.name') }}. Based on this change, please be aware that additional changes to your account may be restricted temporarily. </p>
            
            <p> If you did not make this change and believe your {{ config('app.name') }} account has been compromised, please<a href="https://portal.uniabuja.edu.ng/"> Contact Us. </a> </p>
            
            <p>Best regards,</p>
            
            <p>{{ config('app.name') }}</p>
            
            
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a></p>
        </div>
    </div>
</body>
</html>