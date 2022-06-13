@extends('backend.layouts.master')

@section('backend_content')


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Package Lists
    </h2>
</div>
@if(Session::has('package_updated'))
<div class="alert alert-success show mb-2" role="alert">Success</div>
<div>
{{Session::get('package_updated')}}
</div>
@endif
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <!-- <button class="btn btn-primary shadow-md mr-2">Add New Product</button> -->
        <div class="dropdown">
          @if($package == null)
           <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#packageaddmodal" class="btn btn-primary"><span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span></a> </div>
           @endif

              @include('backend.modals.packageaddmodal')
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
        <form class="" action="{{route('update-package')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$package->id}}">
        <!-- <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div> -->
    </div>
    <!-- BEGIN: Data List -->





       <div class="col-span-12 sm:col-span-6">
          <label for="modal-form-1" class="form-label">Package Name</label>
          <input id="modal-form-1" value="{{$package->package_name}}" name="package_name" type="text" class="form-control" placeholder="Enter Package Name" required>
      </div>
      <div class="col-span-12 sm:col-span-6">
            <label for="modal-form-6" class="form-label">Price</label>
            <input name="package_price" value="{{$package->package_price}}" id="modal-form-6" type="text" class="form-control" placeholder="Enter Package Price" required>
     </div>
      <div class="col-span-12 sm:col-span-6">
               <label for="modal-form-1" class="form-label">Package ROI (%)</label>
               <input id="modal-form-1" value="{{$package->roi}}" name="roi" type="text" class="form-control" placeholder="Enter return of Investment" required>
      </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Sponsor Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->sponsor_bonus}}" type="text" name="sponsor_bonus" class="form-control" placeholder="Enter Sponsor Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 1 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_1}}" type="text" name="lvl_1" class="form-control" placeholder="Enter Level 1 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 2 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_2}}" type="text" name="lvl_2" class="form-control" placeholder="Enter Level 2 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 3 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_3}}" type="text" name="lvl_3" class="form-control" placeholder="Enter Level 3 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 4 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_4}}" type="text" name="lvl_4" class="form-control" placeholder="Enter Level 4 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 5 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_5}}" type="text" name="lvl_5" class="form-control" placeholder="Enter Level 5 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 6 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_6}}" type="text" name="lvl_6" class="form-control" placeholder="Enter Level 6 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 7 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_7}}" type="text" name="lvl_7" class="form-control" placeholder="Enter Level 7 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 8 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_8}}" type="text" name="lvl_8" class="form-control" placeholder="Enter Level 8 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 9 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_9}}" type="text" name="lvl_9" class="form-control" placeholder="Enter Level 9 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 10 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_10}}" type="text" name="lvl_10" class="form-control" placeholder="Enter Level 10 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 11 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_11}}" type="text" name="lvl_11" class="form-control" placeholder="Enter Level 11 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 12 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_12}}" type="text" name="lvl_12" class="form-control" placeholder="Enter Level 12 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 13 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_13}}" type="text" name="lvl_13" class="form-control" placeholder="Enter Level 13 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 14 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_14}}" type="text" name="lvl_14" class="form-control" placeholder="Enter Level 14 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 15 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$package->lvl_15}}" type="text" name="lvl_15" class="form-control" placeholder="Enter Level 15 Gen Bonus" required>
               </div>

                   <div class="col-span-12 sm:col-span-6">
                     <label for="modal-form-6" class="form-label">Status</label>
                     <select name="status" id="modal-form-6" class="form-select">
                       <option selected>
                         @if($package->status == 1)
                         Active
                         @else
                         Inactive
                         @endif
                       </option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

                      </select>
                    </div>



                        <button type="submit" class="btn btn-primary w-20">Update</button>
                        </form>

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


@endsection
