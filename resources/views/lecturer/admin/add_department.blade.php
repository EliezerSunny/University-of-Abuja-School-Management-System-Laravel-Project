@extends('layouts.admin_head')






    @section('add_department')
        



        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Departments</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Add Department</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="{{('/lecturer/admin/add_department')}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                <div class="grid md:grid-cols-2 gap-6">

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
                                  <label for="department_name" class="form-label">Department:</label>
                                  <div class="relative">
                                    <input id="department_name" type="text" name="department_name" class="form-control" placeholder="Department" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="department_abbreviation" class="form-label">Department Abbreviation:</label>
                                  <div class="relative">
                                    <input id="department_abbreviation" type="text" name="department_abbreviation" class="form-control" placeholder="Department Abbreviation" required="required">
                                  </div>
                                </div>

                                  <div class="input-area">
                                    <label for="department_hod_name" class="form-label">H.O.D Name:</label>
                                    <div class="relative">
                                      <input id="department_hod_name" type="text" name="department_hod_name" class="form-control" placeholder="HOD Name" required="required">
                                    </div>
                                  </div>

                                  {{-- <div class="input-area">
                                    <label for="department_logo" class="form-label">Department Logo:</label>
                                    <div class="relative">
                                      <input id="department_logo" type="file" name="department_logo" class="form-control" placeholder="Department Logo" required="required">
                                    </div>
                                  </div> --}}


                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" onclick="return confirm('Are you sure?')">Submit</button>
                                    
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>


                    {{-- Department --}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Departments</h4>

                          <a href="{{('/lecturer/admin/add_department')}}">
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
                                            #
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Department
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Department Abbreviation
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

                                      @foreach ($department as $departments)

                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$departments->id}}</td>
                                          <td class="table-td ">{{$departments->department_name}}</td>
                                          <td class="table-td ">{{$departments->department_abbreviation}}</td>
                                          <td class="table-td ">{{$departments->created_at->diffForHumans()}}</td>
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
                                              <a href="/lecturer/admin/change_department_details/{{$departments->id}}">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button></a>
                                                <form action="/lecturer/admin/delete_department/{{$departments->id}}" method="POST">
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
                                  {{$department->links()}}
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{-- Department End--}}

                    
                    
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
