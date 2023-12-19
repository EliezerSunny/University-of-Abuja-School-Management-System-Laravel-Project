@if (session('success'))
        <div class="success">
            {{session('success')}}
            <script>
              setTimeout(function () {
      document.querySelector('.success').style.display = 'none';
    }, 5000);
            </script>
        </div>
        @elseif(session('error'))
        <div class="error">
            {{session('error')}}
            <script>
              setTimeout(function() {
      document.querySelector('.error').style.display = 'none';
    }, 5000);
            </script>
        </div>
        
        @endif





        @php 

   // Below function will convert datetime to time elapsed string
function time_elapsed_string($datetime, $full = false) {
    $time_ago = strtotime($datetime);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60 
      $month = date('j M, Y', $time_ago); 
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "1 minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "1 hour ago";  
     }  
           else  
           {  
       return "$hours hours ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "$month";  
     } 
   }  

}


   
       @endphp