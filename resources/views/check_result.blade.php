@extends('layouts.head')






    @section('check_result')




        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <!-- Main Board-->
              <div>

                <div class="flex justify-between flex-wrap items-center mb-3">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Result</h4>
                </div>

                @include('layouts.messages')


                <!-- Main Profile-->
                <div class="space-y-5 profile-page">




                  <!-- Student details -->

                  <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0
                  space-y-6 justify-between items-end relative z-[1]">
                    <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>
                    <div class="profile-box flex-none md:text-start text-center">
                      <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                        <div class="flex-none">
                          <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4
                                  ring-slate-100 relative">
                            <img src="{{asset('assets/images/students/' . Auth::guard('web')->user()->picture)}}" alt="{{Auth::guard('web')->user()->name}}" title="{{Auth::guard('web')->user()->name}}" class="w-full h-full object-cover rounded-full">
                            <a href="{{route('change_picture.get')}}" class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center
                                      justify-center md:top-[140px] top-[100px]">
                              <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                            </a>
                          </div>
                        </div>
                        <div class="flex-1">
                          <div class="text-xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                            {{Auth::guard('web')->user()->name}}
                          </div>
                          <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                            {{Auth::guard('web')->user()->unique_id}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end profile box -->
                    <div class="profile-info-500 md:flex md:text-start text-left flex-1 max-w-[516px] md:space-y-0 space-y-4">
                      

                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Faculty : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{Auth::guard('web')->user()->faculty->faculty_name}}
                          </span>
                        </div>

                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Department : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{Auth::guard('web')->user()->department->department_name}}
                          </span>
                        </div>

                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Programme : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{Auth::guard('web')->user()->faculty->faculty_award}} {{Auth::guard('web')->user()->department->department_name}}
                          </span>
                        </div>

                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Level : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{Auth::guard('web')->user()->level->level}}
                          </span>
                        </div>
                        
                      </div>
                      <!-- end single -->

                    </div>
                    <!-- profile info-500 -->
                  </div>

                  <!-- Student details end -->
                  



                  

                    <!-- profile info-500 -->
                    <div class="grid grid-cols-12 gap-6">

  

  
                        {{-- First semester --}}


                        @if ($semesterr == 1 || $semesterr == 0)
                            
                    {{--Upload Result--}}
                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title"> 1<sup>st</sup> Semester {{--$fscourse_reg->session->session--}}</h4>

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

                                            <th scope="col" class=" table-th ">
                                                Grade
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              GP
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              WGP
                                            </th>
            
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
                                            <td class="table-td ">
                                                {{$loop->iteration}}
                                            </td>
                                            <td class="table-td ">
                                                {{$course->course_reg->course->course_code}}
                                            </td>
                                            <td class="table-td ">{{$course->course_reg->course->course_title}}</td>
                                            
                                            
                                            <td class="table-td ">{{$course->course_reg->course->course_unit}}</td>
                                            <td class="table-td ">{{$course->course_reg->course->course_status}}</td>

                                            @if ($course->final_score === NULL)
                                            <td class="table-td ">
                                                {{'0'}}
                                            </td>
                                            @else
                                            <td class="table-td ">
                                                {{$course->final_score}}
                                            </td>
                                            @endif

                                                <td class="table-td ">{{$course->grade}}</td>
                                                <td class="table-td ">{{$course->grade_point}}</td>
                                                <td class="table-td ">{{$course->weighted_grade_point}}</td>
                                            
                                          </tr>


            
                                          {{--STOP--}}
            
                                        </tbody>
  
                                        @endforeach
                                        @endif


                                        <th scope="col" class=" table-th ">
                                          Total
                                        </th>
                                        <td class="table-td "></td>
                                        <td class="table-td "></td>
                                        <td class="table-td ">{{$fcourse_unit}}</td>
                                        <td class="table-td "></td>
                                        <td class="table-td "></td>
                                        <td class="table-td "></td>
                                        <td class="table-td "></td>
                                        <td class="table-td ">{{$ffscourse_reg}}</td>

                                        @if ($fcourse_unit >= 1)

                                        <tr>
                                          @if (round($ffscourse_reg / $fcourse_unit, 2) >= 3.50)
                                          <th scope="col" colspan="9" class=" table-th ">
                                            Grade Point Average (GPA): <span style="color: green;"><b>{{round($ffscourse_reg / $fcourse_unit, 2)}}</b></span>
                                          </th>
                                          
                                          @elseif(round($ffscourse_reg / $fcourse_unit, 2) >= 2.50)
                                            <th scope="col" colspan="9" class=" table-th ">
                                              Grade Point Average (GPA): <span style="color: yellow;"><b>{{round($ffscourse_reg / $fcourse_unit, 2)}}</b></span>
                                            </th>
                                            @else
                                              <th scope="col" colspan="9" class=" table-th ">
                                                Grade Point Average (GPA): <span style="color: red;"><b>{{round($ffscourse_reg / $fcourse_unit, 2)}}</b></span>
                                              </th>
                                          @endif
                                        </tr>

                                        @else
                                        <tr>
                                          <th scope="col" colspan="9" class=" table-th ">
                                          Grade Point Average (GPA): {{0}}
                                        </th>
                                        </tr>
                                        @endif
                                        

  
                                      </table>

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


                      @elseif($semesterr == 2 || $semesterr == 0)
                            

                      {{-- Second Semester --}}

                      {{--Upload Result--}}
                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title"> 2<sup>nd</sup> Semester</h4>
  
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

                                            <th scope="col" class=" table-th ">
                                                Grade
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              GP
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              WGP
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
                                            <td class="table-td ">
                                                {{$loop->iteration}}
                                            </td>
                                            <td class="table-td ">
                                                {{$course->course_reg->course->course_code}}
                                            </td>
                                            <td class="table-td ">{{$course->course_reg->course->course_title}}</td>
                                            
                                            
                                            <td class="table-td ">{{$course->course_reg->course->course_unit}}</td>
                                            <td class="table-td ">{{$course->course_reg->course->course_status}}</td>

                                            @if ($course->final_score === NULL)
                                            <td class="table-td ">
                                                {{0}}
                                            </td>
                                            @else
                                            <td class="table-td ">
                                                {{$course->final_score}}
                                            </td>
                                            @endif

                                                <td class="table-td ">{{$course->grade}}</td>
                                                <td class="table-td ">{{$course->grade_point}}</td>
                                                <td class="table-td ">{{$course->weighted_grade_point}}</td>
                                            
                                          </tr>
            
                                          {{--STOP--}}
            
                                        </tbody>
  
                                        @endforeach
                                        @endif


                                        <th scope="col" class=" table-th ">
                                          Total
                                        </th>
                                        <td class="table-td "></td>
                                        <td class="table-td "></td>
                                        <td class="table-td ">{{$scourse_unit}}</td>
                                        <td class="table-td "></td>
                                        <td class="table-td "></td>
                                        <td class="table-td "></td>
                                        <td class="table-td "></td>
                                        <td class="table-td ">{{$ssscourse_reg}}</td>

                                        @if ($scourse_unit >= 1)

                                        <tr>
                                          @if (round($ssscourse_reg / $scourse_unit, 2) >= 3.50)
                                          <th scope="col" colspan="9" class=" table-th ">
                                            Grade Point Average (GPA): <span style="color: green;"><b>{{round($ssscourse_reg / $scourse_unit, 2)}}</b></span>
                                          </th>
                                          
                                          @elseif(round($ssscourse_reg / $scourse_unit, 2) >= 2.50)
                                            <th scope="col" colspan="9" class=" table-th ">
                                              Grade Point Average (GPA): <span style="color: yellow;"><b>{{round($ssscourse_reg / $scourse_unit, 2)}}</b></span>
                                            </th>
                                            @else
                                              <th scope="col" colspan="9" class=" table-th ">
                                                Grade Point Average (GPA): <span style="color: red;"><b>{{round($ssscourse_reg / $scourse_unit, 2)}}</b></span>
                                              </th>
                                          @endif
                                        </tr>
                                        
                                        @else
                                        <tr>
                                          <th scope="col" colspan="9" class=" table-th ">
                                          Grade Point Average (GPA): {{0}}
                                        </th>
                                        </tr>
                                        @endif
                                        

  
                                      </table>

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

                      @endif





                </div>
                <!-- Main Profile End-->

              </div>
              <!-- Main Board End-->

            </div>
          </div>
        </div>
        <!-- END: Main_content -->

      </div>
      

      @endsection