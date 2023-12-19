@extends('layouts.lecturer_head')






    @section('change_picture')
        



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



                      {{--Change picture--}}
                      <div class="lg:col-span-7 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">Change Picture</h4>

                            <a href="{{url('/lecturer/settings_l')}}">
                                <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black">Change Email</button>
                                </a>
                          </header>
  
                          <div class="card-body p-6">
                            <div class="card-text h-full">
                              
                              <form class="space-y-4" action="{{('/lecturer/change_picture')}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                @method('Put')  
                                <div class="grid md:grid-cols-2 gap-6">

                                    <div class="input-area">
                                        <label for="name" class="form-label">Name:</label>
                                        <div class="relative">
                                          <input id="name" type="text" name="name" value="{{Auth::guard('lecturer')->user()->name}}" readonly class="form-control" placeholder="Name" required="required">
                                        </div>
                                      </div>

                                    <div class="input-area">
                                        <label for="picture" class="form-label">Change Picture:</label>
                                        <div class="relative">
                                          <input id="picture" type="file" name="picture" class="form-control" placeholder="Change Picture" required="required">
                                        </div>
                                      </div>
  
                                  
                                  </div>
                                  
                                      <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                  bg-black" title="Change" onclick="return confirm('Are you sure you want to change?')">Change Picture</button>
                                      
                              </form>
  
                            </div>
                          </div>
  
                        </div>
                      </div>

                      {{--Change picture end--}}


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