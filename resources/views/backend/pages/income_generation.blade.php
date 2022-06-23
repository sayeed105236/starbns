@extends('backend.layouts.master')

@section('backend_content')


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Income Generation
    </h2>
</div>
@if(Session::has('gen_updated'))
<div class="alert alert-success show mb-2" role="alert">Success</div>
<div>
{{Session::get('gen_updated')}}
</div>
@endif
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <!-- <button class="btn btn-primary shadow-md mr-2">Add New Product</button> -->
        <div class="dropdown">



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
        <form class="" action="{{route('update-income-generation')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$i_generation->id}}">
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
                 <label for="modal-form-4" class="form-label">Level 1 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$i_generation->lvl_1}}" type="text" name="lvl_1" class="form-control" placeholder="Enter Level 1 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 2 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$i_generation->lvl_2}}" type="text" name="lvl_2" class="form-control" placeholder="Enter Level 2 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 3 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$i_generation->lvl_3}}" type="text" name="lvl_3" class="form-control" placeholder="Enter Level 3 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 4 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$i_generation->lvl_4}}" type="text" name="lvl_4" class="form-control" placeholder="Enter Level 4 Gen Bonus" required>
               </div>
               <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-4" class="form-label">Level 5 Gen Bonus (%)</label>
                 <input id="modal-form-4" value="{{$i_generation->lvl_5}}" type="text" name="lvl_5" class="form-control" placeholder="Enter Level 5 Gen Bonus" required>
               </div>
                <div class="col-span-12 sm:col-span-6">
                   </div>
                   <div class="" style="text-align:center;">


                <div class="d-flex justify-content-center">

                <button type="submit" class="btn btn-primary w-20">Update</button>
              </div>
               </div>
            </form>

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
