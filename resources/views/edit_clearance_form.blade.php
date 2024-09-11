@extends('layouts.head')






    @section('edit_clearance_form')
        
    


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <!-- Main Board-->
              <div>

                <div class="flex justify-between flex-wrap items-center mb-3">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Dashboard</h4>
                </div>

                @include('layouts.messages')


                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                    <!-- profile info-500 -->
                    <div class="grid grid-cols-12 gap-6">
  
  
                      <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">Edit Clearance Form</h4>
                            <h6 style="color: #c5221f; font-size:12px; font-style: italic;"><b>NOTE:</b> Both image files must be changed!!!</h6>
                          </header>
  
                          <div class="card-body p-6">
                            <div class="card-text h-full">
                              
                              <form class="space-y-4" action="/edit_clearance_form/{{$edit->id}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf  
                                @method('PUT')
                                <div class="grid md:grid-cols-2 gap-6">

                                <div class="input-area" hidden>
                                  <label for="faculty_id" class="form-label">Faculty:</label>
                                  <div class="relative">
                                    <input id="faculty_id" type="text" name="faculty_id" class="form-control" readonly value="{{Auth::guard('web')->user()->faculty->id}}" placeholder="Faculty" required="required">
                                  </div>
                                </div>

                                <div class="input-area" hidden>
                                  <label for="department_id" class="form-label">Department:</label>
                                  <div class="relative">
                                    <input id="department_id" type="text" name="department_id" class="form-control" readonly value="{{Auth::guard('web')->user()->department->id}}" placeholder="Department" required="required">
                                  </div>
                                </div>

                                <div class="input-area" hidden>
                                  <label for="level_id" class="form-label">Level:</label>
                                  <div class="relative">
                                    <input id="level_id" type="text" name="level_id" class="form-control" readonly value="{{Auth::guard('web')->user()->level->id}}" placeholder="Level" required="required">
                                  </div>
                                </div>

                                <div class="input-area" hidden>
                                  <label for="session_id" class="form-label">Section:</label>
                                  <div class="relative">
                                    <input id="session_id" type="text" name="session_id" class="form-control" readonly value="{{Auth::guard('web')->user()->section->id}}" placeholder="Session" required="required">
                                  </div>
                                </div>

                                <div class="input-area" hidden>
                                  <label for="user_id" class="form-label">User:</label>
                                  <div class="relative">
                                    <input id="user_id" type="text" name="user_id" class="form-control" readonly value="{{Auth::guard('web')->user()->id}}" placeholder="User" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                    <label for="reg_no" class="form-label">Reg No.: </label>
                                    <div class="relative">
                                      <input id="reg_no" type="text" name="reg_no" class="form-control" readonly value="{{Auth::guard('web')->user()->unique_id}}" placeholder="Registration Number" required="required">
                                    </div>
                                  </div>

                                  <div class="input-area">
                                    <label for="name" class="form-label">Name:</label>
                                    <div class="relative">
                                      <input id="name" type="text" name="name" class="form-control" readonly value="{{Auth::guard('web')->user()->name}}" placeholder="Name" required="required">
                                    </div>
                                  </div>
  
                                    <div class="input-area">
                                      <label for="faculty" class="form-label">Faculty:</label>
                                      <div class="relative">
                                        <input id="faculty" type="text" name="faculty" class="form-control" value="{{Auth::guard('web')->user()->faculty->faculty_name}}" readonly placeholder="Faculty" required="required">
                                      </div>
                                    </div>
  
                                    <div class="input-area">
                                      <label for="department" class="form-label">Department:</label>
                                      <div class="relative">
                                        <input id="department" type="text" name="department" class="form-control" value="{{Auth::guard('web')->user()->department->department_name}}" readonly placeholder="Department" required="required">
                                      </div>
                                    </div>
  
                                    <div class="input-area">
                                      <label for="phone_no" class="form-label">Phone No.:</label>
                                      <div class="relative">
                                        <input id="phone_no" type="text" name="phone_no" class="form-control" value="{{Auth::guard('web')->user()->phone_no}}" readonly placeholder="Phone Number" required="required">
                                      </div>
                                    </div>
  
                                    <div class="input-area">
                                      <label for="programme" class="form-label">Programme:</label>
                                      <div class="relative">
                                        <input id="programme" type="text" name="programme" class="form-control" value="{{Auth::guard('web')->user()->faculty->faculty_award}} {{Auth::guard('web')->user()->department->department_name}}" readonly placeholder="Programme" required="required">
                                      </div>
                                    </div>

                                    <div class="input-area">
                                        <label for="session" class="form-label">Section:</label>
                                        <div class="relative">
                                          <input id="session" type="text" name="session" class="form-control" value="{{Auth::guard('web')->user()->section->section}}" readonly placeholder="Session" required="required">
                                        </div>
                                      </div>

                                      <div class="input-area">
                                        <label for="student_result" class="form-label">Student Result:</label>
                                        <div class="relative">
                                          <input id="student_result" type="file" name="student_result" class="form-control" placeholder="Student Result" required="required">
                                        </div>
                                      </div>

                                      <div class="input-area">
                                        <label for="school_receipt" class="form-label">Fee Receipt:</label>
                                        <div class="relative">
                                          <input id="school_receipt" type="file" name="school_receipt" class="form-control" placeholder="Fee Receipt" required="required">
                                        </div>
                                      </div>
  
                                  
                                  </div>
                                  
                                      <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                  bg-black" title="Submit" onclick="return confirm('Are you sure you want to submit?')">Submit</button>
                                      
                              </form>
  
                            </div>
                          </div>
  
                        </div>
                      </div>


                    </div>
                    <!-- profile info-500 end-->



                    <!-- clearance -->
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Student Clearance</h4>
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
                                          
                                        </tr>
                                      </thead>

                                      @if (count($clearance) === 0)
                                <td>
                                   <th colspan="9">
                                      <h5 style="color:red; text-align: center;">No record found</h5>
                                   </td>
                                </tr>
                                @else

                                    @foreach ($clearance as $students)

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

                                          
                                          
                                        </tr>
          
                                        {{--STOP--}}
          
                                      </tbody>
                                      @endforeach
                                      @endif

                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                  <!-- clearance end-->

                </div>
                <!-- Main Profile End-->

              </div>
              <!-- Main Board End-->

            </div>
          </div>
        </div>
        <!-- END: Main_content -->


        @endsection
