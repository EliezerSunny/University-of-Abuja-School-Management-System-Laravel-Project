@extends('layouts.head')






    @section('settings')
        
    


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <!-- Main Board-->
              <div>

                <div class="flex justify-between flex-wrap items-center mb-3">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Settings</h4>
                </div>

                @include('layouts.messages')


                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                    <!-- profile info-500 -->
                    <div class="grid grid-cols-12 gap-6">
  
                        
                        {{--Email--}}

                      <div class="lg:col-span-5 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">Change Email</h4>

                            <a href="{{route('change_password.get')}}">
                              <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                              bg-black">Change password</button>
                              </a>
                          </header>
  
                          
  
                          <div class="card-body p-6">
                            <div class="card-text h-full">
                              
                              <form class="space-y-4" action="{{route('settings.put')}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf  
                                @method('PUT')
                                  <div class="grid md:grid-cols-7 gap-6">
                                    <div class="input-area">
                                        <label for="email" class="form-label">Change Email:</label>
                                        <div class="relative">
                                          <input id="email" type="email" name="email" class="form-control" placeholder="Change Email" value="{{Auth::guard('web')->user()->email}}" required="required">
                                        </div>
                                      </div>

                                      <div class="input-area">
                                        <label for="school_email" class="form-label">Change School Email:</label>
                                        <div class="relative">
                                          <input id="school_email" type="email" name="school_email" class="form-control" placeholder="Change School Email" value="{{Auth::guard('web')->user()->school_email}}" required="required">
                                        </div>
                                      </div>
  
                                  
                                  </div>
                                  
                                      <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                  bg-black" title="Change" onclick="return confirm('Are you sure you want to change?')">Update</button>
                                      
                              </form>
  
                            </div>
                          </div>
                          
                        </div>
                      </div>

                      {{--Email end--}}





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
  