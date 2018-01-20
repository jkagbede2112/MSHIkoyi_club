<script>
    setInterval(function (date) {
        getcurrentTime();
    }, 1000);
</script>
<div id="checkinmanager" style="display:none">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
        <span style="max-width:200px">
            <div class="pm aavv ssmactive" onclick="pmmClient('#chkinpatient', '#checkinpatient')" id="checkinpatient">Check-In</div>
            <div class="pm aavv" onclick="pmmClient('#chkinlog', '#checkinlog')" id="checkinlog">Check-In log</div>
        </span>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px" id="chkinpatient">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                Check-In
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted; margin-bottom:20px">
            <div class="row" style="margin-top:30px">
                <div class="col-md-3" style="padding:0px">&nbsp; &nbsp; Search Criteria</div>
                <div class="col-md-9">
                    <select class="form-control" id="searchpatientcriteria">
                        <option value="hospitalnumber">Hospital ID (Patient ID)</option>
                        <option value="enrolleeid">EnrolleeID</option>
                        <option value="phonenumber">Phone Number</option>
                        <option value="firstname">First Name</option>
                        <option value="lastname">Last Name</option>
                        <option value="emailaddress">Email address</option>
                        <option>EnrolleeID</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top:5px">
                <div class="col-md-3" style="padding:0px">&nbsp; &nbsp; Search Value</div>
                <div class="col-md-9"><input type="text" class="form-control" id="searchpatientvalue"></div>
            </div>

            <input type="button" class="btn btn-success" value="Search" onclick="getcheckinclients(searchpatientcriteria.value, searchpatientvalue.value)">
            <hr style="border-color:#D900D9; border-style:dashed; border-width: thin">
            <table class="table table-striped table-condensed" style="font-size:12px">
                <thead style="font-weight:bold"><td></td><td>Name</td><td style="color:#D900D9">Contract</td><td style="color:#D900D9">Plan</td><td>Gender</td><td></td></thead>
                <tbody id="returnedfromdatabase"></tbody>
            </table>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:10px;" id="positionan">
                <div style="margin-top:10px; background-color:#fff;min-height:50px; padding:20px" id="patienttocheckin">
                    <label style="font-size:30px"></label><br>

                </div>
                <div style="font-size:30px; text-align: center" id="checkinstat"></div>
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px; display:none" id="chkinlog">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                Check-In Log
            </div>
            <div class="row" style="margin-top:50px; padding:0px">
                <div class="col-md-3" style="text-align:right; font-size:20px">
                    Date 
                </div>
                <div class="col-md-7" style="padding:0px">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2" style="padding:0px">
                    <input type="button" value="Get data" class="btn btn-success">
                </div>
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px;" id="positionan">
                <table class="table table-striped">
                    <tr style="font-weight:500"><td></td><td>Hospital ID</td><td>Client Name</td><td>Check In Time</td><td></td><td></td><td></td></tr>
                    <?php
                    $r = "select * from checkinlog";
                    $t = mysql_query($r);

                    $count = 1;
                    while ($j = mysql_fetch_array($t)) {
                        $hospitalID = $j['hospitalid'];
                        $checkin = $j['checkin'];

                        $a = "select * from enrolleelist where hospitalnumber='$hospitalID'";

                        $q = mysql_query($a);
                        $zz = mysql_fetch_array($q);
                        $hospitalid = $zz['hospitalnumber'];
                        $clientname = $zz['lastname'] . " " . $zz['firstname'] . " " . $zz['othername'];
                        $clientphone = $zz['phonenumber'];
                        $clientemail = $zz['emailaddress'];
                        $clientgender = $zz['gender'];
                        $clientdob = $zz['dateofbirth'];

                        echo "<tr style='font-size:12px'><td>$count</td><td>$hospitalID</td><td>$clientname</td><td>$checkin</td><td>$clientgender</td><td style='font-size:9px; color:blue' class='ptr'>Update</td><td style='font-size:9px; color:red' class='ptr'>Delete</td></tr>";
                        $count++;
                    }
                    ?>
                </table>
            </div>

            <hr style="border-color:#D4D4D4; border-style:dotted">
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div style="margin-top:40px">
            <center><i style='font-weight:200; font-size:100px' class='fa fa-user-md'></i></center><br>
            <div style="text-align: center"><span style="font-size:40px; font-family:verdana; padding:10px; background-color:#E5E5E5; color:#B700B7" id="nownowdate"></span></div>
            <hr style="margin-top:10px;border-color:#ff0000; border-style:dotted; color:#480048">
            <i class="fa fa-refresh" style="color:#0066CC; cursor:pointer" onclick="pulltodaycheckin()"></i>&nbsp; - &nbsp;  Checked In Today
            <table class="table table-striped" style="font-size:12px; margin-top:10px">
                <tr style="font-weight:bold; font-size:12px"><td></td><td>Name</td><td>Check-In</td><td>W.T.(Mins)</td></tr>
                <tbody id="checkinsummary">
                    <?php
                    $todaysdate = date('Y-m-d');
                    $r = "select * from checkinlog where datetime like '%$todaysdate%'";
                    $t = mysql_query($r);

                    $count = 1;
                    while ($j = mysql_fetch_array($t)) {
                        $hospitalID = $j['hospitalid'];
                        $checkin = $j['checkin'];

                        $a = "select * from enrolleelist where hospitalnumber='$hospitalID'";

                        $q = mysql_query($a);
                        $zz = mysql_fetch_array($q);
                        $hospitalid = $zz['hospitalnumber'];
                        $clientname = $zz['lastname'] . " " . $zz['firstname'] . " " . $zz['othername'];
                        $clientphone = $zz['phonenumber'];
                        $clientemail = $zz['emailaddress'];
                        $clientgender = $zz['gender'];
                        $clientdob = $zz['dateofbirth'];

                        $timenownow = date("i");

                        $date1 = strtotime(date("Y-m-d"));
                        $date2 = strtotime($checkin);
                        $givenbirthdate = strtotime($givenbirth);

                        $timediff = $date1 - $date2;

                        $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1 . "wk(s)";

                        echo "<tr style='font-size:12px'><td>$count</td><td>$hospitalID</td><td>$checkin</td><td>$timenownow</td></tr>";
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12 col-lg-12">
        <span style="font-size:10px">CheckInManagerModuleVersion ID:110816</span>
    </div>
</div>