@extends('layouts.admin_head')






    @section('upload_result')
        


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Upload Result</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">


                    {{-- Student details --}}


                    {{-- <span style="color:white;">Student Information:</span> --}}
                    <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0
                  space-y-6 justify-between items-end relative z-[1]">
                    <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>
                    <div class="profile-box flex-none md:text-start text-center">
                      <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                        <div class="flex-none">
                          <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4
                                  ring-slate-100 relative">
                            <img src="{{asset('assets/images/students/' . $id->picture)}}" alt="{{$id->name}}" title="{{$id->name}}" class="w-full h-full object-cover rounded-full">
                            {{-- <a href="{{('/change_picture')}}" class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center
                                      justify-center md:top-[140px] top-[100px]">
                              <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                            </a> --}}
                          </div>
                        </div>
                        <div class="flex-1">
                          <div class="text-xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                            {{$id->name}}
                          </div>
                          <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                            {{$id->unique_id}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end profile box -->
                    <div class="profile-info-500 md:flex md:text-start text-left flex-1 max-w-[516px] md:space-y-0 space-y-4">
                      
                      {{-- <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Level: 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">400</span>
                        </div>
                        <div class="text-sm text-slate-600 font-light dark:text-slate-400">
                          400
                        </div>
                      </div> --}}
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Faculty : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{$id->faculty->faculty_name}}
                          </span>
                        </div>
                        {{-- <div class="text-sm text-slate-600 font-light dark:text-slate-400">
                          Science
                        </div> --}}
                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Department : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{$id->department->department_name}}
                          </span>
                        </div>
                        {{-- <div class="text-sm text-slate-600 font-light dark:text-slate-400">
                          Computer Science (B. Sc.)
                        </div> --}}
                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Programme : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{$id->faculty->faculty_award}} {{$id->department->department_name}}
                          </span>
                        </div>
                        {{-- <div class="text-sm text-slate-600 font-light dark:text-slate-400">
                          Computer Science (B. Sc.)
                        </div> --}}
                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Current Level : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{$id->level->level}}
                          </span>
                        </div>
                        {{-- <div class="text-sm text-slate-600 font-light dark:text-slate-400">
                          400
                        </div> --}}
                      </div>
                      <!-- end single -->

                    </div>
                    <!-- profile info-500 -->
                  </div>


                      {{-- Student details End--}}





                      <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">





                    {{-- First semester --}}


                    {{--Upload Result--}}
                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title"> 1<sup>st</sup> Semester {{--$fscourse_reg->session--}}</h4>
  
                            <form action="{{url('/lecturer/admin/search_student_result')}}" method="GET">
                              <div class="relative">
                                <input id="search_course" type="text" name="q" class="form-control" placeholder="Search..." required="required">
                                  <button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full text-xl dark:text-slate-300 flex items-center justify-center">
                                    <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                                  </button>
                                </div>
                          </form>
                          </header>
  
                          <div class="card-body p-6">
                            
                            <div class="card">
                              <div class="card-body px-6 pb-6">
                                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                  <span class=" col-span-8  hidden"></span>
                                  <span class="  col-span-4 hidden"></span>
                                  <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden">

                                        <form class="space-y-4" action="/lecturer/admin/upload_result/{{$id->id}}&{{$id->name}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                            @csrf

                                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                                          <tr>
            
                                            <th scope="col" class=" table-th ">
                                              Id
                                            </th>

                                            <th scope="col" class=" table-th ">
                                              Select Course
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Code
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Title
                                            </th>
  
                                            <th scope="col" class=" table-th ">
                                              Unit
                                            </th>
  
                                            <th scope="col" class=" table-th ">
                                                Status
                                              </th>
  
                                            <th scope="col" class=" table-th ">
                                              Score
                                            </th>

                                            {{-- <th scope="col" class=" table-th ">
                                                Grade
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              GP
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              WGP
                                            </th> --}}
            
                                          </tr>
                                        </thead>
  
                                        @if (count($fscourse_reg) === 0)
                                  <td>
                                     <th colspan="9">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else
  
                                        @foreach ($fscourse_reg as $course)
                                            
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            
                                          <tr>
                                            <td class="table-td">{{$loop->iteration}}</td>
                                           
                                            <td class="table-td "> 
                           <input checked id="course_reg_id_{{$course->id}}" type="checkbox" name="course_reg_id[]" value="{{$course->id}}" class="checkbox" onchange="toggleFields({{$course->id}})">
                                     
                              
                                                
                                                <input  id="faculty_id_{{$course->id}}" type="hidden" name="faculty_id[{{$course->id}}]" value="{{$course->faculty->id}}" disabled="disabled" required="required" >
                                                <input  id="department_id_{{$course->id}}" type="hidden" name="department_id[{{$course->id}}]" value="{{$course->department->id}}" disabled="disabled" required="required">
                                                <input  id="level_id_{{$course->id}}" type="hidden" name="level_id[{{$course->id}}]" value="{{$course->level->id}}" disabled="disabled" required="required">
                                                <input  id="section_id_{{$course->id}}" type="hidden" name="section_id[{{$course->id}}]" value="{{$course->section->id}}" disabled="disabled" required="required">
                                                <input  id="semester_id_{{$course->id}}" type="hidden" name="semester_id[{{$course->id}}]" value="{{$course->semester->id}}" disabled="disabled" required="required">   
                                                
                                                <input type="hidden" id="user_id_{{$course->id}}" name="user_id[{{$course->id}}]" value="{{$course->user->id}}" disabled="disabled" required="required">     
                                                
                          {{-- <input type="hidden" name="lecturer_id[{{$courses->id}}]" id="lecturer_id_{{$courses->id}}" value="{{$course->lecturer->id}}" disabled="disabled" required="required"> --}}                                  
                                                 
                                                 </td>
                                     
                                            
                                            <td class="table-td ">
                                                {{$course->course->course_code}}
                                            </td>
                                            <td class="table-td ">{{$course->course->course_title}}</td>
                                            
                                            
                                            <td class="table-td "> 
                      
                                                
                                                <input type="hidden" id="course_unit_{{$course->id}}" name="course_unit[{{$course->id}}]" value="{{$course->course->course_unit}}" disabled="disabled" {{$course->course->course_unit}}</td>
                                            <td class="table-td ">{{$course->course->course_status}}</td>
                                            <td class="table-td ">
                                                      <input id="final_score_{{$course->id}}" type="text" name="final_score[{{$course->id}}]" class="form-control" placeholder="Final Score">
                                                </td>

                                          </tr>
            
                                          {{--STOP--}}
            
                                        </tbody>
  
                                        @endforeach
                                        <script>
    function toggleFields(courseRegId) {
        const isChecked = document.getElementById('course_reg_id_' + courseRegId).checked;

        // Enable or disable related hidden fields based on checkbox status
        document.getElementById('faculty_id_' + courseRegId).disabled = !isChecked;
        document.getElementById('department_id_' + courseRegId).disabled = !isChecked;
        document.getElementById('level_id_' + courseRegId).disabled = !isChecked;
        document.getElementById('section_id_' + courseRegId).disabled = !isChecked;
        document.getElementById('semester_id_' + courseRegId).disabled = !isChecked;
        document.getElementById('user_id_' + courseRegId).disabled = !isChecked;
        document.getElementById('course_unit_' + courseRegId).disabled = !isChecked;
        document.getElementById('final_score_' + courseRegId).disabled = !isChecked;
    }
</script>
                                        @endif
  
                                      </table>

                                      <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" onclick="return confirm('Are you sure you wanna UPLOAD?')">Upload</button>
                                    
                                        </form>

                                    </div>
                                    {{-- {{$result->links()}} --}}
                                  </div>
                                </div>
                              </div>
                            </div>
  
                          </div>
  
                        </div>
                      </div>
                      {{--Upload Result End--}}




                      {{-- Second Semester --}}

                      {{--Upload Result--}}
                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title"> 2<sup>nd</sup> Semester</h4>
  
                            <form action="{{url('/lecturer/admin/search_student_result')}}" method="GET">
                              <div class="relative">
                                <input id="search_course" type="text" name="q" class="form-control" placeholder="Search..." required="required">
                                  <button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full text-xl dark:text-slate-300 flex items-center justify-center">
                                    <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                                  </button>
                                </div>
                          </form>
                          </header>
  
                          <div class="card-body p-6">
                            
                            <div class="card">
                              <div class="card-body px-6 pb-6">
                                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                  <span class=" col-span-8  hidden"></span>
                                  <span class="  col-span-4 hidden"></span>
                                  <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden">

                                        <form class="space-y-4" action="/lecturer/admin/upload_result/{{$id->id}}&{{$id->name}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                            @csrf

                                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                                          <tr>
            
                                            <th scope="col" class=" table-th ">
                                              Id
                                            </th>

                                            <th scope="col" class=" table-th ">
                                              Select Course
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Code
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Title
                                            </th>
  
                                            <th scope="col" class=" table-th ">
                                              Unit
                                            </th>
  
                                            <th scope="col" class=" table-th ">
                                                Status
                                              </th>
  
                                            <th scope="col" class=" table-th ">
                                              Score
                                            </th>
            
                                          </tr>
                                        </thead>
  
                                        @if (count($sscourse_reg) === 0)
                                  <td>
                                     <th colspan="9">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else
  
                                        @foreach ($sscourse_reg as $course)
                                            
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            
                                          <tr>
                                            <td class="table-td">{{$loop->iteration}}</td>
                                            <td class="table-td " hidden><input type="hidden" name="faculty_id" value="{{$course->faculty->id}}"></td>
                                            <td class="table-td " hidden><input type="hidden" name="department_id" value="{{$course->department->id}}"></td>
                                            <td class="table-td " hidden><input type="hidden" name="level_id" value="{{$course->level->id}}"></td>
                                            <td class="table-td " hidden><input type="hidden" name="section_id" value="{{$course->section->id}}"></td>
                                            <td class="table-td " hidden><input type="hidden" name="semester_id" value="{{$course->semester->id}}"></td>
                                            <td class="table-td "><input type="checkbox" name="course_reg_id" value="{{$course->id}}" checked></td>
                                            <td class="table-td " hidden><input type="hidden" name="user_id" value="{{$course->user->id}}"></td>
                                            {{-- <td class="table-td " hidden><input type="hidden" name="lecturer_id" value="{{$course->lecturer->id}}"></td> --}}
                                            <td class="table-td ">
                                                {{$course->course->course_code}}
                                            </td>
                                            <td class="table-td ">{{$course->course->course_title}}</td>
                                            
                                            
                                            <td class="table-td "> <input type="hidden" name="course_unit" value="{{$course->course->course_unit}}"> {{$course->course->course_unit}}</td>
                                            <td class="table-td ">{{$course->course->course_status}}</td>
                                            <td class="table-td ">
                                                      <input id="final_score" type="text" name="final_score" class="form-control" placeholder="Final Score">
                                                </td>
                                            
                                          </tr>
            
                                          {{--STOP--}}
            
                                        </tbody>
  
                                        @endforeach
                                        @endif
  
                                      </table>

                                      <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" onclick="return confirm('Are you sure you wanna upload?')">Upload</button>
                                    
                                        </form>

                                    </div>
                                    {{-- {{$result->links()}} --}}
                                  </div>
                                </div>
                              </div>
                            </div>
  
                          </div>
  
                        </div>
                      </div>
                      {{--Upload Result End--}}



                    
                    
                  </div>
                  <!-- profile info-500 end-->

                </div>

                <!-- Main Profile End-->


              </div>

            </div>
          </div>
        </div>
        <!-- END: Main_content -->



        
        @endsection
