@extends('layouts.admin_head')






    @section('change_faculty_details')
        


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Faculties</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Change Faculty</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="/lecturer/admin/change_faculty_details/{{$faculties->id}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 gap-6">
                              <div class="input-area">
                                  <label for="faculty_name" class="form-label">Faculty:</label>
                                  <div class="relative">
                                    <input id="faculty" type="text" name="faculty_name" class="form-control" value="{{$faculties->faculty_name}}" placeholder="Faculty" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                    <label for="faculty_award" class="form-label">Faculty Award:</label>
                                    <div class="relative">
                                      <input id="faculty_award" type="text" name="faculty_award" class="form-control" value="{{$faculties->faculty_award}}" placeholder="Faculty Award" required="required">
                                    </div>
                                  </div>

                                  <div class="input-area">
                                    <label for="faculty_dean_name" class="form-label">Dean Name:</label>
                                    <div class="relative">
                                      <input id="faculty_dean_name" type="text" name="faculty_dean_name" class="form-control" value="{{$faculties->faculty_dean_name}}" placeholder="Dean Name" required="required">
                                    </div>
                                  </div>

                                  {{-- <div class="input-area">
                                    <label for="faculty_logo" class="form-label">Faculty Logo:</label>
                                    <div class="relative">
                                      <input id="picture" type="file" name="faculty_logo" class="form-control" placeholder="Faculty Logo" required="required">
                                    </div>
                                  </div> --}}


                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" title="Change" onclick="return confirm('Are you sure you want to change?')">Submit</button>
                                    
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>



                    {{-- Faculty --}}
                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">All Faculties</h4>
  
                            {{-- <a href="{{('/lecturer/admin/add_faculty')}}">
                              <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                              bg-black">Add</button>
                              </a> --}}
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
                                              Faculties
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Status
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Action
                                            </th>
            
                                          </tr>
                                        </thead>

                                        @foreach ($faculty as $faculties)
                                        
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            
                                          <tr>
                                            <td class="table-td">{{$faculties->id}}</td>
                                            <td class="table-td ">{{$faculties->faculty_name}}</td>
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
                                                <a href="/lecturer/admin/change_faculty_details/{{$faculties->id}}">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button>
                                                </a>
                                                <form action="/lecturer/admin/delete_faculty/{{$faculties->id}}" method="POST">
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
                                  </div>
                                </div>
                              </div>
                            </div>
  
                          </div>
  
                        </div>
                      </div>
                      {{-- Faculty End--}}

                    
                    
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