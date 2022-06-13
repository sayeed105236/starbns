
 <div id="activationmodal{{$row->id}}" class="modal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form class="" action="{{route('activate-user')}}" method="post">
         @csrf
         <input type="hidden" name="id" value="{{$row->id}}">

      <div class="modal-header">
        <h2 class="font-medium text-base mr-auto">Activate User </h2>
        <!-- <button class="btn btn-outline-secondary hidden sm:flex"> -->

          <div class="dropdown sm:hidden">
            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
              <i data-feather="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
              <div class="dropdown-menu w-40">

               </div>
              </div>
            </div>
            <?php
            $package= App\Models\Package::where('status','1')->get();




             ?>

              <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                 <div class="col-span-12 sm:col-span-6">
                   <label class="modal-form-6">Select Package</label>


                     <div class="form-control"> <select name="package_id"  data-placeholder="Select Package" class="tom-select w-full">
                   @foreach($package as $row)
                    <option  value="{{$row->id}}">{{$row->package_name}}({{$row->package_price}})</option>
                   @endforeach

                  </select>
                </div>
              </div>
              <!-- <div class="col-span-12 sm:col-span-6">
                 <label for="modal-form-1" class="form-label">Placement Name</label>
                 <input id="sponsor" name="placement_id" type="text" class="form-control" placeholder="Enter Placement Name" required>
                    <div id="suggestUser"></div>
             </div> -->
             <div class="col-span-12 sm:col-span-6">
               <label class="modal-form-6">Select Placment</label>



                <div class="form-control"> <select name="placement_id"  data-placeholder="Select Placement" class="tom-select w-full">

                  @if(Auth::user()->left_side==null || Auth::user()->middle_side==null || Auth::user()->right_side==null)
                    <option  value="{{Auth::user()->id}}">{{Auth::user()->user_name}}</option>
                    @else
               @foreach($users as $user)

                 @if($user->left_side==null || $user->middle_side==null || $user->right_side==null)


                   <option  value="{{$user->id}}">{{$user->user_name}}</option>
                @endif
               @endforeach
               @endif


              </select>
            </div>
          </div>

              <div class="col-span-12 sm:col-span-12">
                <label class="modal-form-6">Select Team</label>


                  <div class="form-control"> <select name="position"  data-placeholder="Select Position" class="tom-select w-full">
                      @if(Auth::user()->left_side==null && Auth::user()->middle_side==null && Auth::user()->right_side==null)
                 <option value="1">Team A</option>
                 <option value="2">Team B</option>
                 <option value="3">Team C</option>
                 @elseif(Auth::user()->middle_side==null && Auth::user()->right_side==null)
                 <option value="2">Team B</option>
                 <option value="3">Team C</option>
                 @elseif(Auth::user()->first_side==null && Auth::user()->right_side==null)
                 <option value="1">Team A</option>
                 <option value="3">Team C</option>
                 @elseif(Auth::user()->first_side==null && Auth::user()->middle_side==null)
                 <option value="1">Team A</option>
                 <option value="2">Team B</option>
                 @elseif(Auth::user()->right_side==null)
                  <option value="3">Team C</option>
                  @elseif(Auth::user()->first_side==null)
                   <option value="1">Team A</option>
                   @elseif(Auth::user()->middle_side==null)
                    <option value="2">Team C</option>
                  @elseif
                   @foreach($users as $user)

                      @if($user->left_side==null && $user->middle_side==null && $user->right_side==null)
                      <option value="1">Team A</option>
                      <option value="2">Team B</option>
                      <option value="3">Team C</option>
                      @elseif($user->middle_side==null && $user->right_side==null)
                      <option value="2">Team B</option>
                      <option value="3">Team C</option>
                      @elseif($user->first_side==null && $user->right_side==null)
                      <option value="1">Team A</option>
                      <option value="3">Team C</option>
                      @elseif($user->first_side==null && $user->middle_side==null)
                      <option value="1">Team A</option>
                      <option value="2">Team B</option>
                      @elseif($user->right_side==null)
                        <option value="3">Team C</option>
                        @elseif($user->first_side==null)
                          <option value="1">Team A</option>
                          @elseif($user->middle_side==null)
                            <option value="2">Team B</option>
                        @endif



                   @endforeach




                  @endif


               </select>

             </div>
           </div>
           <!-- <div class="col-span-12 sm:col-span-12">
             <label class="modal-form-6">Select Team</label>


               <div class="form-control"> <select name="position"  data-placeholder="Select Position" class="tom-select w-full">

              <option value="1">Team A</option>
              <option value="2">Team B</option>
              <option value="3">Team C</option>


            </select>
          </div>
        </div> -->



            </div>

                              <div class="modal-footer">
                                 <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                  <button type="submit" class="btn btn-primary w-20">Submit</button>
                                </div> <!-- END: Modal Footer -->
                              </form>
                              </div>
                                </div>
                               </div>
