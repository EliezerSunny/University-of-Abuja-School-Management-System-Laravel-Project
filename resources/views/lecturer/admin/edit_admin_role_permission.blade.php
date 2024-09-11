@extends('layouts.admin_head')






    @section('edit_admin_role_permission')
        



        <!-- BEGIN: Main_content -->
        <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div id="content_layout">

              <div>


                <div class="flex justify-between flex-wrap items-center mb-6">
                  <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">Edit</h4>
                </div>

                @include('layouts.messages')

                <!-- Main Profile-->
                <div class="space-y-5 profile-page">
                  

                  <!-- profile info-500 -->
                  <div class="grid grid-cols-12 gap-6">




                    {{-- ADD PERMISSION --}}

                    <div class="lg:col-span-12 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">Admin Role & Permission</h4>
                          </header>
  
                          <div class="card-body p-6">
                            <div class="card-text h-full">
                              
                              <form class="space-y-4" action="/lecturer/admin/edit_admin_role_permission/{{$permissions->id}}&{{$permissions->admin->name}}" method="POST" enctype="multipart/form-data" id="multipleValidation">
                                  @csrf
                                  @method('PUT')
                                  <div class="grid md:grid-cols-2 gap-6">
  
                                    <div class="input-area">
                                        <label for="role_id" class="form-label">Role: {{$permissions->role->name}}</label>
                                        <select name="role_id" id="role_id" class="form-control w-full mt-2">
                                        <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                        
                                        @foreach ($role as $roles)
                                        <option value="{{$roles->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$roles->name}}</option>
                                        @endforeach
                                        
                                      </select>
                                      </div>
  
                                      <div class="input-area">
                                        <label for="permission_id" class="form-label">Permission: {{$permissions->permission->name}}</label>
                                        <select name="permission_id" id="permission_id" class="form-control w-full mt-2">
                                        <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option</option>
                                        
                                        @foreach ($permission as $permissions)
                                        <option value="{{$permissions->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{$permissions->name}}</option>
                                        @endforeach
                                        
                                      </select>
                                      </div>


                                      {{-- <div class="input-area">
                                        <label for="admin_id" class="form-label">Admin: {{$permissions->admin->name}}</label>
                                        <div class="relative">
                                            <input id="admin_id" type="text" name="admin_id" value="{{$permissions->admin->id}}" class="form-control" placeholder="Permission" required="required">
                                          </div>
                                      </div> --}}

  
                                    {{-- <div class="input-area">
                                      <label for="name" class="form-label">Permission:</label>
                                      <div class="relative">
                                        <input id="name" type="text" name="name" class="form-control" placeholder="Permission" required="required">
                                      </div>
                                    </div> --}}
  
  
                                  </div>
                                  
                                      <button class="flex justify-center cursor-pointer px-3 min-w-[90px] text-center ml-auto py-2 rounded-[999px] text-white
                                  bg-black" onclick="return confirm('Are you sure?')">Submit</button>
                                      
                              </form>
  
                            </div>
                          </div>
  
                        </div>
                      </div>

                    {{-- ADD PERMISSION END --}}


                    {{-- ROLE AND PERMISSION --}}
                    <div class="lg:col-span-12 col-span-12">
                      <div class="card h-full">
                        <header class="card-header">
                          <h4 class="card-title">All</h4>

                          <a href="{{route('lecturer.admin.admin_role_permission')}}">
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
                                            Admin
                                          </th>
          
                                          <th scope="col" class=" table-th ">
                                            Role
                                          </th>

                                          <th scope="col" class=" table-th ">
                                            Permission
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

                                      @if (count($arp) == 0)
                                <td>
                                   <th colspan="6">
                                      <h5 style="color:red; text-align: center;">No record found</h5>
                                   </td>
                                </tr>
                                @else

                                      @foreach ($arp as $permissions)

                                      <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
          
                                        <tr>
                                          <td class="table-td">{{$loop->iteration}}</td>
                                          <td class="table-td ">{{$permissions->admin->name}}</td>
                                          <td class="table-td ">{{$permissions->role->name}}</td>
                                          <td class="table-td ">{{$permissions->permission->name}}</td>
                                          <td class="table-td ">{{$permissions->created_at->diffForHumans()}}</td>
                                          <td class="table-td ">{{$permissions->updated_at->diffForHumans()}}</td>
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
                                              <a href="/lecturer/admin/edit_admin_role_permission/{{$permissions->id}}&{{$permissions->admin->name}}">
                                                <button class="action-btn" type="button">
                                                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button></a>
                                                <form action="/lecturer/admin/delete_admin_role_permission/{{$permissions->id}}" method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button class="action-btn" title="Delete" onclick="return confirm('Are you sure?')">
                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                              </button>
                                                </form>
                                            </div>
                                          </td>
                                        </tr>
          
                                        {{--STOP--}}
          
                                      </tbody>

                                      @endforeach
                                      @endif

                                    </table>
                                  </div>
                                  {{$role->links()}}
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    {{-- ROLE AND PERMISSION End--}}



                    
                    
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
