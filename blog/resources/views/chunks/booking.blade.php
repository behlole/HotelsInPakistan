 
                @if (Route::has('login'))

                  
                    @auth
                     <div class="theme-payment-page-sections-item">
                <h3 class="theme-payment-page-sections-item-title">Guest Details</h3>
                <div class="theme-payment-page-form">
                  <div class="row row-col-gap" data-gutter="20">
                    <div class="col-md-12 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input value="{{Auth::user()->name}}" class="form-control" type="text" placeholder="First Name" readonly="" />
                      </div>
                    </div>
                   
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input value="{{Auth::user()->email}}" class="form-control" type="text" placeholder="Email Address"/ readonly="">
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input value="{{Auth::user()->phone}}" class="form-control" type="text" placeholder="Phone Number"/ readonly="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                    @else
                      <div class="theme-payment-page-sections-item">
                <h3 class="theme-payment-page-sections-item-title">Enter Guest Details</h3>
                <div class="theme-payment-page-form">
                  <div class="row row-col-gap" data-gutter="20">
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" />
                          @if ($errors->has('first_name'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('first_name') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}"/>
                          @if ($errors->has('last_name'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="email" placeholder="Email Address" name="email" value="{{ old('email') }}"/>
                          @if ($errors->has('email'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('email') }}</strong>
            </span>
            @endif
                      </div>
                    </div>

                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="Phone Number" name="phno" value="{{ old('phno') }}" />
                          @if ($errors->has('phno'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('phno') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                     <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="password" placeholder="Enter password" name="pass1" value="{{ old('pass1') }}" id="pass1" />
                        <span style="font-size:12px; font-style: oblique;color: red;">Complex Password Required...minimum 6 digits,Uper Case,Lower Case and Special Character</span>
                          @if ($errors->has('pass1'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('pass1') }}</strong>
            </span>
            @endif
                      </div>
                      <input type="checkbox" onclick="myFunction()">Show Password 
                    </div>
                    
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="password" placeholder="Confirm pass" name="pass2" value="{{ old('pass2') }}" />
                          @if ($errors->has('pass2'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('pass2') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                    @endauth
                  
                
            @endif
             
              <div class="theme-payment-page-sections-item">
                <h3 class="theme-payment-page-sections-item-title">Enter Billing Information</h3>
                <div class="theme-payment-page-form _mb-20">
                  <h3 class="theme-payment-page-form-title">Billing Address</h3>
                  <div class="row row-col-gap" data-gutter="20">
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="Street (line 1)"/ name="street_1" value="{{ old('street_1') }}">
                          @if ($errors->has('street_1'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('street_1') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="Street (line 2)"/ name="street_2" value="{{ old('street_2') }}">
                          @if ($errors->has('street_2'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('street_2') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="Postal Code"/ name="postal_code" value="{{ old('postal_code') }}">
                          @if ($errors->has('postal_code'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('postal_code') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" type="text" placeholder="City"/ name="city_name" value="{{ old('city') }}">
                          @if ($errors->has('city_name'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('city_name') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                    
                    <div class="col-md-12 ">
                      <div class="theme-payment-page-form-item form-group">
                        <i class="fa fa-angle-down"></i>
                        <select class="form-control" name="country">
                            <?php if(old('country')){ ?>
                          <option value="{{ old('country') }}">{{ old('country') }}</option>

                        <?php } ?>
                          <option>Select Country</option>
                          <option>Afghanistan</option>
                          <option>Albania</option>
                          <option>Algeria</option>
                          <option>American Samoa</option>
                          <option>AndorrA</option>
                          <option>Angola</option>
                          <option>Anguilla</option>
                          <option>Antarctica</option>
                          <option>Antigua and Barbuda</option>
                          <option>Argentina</option>
                          <option>Armenia</option>
                          <option>Aruba</option>
                          <option>Australia</option>
                          <option>Austria</option>
                          <option>Azerbaijan</option>
                          <option>Bahamas</option>
                          <option>Bahrain</option>
                          <option>Bangladesh</option>
                          <option>Barbados</option>
                          <option>Belarus</option>
                          <option>Belgium</option>
                          <option>Belize</option>
                          <option>Benin</option>
                          <option>Bermuda</option>
                          <option>Bhutan</option>
                          <option>Bolivia</option>
                          <option>Bosnia and Herzegovina</option>
                          <option>Botswana</option>
                          <option>Bouvet Island</option>
                          <option>Brazil</option>
                          <option>British Indian Ocean Territory</option>
                          <option>Brunei Darussalam</option>
                          <option>Bulgaria</option>
                          <option>Burkina Faso</option>
                          <option>Burundi</option>
                          <option>Cambodia</option>
                          <option>Cameroon</option>
                          <option>Canada</option>
                          <option>Cape Verde</option>
                          <option>Cayman Islands</option>
                          <option>Central African Republic</option>
                          <option>Chad</option>
                          <option>Chile</option>
                          <option>China</option>
                          <option>Christmas Island</option>
                          <option>Cocos (Keeling) Islands</option>
                          <option>Colombia</option>
                          <option>Comoros</option>
                          <option>Congo</option>
                          <option>Congo, The Democratic Republic of the</option>
                          <option>Cook Islands</option>
                          <option>Costa Rica</option>
                          <option>Cote D"Ivoire</option>
                          <option>Croatia</option>
                          <option>Cuba</option>
                          <option>Cyprus</option>
                          <option>Czech Republic</option>
                          <option>Denmark</option>
                          <option>Djibouti</option>
                          <option>Dominica</option>
                          <option>Dominican Republic</option>
                          <option>Ecuador</option>
                          <option>Egypt</option>
                          <option>El Salvador</option>
                          <option>Equatorial Guinea</option>
                          <option>Eritrea</option>
                          <option>Estonia</option>
                          <option>Ethiopia</option>
                          <option>Falkland Islands (Malvinas)</option>
                          <option>Faroe Islands</option>
                          <option>Fiji</option>
                          <option>Finland</option>
                          <option>France</option>
                          <option>French Guiana</option>
                          <option>French Polynesia</option>
                          <option>French Southern Territories</option>
                          <option>Gabon</option>
                          <option>Gambia</option>
                          <option>Georgia</option>
                          <option>Germany</option>
                          <option>Ghana</option>
                          <option>Gibraltar</option>
                          <option>Greece</option>
                          <option>Greenland</option>
                          <option>Grenada</option>
                          <option>Guadeloupe</option>
                          <option>Guam</option>
                          <option>Guatemala</option>
                          <option>Guernsey</option>
                          <option>Guinea</option>
                          <option>Guinea-Bissau</option>
                          <option>Guyana</option>
                          <option>Haiti</option>
                          <option>Heard Island and Mcdonald Islands</option>
                          <option>Holy See (Vatican City State)</option>
                          <option>Honduras</option>
                          <option>Hong Kong</option>
                          <option>Hungary</option>
                          <option>Iceland</option>
                          <option>India</option>
                          <option>Indonesia</option>
                          <option>Iran, Islamic Republic Of</option>
                          <option>Iraq</option>
                          <option>Ireland</option>
                          <option>Isle of Man</option>
                          <option>Israel</option>
                          <option>Italy</option>
                          <option>Jamaica</option>
                          <option>Japan</option>
                          <option>Jersey</option>
                          <option>Jordan</option>
                          <option>Kazakhstan</option>
                          <option>Kenya</option>
                          <option>Kiribati</option>
                          <option>Korea, Democratic People"S Republic of</option>
                          <option>Korea, Republic of</option>
                          <option>Kuwait</option>
                          <option>Kyrgyzstan</option>
                          <option>Lao People"S Democratic Republic</option>
                          <option>Latvia</option>
                          <option>Lebanon</option>
                          <option>Lesotho</option>
                          <option>Liberia</option>
                          <option>Libyan Arab Jamahiriya</option>
                          <option>Liechtenstein</option>
                          <option>Lithuania</option>
                          <option>Luxembourg</option>
                          <option>Macao</option>
                          <option>Macedonia, The Former Yugoslav Republic of</option>
                          <option>Madagascar</option>
                          <option>Malawi</option>
                          <option>Malaysia</option>
                          <option>Maldives</option>
                          <option>Mali</option>
                          <option>Malta</option>
                          <option>Marshall Islands</option>
                          <option>Martinique</option>
                          <option>Mauritania</option>
                          <option>Mauritius</option>
                          <option>Mayotte</option>
                          <option>Mexico</option>
                          <option>Micronesia, Federated States of</option>
                          <option>Moldova, Republic of</option>
                          <option>Monaco</option>
                          <option>Mongolia</option>
                          <option>Montserrat</option>
                          <option>Morocco</option>
                          <option>Mozambique</option>
                          <option>Myanmar</option>
                          <option>Namibia</option>
                          <option>Nauru</option>
                          <option>Nepal</option>
                          <option>Netherlands</option>
                          <option>Netherlands Antilles</option>
                          <option>New Caledonia</option>
                          <option>New Zealand</option>
                          <option>Nicaragua</option>
                          <option>Niger</option>
                          <option>Nigeria</option>
                          <option>Niue</option>
                          <option>Norfolk Island</option>
                          <option>Northern Mariana Islands</option>
                          <option>Norway</option>
                          <option>Oman</option>
                          <option>Pakistan</option>
                          <option>Palau</option>
                          <option>Palestinian Territory, Occupied</option>
                          <option>Panama</option>
                          <option>Papua New Guinea</option>
                          <option>Paraguay</option>
                          <option>Peru</option>
                          <option>Philippines</option>
                          <option>Pitcairn</option>
                          <option>Poland</option>
                          <option>Portugal</option>
                          <option>Puerto Rico</option>
                          <option>Qatar</option>
                          <option>Reunion</option>
                          <option>Romania</option>
                          <option>Russian Federation</option>
                          <option>RWANDA</option>
                          <option>Saint Helena</option>
                          <option>Saint Kitts and Nevis</option>
                          <option>Saint Lucia</option>
                          <option>Saint Pierre and Miquelon</option>
                          <option>Saint Vincent and the Grenadines</option>
                          <option>Samoa</option>
                          <option>San Marino</option>
                          <option>Sao Tome and Principe</option>
                          <option>Saudi Arabia</option>
                          <option>Senegal</option>
                          <option>Serbia and Montenegro</option>
                          <option>Seychelles</option>
                          <option>Sierra Leone</option>
                          <option>Singapore</option>
                          <option>Slovakia</option>
                          <option>Slovenia</option>
                          <option>Solomon Islands</option>
                          <option>Somalia</option>
                          <option>South Africa</option>
                          <option>South Georgia and the South Sandwich Islands</option>
                          <option>Spain</option>
                          <option>Sri Lanka</option>
                          <option>Sudan</option>
                          <option>Suriname</option>
                          <option>Svalbard and Jan Mayen</option>
                          <option>Swaziland</option>
                          <option>Sweden</option>
                          <option>Switzerland</option>
                          <option>Syrian Arab Republic</option>
                          <option>Taiwan, Province of China</option>
                          <option>Tajikistan</option>
                          <option>Tanzania, United Republic of</option>
                          <option>Thailand</option>
                          <option>Timor-Leste</option>
                          <option>Togo</option>
                          <option>Tokelau</option>
                          <option>Tonga</option>
                          <option>Trinidad and Tobago</option>
                          <option>Tunisia</option>
                          <option>Turkey</option>
                          <option>Turkmenistan</option>
                          <option>Turks and Caicos Islands</option>
                          <option>Tuvalu</option>
                          <option>Uganda</option>
                          <option>Ukraine</option>
                          <option>United Arab Emirates</option>
                          <option>United Kingdom</option>
                          <option>United States</option>
                          <option>United States Minor Outlying Islands</option>
                          <option>Uruguay</option>
                          <option>Uzbekistan</option>
                          <option>Vanuatu</option>
                          <option>Venezuela</option>
                          <option>Viet Nam</option>
                          <option>Virgin Islands, British</option>
                          <option>Virgin Islands, U.S.</option>
                          <option>Wallis and Futuna</option>
                          <option>Western Sahara</option>
                          <option>Yemen</option>
                          <option>Zambia</option>
                          <option>Zimbabwe</option>
                        </select>
                          @if ($errors->has('country'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('country') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="theme-payment-page-form">
                  <h3 class="theme-payment-page-form-title">Card Details</h3>
                  <div class="row row-col-gap" data-gutter="20">
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" name="card_name" type="text" placeholder="Name on Card" value="{{ old('card_name') }}"/>
                          @if ($errors->has('card_name'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('card_name') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="theme-payment-page-form-item form-group">
                        <input class="form-control" name="card_number" type="text" placeholder="Credit/Debit Card Number"value="{{ old('card_number') }}"/>
                          @if ($errors->has('card_number'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('card_number') }}</strong>
            </span>
            @endif
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="row row-col-gap" data-gutter="10">
                        <div class="col-md-4 ">
                          <div class="theme-payment-page-form-item form-group">
                            <i class="fa fa-angle-down"></i>
                            <select class="form-control" name="card_month">
                                <?php if(old('card_month')){ ?>
                          <option value="{{ old('card_month') }}">{{ old('card_month') }}</option>

                        <?php } ?>
                              <option>(1) Jan</option>
                              <option>(2) Feb</option>
                              <option>(3) Mar</option>
                              <option>(4) Apr</option>
                              <option>(5) May</option>
                              <option>(6) Jun</option>
                              <option>(7) Jul</option>
                              <option>(8) Aug</option>
                              <option>(9) Sep</option>
                              <option>(10) Oct</option>
                              <option>(11) Nov</option>
                              <option>(12) Dec</option>
                            </select>
                              @if ($errors->has('card_month'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('card_month') }}</strong>
            </span>
            @endif
                          </div>
                        </div>
                        <div class="col-md-4 ">
                          <div class="theme-payment-page-form-item form-group">
                            <i class="fa fa-angle-down"></i>
                            <select class="form-control" name="card_year">
                                <?php if(old('card_year')){ ?>
                          <option value="{{ old('card_year') }}">{{ old('card_year') }}</option>

                        <?php } ?>
                              <option>2018</option>
                              <option>2019</option>
                              <option>2020</option>
                              <option>2021</option>
                              <option>2022</option>
                              <option>2023</option>
                              <option>2024</option>
                              <option>2025</option>
                              <option>2026</option>
                              <option>2027</option>
                              <option>2028</option>
                              <option>2029</option>
                              <option>2030</option>
                            </select>
                              @if ($errors->has('card_year'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('card_year') }}</strong>
            </span>
            @endif
                          </div>
                        </div>
                        <div class="col-md-4 ">
                          <div class="theme-payment-page-form-item form-group">
                            <input class="form-control" name="card_security" type="text" placeholder="Security Code" value="{{old('card_security')}}" />
                              @if ($errors->has('card_security'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('card_security') }}</strong>
            </span>
            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <ul class="theme-payment-page-card-list">
                        <li>
                          <img src="{{ URL::asset('img/credit-icons/mastercard-straight-64px.png') }}" alt="Image Alternative text" title="Image Title"/>
                        </li>
                        <li>
                          <img src="{{ URL::asset('img/credit-icons/visa-straight-64px.png') }}" alt="Image Alternative text" title="Image Title"/>
                        </li>
                        <li>
                          <img src="{{ URL::asset('img/credit-icons/visa-electron-straight-64px.png') }}" alt="Image Alternative text" title="Image Title"/>
                        </li>
                        <li>
                          <img src="{{ URL::asset('img/credit-icons/discover-straight-64px.png') }}" alt="Image Alternative text" title="Image Title"/>
                        </li>
                        <li>
                          <img src="{{ URL::asset('img/credit-icons/maestro-straight-64px.png') }}" alt="Image Alternative text" title="Image Title"/>
                        </li>
                        <li>
                          <img src="{{ URL::asset('img/credit-icons/american-express-straight-64px.png') }}" alt="Image Alternative text" title="Image Title"/>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            