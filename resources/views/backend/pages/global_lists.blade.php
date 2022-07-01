@extends('backend.layouts.master')

@section('backend_content')


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Global Member Lists
    </h2>
</div>
@if(Session::has('bonus_added'))
<div class="alert alert-success show mb-2" role="alert">Success</div>
<div>
{{Session::get('bonus_added')}}
</div>
@endif
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <!-- <button class="btn btn-primary shadow-md mr-2">Add New Product</button> -->
        <div class="dropdown">
           <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#membershipmodal" class="btn btn-primary"> Give Global MemberShip Bonus </a> </div>
            @include('backend.modals.membershipbonusmodal')


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
        <table id="myTable" class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Name</th>
                    <th class="whitespace-nowrap">Email</th>
                    <th class="whitespace-nowrap">User Name</th>
                    <th class="whitespace-nowrap">Sponsor</th>
                    <th class="whitespace-nowrap">Placement</th>
                    <th class="whitespace-nowrap">Position</th>

                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
              @foreach($users as $row)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            {{$loop->index+1}}
                        </div>
                    </td>
                    <td>

                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$row->name}}</div>
                    </td>
                    <td>

                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$row->email}}</div>
                    </td>
                    <td>

                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$row->user_name}}</div>
                    </td>
                    <td class="text-center">{{$row->sponsors->user_name}}</td>
                      <td class="text-center">
                        @if($row->placement_id != null)

                        {{$row->placement_id}}
                        @else
                        No Placement Yet
                        @endif
                      </td>
                      <td class="text-center">
                        @if($row->position != null)
                        @if($row->position== 1)
                        TEAM A
                        @elseif($row->position== 2)
                        TEAM B
                        @else
                        TEAM C
                        @endif


                        @else
                      Free User
                        @endif
                      </td>
                    <td class="w-40">
                      @if($row->status == 1)
                        <div class="flex items-center justify-center text-success"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                        @else
                            <div class="flex items-center justify-center text-danger"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i> Inactive </div>
                            @endif
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
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
<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
    <nav class="w-full sm:w-auto sm:mr-auto">
        <ul class="pagination">
          <div class="container">

          </div>

        </ul>
    </nav>

</div>


@endsection
