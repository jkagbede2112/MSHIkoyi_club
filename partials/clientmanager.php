<div id="clientmanager" style="display:none">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
        <span style="max-width:200px">
            <div class="pm aavv ssmactive" onclick="pmClient('#clientcategory', '#addclient')" id="addclient">Add Patient</div>
            <div class="pm aavv" onclick="pmClient('#updatecategory', '#updateclient')" id="updateclient">Update HMO/Corporate</div>
            <div class="pm aavv" onclick="pmClient('#clientmanagement', '#viewclient')" id="viewclient">View Patient</div>
        </span>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px" id="clientcategory">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; margin-bottom:20px; font-weight:400; color:#480048">
                Add Patient
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted; margin-bottom:50px">

            <span class="pregwomen cdcd actbreed delean" id='pipatient'>Personal Info</span>
            <span class="pregwomen cdcd delean" id='cipatient'>Contact Information</span>
            <span class="pregwomen cdcd delean" id='epatient'>Emergency</span>
            <span class="pregwomen cdcd delean" id='emppatient'>Employer</span>
            <span class="pregwomen cdcd delean" id='ipatient'>Identification</span>
            <span class="pregwomen cdcd delean" id='inpatient'>Insurance</span>
            <span class="pregwomen cdcd delean" id='sespatient' title="Socio-Ecenomic Status">S.E.S</span>
            <span class="pregwomen cdcd delean" id='mcpatient'>Marketing Communication</span>

            <hr style="margin-top:3px; margin-bottom:30px; border-color:#E10E6C">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:10px;" id="positionan">
                <div id="personalinformation">
                    <div class="addpatient row">
                        Personal Information
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">Card Type [c]</div>
                        <div class="col-md-4">
                            <select class="form-control" id="picardtype">
                                <option>--Select Type--</option>;
                                <?php
                                $q = "select * from billingcategorization order by clientcategory desc";
                                $w = mysql_query($q);

                                while ($e = mysql_fetch_array($w)) {
                                    $clientcategory = $e['clientcategory'];
                                    $categoryid = $e['categoryid'];

                                    echo "<option value='$categoryid'>$clientcategory</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2" style="padding:0px">Hospital ID</div>
                        <div class="col-md-4"><input type='text' class='form-control' id='pihospitalid'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">Title<sup>*</sup></div>
                        <div class="col-md-4">
                            <select class="form-control" id="pititle">
                                <option>Mr.</option>
                                <option>Mrs.</option>
                                <option>Miss</option>
                                <option>Prof</option>
                                <option>Pastor</option>
                                <option>Engr</option>
                                <option>Alhaji</option>
                                <option>Imam</option>
                                <option>Chief</option>
                                <option>Bishop</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="padding:0px"><span>Marital Status<sup>*</sup></span></div>
                        <div class="col-md-4">
                            <select class="form-control" id="pimaritalstatus">
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Last name</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='pilastname'></div>
                        <div class="col-md-2" style="padding:0px"><span>Date Of Birth<sup>*</sup></span></div>
                        <div class="col-md-4"><input type='date' class='form-control' id='pidateofbirth'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>First name<sup>*</sup></span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='pifirstname'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Other name</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='piothername'></div>
                        <div class="col-md-2" style="padding:0px">Relationship</div>
                        <div class="col-md-4"><input type='text' class='form-control' id='pihospitalid'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Gender<sup>*</sup></span></div>
                        <div class="col-md-4">
                            <select class='form-control' id='pigender'>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="padding:0px"><span>Principal's ID</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='piprincipalid'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Blood group</span></div>
                        <div class="col-md-4">
                            <select class="form-control" id="pibloodgroup">
                                <option>A</option>
                                <option>B</option>
                                <option>O</option>
                                <option>AB</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="padding:0px"><span>Genotype</span></div>
                        <div class="col-md-4"><input type='number' class='form-control' id='pigenotype'></div>
                        <div class="col-md-12" style="padding:0px; text-align:center"><span><input type="checkbox"> Tick it principal</span></div>
                    </div>
                    <div class="row">
                        <input type="button" value="Proceed to Contact Information >>" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('contactinformation')">
                    </div>
                </div>
                <div id="contactinformation" style="display:none">
                    <div class="addpatient row">
                        Contact Information
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">Mobile Phone</div>
                        <div class="col-md-4"><input type='text' class='form-control' id='cimobilephoner'></div>
                        <div class="col-md-2" style="padding:0px"><span>Home Phone</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='cihomephone'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Work Phone</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='ciworkphone'></div>
                        <div class="col-md-2" style="padding:0px"><span>Email</span></div>
                        <div class="col-md-4"><input type='email' class='form-control' id='ciemail'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Home Address</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='cihomeaddress'></div>
                        <div class="col-md-2" style="padding:0px"><span>City</span></div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id='cicity'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Zip/Postal Code</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='cizipcode'></div>
                        <div class="col-md-2" style="padding:0px"><span>State</span></div>
                        <div class="col-md-4">
                            <select class='form-control' id='cistate'>
                                <option>--Select state--</option>
                                <option>Outside Nigeria</option>
                                <option>Abuja FCT</option>
                                <option>Abia</option>
                                <option>Adamawa</option>
                                <option>Akwa-Ibom</option>
                                <option>Anambra</option>
                                <option>Bauchi</option>
                                <option>Bayelsa</option>
                                <option>Benue</option>
                                <option>Borno</option>
                                <option>Cross-River</option>
                                <option>Delta</option>
                                <option>Ebonyi</option>
                                <option>Edo</option>
                                <option>Ekiti</option>
                                <option>Enugu</option>
                                <option>Gombe</option>
                                <option>Imo</option>
                                <option>Jigawa</option>
                                <option>Kaduna</option>
                                <option>Kano</option>
                                <option>Katisina</option>
                                <option>Kebbi</option>
                                <option>Kogi</option>
                                <option>Kwara</option>
                                <option>Lagos</option>
                                <option>Nassarawa</option>
                                <option>Niger</option>
                                <option>Ogun</option>
                                <option>Ondo</option>
                                <option>Osun</option>
                                <option>Oyo</option>
                                <option>Plateau</option>
                                <option>Rivers</option>
                                <option>Sokoto</option>
                                <option>Taraba</option>
                                <option>Yobe</option>
                                <option>Zamfara</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Country</span></div>
                        <div class="col-md-4">
                            <select class='form-control' id='cicountry'>
                                <option value="AF">--Select--</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
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
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
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
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
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
                                <option value="LY">Libya</option>
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
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthélemy</option>
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
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
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
                    <div class="row">
                        <input type="button" value="<< Personal Info" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('personalinformation')">
                        <input type="button" value="Emergency Contact >>" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('emergencyinformation')">
                    </div>
                </div>
                <div id="emergencyinformation" style="display:none">
                    <div class="addpatient row">
                        Emergency Information
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">Emergency Contact</div>
                        <div class="col-md-4"><input type='text' class='form-control' id='eiemergencyinformation'></div>
                        <div class="col-md-2" style="padding:0px"><span>Emergency Phone</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='eiemergencyphone'></div>
                        <div class="col-md-2" style="padding:0px"><span>Guardian Name</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='eiguardianname'></div>
                    </div>
                    <div class="row">
                        <input type="button" value="<< Contact Information" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('contactinformation')">
                        <input type="button" value="Employer >>" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('employerinformation')">
                    </div>
                </div>
                <div id="employerinformation" style="display:none">
                    <div class="addpatient row">
                        Employer Information
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">Occupation</div>
                        <div class="col-md-4"><input type='text' class='form-control' id='einfoccupation'></div>
                        <div class="col-md-2" style="padding:0px"><span>Employer Name</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='einfemployername'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Employer City</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='einfemployercity'></div>
                        <div class="col-md-2" style="padding:0px"><span>Employer State</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='einfemployerstate'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px"><span>Employer Address</span></div>
                        <div class="col-md-4"><input type='date' class='form-control' id='einfemployeraddress'></div>
                        <div class="col-md-2" style="padding:0px"><span>Employer Country</span></div>
                        <div class="col-md-4">
                            <select class='form-control' id='einfemployercountry'>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <input type="button" value="<< Emergency" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('emergencyinformation')">
                        <input type="button" value="Identification >>" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('identificationinformation')">
                    </div>
                </div>
                <div id="identificationinformation" style="display: none">
                    <div class="addpatient row">
                        Identification
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">Identification Type</div>
                        <div class="col-md-4"><input type='text' class='form-control' id='ididentificationtype'></div>
                        <div class="col-md-2" style="padding:0px"><span>Identification Number</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='ididentificationnumber'></div>
                    </div>
                    <div class="row">
                        <input type="button" value="<< Employer" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('employerinformation')">
                        <input type="button" value="Insurance >>" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('insuranceinformation')">
                    </div>
                </div>
                <div id="insuranceinformation" style="display:none">
                    <div class="addpatient row">
                        Insurance
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">Insurance ID</div>
                        <div class="col-md-4"><input type='text' class='form-control' id='insinsuranceid'></div>
                        <div class="col-md-2" style="padding:0px"><span>Insurance Vendor</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='insvendor'></div>
                    </div>
                    <div class="row">
                        <input type="button" value=" << Identification" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('identificationinformation')">
                        <input type="button" value=" Socio-Economic Status >>" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('socioeconomicstatus')">
                    </div>
                </div>
                <div id="socioeconomicstatus" style="display:none">
                    <div class="addpatient row">
                        Socio Economic Status
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">Insurance ID</div>
                        <div class="col-md-4"><input type='text' class='form-control' id='insinsuranceid'></div>
                        <div class="col-md-2" style="padding:0px"><span>Insurance Vendor</span></div>
                        <div class="col-md-4"><input type='text' class='form-control' id='insvendor'></div>
                    </div>
                    <div class="row">
                        <input type="button" value=" << Insurances" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('insuranceinformation')">
                        <input type="button" value=" Marketting Comunicatios >>" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('markettingcommunication')">
                    </div>
                </div>
                <div id="markettingcommunication" style="display:none">
                    <div class="addpatient row">
                        Marketing Communication
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:0px">How did you hear about us?</div>
                        <div class="col-md-4">
                            <select class="form-control">
                                <option>Family</option>
                                <option>HMO</option>
                                <option>Employer</option>
                                <option>Flier</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="padding:0px">Best way to reach you</div>
                        <div class="col-md-4">
                            <select class="form-control">
                                <option>Phone</option>
                                <option>SMS</option>
                                <option>Whatsapp</option>
                                <option>Email</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <input type="button" value=" << S.E.S" style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('socioeconomicstatus')">
                        <input type="button" value=" Done " style="max-width: 500px; margin-top:40px" class="btn btn-success" onclick="addclientnext('identificationinformation')">
                    </div>
                </div>
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px; display:none" id="clientmanagement">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                View clients
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px;" id="positionan">
                <table class="table table-striped">
                    <tr style="font-weight:500"><td></td><td>Hospital ID</td><td>Client Name</td><td>Client phone</td><td>Gender</td><td>Date Of Birth</td><td></td></tr>
                    <?php
                    $a = "select * from enrolleelist";
                    $q = mysql_query($a);
                    $count = 1;
                    while ($zz = mysql_fetch_array($q)) {
                        $hospitalid = $zz['hospitalnumber'];
                        $clientname = $zz['lastname'] . " " . $zz['firstname'] . " " . $zz['othername'];
                        $clientphone = $zz['phonenumber'];
                        $clientemail = $zz['emailaddress'];
                        $clientgender = $zz['gender'];
                        $clientdob = $zz['dateofbirth'];

                        echo "<tr style='font-size:12px'><td>$count</td><td>$hospitalid</td><td>$clientname</td><td>$clientphone</td><td>$clientgender</td><td>$clientdob</td><td style='font-size:9px' class='ptr'>Update</td></tr>";
                        $count++;
                    }
                    ?>
                </table>
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px; display:none" id="updatecategory">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                Update HMO/Corporate clients
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px;" id="positionan">
                <div class="row">
                    <div class="col-md-6">
                        <label>Search Criteria</label>
                        <select class="form-control" id="updatesearchcriteria">
                            <option>Hospital ID</option>
                            <option>Enrollee ID</option>
                            <option>Phone Number</option>
                            <option>First Name</option>
                            <option>Email Address</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Search Value</label>
                        <input type="text" class="form-control" id="updatesearchvalue">
                    </div>
                    <div class="col-md-12">
                        <input type="button" value="Search" class="btn btn-purplesource">
                    </div>
                </div>
                <hr style="border-style:dashed; border-color:#E4E4E4; border-width:thin">
                <div class="col-md-6" style="min-height:170px; padding-left:0px">
                    <div style="background-color:#EAEAEA; padding:10px">
                        <table class="table table-condensed table-striped">
                            <thead style="font-weight:bold"><td>Book name</td><td>Contract</td><td>Plan</td><td></td></thead>
                            <tbody style="font-size:12px">
                                <tr><td>Kayode Agbede</td><td>Hygeia</td><td>Gold</td><td><input type="button" style="padding:2px" value="Select"></td></tr>
                                <tr><td>Kayode Agbede</td><td>--</td><td>--</td><td><input type="button" style="padding:2px" value="Select"></td></tr>
                                <tr><td>Kayode Agbede</td><td>--</td><td>--</td><td><input type="button" style="padding:2px" value="Select"></td></tr>
                                <tr><td>Kayode Agbede</td><td>--</td><td>--</td><td><input type="button" style="padding:2px" value="Select"></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6" style="min-height:170px; padding-left:0px">
                    <div style="background-color:#EAEAEA; padding:10px">
                        <div style="font-size:30px">Kayode Agbede ( HMO )</div>
                        <div style="font-size:15px">64/65 Ahmadu Bello Way, Bacita</div>
                        <div style="font-size:15px">HMO Name - ???? Plan - ????</div>
                        <div style="padding:10px; background-color:rgba(255,255,255,0.6); margin-top:10px">
                            <label>Card Type</label>
                            <select class="form-control">
                                <option>Private</option>
                                <option>HMO</option>
                                <option>Corporate</option>
                                <option>NHIS</option>
                            </select>
                            <label>Select Contract (HMO)</label>
                            <select class="form-control">
                                <option>Hygeia Community Health</option>
                                <option>Axan Mansard</option>
                                <option>Terve Health</option>
                            </select>
                            <label>Select Plan</label>
                            <select class="form-control">
                                <option>Gold</option>
                                <option>Diamond</option>
                                <option>Bronze</option>
                            </select>
                            <input type="button" class="btn btn-success" value="Update">
                        </div>
                    </div>
                </div>
            </div>

            <hr style="border-color:#D4D4D4; border-style:dotted">
        </div>
    </div>
    <span style="font-size:10px">ClientManagerModuleVersion ID:110816</span>
</div>