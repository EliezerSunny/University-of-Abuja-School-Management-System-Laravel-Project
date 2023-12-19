<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Uniabuja integrated portal">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/Uniabuja.png')}}">
    <title>Print Clearance Letter || Uniabuja Portal</title>
    <link rel="stylesheet" href="{{asset('assets/css/clearance_letter.css')}}">
</head>
<body>


    
    <div class="page">

        <div id="print_letter">

           <div class="heading">
              
           <h3> UNIVERSITY OF ABUJA</h3>
           <img src="{{asset('assets/images/logo/Uniabuja.png')}}" alt="Uniabuja">
           <h4>Student Affairs Division</h4>
           <p>(Office of Dean)</p>
           <p><i>STUDENT CLEARANCE LETTER</i></p>
        </div>

        <br>
        <br>


        {{-- @while ($clearclearance = mysqli_fetch_array($clearedclearance)) --}}

                       <div class="main-profi">

                                
                            

                          <div class="details">
                          <p><b>Reg/Matric No. :</b>   <span style="margin-left: 8px">{{Auth::guard('web')->user()->unique_id}}</span></p>

                          <p><b>Full-Name :</b>        <span style="margin-left: 40px">{{Auth::guard('web')->user()->name}}</span></p>

                          <p><b>Faculty :</b>          <span style="margin-left: 60px">{{Auth::guard('web')->user()->faculty->faculty_name}}</span></p>

                          <p><b>Department :</b>       <span style="margin-left: 30px">{{Auth::guard('web')->user()->department->department_name}}</span></p>

                          <p><b>Programme :</b>        <span style="margin-left: 32px">{{Auth::guard('web')->user()->faculty->faculty_award}} {{Auth::guard('web')->user()->department->department_name}}</span></p>

                          <p><b>Level :</b>            <span style="margin-left: 74px">Graduate</span></p>
                       </div> 

                       <div class="main-profi-img">
                             <img src="{{asset('assets/images/students/' . Auth::guard('web')->user()->picture)}}" alt="{{Auth::guard('web')->user()->name}}">
                          </div>

                          
                       </div>
                       {{-- @endwhile --}}
                    


                    <div class="clerify">
                       <p>This is to certify that above details has been cleared by the following Units :</p>

                              <ul class="list">
                                   <li>Bursary </li>
                                   <li>Dean </li>
                                   <li>Sports </li>
                                   <li>Student Affairs</li>
                                   <li>Department </li>
                                   <li>Hostel </li>
                                   <li>Library </li>
                                 </ul>

                                 <div class="main-profi-img2">
                             <img src="{{asset('assets/images/students/cleared.png')}}" alt="cleared">
                          </div>

                    </div>

                    <div class="signature">
                       <p>Student Signature : .................................  Date : {{now()}}</p>
                    </div>


                    <button class="print" onclick="window.print();return false;">Print</button>

        </div>



       </div>



</body>
</html>