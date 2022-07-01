
 <div id="membershipmodal" class="modal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form class="" action="{{route('store-memebership-bonus')}}" method="post">
         @csrf


      <div class="modal-header">
        <h2 class="font-medium text-base mr-auto">Give Bonus</h2>
        <!-- <button class="btn btn-outline-secondary hidden sm:flex"> -->

          <div class="dropdown sm:hidden">
            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
              <i data-feather="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
              <div class="dropdown-menu w-40">

               </div>
              </div>
            </div>
              <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                <div class="col-span-12 sm:col-span-6">
                      <label for="modal-form-2" class="form-label">Enter Amount</label>
                      <input name="amount" id="modal-form-2" type="text" class="form-control" placeholder="Enter Amount" required>
               </div>


                             </div>
                              <div class="modal-footer">
                                 <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-20 mr-1">Cancel</button>
                                  <button type="submit" class="btn btn-success w-30">Give Bonus</button>
                                </div> <!-- END: Modal Footer -->
                              </form>
                              </div>
                                </div>
                               </div>
