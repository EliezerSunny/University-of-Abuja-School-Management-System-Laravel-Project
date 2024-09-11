@extends('layouts.admin_head')






    @section('clearance_form')
        


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
                            <h4 class="card-title">Clearance Form</h4>
                          </header>
  
                          <div class="card-body p-6">
                            <div class="card-text h-full">
                              
                              <form class="space-y-4" action="/lecturer/admin/clearance_form/{{$students->id}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf  
                                @method('PUT')
                                <div class="grid md:grid-cols-2 gap-6">

                                    <div class="input-area" hidden>
                                        <label for="admin_id" class="form-label">Admin Name: {{Auth::guard('admin')->user()->name}}</label>
                                        <div class="relative">
                                          <input id="admin_id" type="text" name="admin_id" class="form-control" value="{{Auth::guard('admin')->user()->id}}" placeholder="Admin Name" required="required" readonly>
                                        </div>
                                      </div>

                                      <div class="input-area" hidden>
                                        <label for="lecturer_id" class="form-label">Lecturer Name: {{$students->lecturer->name}}</label>
                                        <div class="relative">
                                          <input id="lecturer_id" type="text" name="lecturer_id" value="{{$students->lecturer_id}}" class="form-control" placeholder="Lecturer Name" required="required" readonly>
                                        </div>
                                      </div>

                                      <div class="input-area" hidden>
                                        <label for="user_id" class="form-label">Student Id: {{$students->user->name}}</label>
                                        <div class="relative">
                                          <input id="user_id" type="text" name="user_id" value="{{$students->user->id}}" class="form-control" placeholder="Lecturer Name" required="required" readonly>
                                        </div>
                                      </div>

                                      <div class="input-area" hidden>
                                        <label for="faculty_id" class="form-label">Faculty:</label>
                                        <div class="relative">
                                          <input id="faculty_id" type="text" name="faculty_id" class="form-control" readonly value="{{$students->faculty_id}}" placeholder="Faculty" required="required">
                                        </div>
                                      </div>
      
                                      <div class="input-area" hidden>
                                        <label for="department_id" class="form-label">Department:</label>
                                        <div class="relative">
                                          <input id="department_id" type="text" name="department_id" class="form-control" readonly value="{{$students->department_id}}" placeholder="Department" required="required">
                                        </div>
                                      </div>
      
                                      <div class="input-area" hidden>
                                        <label for="session_id" class="form-label">Session:</label>
                                        <div class="relative">
                                          <input id="session_id" type="text" name="session_id" class="form-control" readonly value="{{$students->session_id}}" placeholder="Session" required="required">
                                        </div>
                                      </div>

                                      <div class="input-area" hidden>
                                        <label for="student_clearance_id" class="form-label">Student Clearance Id:</label>
                                        <div class="relative">
                                          <input id="student_clearance_id" type="text" name="student_clearance_id" class="form-control" readonly value="{{$students->student_clearance_id}}" placeholder="Student Clearance Id" required="required">
                                        </div>
                                      </div>

                                      <div class="input-area">
                                        <label for="aadmin_name" class="form-label">Admin Name: </label>
                                        <div class="relative">
                                          <input id="aadmin_name" type="text" name="aadmin_name" class="form-control" value="{{Auth::guard('admin')->user()->name}}" placeholder="Admin Name" required="required" readonly>
                                        </div>
                                      </div>

                                      <div class="input-area">
                                        <label for="llecturer_name" class="form-label">Lecturer Name: </label>
                                        <div class="relative">
                                          <input id="llecturer_name" type="text" name="llecturer_name" class="form-control" value="{{$students->lecturer->name}}" placeholder="Admin Name" required="required" readonly>
                                        </div>
                                      </div>

                                      <div class="input-area">
                                        <label for="llecturer_position" class="form-label">Lecturer Position: </label>
                                        <div class="relative">
                                          <input id="llecturer_position" type="text" name="llecturer_position" class="form-control" value="{{$students->lecturer->position}}" placeholder="Admin Name" required="required" readonly>
                                        </div>
                                      </div>

                                <div class="input-area">
                                    <label for="reg_no" class="form-label">Student Reg No.:</label>
                                    <div class="relative">
                                      <input id="reg_no" type="text" name="reg_no" class="form-control" value="{{$students->user->unique_id}}" placeholder="Registration Number" required="required" readonly>
                                    </div>
                                  </div>

                                  <div class="input-area">
                                    <label for="student_name" class="form-label">Student Name:</label>
                                    <div class="relative">
                                      <input id="student_name" type="text" name="student_name" class="form-control" value="{{$students->user->name}}" placeholder="Student Name" required="required" readonly>
                                    </div>
                                  </div>
  
                                    <div class="input-area">
                                      <label for="faculty" class="form-label">Student Faculty:</label>
                                      <div class="relative">
                                        <input id="faculty" type="text" name="faculty" class="form-control" value="{{$students->user->faculty->faculty_name}}" placeholder="Faculty" required="required" readonly>
                                      </div>
                                    </div>
  
                                    <div class="input-area">
                                      <label for="department" class="form-label">Student Department:</label>
                                      <div class="relative">
                                        <input id="department" type="text" name="department" class="form-control" value="{{$students->user->department->department_name}}" placeholder="Department" required="required" readonly>
                                      </div>
                                    </div>
  
                                    <div class="input-area">
                                      <label for="phone_no" class="form-label">Student Phone No.:</label>
                                      <div class="relative">
                                        <input id="phone_no" type="text" name="phone_no" class="form-control" value="+234 {{$students->user->phone_no}}" placeholder="Phone Number" required="required" readonly>
                                      </div>
                                    </div>
  
                                    <div class="input-area">
                                      <label for="programme" class="form-label">Student Programme:</label>
                                      <div class="relative">
                                        <input id="programme" type="text" name="programme" class="form-control" value="{{$students->user->faculty->faculty_award}} {{$students->user->department->department_name}}" placeholder="Programme" required="required" readonly>
                                      </div>
                                    </div>

                                    <div class="input-area">
                                        <label for="section" class="form-label">Student Section:</label>
                                        <div class="relative">
                                          <input id="section" type="text" name="section" class="form-control" value="{{$students->user->section->section}}" placeholder="Section" required="required" readonly>
                                        </div>
                                      </div>

                                      <div class="input-area">
                                        <label for="status" class="form-label">Status: Unapprove</label>
                                        <div class="relative">
                                          <input id="status" type="text" name="status" class="form-control" value="{{('Approved')}}" placeholder="Cleared By" required="required">
                                        </div>
                                      </div>
  
  
                                  </div>
                                  
                                      <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                  bg-black" title="Approve" onclick="return confirm('Are you sure you want to APPROVE?')">Submit</button>
                                      
                              </form>
  
                            </div>
                          </div>
  
                        </div>
                      </div>


                    </div>
                    <!-- profile info-500 end-->




                    {{--Cleared--}}

                    <!-- profile info-500 -->
                    <div class="lg:col-span-12 col-span-12">
                      
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Cleared Students</h4>
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
                                            Admin Name
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Clearance Unit
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Lecturer Name
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Lecturer Position
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
                                          <td class="table-td ">{{Auth::guard('admin')->user()->name}}</td>
                                          <td class="table-td ">{{Auth::guard('admin')->user()->position}}</td>
                                          <td class="table-td ">{{$students->lecturer->name}}</td>
                                          <td class="table-td ">{{$students->lecturer->position}}</td>
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
                                            <object data="{{asset('assets/images/students/receipt/' . $students->student_clearance->school_receipt)}}" alt="{{$students->student_clearance->school_receipt}}" class="object-cover w-full h-full rounded-full"></object>
                                            <a href="{{asset('assets/images/students/receipt/' . $students->student_clearance->school_receipt)}}" download="{{$students->student_clearance->school_receipt}}">
                                              Download file
                                            </a>
                                            </td>
                                          <td class="table-td ">
                                            <object data="{{asset('assets/images/students/result/' . $students->student_clearance->student_result)}}" alt="{{$students->student_clearance->student_result}}" class="object-cover w-full h-full rounded-full"></object>
                                            <a href="{{asset('assets/images/students/result/' . $students->student_clearance->student_result)}}" download="{{$students->student_clearance->student_result}}">
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
          
                                            @if ($students->status === 'Unapprove')
                                          <div style="background-color: rgb(211, 103, 103); color:rgb(83, 13, 13); border-radius: 12px; " class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-error-500
                                          bg-error-500">
                                                {{$students->status}}
                                              </div>
                                          @else
                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                          bg-success-500">
                                                {{$students->status}}
                                              </div>
                                              @endif
          
                                          </td>
                                          <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                              {{-- <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                              </button> --}}
                                              <a href="/lecturer/admin/clearance_form/{{$students->id}}">
                                              <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                              </button>
                                              </a>

                                              <form action="/lecturer/admin/delete_clearance_form/{{$students->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                              <button class="action-btn">
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
                                  {{$studentsss->links()}}
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                  <!-- profile info-500 end-->

                    {{--Cleared End--}}





                </div>
                <!-- Main Profile End-->


              </div>

            </div>
          </div>
        </div>
        <!-- END: Main_content -->


        @endsection
