@extends('layouts.head')






    @section('add_course_reg')




        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <!-- Main Board-->
              <div>

                <div class="flex justify-between flex-wrap items-center mb-3">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Course Registration</h4>
                </div>

                @include('layouts.messages')


                <!-- Main Profile-->
                <div class="space-y-5 profile-page">

                  <div id="demo1" style="text-align: center; color: #de4848;"></div>


                  {{-- Countdown for Course Reg--}}

                  <div class="all">

                    <div class="text" style="text-align: center">
                        
                        
                         
                          <p id="demo"></p>
                        </div>
                  
                        <div class="exit">

                    <div class="container">

                  
                      <div class="container-segment">
                        
                        <div class="segment">
                          {{-- <div class="flip-card" data-days-hundreds>
                            <div class="top">0</div>
                            <div class="bottom">0</div>
                          </div> --}}
                          <div class="flip-card" data-days-tens>
                            <div class="top">2</div>
                            <div class="bottom">2</div>
                          </div>
                          <div class="flip-card" data-days-ones>
                            <div class="top">4</div>
                            <div class="bottom">4</div>
                          </div>
                        </div>
                  
                        <div class="segment-title">Days</div>
                      </div>
                  
                  
                      <div class="container-segment">
                        
                        <div class="segment">
                          <div class="flip-card" data-hours-tens>
                            <div class="top">0</div>
                            <div class="bottom">0</div>
                          </div>
                          <div class="flip-card" data-hours-ones>
                            <div class="top">0</div>
                            <div class="bottom">0</div>
                          </div>
                        </div>
                  
                        <div class="segment-title">Hours</div>
                      </div>
                  
                  
                      <div class="container-segment">
                        
                        <div class="segment">
                          <div class="flip-card" data-minutes-tens>
                            <div class="top">0</div>
                            <div class="bottom">0</div>
                          </div>
                          <div class="flip-card" data-minutes-ones>
                            <div class="top">0</div>
                            <div class="bottom">0</div>
                          </div>
                        </div>
                  
                        <div class="segment-title">Minutes</div>
                      </div>
                  
                  
                      <div class="container-segment">
                        
                        <div class="segment">
                          <div class="flip-card" data-seconds-tens>
                            <div class="top">0</div>
                            <div class="bottom">0</div>
                          </div>
                          <div class="flip-card" data-seconds-ones>
                            <div class="top">0</div>
                            <div class="bottom">0</div>
                          </div>
                        </div>
                  
                        <div class="segment-title">Seconds</div>
                      </div>
                  
                  
                    </div>

                  </div>


                  </div>

                  {{-- Countdown for Course Reg end--}}
                  



                    <!-- profile info-500 -->
  
                      
                          
                        {{-- First Semester--}}
                        <div class="course_registeration">
                        <div class="lg:col-span-12 col-span-12">
                            <div class="card h-full">
                              <header class="card-header">
                                <h4 class="card-title">1<sup>st</sup> Semester</h4>
                                <h6 style="color: #c5221f; font-size:12px; font-style: italic;"><b>NOTE:</b> {{Auth::guard('web')->user()->faculty->unit}}!</h6>
                              </header>
      
                              <div class="card-body p-6">
                                
                                <div class="card">
                                  <div class="card-body px-6 pb-6">
                                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                      <span class=" col-span-8  hidden"></span>
                                      <span class="  col-span-4 hidden"></span>
                                      <div class="inline-block min-w-full align-middle">
                                  
                                  <form {{--class="space-y-4"--}} action="{{route('add_course_reg.post')}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                      @csrf


                                      <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                          <thead class=" border-t border-slate-100 dark:border-slate-800">
                                            <tr>
              
                                              <th scope="col" class=" table-th ">
                                                #
                                              </th>

                                              <th scope="col" class=" table-th ">
                                                Select Course
                                              </th>
              
                                              <th scope="col" class=" table-th ">
                                                Course code
                                              </th>
              
                                              <th scope="col" class=" table-th ">
                                                Course title
                                              </th>
              
                                              <th scope="col" class=" table-th ">
                                                Course unit
                                              </th>
    
                                              <th scope="col" class=" table-th ">
                                                Course status
                                              </th>
              
                                            </tr>
                                          </thead>
    
                                          @if (count($fscourse) === 0)
                                      <td>
                                         <th colspan="5">
                                            <h5 style="color:red; text-align: center;">No record found</h5>
                                         </td>
                                      </tr>
                                      @else
    
                                          @foreach ($fscourse as $courses)
    
                                          <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
              
                                            <tr>
                                              <td class="table-td">{{$loop->iteration}}</td>
                                              <td class="table-td">

                                                {{-- <div class="checkbox-area secondary-checkbox mr-2 sm:mr-4 mt-2">
                                                    <label class="inline-flex items-center cursor-pointer">
                                                      <!-- <input type="hidden" class="hidden" name="checkbox" value="secondary" checked="checked">  -->
                                                      <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                                  <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>
                                                      <span class="text-secondary-500 dark:text-slate-400 text-sm leading-6 capitalize">secondary</span>
                                                    </label>
                                                  </div> --}}
                                                  
                                                <input id="course_id_{{$courses->id}}" type="checkbox" name="course_id[]" value="{{$courses->id}}" class="checkbox" onchange="toggleFields({{$courses->id}})">
                                     
                              
                                                
                                                <input  id="faculty_id_{{$courses->id}}" type="hidden" name="faculty_id[{{$courses->id}}]" value="{{$courses->faculty_id}}" disabled="disabled">
                                                <input  id="department_id_{{$courses->id}}" type="hidden" name="department_id[{{$courses->id}}]" value="{{$courses->department_id}}" disabled="disabled" required="required">
                                                <input  id="level_id_{{$courses->id}}" type="hidden" name="level_id[{{$courses->id}}]" value="{{$courses->level_id}}" disabled="disabled" required="required">
                                                <input  id="section_id_{{$courses->id}}" type="hidden" name="section_id[{{$courses->id}}]" value="{{$courses->section_id}}" disabled="disabled" required="required">
                                                <input  id="semester_id_{{$courses->id}}" type="hidden" name="semester_id[{{$courses->id}}]" value="{{$courses->semester_id}}" disabled="disabled" required="required">
                                                
                                                
                                                
                                                </td>
                                              <td class="table-td ">{{$courses->course_code}}</td>
                                              <td class="table-td ">{{$courses->course_title}}</td>
                                              <td class="table-td "> <input type="hidden" id="course_unit_{{$courses->id}}" name="course_unit[{{$courses->id}}]" value="{{$courses->course_unit}}" disabled="disabled"> {{$courses->course_unit}}</td>
                                              <td class="table-td ">{{$courses->course_status}}</td>
                                            </tr>
              
                                            {{--STOP--}}
              
                                          </tbody>
    
                                          @endforeach
                                          <script>
    function toggleFields(courseId) {
        const isChecked = document.getElementById('course_id_' + courseId).checked;
        
        // Enable or disable related hidden fields based on checkbox status
        document.getElementById('faculty_id_' + courseId).disabled = !isChecked;
        document.getElementById('department_id_' + courseId).disabled = !isChecked;
        document.getElementById('level_id_' + courseId).disabled = !isChecked;
        document.getElementById('section_id_' + courseId).disabled = !isChecked;
        document.getElementById('semester_id_' + courseId).disabled = !isChecked;
        document.getElementById('course_unit_' + courseId).disabled = !isChecked;
    }
</script>
                                          @endif

    
                                        </table>
                                      </div>

                                      
                                          <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                      bg-black" title="Add" onclick="return confirm('Are you sure you want to ADD?')">Submit</button>
                                          
                                  </form>
                                  <br>
      
                                </div>
                              </div>
                            </div>
                        </div>
                              </div>
      
                            </div>
                          </div>

                          {{-- First Semester end--}}


                          <br>



                          {{-- Second Semester --}}
                          <div class="lg:col-span-12 col-span-12">
                            <div class="card h-full">
                              <header class="card-header">
                                <h4 class="card-title">2<sup>nd</sup> Semester</h4>
                                <h6 style="color: #c5221f; font-size:12px; font-style: italic;"><b>NOTE:</b> {{Auth::guard('web')->user()->faculty->unit}}!</h6>
                              </header>
      
                              <div class="card-body p-6">
                                
                                <div class="card">
                                  <div class="card-body px-6 pb-6">
                                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                      <span class=" col-span-8  hidden"></span>
                                      <span class="  col-span-4 hidden"></span>
                                      <div class="inline-block min-w-full align-middle">
                                  
                                  <form {{--class="space-y-4"--}} action="{{route('add_course_reg.post')}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                      @csrf


                                      
                                      <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                          <thead class=" border-t border-slate-100 dark:border-slate-800">
                                            <tr>
              
                                              <th scope="col" class=" table-th ">
                                                #
                                              </th>

                                              <th scope="col" class=" table-th ">
                                                Select Course
                                              </th>
              
                                              <th scope="col" class=" table-th ">
                                                Course code
                                              </th>
              
                                              <th scope="col" class=" table-th ">
                                                Course title
                                              </th>
              
                                              <th scope="col" class=" table-th ">
                                                Course unit
                                              </th>
    
                                              <th scope="col" class=" table-th ">
                                                Course status
                                              </th>
              
                                            </tr>
                                          </thead>
    
                                          @if (count($sscourse) === 0)
                                      <td>
                                         <th colspan="5">
                                            <h5 style="color:red; text-align: center;">No record found</h5>
                                         </td>
                                      </tr>
                                      @else
    
                                          @foreach ($sscourse as $courses)
    
                                          <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
              
                                            <tr>
                                              <td class="table-td">{{$loop->iteration}}</td>
                                              <td class="table-td">

                                                {{-- <div class="checkbox-area secondary-checkbox mr-2 sm:mr-4 mt-2">
                                                    <label class="inline-flex items-center cursor-pointer">
                                                      <!-- <input type="hidden" class="hidden" name="checkbox" value="secondary" checked="checked">  -->
                                                      <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                                  <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>
                                                      <span class="text-secondary-500 dark:text-slate-400 text-sm leading-6 capitalize">secondary</span>
                                                    </label>
                                                  </div> --}}
                                                  
                                                <input id="course_id_{{$courses->id}}" type="checkbox" name="course_id[]" value="{{$courses->id}}" class="checkbox" onchange="toggleFields({{$courses->id}})">
                                     
                              
                                                
                                                <input  id="faculty_id_{{$courses->id}}" type="hidden" name="faculty_id[{{$courses->id}}]" value="{{$courses->faculty_id}}" disabled="disabled">
                                                <input  id="department_id_{{$courses->id}}" type="hidden" name="department_id[{{$courses->id}}]" value="{{$courses->department_id}}" disabled="disabled" required="required">
                                                <input  id="level_id_{{$courses->id}}" type="hidden" name="level_id[{{$courses->id}}]" value="{{$courses->level_id}}" disabled="disabled" required="required">
                                                <input  id="section_id_{{$courses->id}}" type="hidden" name="section_id[{{$courses->id}}]" value="{{$courses->section_id}}" disabled="disabled" required="required">
                                                <input  id="semester_id_{{$courses->id}}" type="hidden" name="semester_id[{{$courses->id}}]" value="{{$courses->semester_id}}" disabled="disabled" required="required">
                                                
                                                
                                                
                                                </td>
                                              <td class="table-td ">{{$courses->course_code}}</td>
                                              <td class="table-td ">{{$courses->course_title}}</td>
                                              <td class="table-td "> <input type="hidden" id="course_unit_{{$courses->id}}" name="course_unit[{{$courses->id}}]" value="{{$courses->course_unit}}" disabled="disabled"> {{$courses->course_unit}}</td>
                                              <td class="table-td ">{{$courses->course_status}}</td>
                                            </tr>
              
                                            {{--STOP--}}
              
                                          </tbody>
    
                                          @endforeach
                                          <script>
    function toggleFields(courseId) {
        const isChecked = document.getElementById('course_id_' + courseId).checked;
        
        // Enable or disable related hidden fields based on checkbox status
        document.getElementById('faculty_id_' + courseId).disabled = !isChecked;
        document.getElementById('department_id_' + courseId).disabled = !isChecked;
        document.getElementById('level_id_' + courseId).disabled = !isChecked;
        document.getElementById('section_id_' + courseId).disabled = !isChecked;
        document.getElementById('semester_id_' + courseId).disabled = !isChecked;
        document.getElementById('course_unit_' + courseId).disabled = !isChecked;
    }
</script>
                                          @endif
    
                                        </table>
                                      </div>
                                      

                                      
                                          <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                      bg-black" title="Add" onclick="return confirm('Are you sure you want to ADD?')">Submit</button>
                                          
                                  </form>
                                  <br>
      
                                </div>
                              </div>
                            </div>
                        </div>
                              </div>
      
                            </div>
                          </div>

                        </div>
                          {{-- Second Semester end--}}


                          <br>
      
      
                          {{--Course--}}
                          <div class="lg:col-span-12 col-span-12" id="registered_courses">

                            <div class="flex justify-between flex-wrap items-center mb-3">
                              <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Registered Courses</h4>
                            </div>

                            <div class="card h-full">
                              <header class="card-header">
                                <h4 class="card-title">1<sup>st</sup> Semester</h4>

                              </header>
      
                              <div class="card-body p-6">
                                
                                <div class="card">
                                  <div class="card-body px-6 pb-6">
                                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                      <span class=" col-span-8  hidden"></span>
                                      <span class="  col-span-4 hidden"></span>
                                      <div class="inline-block min-w-full align-middle">

                                        

                                        <div class="overflow-hidden">
                                          <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                            <thead class=" border-t border-slate-100 dark:border-slate-800">
                                              <tr>
                
                                                <th scope="col" class=" table-th ">
                                                  Id
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                  Course code
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Course title
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Course unit
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Course status
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Faculty
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Department
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Level
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Semester
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Section
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Added Date
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Status
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                  Action
                                                </th>
                
                                              </tr>
                                            </thead>

                                                @if (count($fregcourse) === 0)
                                        <td>
                                            <th colspan="9">
                                                <h5 style="color:red; text-align: center;">No Registered Course</h5>
                                            </td>
                                        </tr>
                                        @else
      
                                            @foreach ($fregcourse as $courses)
                                                
                                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                
                                              <tr>
                                                <td class="table-td">{{$loop->iteration}}</td>

                                                <td class="table-td ">{{$courses->course->course_code}}</td>
                                                <td class="table-td">
                                                  <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$courses->course->course_title}}</span>
                                                </td>
                                                <td class="table-td ">{{$courses->course_unit}}</td>
                                                <td class="table-td ">{{$courses->course->course_status}}</td>
                                                <td class="table-td ">
                                                  <div>
                                                    {{$courses->faculty->faculty_name}}
                                                  </div>
                                                </td>
                                                <td class="table-td ">{{$courses->department->department_name}}</td>
                                                <td class="table-td ">{{$courses->level->level}}</td>
                                                <td class="table-td ">{{$courses->semester->semester}}</td>
                                                <td class="table-td ">{{$courses->section->section}}</td>
                                                <td class="table-td ">{{$courses->created_at->diffForHumans()}}</td>
                                                <td class="table-td ">
                
                                                  <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                              bg-success-500">
                                                    {{$courses->status}}
                                                  </div>
                
                                                </td>


                                                <td class="btnrt table-td ">
                                                  <div class="flex space-x-3 rtl:space-x-reverse">
                                                    {{-- <button class="action-btn" type="button">
                                                      <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                    </button> --}}
                                                    
                                                    <form action="/delete_course_reg/{{$courses->id}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                  <button class="action-btn" title="Delete" onclick="return confirm('Are you sure you want to DROP COURSE?')">
                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                  </button>
                                                  </form>

                                                  </div>
                                                </td>

                                              </tr>
                
                                              {{--STOP--}}
                
                                            </tbody>
      
                                            @endforeach
                                            @endif

                                            @if ($fcourse_unit < 15)
                                            <tr>
                                              <th scope="col" colspan="9" class=" table-th ">
                                              Total course unit = <span style="color: #c5221f"><b>{{$fcourse_unit}}</b></span>
                                            </th>
                                            </tr>
                                            @else
                                            <tr>
                                              <th scope="col" colspan="9" class=" table-th ">
                                              Total course unit = <b>{{$fcourse_unit}}</b>
                                            </th>
                                            </tr>
                                            @endif
      
                                          </table>
                                        </div>
                                        
                                        {{$coursereg->links()}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
      
                              </div>
      
                            </div>
                          </div>
                          {{--Course End--}}




                          {{--Course--}}
                          <div class="lg:col-span-12 col-span-12">

                            <div class="card h-full">
                              <header class="card-header">
                                <h4 class="card-title">2<sup>nd</sup> Semester</h4>

                                
                              </header>
      
                              <div class="card-body p-6">
                                
                                <div class="card">
                                  <div class="card-body px-6 pb-6">
                                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                      <span class=" col-span-8  hidden"></span>
                                      <span class="  col-span-4 hidden"></span>
                                      <div class="inline-block min-w-full align-middle">
                                        <div class="overflow-hidden">
                                          <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                            <thead class=" border-t border-slate-100 dark:border-slate-800">
                                              <tr>
                
                                                <th scope="col" class=" table-th ">
                                                  Id
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Course code
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Course title
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Course unit
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Course status
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Faculty
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Department
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Level
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Semester
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Section
                                                </th>
      
                                                <th scope="col" class=" table-th ">
                                                  Added Date
                                                </th>
                
                                                <th scope="col" class=" table-th ">
                                                  Status
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                  Action
                                                </th>
                
                                              </tr>
                                            </thead>

                                                @if (count($sregcourse) === 0)
                                        <td>
                                            <th colspan="9">
                                                <h5 style="color:red; text-align: center;">No Registered Course</h5>
                                            </td>
                                        </tr>
                                        @else
      
                                            @foreach ($sregcourse as $courses)
                                                
                                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                
                                              <tr>
                                                <td class="table-td">{{$loop->iteration}}</td>
                                                <td class="table-td ">{{$courses->course->course_code}}</td>
                                                <td class="table-td">
                                                  <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$courses->course->course_title}}</span>
                                                </td>
                                                <td class="table-td ">{{$courses->course->course_unit}}</td>
                                                <td class="table-td ">{{$courses->course->course_status}}</td>
                                                <td class="table-td ">
                                                  <div>
                                                    {{$courses->faculty->faculty_name}}
                                                  </div>
                                                </td>
                                                <td class="table-td ">{{$courses->department->department_name}}</td>
                                                <td class="table-td ">{{$courses->level->level}}</td>
                                                <td class="table-td ">{{$courses->semester->semester}}</td>
                                                <td class="table-td ">{{$courses->section->secfion}}</td>
                                                <td class="table-td ">{{$courses->created_at->diffForHumans()}}</td>
                                                <td class="table-td ">
                
                                                  <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                              bg-success-500">
                                                    {{$courses->status}}
                                                  </div>
                                                  
                
                                                </td>



                                                <td class="btnrt table-td ">
                                                  <div class="flex space-x-3 rtl:space-x-reverse">
                                                    {{-- <button class="action-btn" type="button">
                                                      <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                    </button> --}}
                                                    
                                                    <form action="/delete_course_reg/{{$courses->id}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                  <button class="action-btn" title="Delete" onclick="return confirm('Are you sure you want to DROP COURSE?')">
                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                  </button>
                                                  </form>

                                                  </div>
                                                </td>
                                                
                                              </tr>
                
                                              {{--STOP--}}
                
                                            </tbody>
      
                                            @endforeach
                                            @endif

                                            @if ($scourse_unit < 15)
                                            <tr>
                                              <th scope="col" colspan="9" class=" table-th ">
                                              Total course unit = <span style="color: #c5221f"><b>{{$scourse_unit}}</b></span>
                                            </th>
                                            </tr>
                                            @else
                                            <tr>
                                              <th scope="col" colspan="9" class=" table-th ">
                                              Total course unit = <b>{{$scourse_unit}}</b>
                                            </th>
                                            </tr>
                                            @endif
      
                                          </table>
                                        </div>
                                        {{$coursereg->links()}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
      
                              </div>
      
                            </div>
                          </div>
                          {{--Course End--}}




                <!-- Main Profile End-->

              </div>
              <!-- Main Board End-->

            </div>
          </div>
        </div>
        <!-- END: Main_content -->

      </div>
      
      

      @endsection
