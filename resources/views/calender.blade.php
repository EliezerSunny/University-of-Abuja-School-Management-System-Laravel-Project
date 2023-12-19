@extends('layouts.head')






    @section('calender')




        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <!-- Main Board-->
              <div>

                <div class="flex justify-between flex-wrap items-center mb-3">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Calender</h4>
                </div>

                @include('layouts.messages')


                <!-- Main Profile-->
                {{-- <div class="space-y-5 profile-page"> --}}
                  

                    <!-- profile info-500 -->
                    {{-- <div class="grid grid-cols-12 gap-6"> --}}
  
                        
                        {{--Calender--}}
                        
                  
                                <div class="dashcode-calender">
                                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0 mb-6">
                                    {{-- Calender --}}
                                  </h4>
                                  <div class="grid grid-cols-12 gap-4">
                                    <div class="lg:col-span-3 col-span-12 card p-6">
                                      <button class="btn btn-dark block w-full add-event">
                                        add event
                                      </button>
                                      <div class="block py-4 text-slate-800 dark:text-slate-400 font-semibold text-xs uppercase mt-4">
                                        FILTER
                                      </div>
                                      <ul class="space-y-2">
                                        <li>
                                          <div class="checkbox-area primary-checkbox">
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input type="checkbox" class="hidden" name="category" checked value="all">
                                              <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative
                                                          transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                      <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0">
                                                  </span>
                                              <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">All</span>
                                            </label>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="checkbox-area primary-checkbox">
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input type="checkbox" class="hidden" name="category" checked value="business">
                                              <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative
                                                          transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                      <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0">
                                                  </span>
                                              <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">Business</span>
                                            </label>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="checkbox-area success-checkbox">
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input type="checkbox" class="hidden" name="category" checked value="personal">
                                              <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative
                                                          transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                      <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0">
                                                  </span>
                                              <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">personal</span>
                                            </label>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="checkbox-area danger-checkbox">
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input type="checkbox" class="hidden" name="category" checked value="holiday">
                                              <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative
                                                          transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                      <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0">
                                                  </span>
                                              <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">Holiday</span>
                                            </label>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="checkbox-area info-checkbox">
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input type="checkbox" class="hidden" name="category" checked value="family">
                                              <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative
                                                          transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                      <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0">
                                                  </span>
                                              <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">family</span>
                                            </label>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="checkbox-area warning-checkbox">
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input type="checkbox" class="hidden" name="category" checked value="meeting">
                                              <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative
                                                          transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                      <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0">
                                                  </span>
                                              <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">meeting</span>
                                            </label>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="checkbox-area info-checkbox">
                                            <label class="inline-flex items-center cursor-pointer">
                                              <input type="checkbox" class="hidden" name="category" checked value="etc">
                                              <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative
                                                          transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                      <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0">
                                                  </span>
                                              <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">etc</span>
                                            </label>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="lg:col-span-9 col-span-12 card p-6">
                                      <div id="full-calander-active"></div>
                                    </div>
                                  </div>
                                </div>
                                <!-- start add event modal -->
                                <div class=" addmodal-wrapper " id="addeventModal">
                                  <div class=" modal-overlay"></div>
                                  <!-- opacity -->
                                  <div class="modal-content">
                                    <div class="flex min-h-full justify-center text-center p-6 items-start ">
                                      <div class="w-full transform overflow-hidden rounded-md bg-white dark:bg-slate-800 text-left align-middle shadow-xl
                                          transition-alll max-w-xl opacity-100 scale-100">
                                        <div class="relative overflow-hidden py-4 px-5 text-white flex justify-between bg-slate-900 dark:bg-slate-800 dark:border-b
                                              dark:border-slate-700">
                                          <h2 class="capitalize leading-6 tracking-wider font-medium text-base text-white">Event</h2>
                                          <button class="text-[22px] close-event-modal">
                                            <iconify-icon icon="heroicons:x-mark"></iconify-icon>
                                          </button>
                                        </div>
                                        <!-- end modal header -->
                                        <div class="px-6 py-8">
                                          <form id="add-event-form" class="space-y-5">
                                            <div class="fromGroup">
                                              <label for="event-title" class=" form-label">Title:</label>
                                              <input type="text" id="event-title" name="event-title" placeholder="Add Title" class="form-control" required>
                                            </div>
                                            <div class="fromGroup">
                                              <label for="event-start-date" class=" form-label">Start Date</label>
                                              <input class="form-control py-2 startdate" id="event-start-date" type="text">
                                            </div>
                                            <div class="fromGroup">
                                              <label for="event-end-date" class=" form-label">End Date</label>
                                              <input class="form-control py-2 enddate" id="event-end-date" type="text">
                                            </div>
                                            <div class="fromGroup">
                                              <label for="event-category" class="form-label">Category:</label>
                                              <select id="event-category" name="event-category" required class="form-control">
                                                <option value="">Select a category</option>
                                                <option value="business">Business</option>
                                                <option value="personal">Personal</option>
                                                <option value="holiday">Holiday</option>
                                                <option value="family">Family</option>
                                                <option value="meeting">Meeting</option>
                                                <option value="etc">Etc</option>
                                              </select>
                                            </div>
                                            <div class="text-right">
                                              <button type="submit" id="submit-button" class="btn btn-dark">Add Event</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                  
                              

                      {{--Calender end--}}





                    {{-- </div> --}}
                    <!-- profile info-500 end-->

                {{-- </div> --}}
                <!-- Main Profile End-->

              </div>
              <!-- Main Board End-->

            </div>
          </div>
        </div>
        <!-- END: Main_content -->


        @endsection