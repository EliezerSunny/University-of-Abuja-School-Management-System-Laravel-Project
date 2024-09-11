@extends('layouts.lecturer_head')






    @section('clearance')
        



        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Clearance</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                    <!-- profile info-500 -->
                    <div class="lg:col-span-12 col-span-12">
                      
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">Students Clearance</h4>
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
                                              Matric No.
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Name
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              picture
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Faculty
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Department
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Programme
                                              </th>

                                              <th scope="col" class=" table-th ">
                                                Level
                                              </th>

                                              <th scope="col" class=" table-th ">
                                                Fee Receipt
                                              </th>

                                              <th scope="col" class=" table-th ">
                                                 Result
                                              </th>
  
                                            <th scope="col" class=" table-th ">
                                              Section
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Uploaded Date
                                              </th>
            
                                            <th scope="col" class=" table-th ">
                                              Status
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Action
                                            </th>
            
                                          </tr>
                                        </thead>

                                        @if (count($studentsss) === 0)
                                  <td>
                                     <th colspan="9">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else

                                      @foreach ($studentsss as $students)

                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            
                                          <tr>
                                            <td class="table-td">{{$loop->iteration}}</td>
                                            <td class="table-td ">{{$students->user->unique_id}}</td>
                                            <td class="table-td">
                                              <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$students->user->name}}</span>
                                            </td>
                                            <td class="table-td ">
                                              <img src="{{asset('assets/images/students/' . $students->user->picture)}}" alt="{{$students->user->name}}" title="{{$students->user->name}}" class="object-cover w-full h-full rounded-full">
                                            </td>
                                            <td class="table-td ">
                                              <div>
                                                {{$students->user->faculty->faculty_name}}
                                              </div>
                                            </td>
                                            <td class="table-td ">{{$students->user->department->department_name}}</td>
                                            <td class="table-td ">{{$students->user->faculty->faculty_award}} {{$students->user->department->department_name}}</td>
                                            <td class="table-td ">{{$students->user->level->level}}</td>
                                            <td class="table-td ">
                                              <object data="{{asset('assets/images/students/receipt/' . $students->school_receipt)}}" alt="{{$students->school_receipt}}" class="object-cover w-full h-full rounded-full"></object>
                                              <a href="{{asset('assets/images/students/receipt/' . $students->school_receipt)}}" download="{{$students->school_receipt}}">
                                                Download file
                                              </a>
                                              </td>
                                            <td class="table-td ">
                                              <object data="{{asset('assets/images/students/result/' . $students->student_result)}}" alt="{{$students->student_result}}" class="object-cover w-full h-full rounded-full"></object>
                                              <a href="{{asset('assets/images/students/result/' . $students->student_result)}}" download="{{$students->student_result}}">
                                                Download file
                                              </a>
                                            </td>
                                            <td class="table-td ">
                                              <div>
                                                {{$students->user->section->section}}
                                              </div>
                                            </td>
                                            <td class="table-td ">{{$students->created_at->diffForHumans()}}</td>
                                            <td class="table-td ">
            
                                              <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                          bg-success-500">
                                                {{$students->status}}
                                              </div>
            
                                            </td>
                                            <td class="table-td ">
                                              <div class="flex space-x-3 rtl:space-x-reverse">
                                                {{-- <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </button> --}}
                                                <a href="/lecturer/clearance_form/{{$students->id}}">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button>
                                                </a>
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                </button>
                                              </div>
                                            </td>
                                          </tr>
            
                                          {{--STOP--}}
            
                                        </tbody>
                                        @endforeach
                                        @endif

                                      </table>
                                    </div>
                                    {{$studentsss->links()}}
                                  </div>
                                </div>
                              </div>
                            </div>
  
                          </div>
  
                        </div>
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
