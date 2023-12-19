@extends('layouts.head')






    @section('payment')
        
    


        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <!-- Main Board-->

                <div class="flex justify-between flex-wrap items-center mb-3">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Dashboard</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Payment Section -->
                  

                  <!-- Payment info-500 -->
                  <div class="grid grid-cols-12 gap-3">

                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <div class="wizard card">
                        <header class="card-header">
                          <h4 class="card-title">Payment</h4>
                        </header>

                        <div class="card-header">
                            <div class="card-note">
                                <p><b>About to make payment !!! </b></p>
                                <p class="card-notes"><b>NOTE:</b> It's important that you carefully check the type of payment you've selected to avoid payment error. After payment is not reversible!</p>
                            </div>
                        </div>
                        

                        <div class="card-body p-8">

                        <div class="wizard-steps flex z-[5] items-center relative justify-center md:mx-8">

                            {{-- <div class="bar-line"></div> --}}
                            <div class="  active pass  relative z-[1] items-center item flex flex-start flex-1
                                      last:flex-none group wizard-step" data-step="1">
                              <div class="number-box">
                                <span class="number">
                                  <span style="font-size: 12px">Done</span>
                              </span>
                                <span class="no-icon text-3xl">
                                  <iconify-icon icon="bx:check-double"></iconify-icon>
                              </span>
                              </div>
                              <div class="bar-line"></div>
                              <div class="circle-box">
                                <span class="w-max">Payment Selection</span>
                              </div>
                            </div>
      
                            <div class="  active pass  relative z-[1] items-center item flex flex-start flex-1
                                      last:flex-none group wizard-step" data-step="2">
                              <div class="number-box">
                                <span class="number">
                                  <span style="font-size: 12px">Done</span>
                              </span>
                                <span class="no-icon text-3xl">
                                  <iconify-icon icon="bx:check-double"></iconify-icon>
                              </span>
                              </div>
                              <div class="bar-line"></div>
                              <div class="circle-box">
                                <span class="w-max">Payment Preview</span>
                              </div>
                            </div>
      
                            <div class=" active pass  relative z-[1] items-center item flex flex-start flex-1
                                      last:flex-none group wizard-step" data-step="3">
                              <div class="number-box">
                                <span class="number">
                                  3
                              </span>
                                <span class="no-icon text-3xl">
                                  <iconify-icon icon="bx:check-double"></iconify-icon>
                              </span>
                              </div>
                              <div class="bar-line"></div>
                              <div class="circle-box">
                                <span class="w-max">Make Payment</span>
                              </div>
                            </div>
                            {{-- <div class="bar-line"></div> --}}
      
                          </div>

                        </div>

                        <div class="card-body p-6">
                            <div class="card-text h-full">

                          <form class="space-y-4 wizard-form" id="paymentForm">

                            
                            <div class="grid md:grid-cols-2 gap-6">

                              <div class="input-area">
                                <label for="matric_no" class="form-label">Matric No.:</label>
                                <div class="relative">
                                  <input id="matric_no" type="text" name="matric_no" readonly value="{{Auth::guard('web')->user()->unique_id}}" class="form-control" placeholder="Matric No." required="required">
                                </div>
                              </div>

                              <div class="input-area">
                                <label for="full_name" class="form-label">Full Name:</label>
                                <div class="relative">
                                  <input id="full_name" type="text" name="full_name" readonly value="{{Auth::guard('web')->user()->name}}" class="form-control" placeholder="Full Name" required="required">
                                </div>
                              </div>


                              <div class="input-area">
                                <label for="faculty" class="form-label">Faculty:</label>
                                <div class="relative">
                                  <input id="faculty" type="text" name="faculty" readonly value="{{Auth::guard('web')->user()->faculty->faculty_name}}" class="form-control" placeholder="Faculty" required="required">
                                </div>
                              </div>


                              <div class="input-area">
                                <label for="department" class="form-label">Department:</label>
                                <div class="relative">
                                  <input id="department" type="text" name="department" readonly value="{{Auth::guard('web')->user()->department->department_name}}" class="form-control" placeholder="Department" required="required">
                                </div>
                              </div>


                              <div class="input-area">
                                <label for="programme" class="form-label">Programme:</label>
                                <div class="relative">
                                  <input id="programme" type="text" name="programme" readonly value="{{Auth::guard('web')->user()->faculty->faculty_award}} {{Auth::guard('web')->user()->department->department_name}}" class="form-control" placeholder="Programme" required="required">
                                </div>
                              </div>


                              <div class="input-area">
                                <label for="level" class="form-label">Level:</label>
                                <div class="relative">
                                  <input id="level" type="text" name="level" readonly value="{{Auth::guard('web')->user()->level->level}}" class="form-control" placeholder="Level" required="required">
                                </div>
                              </div>



                                <div class="input-area">
                                    <label for="email_address" class="form-label">Email:</label>
                                    <div class="relative">
                                      <input id="email_address" type="email" name="email_address" value="{{Auth::guard('web')->user()->email}}" readonly class="form-control" placeholder="Email" required="required">
                                    </div>
                                  </div>
                                  
                                  
                                  <div class="input-area">
                                    <label for="payment_name" class="form-label">Payment Name:</label>
                                    <div class="relative">
                                      <input id="payment_name" type="text" name="payment_name" class="form-control" readonly value="{{$payment_name}}" placeholder="Payment Name" required="required">
                                    </div>
                                  </div>

                                

                                  <div class="input-area">
                                    <label for="amount" class="form-label">Amount:</label>
                                    <div class="relative">
                                      <input id="amount" type="tel" name="amount" class="form-control" readonly value="{{$amount}}" placeholder="Amount" required="required">
                                    </div>
                                  </div>

                        
                              
                              </div>

                            <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                          bg-black" onclick="payWithPaystack()">Pay</button>

                          </form>

                            </div>
                        </div>

                      </div>
                    </div>

                    </div>



                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">Recent Payment Made</h4>
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
                                            Academic Session
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
                                            <div class="inline-block cursor-pointer px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] text-white
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


                    
                  </div>
                  <!-- Payment info-500 end-->

                <!-- Main Payment Section End-->

              <!-- Main Board End-->

            </div>
          </div>
        </div>
        <!-- END: Main_content -->


        @endsection