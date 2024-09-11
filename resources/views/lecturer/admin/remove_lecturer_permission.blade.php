@extends('layouts.admin_head')






    @section('edit_lecturer_permission')
        



        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Permission</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">



                    {{-- Remove Permission --}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Remove "{{$lecturer->name}}" Permission.</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="/lecturer/admin/remove_lecturer_permission/{{$lecturer->id}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 gap-6">


                                  <div class="input-area">
                                    <label for="name" class="form-label">Permission:</label>
                                    <select name="name" id="name" class="form-control w-full mt-2">
                                    <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                    
                                    @foreach ($permission as $permissions)
                                    <option value="{{$permissions->name}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$permissions->name}}</option>
                                    @endforeach
                                    
                                  </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="role_name" class="form-label">Role:</label>
                                    <select name="role_name" id="role_name" class="form-control w-full mt-2">
                                    <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                    
                                    @foreach ($role as $roles)
                                    <option value="{{$roles->name}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$roles->name}}</option>
                                    @endforeach
                                    
                                  </select>
                                  </div>


                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" onclick="return confirm('Are you sure?')">Revoke permission</button>
                                    
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>

                    {{-- Remove Permission END --}}



                    {{--Lecturer--}}
                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">All Lecturers</h4>
  
                            <form action="{{url('/lecturer/admin/search_lecturer_p')}}" method="GET">
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
                                              Permission
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
  
                                        @foreach ($lecturerr as $lecturers)
  
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
                                            @if ($lecturers->getPermissionNames() === NULL)
                                            <td class="table-td ">{{'NULL'}}</td>
                                            @else
                                            <td class="table-td ">{{$lecturers->getPermissionNames()}}</td>
                                            @endif
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
                                                <a href="/lecturer/admin/edit_lecturer_permission/{{$lecturers->id}}">
                                                  <button class="action-btn" type="button" title="Edit">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                  </button></a>
                                                  <a href="/lecturer/admin/remove_lecturer_permission/{{$lecturers->id}}">
                                                    <button class="action-btn" type="button" title="Remove">
                                                      <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                    </button></a>
                                              </div>
                                            </td>
                                          </tr>
            
                                          {{--STOP--}}
            
                                        </tbody>
  
                                        @endforeach
  
                                      </table>
                                    </div>
                                    {{$lecturerr->links()}}
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
