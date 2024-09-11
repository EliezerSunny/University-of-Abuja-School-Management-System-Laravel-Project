@extends('layouts.admin_head')






    @section('edit_countdown')
        


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Countdown</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">


                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Change Countdown</h4>
                        </header>

                        <div class="card-body p-6">
                          <div class="card-text h-full">
                            
                            <form class="space-y-4" action="/lecturer/admin/edit_countdown/{{$countdown->id}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 gap-6">
                              <div class="input-area">
                                  <label for="coursereg_timer" class="form-label">Countdown:</label>
                                  <div class="relative">
                                    <input id="coursereg_timer" type="text" name="coursereg_timer" value="{{$countdown->coursereg_timer}}" class="form-control" placeholder="Countdown" required="required">
                                  </div>
                                </div>


                                </div>
                                
                                    <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                bg-black" title="Change" onclick="return confirm('Are you sure you want to CHANGE?')">Update</button>
                                    
                            </form>

                          </div>
                        </div>

                      </div>
                    </div>


                    {{-- Countdown --}}
                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">All Countdown</h4>
  
                            <a href="{{('/lecturer/admin/upload_countdown')}}">
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
                                              Countdown
                                            </th>
  
                                            <th scope="col" class=" table-th ">
                                              Added Date
                                            </th>

                                            <th scope="col" class=" table-th ">
                                              Updated Date
                                            </th>
  
                                            <th scope="col" class=" table-th ">
                                              Action
                                            </th>
            
                                          </tr>
                                        </thead>

                                        @if (count($countdowns) === 0)
                                  <td>
                                     <th colspan="5">
                                        <h5 style="color:red; text-align: center;">No record found</h5>
                                     </td>
                                  </tr>
                                  @else
  
                                        @foreach ($countdowns as $countdown)
  
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            
                                          <tr>
                                            <td class="table-td">{{$countdown->id}}</td>
                                            <td class="table-td ">{{$countdown->coursereg_timer}}</td>
                                            <td class="table-td ">{{$countdown->created_at->diffForHumans()}}</td>
                                            <td class="table-td ">{{$countdown->updated_at->diffForHumans()}}</td>
                                            
                                            <td class="table-td ">
                                              <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a href="/lecturer/admin/edit_countdown/{{$countdown->id}}">
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
                                    {{$countdowns->links()}}
                                  </div>
                                </div>
                              </div>
                            </div>
  
                          </div>
  
                        </div>
                      </div>
                      {{-- Countdown End--}}

                    
                    
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
