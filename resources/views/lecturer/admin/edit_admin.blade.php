@extends('layouts.admin_head')






    @section('add_admin')
        




        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Admin</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Edit Admin</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="/lecturer/admin/edit_admin/{{$admin->id}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 gap-6">
                              <div class="input-area">
                                  <label for="name" class="form-label">Name:</label>
                                  <div class="relative">
                                    <input id="name" type="text" name="name" value="{{$admin->name}}" class="form-control" placeholder="Name" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="email" class="form-label">Email:</label>
                                  <div class="relative">
                                    <input id="email" type="email" name="email" value="{{$admin->email}}" class="form-control" placeholder="Email" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="school_email" class="form-label">School Email:</label>
                                  <div class="relative">
                                    <input id="school_email" type="email" name="school_email" value="{{$admin->school_email}}" class="form-control" placeholder="Email" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                    <label for="position" class="form-label">Position:</label>
                                    <div class="relative">
                                      <input id="position" type="text" name="position" value="{{$admin->position}}" class="form-control" placeholder="Position" required="required">
                                    </div>
                                  </div>

                                  <div class="input-area">
                                    <label for="faculty_id" class="form-label">Faculty: {{$admin->faculty->faculty_name}}</label>
                                    <select name="faculty_id" id="faculty_id" class="form-control w-full mt-2">
                                    <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                    
                                    @foreach ($faculty as $faculties)
                                    <option value="{{$faculties->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$faculties->faculty_name}}</option>
                                    @endforeach
                                    
                                  </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="department_id" class="form-label">Department: {{$admin->department->department_name}}</label>
                                    <select name="department_id" id="department_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($department as $departments)
                                      <option value="{{$departments->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$departments->department_name}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="section_id" class="form-label">Academic Section: {{$admin->section->section}}</label>
                                    <select name="section_id" id="section_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($section as $sections)
                                      <option value="{{$sections->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$sections->section}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="phone_no" class="form-label">Phone No.:</label>
                                    <div class="relative">
                                      <input id="phone_no" type="text" name="phone_no" value="{{$admin->phone_no}}" class="form-control" placeholder="Phone No." required="required">
                                    </div>
                                  </div>

                                  <div class="input-area">
                                    <label for="location" class="form-label">Location:</label>
                                    <div class="relative">
                                      <input id="location" type="text" name="location" class="form-control" value="{{$admin->location}}" placeholder="Location" required="required">
                                    </div>
                                  </div>



                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" onclick="return confirm('Are you sure?')">Submit</button>
                                    
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

                          <a href="{{('/lecturer/admin/add_admin')}}">
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

                                      @foreach ($admins as $admin)

                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$loop->iteration}}</td>
                                          <td class="table-td ">{{$admin->unique_id}}</td>
                                          <td class="table-td">
                                            <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$admin->name}}</span>
                                          </td>
                                          <td class="table-td ">{{$admin->position}}</td>
                                          <td class="table-td ">
                                            <img src="{{asset('assets/images/admin/' . $admin->picture)}}" alt="{{$admin->name}}" title="{{$admin->name}}" class="object-cover w-full h-full rounded-full">
                                          </td>
                                          <td class="table-td ">
                                            <div>
                                              {{$admin->faculty->faculty_name}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$admin->department->department_name}}</td>
                                          <td class="table-td ">
                                            <div>
                                              {{$admin->section->section}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$admin->school_email}}</td>
                                          <td class="table-td ">{{$admin->phone_no}}</td>
                                          <td class="table-td ">{{$admin->last_activity}}</td>
                                          <td class="table-td ">{{$admin->created_at->diffForHumans()}}</td>
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
                                              <a href="/lecturer/admin/edit_admin/{{$admin->id}}">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button></a>
                                              <form action="/lecturer/admin/delete_admin/{{$admin->id}}" method="POST">
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
                                  {{$admins->links()}}
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
