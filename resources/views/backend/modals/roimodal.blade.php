
 <div id="roimodal" class="modal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form class="" action="{{route('store-roi')}}" method="post">
         @csrf

         <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      <div class="modal-header">
        <h2 class="font-medium text-base mr-auto">Distribute ROI</h2>
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
                    <label for="modal-form-1" class="form-label">Enter Amount (%)</label>
                    <input id="modal-form-1" name="percentage" type="text" class="form-control" placeholder="Enter Amount" required>
                </div>



                             </div>
                              <div class="modal-footer">
                                 <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                  <button type="submit" class="btn btn-primary w-20">Trigger</button>
                                </div> <!-- END: Modal Footer -->
                              </form>
                              </div>
                                </div>
                               </div>
