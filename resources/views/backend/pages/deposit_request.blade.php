@extends('backend.layouts.master')

@section('backend_content')


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Deposit Requests
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <!-- <button class="btn btn-primary shadow-md mr-2">Add New Product</button> -->
        <div class="dropdown">
           <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#packageaddmodal" class="btn btn-primary"><span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span></a> </div>



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
                    <th class="whitespace-nowrap">User Name</th>
                    <th class="whitespace-nowrap">Amount</th>
                    <th class="whitespace-nowrap">Method</th>
                    <th class="whitespace-nowrap">Txn Id</th>

                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
              @foreach($deposit as $row)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            {{$loop->index+1}}
                        </div>
                    </td>
                    <td>

                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$row->user->user_name}}</div>
                    </td>
                    <td>

                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$row->amount}}</div>
                    </td>
                    <td>

                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$row->wallet->name}}</div>
                    </td>
                    <td class="text-center">{{$row->txn_id}}</td>
                    <td class="w-40">
                      @if($row->status == 'approve')
                        <div class="flex items-center justify-center text-success"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Approved </div>
                        @elseif($row->status == 'pending')
                          <div class="flex items-center justify-center text-warning"> <i data-feather="truck" class="w-4 h-4 mr-2"></i> Pending </div>
                        @else
                            <div class="flex items-center justify-center text-danger"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i> Rejected</div>
                            @endif
                    </td>
                    <td class="table-report__action w-56">
                      @if($row->status == 'pending')
                        <div class="flex justify-center items-center">
                            <a  class="flex items-center mr-3 text-success" href="/admin/home/add-money-approve/{{$row->id}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Approve </a>
                            <a class="flex items-center text-danger" href="/admin/home/add-money-reject/{{$row->id}}"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Rejected </a>
                        </div>
                        @else
                        No Action Required
                        @endif
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

@endsection
