@extends('layouts.admin_head')






    @section('add_payment')
        



        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Payment</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Add Payment</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="{{('/lecturer/admin/add_payment')}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                <div class="grid md:grid-cols-2 gap-6">
                              <div class="input-area">
                                  <label for="currency" class="form-label">Currency:</label>
                                  <select name="currency" id="currency" class="form-control w-full mt-2">
                                    <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select Currency</option>

                                    <option value="NGN" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">NGN</option>
                                    <option value="$" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">$</option>
                                   
                                  </select>
                                </div>

                                <div class="input-area">
                                  <label for="amount" class="form-label">Amount:</label>
                                  <div class="relative">
                                    <input id="amount" type="tel" name="amount" class="form-control" placeholder="Amount" required="required">
                                  </div>
                                </div>

                                <div class="input-area">
                                  <label for="payment_name" class="form-label">Payment Name:</label>
                                  <div class="relative">
                                    <input id="payment_name" type="text" name="payment_name" class="form-control" placeholder="Payment Name" required="required">
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
                                    <label for="section_id" class="form-label">Academic Section:</label>
                                    <select name="section_id" id="section_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($section as $sections)
                                      <option value="{{$sections->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$sections->section}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>

                                  {{-- <div class="input-area">
                                    <label for="semester_id" class="form-label">Semester:</label>
                                    <select name="semester_id" id="semester_id" class="form-control w-full mt-2">
                                      
                                      @foreach ($semester as $semesters)
                                      <option value="{{$semesters->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$semesters->semester}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div> --}}

                                  <div class="input-area">
                                    <label for="level_id" class="form-label">Level:</label>
                                    <select name="level_id" id="level_id" class="form-control w-full mt-2">
                                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                      
                                      @foreach ($level as $levels)
                                      <option value="{{$levels->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$levels->level}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>


                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" onclick="return confirm('Are you sure?')">Submit</button>
                                    
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>


                    {{--Payment--}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All Payment</h4>

                          {{-- <form action="{{url('/lecturer/admin/search_course')}}" method="GET">
                            <div class="relative">
                              <input id="search_course" type="text" name="q" class="form-control" placeholder="Search..." required="required">
                                <button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full text-xl dark:text-slate-300 flex items-center justify-center">
                                  <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                                </button>
                              </div>
                        </form> --}}
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
                                            Currency
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Amount
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Payment Name
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

                                      @if (count($payment) === 0)
                                  <td>
                                     <th colspan="12">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else

                                      @foreach ($payment as $payments)
                                          
                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$loop->iteration}}</td>
                                          <td class="table-td ">{{$payments->currency}}</td>
                                          <td class="table-td">
                                            <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{$payments->amount}}</span>
                                          </td>
                                          <td class="table-td ">{{$payments->payment_name}}</td>
                                          <td class="table-td ">
                                            <div>
                                              {{$payments->faculty->faculty_name}}
                                            </div>
                                          </td>
                                          <td class="table-td ">{{$payments->department->department_name}}</td>
                                          <td class="table-td ">{{$payments->level->level}}</td>
                                          <td class="table-td ">{{$payments->section->section}}</td>
                                          <td class="table-td ">{{$payments->created_at->diffForHumans()}}</td>
                                          <td class="table-td ">
          
                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                        bg-success-500">
                                              {{$payments->status}}
                                            </div>
          
                                          </td>
                                          <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                              {{-- <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:eye"></iconify-icon>
                                              </button> --}}
                                              <a href="/lecturer/admin/change_payment_details/{{$payments->id}}">
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
                                  {{$payment->links()}}
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{--Payment End--}}
                    
                    
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
