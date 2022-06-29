
 <div id="addmoneymodal" class="modal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form class="" action="{{route('add-money')}}" method="post">
         @csrf
         <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

      <div class="modal-header">
        <h2 class="font-medium text-base mr-auto">Add Money</h2>
        <!-- <button class="btn btn-outline-secondary hidden sm:flex"> -->

          <div class="dropdown sm:hidden">
            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
              <i data-feather="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
              <div class="dropdown-menu w-40">

               </div>
              </div>
            </div>
            <?php
            $wallet= App\Models\Wallet::where('status','1')->get();


             ?>

              <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                 <div class="col-span-12 sm:col-span-6">
                   <label class="modal-form-6">Select Wallet</label>


                     <div class="form-control"> <select name="payment_method_id" id="DestinationOptions" data-placeholder="Select Wallet" class="tom-select w-full">
                   @foreach($wallet as $row)
                    <option id="{{$row->wallet_id}}" value="{{$row->id}}">{{$row->name}}</option>
                   @endforeach

                  </select>
                </div>
              </div>
                <div class="col-span-12 sm:col-span-6">
                      <label for="modal-form-2" class="form-label">Amount</label>
                      <input name="amount" id="modal-form-2" min="10" type="number" class="form-control" placeholder="Enter Amount" required>
               </div>
               <div class="col-span-12 sm:col-span-12">

                  <label for="modal-form-1" class="form-label">Wallet Id</label>
                  <input readonly id="wallet_id"  type="text" class="form-control" placeholder="Wallet Id" required>
              </div>
              <div class="col-span-12 sm:col-span-12">

                 <label for="modal-form-1" class="form-label">Transaction Id</label>
                 <input name="txn_id" type="text" class="form-control" placeholder="Transaction Id" required>
             </div>
            </div>

                              <div class="modal-footer">
                                 <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                  <button type="submit" class="btn btn-primary w-20">Deposit</button>
                                </div> <!-- END: Modal Footer -->
                              </form>
                              </div>
                                </div>
                               </div>
