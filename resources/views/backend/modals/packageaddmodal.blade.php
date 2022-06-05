
 <div id="packageaddmodal" class="modal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h2 class="font-medium text-base mr-auto">Package Add</h2>
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
                    <label for="modal-form-1" class="form-label">Package Name</label>
                    <input id="modal-form-1" name="package_name" type="text" class="form-control" placeholder="Enter Package Name" required>
                </div>
                <div class="col-span-12 sm:col-span-6">
                      <label for="modal-form-2" class="form-label">Price</label>
                      <input name="package_price" id="modal-form-2" type="text" class="form-control" placeholder="Enter Package Price" required>
               </div>
                <div class="col-span-12 sm:col-span-6">
                         <label for="modal-form-3" class="form-label">Package ROI</label>
                         <input id="modal-form-3" name="roi" type="text" class="form-control" placeholder="Enter return of Investment" required>
                </div>
                         <div class="col-span-12 sm:col-span-6">
                           <label for="modal-form-4" class="form-label">Sponsor Bonus</label>
                           <input id="modal-form-4" type="text" name="sponsor_bonus" class="form-control" placeholder="Enter Sponsor Bonus" required>
                         </div>

                             <div class="col-span-12 sm:col-span-6">
                               <label for="modal-form-6" class="form-label">Status</label>
                               <select name="status" id="modal-form-6" class="form-select">
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>

                                </select>
                              </div>
                             </div>
                              <div class="modal-footer">
                                 <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                  <button type="button" class="btn btn-primary w-20">Save</button>
                                </div> <!-- END: Modal Footer -->
                              </div>
                                </div>
                               </div>
