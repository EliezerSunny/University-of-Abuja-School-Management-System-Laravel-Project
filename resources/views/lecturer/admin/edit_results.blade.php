@extends('layouts.admin_head')






    @section('edit_results')
        


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Edit Result</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">




                      <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">





                    {{-- First semester --}}


                    {{--Edit Result--}}
                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title"> 1<sup>st</sup> Semester {{--$results->session--}}</h4>
  
                            <form action="{{url('/lecturer/admin/search_students_result')}}" method="GET">
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

                                        <form class="space-y-4" action="/lecturer/admin/edit_results/{{$results->id}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                            @csrf
                                            @method('PUT')
                                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                                          <tr>
            
                                            <th scope="col" class=" table-th ">
                                              Id
                                            {{-- </th>

                                            <th scope="col" class=" table-th ">
                                              Select Course
                                            </th> --}}
            
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
  
                                        {{-- @if (count($results) === 0)
                                  <td>
                                     <th colspan="9">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else --}}
  
                                        {{-- @foreach ($results as $course) --}}
                                            
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            
                                          <tr>
                                            <td class="table-td">{{1}}</td>
                                            {{-- <td class="table-td " hidden><input type="hidden" name="faculty_id" value="{{$results->faculty->id}}"></td>
                                            <td class="table-td " hidden><input type="hidden" name="department_id" value="{{$results->department->id}}"></td>
                                            <td class="table-td " hidden><input type="hidden" name="level_id" value="{{$results->level->id}}"></td>
                                            <td class="table-td " hidden><input type="hidden" name="section_id" value="{{$results->section->id}}"></td>
                                            <td class="table-td " hidden><input type="hidden" name="semester_id" value="{{$results->semester->id}}"></td>
                                            <td class="table-td "><input type="checkbox" name="course_reg_id" value="{{$results->id}}" checked></td>
                                            <td class="table-td " hidden><input type="hidden" name="user_id" value="{{$results->user->id}}"></td> --}}
                                            <td class="table-td ">
                                                {{$results->course_reg->course->course_code}}
                                            </td>
                                            <td class="table-td ">{{$results->course_reg->course->course_title}}</td>
                                            
                                            
                                            <td class="table-td "> <input type="hidden" name="course_unit" value="{{$results->course_reg->course->course_unit}}"> {{$results->course_reg->course->course_unit}}</td>
                                            <td class="table-td ">{{$results->course_reg->course->course_status}}</td>
                                            <td class="table-td ">
                                                      <input id="final_score" type="text" name="final_score" value="{{$results->final_score}}" class="form-control" placeholder="Final Score">
                                                </td>
                                                <td class="table-td ">{{$results->grade}}</td>
                                                <td class="table-td ">{{$results->grade_point}}</td>
                                                <td class="table-td ">{{$results->weighted_grade_point}}</td>

                                            
                                          </tr>
            
                                          {{--STOP--}}
            
                                        </tbody>
  
                                        {{-- @endforeach --}}
                                        {{-- @endif --}}
  
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
                      {{--Edit Result End--}}

                    
                    
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
