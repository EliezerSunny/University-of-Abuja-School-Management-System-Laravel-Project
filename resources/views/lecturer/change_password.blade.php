@extends('layouts.lecturer_head')






    @section('change_password')
        



        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Settings</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                    <!-- profile info-500 -->
                    <div class="grid grid-cols-12 gap-6">



                      {{--Password--}}

                      <div class="lg:col-span-5 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">Password Management</h4>

                            <a href="{{url('/lecturer/settings_l')}}">
                              <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                              bg-black">Change Email</button>
                              </a>
                          </header>
  
                          
  
                              <div class="card-body p-6">
                              <div class="card-text h-full">

                                <form class="space-y-4" action="{{url('/lecturer/change_password')}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-area">
                                      <label for="current_password" class="form-label">Current Password</label>
                                      <div class="relative">
                                        <input id="current_password" type="password" name="current_password" class="form-control pr-9" placeholder="Current Password" required="required">
                                        <button id="passIcon" class="passIcon absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                          <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                          <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                        </button>
                                      </div>
                                    </div>

    
                                    <div class="input-area">
                                      <label for="password" class="form-label">New Password</label>
                                      <div class="relative">
                                        <input id="password" type="password" name="password" class="form-control pr-9" placeholder="New Password" required="required">
                                        <button id="passIcon" class="passIcon absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                          <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                          <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                        </button>
                                      </div>
                                    </div>


                                    <div class="input-area">
                                      <label for="password_confirmation" class="form-label">Confirm Password</label>
                                      <div class="relative">
                                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control pr-9" placeholder="Confirm Password" required="required">
                                        <button id="password_confirmation" class="passIcon absolute top-2.5 right-3 text-slate-300 text-xl p-0 leading-none" type="button">
                                          <iconify-icon id="passwordhide" class="inline-block" icon="heroicons-solid:eye-off"></iconify-icon>
                                          <iconify-icon id="passwordshow" class="hidden" icon="heroicons-outline:eye"></iconify-icon>
                                        </button>
                                      </div>
                                    </div>
  
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                              bg-black" title="Change" onclick="return confirm('Are you sure you want to change?')">Update</button>
                                  </form>

                              </div>
                            </div>
                          
                        </div>
                      </div>

                      {{--Password end--}}


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