@extends('layouts.admin_head')






    @section('dashboard')
        


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Dashboard</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0
                  space-y-6 justify-between items-end relative z-[1]">
                    <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>
                    <div class="profile-box flex-none md:text-start text-center">
                      <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                        <div class="flex-none">
                          <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4
                                  ring-slate-100 relative">
                            <img src="{{asset('assets/images/admin/' . auth()->guard('admin')->user()->picture)}}" alt="{{auth()->guard('admin')->user()->name}}" title="{{auth()->guard('admin')->user()->name}}" class="w-full h-full object-cover rounded-full">
                            <a href="{{('/lecturer/admin/change_picture')}}" class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center
                                      justify-center md:top-[140px] top-[100px]">
                              <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                            </a>
                          </div>
                        </div>
                        <div class="flex-1">
                          <div class="text-xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                            {{auth()->guard('admin')->user()->name}}
                          </div>
                          <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                            {{auth()->guard('admin')->user()->position}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end profile box -->
                    <div class="profile-info-500 md:flex md:text-start text-left flex-1 max-w-[516px] md:space-y-0 space-y-4">
                      
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          School mail : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{auth()->guard('admin')->user()->school_email}}
                          </span>
                        </div>
                        
                      </div>
                      <!-- end single -->

                    </div>
                    <!-- profile info-500 -->
                  </div>




                  <div class="2xl:col-span-9 lg:col-span-8 col-span-12">
                    <div class="p-4 card">
                      <div class="grid md:grid-cols-3 col-span-1 gap-4">

                        <!-- BEGIN: Group Chart2 -->

                        <a href="{{('/lecturer/admin/add_admin')}}">
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 " title="Total Admin">
                          <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                              <div id="wline1"></div>
                            </div>
                            <div class="flex-1">
                              <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                Total Admin
                              </div>
                              <div class="text-slate-900 dark:text-white text-lg font-medium">
                                {{Auth::guard('admin')->user()->count()}}
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>

                        <a href="{{('/lecturer/admin/add_lecturer')}}">
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#FFEDE5] dark:bg-slate-900	 " title="Total Lecturer">
                          <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                              <div id="wline1"></div>
                            </div>
                            <div class="flex-1">
                              <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                Total Lecturer
                              </div>
                              <div class="text-slate-900 dark:text-white text-lg font-medium">
                                {{count($lecturer)}}
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>


                        <a href="{{('/lecturer/admin/add_student')}}">
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#EAE5FF] dark:bg-slate-900	 " title="Total Student">
                          <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                              <div id="wline1"></div>
                            </div>
                            <div class="flex-1">
                              <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                Total Student
                              </div>
                              <div class="text-slate-900 dark:text-white text-lg font-medium">
                                {{count($student)}}
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>


                        <a href="{{('/lecturer/admin/add_faculty')}}">
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 " title="Total Faculty">
                          <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                              <div id="wline1"></div>
                            </div>
                            <div class="flex-1">
                              <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                Total Faculty
                              </div>
                              <div class="text-slate-900 dark:text-white text-lg font-medium">
                                {{count($faculty)}}
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>


                        <a href="{{('/lecturer/admin/add_department')}}">
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 " title="Total Department">
                          <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                              <div id="wline1"></div>
                            </div>
                            <div class="flex-1">
                              <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                Total Department
                              </div>
                              <div class="text-slate-900 dark:text-white text-lg font-medium">
                                {{count($department)}}
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>



                        <a href="{{('/lecturer/admin/add_section')}}">
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 " title="Total Section">
                          <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                              <div id="wline1"></div>
                            </div>
                            <div class="flex-1">
                              <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                Total Section
                              </div>
                              <div class="text-slate-900 dark:text-white text-lg font-medium">
                                {{count($section)}}
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>


                        <!-- BEGIN: Group Chart2 end -->

                      </div>
                    </div>
                  </div>



                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">

                    {{--Lecturer--}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Lecturers</h4>

                          <a href="{{('/lecturer/admin/add_lecturer')}}">
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

                                      @if (count($lecturer) === 0)
                                  <td>
                                     <th colspan="9">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else

                                      @foreach ($lecturer as $lecturers)

                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$lecturers->id}}</td>
                                          <td class="table-td ">{{$lecturers->unique_id}}</td>
                                          <td class="table-td">
                                            <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$lecturers->name}}</span>
                                          </td>
                                          <td class="table-td ">{{$lecturers->position}}</td>
                                          <td class="table-td ">
                                            <img src="{{asset('assets/images/lecturers/' . $lecturers->picture)}}" alt="{{$lecturers->name}}" title="{{$lecturers->name}}" class="object-cover w-full h-full rounded-full">
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
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{--Lecturer End--}}
                    

                    {{--Student--}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Students</h4>

                          <a href="{{('/lecturer/admin/add_student')}}">
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
                                            Section
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            School Email
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Phone No.
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

                                      @if (count($student) === 0)
                                  <td>
                                     <th colspan="9">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else

                                      @foreach ($student as $students)
                                          
                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$students->id}}</td>
                                          <td class="table-td ">{{$students->unique_id}}</td>
                                          <td class="table-td">
                                            <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$students->name}}</span>
                                          </td>
                                          <td class="table-td ">
                                            <img src="{{asset('assets/images/students/' . $students->picture)}}" alt="{{$students->name}}" title="{{$students->name}}" class="object-cover w-full h-full rounded-full">
                                          </td>
                                          <td class="table-td ">
                                            <div>
                                              {{$students->faculty->faculty_name}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$students->department->department_name}}</td>
                                          <td class="table-td ">{{$students->faculty->faculty_award}}</td>
                                          <td class="table-td ">{{$students->level->level}}</td>
                                          <td class="table-td ">
                                            <div>
                                              {{$students->section->section}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$students->school_email}}</td>
                                          <td class="table-td ">{{$students->phone_no}}</td>
                                          <td class="table-td ">{{$students->created_at->diffForHumans()}}</td>
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
                                              <a href="/lecturer/admin/change_student_details/{{$students->id}}">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button></a>
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
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{--Student End--}}


                    {{-- Faculty --}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Faculties</h4>

                          <a href="{{('/lecturer/admin/add_faculty')}}">
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
                                            Faculties
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

                                      @if (count($faculty) === 0)
                                  <td>
                                     <th colspan="5">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else

                                      @foreach ($faculty as $faculties)
                                      
                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$faculties->id}}</td>
                                          <td class="table-td ">{{$faculties->faculty_name}}</td>
                                          <td class="table-td ">{{$faculties->created_at->diffForHumans()}}</td>
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
                                                </button></a>
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
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{-- Faculty End--}}



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
                                            Updated Date
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Status
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Action
                                          </th>
          
                                        </tr>
                                      </thead>

                                      @if (count($department) === 0)
                                  <td>
                                     <th colspan="5">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else

                                      @foreach ($department as $departments)

                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$departments->id}}</td>
                                          <td class="table-td ">{{$departments->department_name}}</td>
                                          <td class="table-td ">{{$departments->department_abbreviation}}</td>
                                          <td class="table-td ">{{$departments->created_at->diffForHumans()}}</td>
                                          <td class="table-td ">{{$departments->updated_at->diffForHumans()}}</td>
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
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{-- Department End--}}




                    {{--Course--}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Courses</h4>

                          <a href="{{('/lecturer/admin/add_course')}}">
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
                                            Course code
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Course title
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Course unit
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Course status
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Faculty
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Department
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Level
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Semester
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Section
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

                                      @foreach ($course as $courses)
                                          
                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$loop->iteration}}</td>
                                          <td class="table-td ">{{$courses->course_code}}</td>
                                          <td class="table-td">
                                            <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$courses->course_title}}</span>
                                          </td>
                                          <td class="table-td ">{{$courses->course_unit}}</td>
                                          <td class="table-td ">{{$courses->course_status}}</td>
                                          <td class="table-td ">
                                            <div>
                                              {{$courses->faculty->faculty_name}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$courses->department->department_name}}</td>
                                          <td class="table-td ">{{$courses->level->level}}</td>
                                          <td class="table-td ">{{$courses->semester->semester}}</td>
                                          <td class="table-td ">{{$courses->section->section}}</td>
                                          <td class="table-td ">{{$courses->created_at->diffForHumans()}}</td>
                                          <td class="table-td ">
          
                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                        bg-success-500">
                                              {{$courses->status}}
                                            </div>
          
                                          </td>
                                          <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                              {{-- <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                              </button> --}}
                                              <a href="/lecturer/admin/change_course_details/{{$courses->id}}">
                                              <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                              </button></a>
                                              <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                              </button>
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
                    {{--Course End--}}




                    {{-- Level --}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Levels</h4>

                          <a href="{{('/lecturer/admin/add_level')}}">
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
                                            Student Levels
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Added Date
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Action
                                          </th>
          
                                        </tr>
                                      </thead>

                                      @if (count($level) === 0)
                                  <td>
                                     <th colspan="5">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else

                                      @foreach ($level as $levels)

                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$loop->iteration}}</td>
                                          <td class="table-td ">{{$levels->level}}</td>
                                          <td class="table-td ">{{$levels->created_at->diffForHumans()}}</td>
                                          
                                          <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                              <div class="flex space-x-3 rtl:space-x-reverse">
                                                {{-- <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </button> --}}
                                                <a href="/lecturer/admin/change_level_details/{{$levels->id}}">
                                                  <button class="action-btn" type="button">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                  </button></a>
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
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{-- Level End--}}




                    {{-- Section --}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Sections</h4>

                          <a href="{{('/lecturer/admin/add_section')}}">
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
                                            Academic Section
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Added Date
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Action
                                          </th>
          
                                        </tr>
                                      </thead>

                                      @if (count($section) === 0)
                                  <td>
                                     <th colspan="4">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else

                                      @foreach ($section as $sections)

                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$sections->id}}</td>
                                          <td class="table-td ">{{$sections->section}}</td>
                                          <td class="table-td ">{{$sections->created_at->diffForHumans()}}</td>
                                          
                                          <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                              <div class="flex space-x-3 rtl:space-x-reverse">
                                                {{-- <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </button> --}}
                                                <a href="/lecturer/admin/change_section_details/{{$sections->id}}">
                                                  <button class="action-btn" type="button">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                  </button></a>
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
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{-- Section End--}}


                    <div class="lg:col-span-7 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Password Management</h4>

                          <a href="{{url('/lecturer/admin/change_password')}}">
                            <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                            bg-black">Change Password</button>
                            </a>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" id="multipleValidation">
                              @csrf
                              <div class="input-area">
                                <label for="password" class="form-label">Current Password</label>
                                <div class="relative">
                                  <input id="current_password" type="password" value="************" disabled name="current_password" class="form-control pr-9" placeholder="Current Password" required="required">
                                  <button id="passIcon" class="passIcon absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                    <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                    <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                  </button>
                                </div>
                              </div>

                              <div class="input-area">
                                <label for="password" class="form-label">New Password</label>
                                <div class="relative">
                                  <input id="password" type="password" name="password" value="************" disabled class="form-control pr-9" placeholder="New Password" required="required">
                                  <button id="passIcon" class="passIcon absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                    <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                    <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                  </button>
                                </div>
                              </div>

                              <div class="input-area">
                                <label for="confirm_password" class="form-label">Confirm New Password</label>
                                <div class="relative">
                                  <input id="confirm_password" type="password" name="confirm_password" value="************" disabled class="form-control pr-9" placeholder="Confirm New Password" required="required">
                                  <button id="ConfirmpassIcon" class="absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                    <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                    <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                  </button>
                                </div>
                              </div>
                              <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                          bg-black" disabled>Submit</button>
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="lg:col-span-5 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Personal Info</h4>
                        </header>
                        <div class="card-body p-6">
                          <ul class="list space-y-8">
                            <li class="flex space-x-3 rtl:space-x-reverse">
                              <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                <iconify-icon icon="heroicons:envelope"></iconify-icon>
                              </div>
                              <div class="flex-1">
                                <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                  EMAIL
                                </div>
                                <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50">
                                  {{auth()->guard('admin')->user()->email}}
                                </a>
                              </div>
                            </li>
                            <!-- end single list -->
                            <li class="flex space-x-3 rtl:space-x-reverse">
                              <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                <iconify-icon icon="heroicons:phone-arrow-up-right"></iconify-icon>
                              </div>
                              <div class="flex-1">
                                <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                  PHONE
                                </div>
                                <a href="tel:+2348154596494" class="text-base text-slate-600 dark:text-slate-50">
                                  {{auth()->guard('admin')->user()->phone_no}}
                                </a>
                              </div>
                            </li>
                            <!-- end single list -->
                            <li class="flex space-x-3 rtl:space-x-reverse">
                              <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                <iconify-icon icon="heroicons:map"></iconify-icon>
                              </div>
                              <div class="flex-1">
                                <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                  LOCATION
                                </div>
                                <div class="text-base text-slate-600 dark:text-slate-50">
                                  {{Auth::guard('admin')->user()->location}}
                                </div>
                              </div>
                            </li>
                            <!-- end single list -->
                          </ul>
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
