@extends('layouts.head')






    @section('dashboard')
        
    


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
                  <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0
                  space-y-6 justify-between items-end relative z-[1]">
                    <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>
                    <div class="profile-box flex-none md:text-start text-center">
                      <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                        <div class="flex-none">
                          <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4
                                  ring-slate-100 relative">
                            <img src="{{asset('assets/images/students/' . Auth::guard('web')->user()->picture)}}" alt="{{Auth::guard('web')->user()->name}}" title="{{Auth::guard('web')->user()->name}}" class="w-full h-full object-cover rounded-full">
                            <a href="{{route('change_picture.get')}}" class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center
                                      justify-center md:top-[140px] top-[100px]">
                              <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                            </a>
                          </div>
                        </div>
                        <div class="flex-1">
                          <div class="text-xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                            {{Auth::guard('web')->user()->name}}
                          </div>
                          <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                            {{Auth::guard('web')->user()->unique_id}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end profile box -->
                    <div class="profile-info-500 md:flex md:text-start text-left flex-1 max-w-[516px] md:space-y-0 space-y-4">
                      
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Faculty : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{Auth::guard('web')->user()->faculty->faculty_name}}
                          </span>
                        </div>

                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Department : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{Auth::guard('web')->user()->department->department_name}}
                          </span>
                        </div>

                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Programme : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{Auth::guard('web')->user()->faculty->faculty_award}} {{Auth::guard('web')->user()->department->department_name}}
                          </span>
                        </div>

                      </div>
                      <!-- end single -->
                      <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                          Level : 
                          <span class="text-sm text-slate-600 font-light dark:text-slate-400">
                            {{Auth::guard('web')->user()->level->level}}
                          </span>
                        </div>

                      </div>
                      <!-- end single -->

                    </div>
                    <!-- profile info-500 -->
                  </div>



                  <div class="lg:col-span-12 col-span-12">
                    <div class="card h-full">
                      <header class="card-header">
                        <h4 class="card-title">School charges</h4>
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
                                          Payment Description
                                        </th>
        
                                        <th scope="col" class=" table-th ">
                                          Level
                                        </th>
        
                                        <th scope="col" class=" table-th ">
                                          Amount
                                        </th>
        
                                      </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
        
                                      <tr>
                                        <td class="table-td">1</td>
                                        <td class="table-td ">{{$currentSession}}</td>
                                        @if ($amountt)
                                        <td class="table-td">
                                          {{$amountt->payment_name}}
                                        </td>
                                        @endif
                                        <td class="table-td ">{{Auth::guard('web')->user()->level->level}}</td>
                                        @if ($amountt)
                                        <td class="table-td ">{{$amountt->currency}} {{$amountt->amount}}</td>
                                        @endif
                                        <td class="table-td ">
                                      </tr>
        
                                      {{--STOP--}}
        
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>



                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-3">

                    <div class="lg:col-span-7 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Check Course Reg.</h4>

                          <a href="{{route('add_course_reg.get')}}">
                            <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                            bg-black">Add</button>
                            </a>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                          <form class="space-y-4" action="{{route('check_course_reg.get')}}" method="GET" enctype="multipart/form-data" id="multipleValidation">
                          {{-- @csrf --}}

                          <div class="input-area">
                            <label for="basicSelect" class="form-label">Select Session</label>
                            <div class="relative">
                          <select name="level" id="basicSelect" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select level</option>
                            @foreach ($level as $levels)
                            <option value="{{$levels->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" required>{{$levels->level}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                          <div class="input-area">
                            <label for="semester_id" class="form-label">Semester:</label>
                            <div class="relative">
                              <select name="semester" id="semester_id" class="form-control w-full mt-2">
                                <option selected="Selected" value="{{0}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Both</option>
                                        @foreach ($semester as $semesters)
                                          <option value="{{$semesters->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" required>{{$semesters->semester}}</option>
                                          @endforeach
                              </select>  
                            </div>
                          </div>


                          <div class="input-area" hidden>
                            <label for="tokens" class="form-label">Token:</label>
                            <div class="relative">
                              <input type="text" class="form-control pr-9" readonly name="t" value="{{$tokensss}}" required> 
                            </div>
                          </div>


                          <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                          bg-black">Submit</button>
                          </form>
                          </div>
                        </div>

                      </div>
                    </div>


                    <div class="lg:col-span-5 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Check Result</h4>

                          <a href="{{route('check_result.get')}}">
                            <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                            bg-black">Check</button>
                            </a>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                          <form class="space-y-4" action="{{route('check_result.get')}}" method="GET" enctype="multipart/form-data" id="multipleValidation">
                          {{-- @csrf --}}
                          <div class="input-area">
                            <label for="level" class="form-label">Select Session</label>
                            <div class="relative">
                          <select name="level" id="level" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select level</option>
                                      @foreach ($level as $levels)
                                      <option value="{{$levels->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" required>{{$levels->level}}</option>
                                      @endforeach
                          </select>
                            </div>
                          </div>

                          <div class="input-area">
                            <label for="semester_id" class="form-label">Semester:</label>
                            <div class="relative">
                              <select name="semester" id="semester_id" class="form-control w-full mt-2">
                                <option selected="Selected" value="{{0}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Both</option>
                                          @foreach ($semester as $semesters)
                                          <option value="{{$semesters->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600" required>{{$semesters->semester}}</option>
                                          @endforeach
                              </select>  
                            </div>
                          </div>


                          <div class="input-area" hidden>
                            <label for="tokens" class="form-label">Token:</label>
                            <div class="relative">
                              <input type="text" class="form-control pr-9" readonly name="t" value="{{$tokensss}}" required> 
                            </div>
                          </div>

                          <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                          bg-black">Submit</button>
                          </form>
                          </div>
                        </div>

                      </div>
                    </div>


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Payment Receipts</h4>
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
                                            Payment Description
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Level
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Amount
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Status
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Action
                                          </th>
          
                                        </tr>
                                      </thead>
                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">1</td>
                                          <td class="table-td ">2018/2019</td>
                                          <td class="table-td">
                                            School Charges
                                          </td>
                                          <td class="table-td ">400</td>
                                          <td class="table-td "># 49,000</td>
                                          <td class="table-td ">
                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                        bg-success-500">
                                              Successful
                                            </div>
                                          </td>
                                          <td class="table-td ">
                                            <div onclick="window.print()" class="inline-block cursor-pointer px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] text-white
                                        bg-black">Print
                                            </div>
                                          </td>
                                        </tr>
          
                                        {{--STOP--}}
          
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>


                    <div class="lg:col-span-7 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Password Management</h4>

                          <a href="{{route('change_password.get')}}">
                            <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                            bg-black">Change Password</button>
                            </a>
                        </header>

                        

                            <div class="card-body p-6">
                            <div class="card-text h-full">
                              <form class="space-y-4" id="multipleValidation">
                                <div class="input-area">
                                  <label for="password" class="form-label">Current Password</label>
                                  <div class="relative">
                                    <input id="current_password" type="password" name="current_password" value="**********" disabled class="form-control pr-9" placeholder="Current Password" required="required">
                                    <button id="passIcon" class="passIcon absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                      <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                      <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                    </button>
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="password" class="form-label">New Password</label>
                                  <div class="relative">
                                    <input id="password" type="password" name="password" value="**********" disabled class="form-control pr-9" placeholder="New Password" required="required">
                                    <button id="passIcon" class="passIcon absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                      <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                      <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                    </button>
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="confirm_password" class="form-label">Confirm New Password</label>
                                  <div class="relative">
                                    <input id="confirm_password" type="password" name="confirm_password" value="**********" disabled class="form-control pr-9" placeholder="Confirm New Password" required="required">
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
                                  {{Auth::guard('web')->user()->email}}
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
                                <a href="tel:0189749676767" class="text-base text-slate-600 dark:text-slate-50">
                                  +234{{Auth::guard('web')->user()->phone_no}}
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
                                  {{Auth::guard('web')->user()->location}}
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
              <!-- Main Board End-->

            </div>
          </div>
        </div>
        <!-- END: Main_content -->



        @endsection
