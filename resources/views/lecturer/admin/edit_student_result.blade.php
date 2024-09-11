@extends('layouts.admin_head')






    @section('edit_student_result')
        


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Results</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Edit Result</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="{{route('lecturer.admin.edit_student_for_result.get')}}" method="GET" enctype="multipart/form-data" id="multipleValidation">
                                
                                <div class="grid md:grid-cols-2 gap-6">
                              

                                  <div class="input-area">
                                    <label for="faculty_id" class="form-label">Faculty:</label>
                                    <select name="faculty_id" id="facultySelect" class="form-control w-full mt-2">
                                    <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                    
                                    @foreach ($faculty as $faculties)
                                    <option value="{{$faculties->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$faculties->faculty_name}}</option>
                                    @endforeach
                                    
                                  </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="department_id" class="form-label">Department:</label>
                                    <select name="department_id" id="departmentSelect" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($department as $departments)
                                      <option value="{{$departments->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$departments->department_name}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  <div class="input-area">
                                    <label for="session_id" class="form-label">Academic Section:</label>
                                    <select name="section_id" id="sectionSelect" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($section as $sections)
                                      <option value="{{$sections->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$sections->section}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>
                                  

                                  <div class="input-area">
                                    <label for="level_id" class="form-label">Level:</label>
                                    <select name="level_id" id="levelSelect" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($level as $levels)
                                      <option value="{{$levels->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$levels->level}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  <div class="input-area" hidden>
                                    <label for="tokens" class="form-label">Token:</label>
                                    <div class="relative">
                                      <input type="text" class="form-control pr-9" readonly name="t" value="{{$tokensss}}" required> 
                                    </div>
                                  </div>


                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" onclick="return confirm('Are you sure?')">Get Student</button>
                                    
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>


                    {{--Student--}}
                    <div class="lg:col-span-12 col-span-12" hidden>
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">All Student</h4>
  
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
                                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                                          <tr>
            
                                            <th scope="col" class=" table-th ">
                                              Id
                                            </th>

                                            <th scope="col" class=" table-th ">
                                              Name
                                            </th>

                                            <th scope="col" class=" table-th ">
                                              Matric No.
                                            </th>

                                            <th scope="col" class=" table-th ">
                                              Level
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
                                              Semesters
                                            </th>
  
                                            <th scope="col" class=" table-th ">
                                              Added Date
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Updated Date
                                            </th>
            
                                            <th scope="col" class=" table-th ">
                                              Status
                                            </th>
            
                                            {{-- <th scope="col" class=" table-th ">
                                              Action
                                            </th> --}}
            
                                          </tr>
                                        </thead>
  
                                        @if (count($students) === 0)
                                  <td>
                                     <th colspan="9">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else
  
                                        @foreach ($students as $student)
                                            
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700" id="studentList">
            
                                          <tr>
                                            <td class="table-td">{{$loop->iteration}}</td>
                                            <td class="table-td">{{$student->name}}</td>
                                            <td class="table-td">{{$student->unique_id}}</td>
                                            <td class="table-td">{{$student->level->level}}</td>
                                            <td class="table-td ">
                                                {{$student->faculty->faculty_name}}
                                            </td>
                                            <td class="table-td ">{{$student->department->department_name}}</td>
                                            <td class="table-td ">{{$student->section->section}}</td>
                                            <td class="table-td ">
                                              <a href="/lecturer/admin/edit_result/{{$student->id}}&{{$student->name}}">View Courses</a>
                                            </td>
                                            <td class="table-td ">{{$student->created_at->diffForHumans()}}</td>
                                            <td class="table-td ">{{$student->updated_at->diffForHumans()}}</td>
                                            <td class="table-td ">
            
                                              <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                          bg-success-500">
                                                {{$student->status}}
                                              </div>
            
                                            </td>
                                            {{-- <td class="table-td ">
                                              <div class="flex space-x-3 rtl:space-x-reverse">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </button>
                                                <a href="/lecturer/admin/change_course_details/{{$student->id}}">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button></a>
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                </button>
                                              </div>
                                            </td> --}}
                                          </tr>
            
                                          {{--STOP--}}
            
                                        </tbody>
  
                                        @endforeach
                                        @endif
  
                                      </table>
                                    </div>
                                    {{$students->links()}}
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  
  <script>
    $(document).ready(function(){
      $('#facultySelect').change(function(){
        var Stdid = $('#facultySelect').val(); 
         $.ajax({
            url:'http://127.0.0.1:8000/lecturer/admin/fetch_department',
            type:'POST',
            data:{id:Stdid},
            success:function(response)
            {
              $('#loading').css('display','block');
              setTimeout(function()
              { 
                  $('#departmentSelect').html(response);
                  $('#departmentSelect').show();
                  $('#loading').css('display','none');
              },3000);
            }
            // error: function() {
            //           alert('Error fetching Department.');
            //       }
         });
      });
    });
  </script>



@endsection
