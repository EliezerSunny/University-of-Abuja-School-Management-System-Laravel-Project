@extends('layouts.head')






    @section('check_course_reg')




        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <!-- Main Board-->
              <div>

                <div class="flex justify-between flex-wrap items-center mb-3">
                    <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Registered Courses</h4>
                  </div>

                @include('layouts.messages')


                <!-- Main Profile-->
                <div class="space-y-5 profile-page">


                    <!-- profile info-500 -->

                    @if ($levell == NULL)
                        
                    @else

      
                    @if ($semesterr == 1 || $semesterr == 0)
      
                          {{--Course--}}
                          <div class="lg:col-span-12 col-span-12" id="registered_courses">

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
                
                                                {{-- <th scope="col" class="btnrt table-th ">
                                                  Action
                                                </th> --}}
                
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
                                                <td class="table-td ">{{$courses->section->section}}</td>
                                                <td class="table-td "><?php echo time_elapsed_string($courses->created_at); ?></td>
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
                                                    
                                                    {{-- <form action="/delete_course_reg/{{$courses->id}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="action-btn" title="Delete" onclick="return confirm('Are you sure you want to DROP COURSE?')">
                                                      <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                    </button>
                                                    </form> --}}

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


                          @elseif ($semesterr == 2 || $semesterr == 0)


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
                
                                                {{-- <th scope="col" class="btnrt table-th ">
                                                  Action
                                                </th> --}}
                
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
                                                <td class="table-td ">{{$courses->section->section}}</td>
                                                <td class="table-td "><?php echo time_elapsed_string($courses->created_at); ?></td>
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
                                                    
                                                    {{-- <form action="/delete_course_reg/{{$courses->id}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                  <button class="action-btn" title="Delete" onclick="return confirm('Are you sure you want to DROP COURSE?')">
                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                  </button>
                                                  </form> --}}

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


                          @endif 


                <!-- Main Profile End-->

                @endif

              </div>
              <!-- Main Board End-->

            </div>
          </div>
        </div>
        <!-- END: Main_content -->

      </div>
      


      @endsection
