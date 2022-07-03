@extends('frontend.layouts.master')

@section('content')


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        User Payment Settings
    </h2>
</div>
@if(Session::has('payment_updated'))
<div class="alert alert-success show mb-2" role="alert">Success</div>
<div>
{{Session::get('payment_updated')}}
</div>

@endif
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <!-- <button class="btn btn-primary shadow-md mr-2">Add New Product</button> -->
        <div class="dropdown">
           <div class="text-center">  </div>



            </button>
            <!-- <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </li>
                </ul>
            </div> -->
        </div>
        <!-- <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div> -->
    </div>
    <!-- BEGIN: Data List -->


    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">

      <div class="grid grid-cols-12 gap-6">
          <!-- BEGIN: Profile Menu -->
          <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
              <div class="intro-y box mt-5">
                  <div class="relative flex items-center p-5">
                      <div class="w-12 h-12 image-fit">
                        @if(Auth::user()->image != null)

                          <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{asset('storage/users/'. Auth::user()->image)}}">
                          @else

                            <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{asset('dist/images/profile-8.jpg')}}">
                          @endif
                      </div>
                      <div class="ml-4 mr-auto">
                          <div class="font-medium text-base">{{Auth::user()->name}}</div>

                      </div>

                  </div>
                  <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                      <a class="flex items-center text-primary font-medium" href="#"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Payment Information </a>
                      <!-- <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Account Settings </a> -->

                      <!-- <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> User Settings </a> -->
                  </div>
                  <!-- <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                      <a class="flex items-center" href=""> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Email Settings </a>
                      <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Saved Credit Cards </a>
                      <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Social Networks </a>
                      <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Tax Information </a>
                  </div> -->

              </div>
          </div>
          <!-- END: Profile Menu -->
          <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
              <!-- BEGIN: Display Information -->
              <div class="intro-y box lg:mt-5">
                  <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                      <h2 class="font-medium text-base mr-auto">
                        Wallet Information
                      </h2>
                  </div>
                  <div class="p-5">
                    <form class="" action="{{route('update-payment')}}" method="post" enctype="multipart/form-data">
                      @csrf

                      <div class="flex flex-col-reverse xl:flex-row flex-col">
                        @if($payment != null)

                          <input type="hidden" name="id" value="{{$payment->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                          @endif
                          <div class="flex-1 mt-6 xl:mt-0">
                              <div class="grid grid-cols-12 gap-x-5">
                                  <div class="col-span-12 2xl:col-span-6">

                                    <div>
                                        <label for="update-profile-form-1" class="form-label">Account Name</label>
                                        @if($payment != null)
                                        <input id="update-profile-form-1" type="text" class="form-control" name="acc_name" placeholder="Input Account Name" value="{{$payment->acc_name}}" required>

                                        @else

                                          <input id="update-profile-form-1" type="text" class="form-control" name="acc_name" placeholder="Input Account Name"  required>
                                        @endif
                                    </div>
                                    <br>

                                      <br>
                                      <div>
                                          <label for="update-profile-form-1" class="form-label">Wallet Number</label>
                                          @if($payment != null)
                                          <input id="update-profile-form-1" type="text" class="form-control" name="wallet_no" placeholder="Input Wallet Number" value="{{$payment->wallet_no}}">
                                          @else
                                            <input id="update-profile-form-1" type="text" class="form-control" name="wallet_no" placeholder="Input Wallet Number" required>
                                          @endif
                                      </div>
                                      <br>


                                  </div>
                                  <?php

                                  $payment_method= App\Models\Wallet::where('status',1)->get();

                                   ?>
                                  <div class="col-span-12 2xl:col-span-6">
                                      <div class="mt-3 2xl:mt-0">
                                          <label for="update-profile-form-3" class="form-label">Payment Method</label>
                                          <select required name="payment_method_id" id="update-profile-form-3" data-search="true" class="tom-select w-full">

                                            @foreach($payment_method as $row)


                                              <option value="{{$row->id}}">{{$row->name}}</option>

                                              @endforeach


                                          </select>
                                      </div>

                                  </div>



                              </div>
                              <br>
                              <br>
                              <button type="submit" class="btn btn-primary w-20 mt-3">Update</button>
                          </div>


                      </div>
                        </form>
                  </div>
              </div>
              <!-- END: Display Information -->
              <!-- BEGIN: Personal Information -->
              <!-- <div class="intro-y box mt-5">
                  <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                      <h2 class="font-medium text-base mr-auto">
                          Wallet Information
                      </h2>
                  </div>
                  <div class="p-5">
                      <div class="grid grid-cols-12 gap-x-5">
                          <div class="col-span-12 xl:col-span-6">
                              <div>
                                  <label for="update-profile-form-6" class="form-label">Email</label>
                                  <input id="update-profile-form-6" type="text" class="form-control" placeholder="Input text" value="russellcrowe@left4code.com" disabled>
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-7" class="form-label">Name</label>
                                  <input id="update-profile-form-7" type="text" class="form-control" placeholder="Input text" value="Russell Crowe" disabled>
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-8" class="form-label">ID Type</label>
                                  <select id="update-profile-form-8" class="form-select">
                                      <option>IC</option>
                                      <option>FIN</option>
                                      <option>Passport</option>
                                  </select>
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-9" class="form-label">ID Number</label>
                                  <input id="update-profile-form-9" type="text" class="form-control" placeholder="Input text" value="357821204950001">
                              </div>
                          </div>
                          <div class="col-span-12 xl:col-span-6">
                              <div class="mt-3 xl:mt-0">
                                  <label for="update-profile-form-10" class="form-label">Phone Number</label>
                                  <input id="update-profile-form-10" type="text" class="form-control" placeholder="Input text" value="65570828">
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-11" class="form-label">Address</label>
                                  <input id="update-profile-form-11" type="text" class="form-control" placeholder="Input text" value="10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore">
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-12" class="form-label">Bank Name</label>
                                  <select id="update-profile-form-12" data-search="true" class="tom-select w-full">
                                      <option value="1">SBI - STATE BANK OF INDIA</option>
                                      <option value="1">CITI BANK - CITI BANK</option>
                                  </select>
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-13" class="form-label">Bank Account</label>
                                  <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" value="DBS Current 011-903573-0">
                              </div>
                          </div>
                      </div>
                      <div class="flex justify-end mt-4">
                          <button type="button" class="btn btn-primary w-20 mr-auto">Save</button>
                          <a href="" class="text-danger flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete Account </a>
                      </div>
                  </div>
              </div> -->
              <!-- END: Personal Information -->
          </div>
      </div>



    </div>

    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <!-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                </li>
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                </li>
            </ul>
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div> -->
    <!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">
                        Do you really want to delete these records?
                        <br>
                        This process cannot be undone.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" class="btn btn-danger w-24">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
