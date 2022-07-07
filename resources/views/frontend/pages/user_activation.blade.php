@extends('frontend.layouts.master')

@section('content')


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Sponsors Lists
    </h2>
</div>
@if(Session::has('activation_failed'))
<div class="alert alert-danger show mb-2" role="alert">Failed</div>
<div>
{{Session::get('activation_failed')}}
</div>
@elseif(Session::has('activation_success'))
<div class="alert alert-success show mb-2" role="alert">Success</div>
<div>
{{Session::get('activation_success')}}
</div>
@endif
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <!-- <button class="btn btn-primary shadow-md mr-2">Add New Product</button> -->
        <div class="dropdown">
            <!-- <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button> -->
            <div class="dropdown-menu w-40">
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
            </div>
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
        <div class="col-md-12 d-flex justify-content-center">
        <form class="" action="{{route('activate-user')}}" method="post">
          @csrf

          <input type="text" name="user_id" value="{{$user->id}}">
          <input type="text" id="sponsor" name="sponsor" value="{{$user->sponsor}}">


             <?php
             $package= App\Models\Package::where('status','1')->get();




              ?>

               <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                  <div class="col-span-12 sm:col-span-4">
                    <label class="modal-form-6">Select Package</label>


                      <div class="form-control"> <select name="package_id"  data-placeholder="Select Package" class="tom-select w-full">
                    @foreach($package as $row)
                     <option  value="{{$row->id}}">{{$row->package_name}}({{$row->package_price}})</option>
                    @endforeach

                   </select>
                 </div>
               </div>
               <div class="col-span-12 sm:col-span-4">
                 <label class="modal-form-6">Select Team</label>


                   <div class="form-control"> <select name="position" id="position"  data-placeholder="Select Position" class="tom-select w-full">





                       <option value="1">Team A</option>
                       <option value="2">Team B</option>
                       <option value="3">Team C</option>



                </select>

              </div>
            </div>
               <!-- <div class="col-span-12 sm:col-span-6">
                  <label for="modal-form-1" class="form-label">Placement Name</label>
                  <input id="sponsor" name="placement_id" type="text" class="form-control" placeholder="Enter Placement Name" required>
                     <div id="suggestUser"></div>
              </div> -->
              <div class="col-span-12 sm:col-span-4">
                <label class="modal-form-6"> Placement Id</label>



                 <div class="form-control">
                   <input type="text" name="placement_id" readonly id="placement_id" value="">
             </div>
           </div>





             </div>

                <div class="d-flex justify-content-center">

                                   <button type="submit" class="btn btn-primary w-20">Submit</button>

                               </form>

                   </div>





    </div>
    @push('scripts')
    <script type="text/javascript">
    $(document).ready(function () {
    //alert('getstatus');
    //select2Me('');
    });
    //$("#successMessage").delay(10000).slideUp(300);
    // $('#sponsor').on('change', function (e) {
    //
    //     $('#placement_id').val('');
    //     $("#position").select2("val", "");
    // });

    $('#position').on('change', function (e) {

     var position = $(this).val();
    // if (position == '') {
    //     return false;
    // }
    var sponsor = $('#sponsor').val();


    //var position=  $('#position').val();
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    //url: $(this).attr('action'),
    url: '{{route("referrals-checkposition")}}',
    type: 'POST',
    data: {sponsor: sponsor, position: position},
    //dataType: 'json',
    success: function (data) {
    //alert('success');
    $('#placement_id').val(data);
    //location.reload();
    },
    error: function (data) {
    console.log(data);
    }
    });

    });

    </script>
    @endpush

@endsection
