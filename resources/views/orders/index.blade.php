@extends('layouts.app')
@section('title','Order')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                {{-- block 1 start--}}

                <div class="row">
                    <div class="col-md-6">
                        <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-user"></i> Customer Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="sName" class="col-sm-4 control-label"> Search Old Customer</label>

                                        <div class="col-sm-8">

                                            <select id="sName" class="form-control select2">
                                                <option value="">Type Customer Name</option>

                                                @foreach(\App\Customer::where('userId',Auth::user()->id)->get() as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cName" class="col-sm-4 control-label"> Name</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="cName"
                                                   placeholder="Customer Name">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="document_number" class="col-sm-4 control-label">Document
                                            Number</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="document_number"
                                                   placeholder="Enter Document Number">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cCity" class="col-sm-4 control-label"> City</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="cCity"
                                                   placeholder="Enter Customer City Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cPhone" class="col-sm-4 control-label"> Phone</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="cPhone"
                                                   placeholder="Enter Customer Phone number">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cAddress" class="col-sm-4 control-label"> Address</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="cAddress"
                                                   placeholder="Enter Customer Address">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Country</label>
                                        <div class="col-sm-8">
                                            <select id="cCountry" class="form-control select2" style="width: 100%;">

                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option selected value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory
                                                </option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The
                                                    Democratic
                                                    Republic of The
                                                </option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and
                                                    Mcdonald
                                                    Islands
                                                </option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                    State)
                                                </option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of
                                                </option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                                    People's Republic of
                                                </option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                    Republic
                                                </option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia,
                                                    The
                                                    Former
                                                    Yugoslav Republic of
                                                </option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated
                                                    States
                                                    of
                                                </option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands
                                                </option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                    Occupied
                                                </option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                                </option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                    Grenadines
                                                </option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South
                                                    Georgia
                                                    and
                                                    The South Sandwich Islands
                                                </option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China
                                                </option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic
                                                    of
                                                </option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                                </option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor
                                                    Outlying Islands
                                                </option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- /.box -->
                    </div>

                    <div class="col-md-6">
                        <!-- Horizontal Form -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-user"></i> Receiver Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="rName" class="col-sm-4 control-label">Name</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="rName"
                                                   placeholder="Receiver Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rAddress" class="col-sm-4 control-label">Address</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="rAddress"
                                                   placeholder="Enter Receiver address">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rCity" class="col-sm-4 control-label">City</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="rCity"
                                                   placeholder="Enter City">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rPhone" class="col-sm-4 control-label">Phone</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="rPhone"
                                                   placeholder="Enter Phone Number">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Country</label>
                                        <div class="col-sm-8">
                                            <select id="rCountry" class="form-control select2" style="width: 100%;">

                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option selected value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory
                                                </option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The
                                                    Democratic
                                                    Republic of The
                                                </option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and
                                                    Mcdonald
                                                    Islands
                                                </option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                    State)
                                                </option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of
                                                </option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                                    People's Republic of
                                                </option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                    Republic
                                                </option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia,
                                                    The
                                                    Former
                                                    Yugoslav Republic of
                                                </option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated
                                                    States
                                                    of
                                                </option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands
                                                </option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                    Occupied
                                                </option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                                </option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                    Grenadines
                                                </option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South
                                                    Georgia
                                                    and
                                                    The South Sandwich Islands
                                                </option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China
                                                </option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic
                                                    of
                                                </option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                                </option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor
                                                    Outlying Islands
                                                </option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- /.box -->
                    </div>
                </div>

                {{-- Order details start--}}

                <div class="row">
                    <div class="col-md-12">

                        <!-- Horizontal Form -->
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-file"></i> Order Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="expected_date_to_receive" class="col-sm-4 control-label">Expected
                                                    Date To Receive</label>

                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control"
                                                           id="expected_date_to_receive">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="delivery_condition" class="col-sm-4 control-label">Delivery
                                                    Condition</label>

                                                <div class="col-sm-8">
                                                    <select id="delivery_condition" class="form-control">
                                                        <option>Not Home Delivery</option>
                                                        <option>Home Delivery</option>
                                                        <option>Delivery out of Dhaka</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="delivery_charge" class="col-sm-4 control-label">Delivery
                                                    Charge</label>

                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="delivery_charge"
                                                           placeholder="Delivery Charge">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="delivery_way" class="col-sm-4 control-label">Delivery
                                                    Way</label>

                                                <div class="col-sm-8">
                                                    <select id="delivery_way" class="form-control">
                                                        <option>By Air</option>
                                                        <option>By Sea</option>
                                                        <option>By Road</option>
                                                        <option>Various</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="departure_airport" class="col-sm-4 control-label">Departure
                                                    Airport</label>

                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="departure_airport"
                                                           placeholder="Departure Airport">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="arrival_airport" class="col-sm-4 control-label">Arrival
                                                    Airport</label>

                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="arrival_airport"
                                                           placeholder="Arrival Airport">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding:10px">

                                <div class="col-md-12">

                                    <input type="hidden" id="orderId">
                                    <br><br>
                                    <table id="itemTable" style="width:100%">
                                        <tr>

                                            <th>Product Description</th>
                                            <th>Weight</th>

                                            <th>Cus. charge</th>
                                            <th>Per Kg</th>
                                            <th>Charge</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>


                                        <tr>

                                            <td><input id="productDescription" type="text" class="form-control"></td>
                                            <td><input value="0" id="weight" type="number" class="form-control"></td>

                                            <td><input value="0" id="cusCharge" class="form-control" type="number"></td>
                                            <td><input value="0" id="perKg" class="form-control"
                                                       style="background:yellow"
                                                       type="number"></td>
                                            <td><input value="0" id="charge" class="form-control" type="number"></td>
                                            <td><input value="0" id="total" class="form-control"
                                                       style="background:green; font-weight: 700;color:white"
                                                       type="text"></td>
                                            <td>
                                                <button id="addItem" class="btn btn-block btn-success"><i
                                                            class="fa fa-plus"></i> Add
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="5"></td>
                                            <td><b>Total</b></td>

                                            <td><input id="sum" class="form-control" style="background: pink"
                                                       type="text"></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <button id="request" class="btn btn-block btn-success"><i
                                                        class="fa fa-send"></i> <b>Request</b></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /.box -->
                </div>

                {{-- Order details end--}}
                <div id="getJs">

                </div>

                {{-- block 1 end--}}

            </section>{{--End content--}}
        </div>{{--End content-wrapper--}}
        @include('components.footer')
    </div>{{--End wrapper--}}
@endsection
@section('css')
    <style>
        td {
            padding: 10px;
        }

        th {
            background: gray;
            color: white;
        }

        table, th, td {

            border: 2px solid black;
            text-align: center;
        }
    </style>
@endsection
@section('js')
    <script>
        $('.select2').select2();
        var orderId = Math.floor(Math.random() * 9999) + 1000;
        $('#orderId').val(orderId);

        $('#addItem').click(function () {

            $.ajax({
                url: '{{url('/order/add/item')}}',
                type: 'POST',
                data: {
                    'orderId': $('#orderId').val(),
                    'productDescription': $('#productDescription').val(),
                    'weight': $('#weight').val(),
                    'cusCharge': $('#cusCharge').val(),
                    'perKg': $('#perKg').val(),
                    'charge': $('#charge').val(),
                    'total': $('#total').val()
                }, success: function (data) {
                    if (data.status == "success") {
                        $('#itemTable tr:last').before(data.result);
                        $('#sum').val(data.sum);
                    } else {
                        swal("Warning !", data.message, "warning");
                    }


                },
                error: function (data) {
                    swal("Error", "Something went wrong", "error");
                    console.log(data.responseText);
                }
            });
            $.ajax({
                url: '{{url('/order/getjs')}}',
                type: 'POST',
                data: {},
                success: function (data) {
                    $('#getJs').html(data);
                }
            });

        });

        $("#cusCharge").bind('keyup mouseup', function () {

            var result = parseInt($('#cusCharge').val()) + parseInt($('#charge').val()) + (parseInt($('#weight').val()) * parseInt($('#perKg').val()));
            $('#total').val(result);

        });

        $('#perKg').bind('keyup mouseup', function () {
            var result = parseInt($('#cusCharge').val()) + parseInt($('#charge').val()) + (parseInt($('#weight').val()) * parseInt($('#perKg').val()));
            $('#total').val(result);

        });
        $('#charge').bind('keyup mouseup', function () {
            var result = parseInt($('#cusCharge').val()) + parseInt($('#charge').val()) + (parseInt($('#weight').val()) * parseInt($('#perKg').val()));
            $('#total').val(result);
        });

        $('#request').click(function () {
            $.ajax({
                url: '{{url('/order')}}',
                type: 'POST',
                data: {
                    'cName': $('#cName').val(),
                    'document_number': $('#document_number').val(),
                    'cCity': $('#cCity').val(),
                    'cPhone': $('#cPhone').val(),
                    'cAddress': $('#cAddress').val(),
                    'cCountry': $('#cCountry').val(),
                    'rName': $('#rName').val(),
                    'rAddress': $('#rAddress').val(),
                    'rCity': $('#rCity').val(),
                    'rPhone': $('#rPhone').val(),
                    'rCountry': $('#rCountry').val(),
                    'expected_date_to_receive': $('#expected_date_to_receive').val(),
                    'delivery_condition': $('#delivery_condition').val(),
                    'delivery_charge': $('#delivery_charge').val(),
                    'delivery_way': $('#delivery_way').val(),
                    'departure_airport': $('#departure_airport').val(),
                    'arrival_airport': $('#arrival_airport').val(),
                    'orderId': $('#orderId').val()

                },
                success: function (data) {
                    if (data == "success") {
                        swal("Success", "Order Requested successfully", "success");
                        location.reload();

                    } else {
                        swal("Warning!", data, "warning");
                    }
                },
                error: function (data) {
                    swal("Error", "Something went wrong", "error");
                    console.log(data.responseText);

                }
            })
        });
        $('#sName').on('change', function () {
            var id = $(this).val();
            $.ajax({
                url: "{{url('/customer/get/info')}}",
                type: 'POST',
                data: {
                    'id': id
                },
                success: function (data) {
                    if (data.status == "success") {
                        $('#cName').val(data.name);
                        $('#cPhone').val(data.phone);
                        $('#cCity').val(data.city);
                        $('#cCountry').val(data.country);
                        $('#cAddress').val(data.address);
                    }
                }, error: function (data) {
                    console.log(data.responseText);
                }

            })
        })

    </script>
@endsection




