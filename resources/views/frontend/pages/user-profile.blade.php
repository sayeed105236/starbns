@extends('frontend.layouts.master')

@section('content')


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        User Profile
    </h2>
</div>
@if(Session::has('profile_updated'))
<div class="alert alert-success show mb-2" role="alert">Success</div>
<div>
{{Session::get('password_updated')}}
</div>
@elseif(Session::has('password_error'))
<div class="alert alert-danger show mb-2" role="alert">Failed</div>
<div>
{{Session::get('password_error')}}
</div>
@elseif(Session::has('password_not_match'))
<div class="alert alert-danger show mb-2" role="alert">Failed</div>
<div>
{{Session::get('password_not_match')}}
</div>
@endif
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <!-- <button class="btn btn-primary shadow-md mr-2">Add New Product</button> -->
        <div class="dropdown">
           <div class="text-center">  </div>



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

      <div class="grid grid-cols-12 gap-6">
          <!-- BEGIN: Profile Menu -->
          <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
              <div class="intro-y box mt-5">
                  <div class="relative flex items-center p-5">
                      <div class="w-12 h-12 image-fit">
                        @if(Auth::user()->image != null)

                          <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{asset('storage/users/'. Auth::user()->image)}}">
                          @else

                            <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{asset('dist/images/profile-8.jpg')}}">
                          @endif
                      </div>
                      <div class="ml-4 mr-auto">
                          <div class="font-medium text-base">{{Auth::user()->name}}</div>

                      </div>

                  </div>
                  <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                      <a class="flex items-center text-primary font-medium" href="#"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
                      <!-- <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Account Settings </a> -->
                      <a class="flex items-center mt-5" href="/home/reset-password/{{Auth::user()->id}}"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                      <!-- <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> User Settings </a> -->
                  </div>
                  <!-- <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                      <a class="flex items-center" href=""> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Email Settings </a>
                      <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Saved Credit Cards </a>
                      <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Social Networks </a>
                      <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Tax Information </a>
                  </div> -->

              </div>
          </div>
          <!-- END: Profile Menu -->
          <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
              <!-- BEGIN: Display Information -->
              <div class="intro-y box lg:mt-5">
                  <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                      <h2 class="font-medium text-base mr-auto">
                        Personel Information
                      </h2>
                  </div>
                  <div class="p-5">
                    <form class="" action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="flex flex-col-reverse xl:flex-row flex-col">

                          <input type="hidden" name="id" value="{{Auth::user()->id}}">


                          <div class="flex-1 mt-6 xl:mt-0">
                              <div class="grid grid-cols-12 gap-x-5">
                                  <div class="col-span-12 2xl:col-span-6">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">Name</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" name="name" placeholder="Input Name" value="{{Auth::user()->name}}">
                                    </div>
                                    <br>
                                      <div>
                                          <label for="update-profile-form-1" class="form-label">User Name</label>
                                          <input disabled id="update-profile-form-1" type="text" class="form-control" placeholder="Input text" value="{{Auth::user()->user_name}}" disabled>
                                      </div>
                                      <br>
                                      <div>
                                          <label for="update-profile-form-1" class="form-label">Email</label>
                                          <input id="update-profile-form-1" type="text" class="form-control" name="email" placeholder="Input Email" value="{{Auth::user()->email}}">
                                      </div>
                                      <br>
                                      @if(Auth::user()->postal_code != null)
                                      <div>
                                          <label for="update-profile-form-1" class="form-label">Postal Code</label>
                                          <input id="update-profile-form-1" type="number" class="form-control" name="postal_code" placeholder="Input postal code" value="{{Auth::user()->postal_code}}">
                                      </div>
                                      @else
                                      <div>
                                          <label for="update-profile-form-1" class="form-label">Postal Code</label>
                                          <input id="update-profile-form-1" type="number" class="form-control" name="postal_code" placeholder="Input postal code" >
                                      </div>
                                      @endif

                                  </div>
                                  <div class="col-span-12 2xl:col-span-6">
                                      <div class="mt-3 2xl:mt-0">
                                          <label for="update-profile-form-3" class="form-label">Country</label>
                                          <select name="country" id="update-profile-form-3" data-search="true" class="tom-select w-full">
                                            <option label="Choose Country"></option>

                                            <option selected>Choose Country</option>

                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">&Aring;land Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia, Plurinational State of</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">C&ocirc;te d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territory, Occupied</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">R&eacute;union</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barth&eacute;lemy</option>
                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>

                                          </select>
                                      </div>

                                  </div>
                                  <div class="col-span-12 2xl:col-span-6">
                                      <div class="mt-3 2xl:mt-0">
                                          <label for="update-profile-form-3" class="form-label">Gender</label>
                                          <select name="gender" id="update-profile-form-3" data-search="true" class="tom-select w-full">
                                            @if(Auth::user()->gender != null)
                                            @if(Auth::user()->gender == 1)
                                            <option selected>Male</option>
                                              <option value="2">Female</option>
                                            @else
                                            <option selected>Male</option>
                                            <option value="1">Male</option>
                                            @endif
                                            @else
                                              <option value="1">Male</option>
                                              <option value="2">Female</option>
                                              @endif

                                          </select>
                                      </div>
                                      @if(Auth::user()->number != null)
                                      <div class="mt-3">
                                          <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                          <input id="update-profile-form-4" type="number" name="number" class="form-control" placeholder="Input Phone Number" value="{{Auth::user()->number}}">
                                      </div>
                                      @else

                                      <div class="mt-3">
                                          <label for="update-profile-form-4" class="form-label">Phone Number</label>
                                          <input id="update-profile-form-4" name="number" type="number" class="form-control" placeholder="Input Phone Number" >
                                      </div>


                                      @endif
                                  </div>
                                  @if(Auth::user()->address != null)
                                  <div class="col-span-12">
                                      <div class="mt-3">
                                          <label for="update-profile-form-5" class="form-label">Address</label>
                                          <textarea name="address" value="{{Auth::user()->address}}" id="update-profile-form-5" class="form-control" placeholder="Adress">{{Auth::user()->address}}</textarea>
                                      </div>
                                  </div>
                                  @else
                                  <div class="col-span-12">
                                      <div class="mt-3">
                                          <label for="update-profile-form-5" class="form-label">Address</label>
                                          <textarea name="address"  id="update-profile-form-5" class="form-control" placeholder="Adress"></textarea>
                                      </div>
                                  </div>
                                  @endif


                              </div>
                              <button type="submit" class="btn btn-primary w-20 mt-3">Update</button>
                          </div>
                          <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                              <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                  <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    @if(Auth::user()->image != null)
                                    <img class="rounded-md" alt="Rubick Tailwind HTML Admin Template" src="{{asset('storage/users/'. Auth::user()->image)}}">
                                    @else
                                      <img class="rounded-md" alt="Rubick Tailwind HTML Admin Template" src="{{asset('dist/images/profile-8.jpg')}}">
                                      @endif
                                      <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                  </div>
                                  <div class="mx-auto cursor-pointer relative mt-5">
                                      <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                      <input type="file" name="file1" id="image" class="w-full h-full top-0 left-0 absolute opacity-0">
                                  </div>
                              </div>
                          </div>

                      </div>
                        </form>
                  </div>
              </div>
              <!-- END: Display Information -->
              <!-- BEGIN: Personal Information -->
              <!-- <div class="intro-y box mt-5">
                  <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                      <h2 class="font-medium text-base mr-auto">
                          Wallet Information
                      </h2>
                  </div>
                  <div class="p-5">
                      <div class="grid grid-cols-12 gap-x-5">
                          <div class="col-span-12 xl:col-span-6">
                              <div>
                                  <label for="update-profile-form-6" class="form-label">Email</label>
                                  <input id="update-profile-form-6" type="text" class="form-control" placeholder="Input text" value="russellcrowe@left4code.com" disabled>
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-7" class="form-label">Name</label>
                                  <input id="update-profile-form-7" type="text" class="form-control" placeholder="Input text" value="Russell Crowe" disabled>
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-8" class="form-label">ID Type</label>
                                  <select id="update-profile-form-8" class="form-select">
                                      <option>IC</option>
                                      <option>FIN</option>
                                      <option>Passport</option>
                                  </select>
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-9" class="form-label">ID Number</label>
                                  <input id="update-profile-form-9" type="text" class="form-control" placeholder="Input text" value="357821204950001">
                              </div>
                          </div>
                          <div class="col-span-12 xl:col-span-6">
                              <div class="mt-3 xl:mt-0">
                                  <label for="update-profile-form-10" class="form-label">Phone Number</label>
                                  <input id="update-profile-form-10" type="text" class="form-control" placeholder="Input text" value="65570828">
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-11" class="form-label">Address</label>
                                  <input id="update-profile-form-11" type="text" class="form-control" placeholder="Input text" value="10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore">
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-12" class="form-label">Bank Name</label>
                                  <select id="update-profile-form-12" data-search="true" class="tom-select w-full">
                                      <option value="1">SBI - STATE BANK OF INDIA</option>
                                      <option value="1">CITI BANK - CITI BANK</option>
                                  </select>
                              </div>
                              <div class="mt-3">
                                  <label for="update-profile-form-13" class="form-label">Bank Account</label>
                                  <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" value="DBS Current 011-903573-0">
                              </div>
                          </div>
                      </div>
                      <div class="flex justify-end mt-4">
                          <button type="button" class="btn btn-primary w-20 mr-auto">Save</button>
                          <a href="" class="text-danger flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete Account </a>
                      </div>
                  </div>
              </div> -->
              <!-- END: Personal Information -->
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
