@extends('layouts.admin_head')






    @section('add_lecturer')
        



        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Lecturers</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Add Lecturer</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="{{('/lecturer/admin/add_lecturer')}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                <div class="grid md:grid-cols-2 gap-6">
                              <div class="input-area">
                                  <label for="name" class="form-label">Name:</label>
                                  <div class="relative">
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Name" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="email" class="form-label">Email:</label>
                                  <div class="relative">
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Email" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="school_email" class="form-label">School Email:</label>
                                  <div class="relative">
                                    <input id="school_email" type="email" name="school_email" class="form-control" placeholder="Email" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                    <label for="position" class="form-label">Position:</label>
                                    <div class="relative">
                                      <input id="position" type="text" name="position" class="form-control" value="Lecturer" readonly placeholder="Position" required="required">
                                    </div>
                                  </div>

                                  <div class="input-area">
                                    <label for="faculty_id" class="form-label">Faculty:</label>
                                    <select name="faculty_id" id="faculty_id" class="form-control w-full mt-2">
                                    <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                    
                                    @foreach ($faculty as $faculties)
                                    <option value="{{$faculties->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$faculties->faculty_name}}</option>
                                    @endforeach
                                    
                                  </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="department_id" class="form-label">Department:</label>
                                    <select name="department_id" id="department_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($department as $departments)
                                      <option value="{{$departments->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$departments->department_name}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="session_id" class="form-label">Academic Section:</label>
                                    <select name="session_id" id="session_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($section as $sections)
                                      <option value="{{$sections->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$sections->section}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="phone_no" class="form-label">Phone No.:</label>
                                    <div class="relative">
                                      <input id="phone_no" type="text" name="phone_no" class="form-control" placeholder="Phone No." required="required">
                                    </div>
                                  </div>

                                  <div class="input-area">
                                    <label for="location" class="form-label">Location:</label>
                                    <div class="relative">
                                      <input id="location" type="text" name="location" class="form-control" placeholder="Location" required="required">
                                    </div>
                                  </div>

                                  {{-- <div class="input-area">
                                    <label for="picture_l" class="form-label">Picture:</label>
                                    <div class="relative">
                                      <input id="picture_l" type="file" name="picture_l" class="form-control" placeholder="Picture" required="required">
                                    </div>
                                  </div> --}}

                                <div class="input-area">
                                  <label for="password" class="form-label">Password:</label>
                                  <div class="relative">
                                    <input id="password" type="password" name="password" class="form-control pr-9" placeholder="Password" required="required">
                                    <button id="passIcon" class="passIcon absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                      <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                      <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                    </button>
                                  </div>
                                </div>

                                {{-- <div class="input-area">
                                  <label for="confirm_password" class="form-label">Confirm Password</label>
                                  <div class="relative">
                                    <input id="confirm_password" type="password" name="confirm_password" class="form-control pr-9" placeholder="Password" required="required">
                                    <button id="ConfirmpassIcon" class="absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                      <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                      <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                    </button>
                                  </div>
                                </div> --}}

                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" title="Add" onclick="return confirm('Are you sure you want to add?')">Submit</button>
                                    
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>


                    {{--Lecturer--}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Lecturers</h4>

                          <form action="{{url('/lecturer/admin/search_lecturer')}}" method="GET">
                            <div class="relative">
                              <input id="search_lecturer" type="text" name="q" class="form-control" placeholder="Search..." required="required">
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
                                            Position
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
                                            Section
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            School Email
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Phone No.
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Activity
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

                                      @foreach ($lecturer as $lecturers)

                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$loop->iteration}}</td>
                                          <td class="table-td ">{{$lecturers->unique_id}}</td>
                                          <td class="table-td">
                                            <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$lecturers->name}}</span>
                                          </td>
                                          <td class="table-td ">{{$lecturers->position}}</td>
                                          <td class="table-td ">
                                            <img src="{{asset('assets/images/lecturers/' . $lecturers->picture)}}" alt="{{$lecturers->name}}" class="object-cover w-full h-full rounded-full">
                                          </td>
                                          <td class="table-td ">
                                            <div>
                                              {{$lecturers->faculty->faculty_name}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$lecturers->department->department_name}}</td>
                                          <td class="table-td ">
                                            <div>
                                              {{$lecturers->section->section}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$lecturers->school_email}}</td>
                                          <td class="table-td ">{{$lecturers->phone_no}}</td>
                                          <td class="table-td ">{{$lecturers->last_activity}}</td>
                                          <td class="table-td ">{{$lecturers->created_at->diffForHumans()}}</td>
                                          <td class="table-td ">
          
                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                        bg-success-500">
                                              Active
                                            </div>
          
                                          </td>
                                          <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                              {{-- <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                              </button> --}}
                                              <a href="/lecturer/admin/change_lecturer_details/{{$lecturers->id}}">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button></a>
                                                <form action="/lecturer/admin/delete_lecturer/{{$lecturers->id}}" method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button class="action-btn" title="Delete" onclick="return confirm('Are you sure?')">
                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                              </button>
                                                </form>
                                            </div>
                                          </td>
                                        </tr>
          
                                        {{--STOP--}}
          
                                      </tbody>

                                      @endforeach

                                    </table>
                                  </div>
                                  {{$lecturer->links()}}
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{--Lecturer End--}}

                    
                    
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
