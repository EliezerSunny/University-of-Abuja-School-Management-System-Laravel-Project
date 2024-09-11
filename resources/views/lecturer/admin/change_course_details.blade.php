@extends('layouts.admin_head')






    @section('change_course_details')
        


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Students</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Edit Course</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="/lecturer/admin/change_course_details/{{$coursess->id}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 gap-6">
                              <div class="input-area">
                                  <label for="course_code" class="form-label">Course code:</label>
                                  <div class="relative">
                                    <input id="course_code" type="text" name="course_code" class="form-control" value="{{$coursess->course_code}}" placeholder="Course code" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="course_title" class="form-label">Course title:</label>
                                  <div class="relative">
                                    <input id="course_title" type="text" name="course_title" class="form-control" value="{{$coursess->course_title}}" placeholder="Course title" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="course_unit" class="form-label">Course unit:</label>
                                  <div class="relative">
                                    <input id="course_unit" type="text" name="course_unit" class="form-control" value="{{$coursess->course_unit}}" placeholder="Course unit" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="course_status" class="form-label">Course status:</label>
                                  <div class="relative">
                                    <input id="course_status" type="text" name="course_status" class="form-control" value="{{$coursess->course_status}}" placeholder="Course status" required="required">
                                  </div>
                                </div>

                                  <div class="input-area">
                                    <label for="faculty_id" class="form-label">Faculty: <i>{{$coursess->faculty->faculty_name}}</i></label>
                                    <select name="faculty_id" id="faculty_id" class="form-control w-full mt-2">
                                    <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                    
                                    @foreach ($faculty as $faculties)
                                    <option value="{{$faculties->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$faculties->faculty_name}}</option>
                                    @endforeach
                                    
                                  </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="department_id" class="form-label">Department: <i>{{$coursess->department->department_name}}</i></label>
                                    <select name="department_id" id="department_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($department as $departments)
                                      <option value="{{$departments->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$departments->department_name}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="level_id" class="form-label">Level: <i>{{$coursess->level->level}}</i></label>
                                    <select name="level_id" id="level_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($level as $levels)
                                      <option value="{{$levels->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$levels->level}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="semester_id" class="form-label">Semester: <i>{{$coursess->semester->semester}}</i></label>
                                    <select name="semester_id" id="semester_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($semester as $semesters)
                                      <option value="{{$semesters->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$semesters->semester}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>


                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" title="Change" onclick="return confirm('Are you sure you want to change?')">Submit</button>
                                    
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>


                    {{--Student--}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Courses</h4>

                          <a href="{{('/lecturer/admin/add_course')}}">
                            <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                            bg-black">Add</button>
                            </a>
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

                                      @if (count($course) === 0)
                                <td>
                                   <th colspan="9">
                                      <h5 style="color:red; text-align: center;">No record found</h5>
                                   </td>
                                </tr>
                                @else

                                      @foreach ($course as $courses)
                                          
                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$loop->iteration}}</td>
                                          <td class="table-td ">{{$courses->course_code}}</td>
                                          <td class="table-td">
                                            <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$courses->course_title}}</span>
                                          </td>
                                          <td class="table-td ">{{$courses->course_unit}}</td>
                                          <td class="table-td ">{{$courses->course_status}}</td>
                                          <td class="table-td ">
                                            <div>
                                              {{$courses->faculty->faculty_name}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$courses->department->department_name}}</td>
                                          <td class="table-td ">{{$courses->level->level}}</td>
                                          <td class="table-td ">{{$courses->created_at->diffForHumans()}}</td>
                                          <td class="table-td ">
          
                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                        bg-success-500">
                                              {{$courses->status}}
                                            </div>
          
                                          </td>
                                          <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                              {{-- <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                              </button> --}}
                                              <a href="/lecturer/admin/change_course_details/{{$courses->id}}">
                                              <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                              </button></a>
                                              <form action="/lecturer/admin/delete_course/{{$courses->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                              <button class="action-btn" title="Delete">
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

                                    </table>
                                  </div>
                                  {{$course->links()}}
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{--Student End--}}
                    
                    
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
