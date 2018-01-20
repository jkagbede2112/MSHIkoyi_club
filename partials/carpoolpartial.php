

<div id="carmanager" style="display:none">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
        <span style="max-width:200px">
            <div class="pm carstaff ssmactive" onclick="carStaff('#schmanagement', '#carschedule')" id="carschedule">Schedule trip</div>
            <div class="pm carstaff" onclick="carStaff('#emrmanagement', '#caremergency')" id="caremergency">View Schedules</div>
        </span>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px" id="schmanagement">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                Schedules
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px;" id="positionan">
                <div>
                    <span>Destination</span>
                    <input type="text" class="form-control" placeholder="" id="cardestination">
                    <span>Purpose of travel</span>
                    <input type="text" class="form-control" style="margin-top:5px" id="carpurposeoftravel">
                    <span>Date and time</span>
                    <input type="datetime-local" class="form-control" style="margin-top:5px" id="cardateWtime">
                    <span>Duration of use (hrs)</span>
                    <select class="form-control" id="carduration">
                        <?php
                        $q = 1;
                        while ($q < 4) {
                            echo "<option>$q</option>";
                            $q++;
                        }
                        ?>
                    </select>
                    <span>Moving freight?</span>
                    <select class="form-control" id="carfreight">
                        <option>no</option>
                        <option>yes</option>
                    </select>
                    <input type="button" value="Request approval" class="btn btn-success" onclick="requestcaruse(cardestination.value, carpurposeoftravel.value, cardateWtime.value, carduration.value, carfreight.value)">
                    <input type="button" value="Reset" class="btn btn-danger">
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px; display:none" id="positionv">

                <div style="margin-bottom:60px; background-color:#F0F0F0; padding:20px; border-style:solid; border-color:#E8E8E8; border-width:thin">
                    <label>Category name</label>
                    <input type="text" class="form-control" placeholder="Drug category" id="catname">
                    <input type="button" class="btn btn-purplesource" value="Add Category" onclick="addCat(catname.value)">
                </div>

                <div style="text-align:right; font-size:17px; color:#660066; position:relative">
                    <i class="fa fa-print" style="position:absolute; left:0px; cursor:pointer;" title="Print drug category"></i>
                    <i class="fa fa-refresh" style="position:absolute; left:30px; cursor:pointer;" onclick="refreshdrugcat()"></i>
                    <?php
                    $r = mysql_query("select * from drugcategory");
                    echo "<b>" . mysql_num_rows($r) . "</b> drug categories ";
                    ?> 
                </div>
                <table style="width:100%; margin-top:10px" class="table-bordered table">
                    <thead>
                        <tr style="background-color:#f0f0f0; color:#660066; font-weight:bold"><td>Drug category</td><td title="Items In Category">I.I.C</td><td colspan="3"></td></tr>
                    </thead>
                    <tbody id="catgrouping">
                        <?php
                        $r = "select * from drugcategory order by categoryname asc";
                        $w = mysql_query($r);
                        if (mysql_num_rows($w) < 1) {
                            echo "<tr><td colspan='4' style='color:red; text-align:center'>No records</td></tr>";
                        } else {
                            while ($qw = mysql_fetch_array($w)) {
                                $categoryname = $qw['categoryname'];
                                $drugtypesn = $qw['sn'];

                                $ass = mysql_query(" select * from drugstore where category='$drugtypesn'");
                                $e = mysql_num_rows($ass);

                                echo "<tr><td style='font-weight:500' id='id$drugtypesn'>$categoryname</td><td>$e</td><td><span class='btn btn-success' style='padding:2px; font-size:12px' onclick='updaterecord(id$drugtypesn.innerHTML, $drugtypesn)' data-toggle='modal' data-target='#myModal'>Update</span></td><td style='color:red; cursor:pointer; font-size:12px' onclick='deletecategory($drugtypesn,\"$categoryname\")'>Delete</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <hr style="border-color:#D4D4D4; border-style:dotted">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="emrmanagement" style="position:relative; display:none">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                View/Query Schedules
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">

            <div id="dimv" style="margin-top:40px">

                <label>Search Date</label>
                <input type="date" class="form-control" onchange="changecardate(this.value)">
                <div style="margin-top:30px; font-size:20px" id="querydate">
                    Schedules for today
                </div>
                <table class="table table-hover table-bordered" style="margin-top: 10px; margin-top:20px">
                    <thead>
                        <tr style="font-weight:500; color:#003366; font-size:13px"><td></td><td>Staff</td><td>Destination</td><td>Purpose Of Travel</td><td>Duration (Hrs)</td><td>Status</td><td></td></tr>
                    </thead>
                    <tbody id="carpooldets" style="font-size:12px">
                        <?php
                        $datetoday = date('Y-m-d');

                        $qa = "select * from carpoolschedule where dateWtime like '%$datetoday%' order by dateWtime asc";
                        //echo $qa;
                        $wa = mysql_query($qa);

                        $count = 1;
                        while ($r = mysql_fetch_array($wa)) {
                            $requestingstaff = $r['requestingstaff'];
                            $destination = $r['destination'];
                            $purposeoftravel = $r['purposeoftravel'];
                            $durationofuse = $r['duration'];
                            $approvalstatus = $r['approval'];

                            $aa = mysql_query("select * from staff where id='$requestingstaff'");
                            $wx = mysql_fetch_array($aa);

                            $name = $wx['lastname'] . " " . $wx['firstname'];

                            if ($approvalstatus === "1") {
                                if ($staffid === $requestingstaff) {
                                    echo "<tr style='background-color:#DFFFDF'><td>$count</td><td>$name</td><td>$destination</td><td>$purposeoftravel</td><td>$durationofuse</td><td>Approved</td><td></td></tr>";
                                } else {
                                    echo "<tr style='background-color:#DFFFDF'><td>$count</td><td>$name</td><td>$destination</td><td>$purposeoftravel</td><td>$durationofuse</td><td>Approved</td><td><i class='fa fa-thumbs-o-up ptr' title='Hitch Ride'></i></td></tr>";
                                }
                            } else {
                                echo "<tr style='background-color:#FFE1E1'><td>$count</td><td>$name</td><td>$destination</td><td>$purposeoftravel</td><td>$durationofuse</td><td>Not Approved</td><td></td></tr>";
                            }

                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="activitymanagement" style="position:relative; display:none">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                Activity Log
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
            <div id="dasdu" style="margin-top:40px">
                <i class="fa fa-refresh" style="cursor:pointer" title="Refresh client list" onclick="getVenValues()"></i>
                <div>Show recent 100 activities.. Subject others to date search</div>
                <table class="table table-hover table-striped" style="margin-top: 10px">
                    <table class='table table-striped' style="font-size:12px">
                        <thead>
                            <tr><td></td><td>Activity</td><td>Date</td><td></td></tr>
                        </thead>
                        <?php
                        $h = "select * from activitylog where userid='$staffid' order by id desc limit 100";
                        $q = mysql_query($h);
                        while ($e = mysql_fetch_array($q)) {
                            $act = $e['action'];
                            $description = $e['description'];
                            $dateupdated = $e['dateupdated'];

                            if ($act === "update") {
                                
                            } elseif ($act === "delete") {
                                
                            } elseif ($act === "create") {
                                
                            }

                            echo "<tr><td style='font-weight:bold'>$act</td><td>$description</td><td>$dateupdated</td><td style='width:30px; background-color:#'></td></tr>";
                        }
                        ?>
                    </table>
                </table>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="dispmanagement" style="position:relative; display:none">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                Dispensary Log
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
            <div id="dasdu" style="margin-top:40px">
                <i class="fa fa-refresh" style="cursor:pointer" title="Refresh client list" onclick="getVenValues()"></i>
                <div>
                    <select class="form-control">
                        <option>Borno-Way</option>
                        <option>Egbe</option>
                        <option>Falolu</option>
                        <option>Mushin</option>
                        <option>Onikan</option>
                        <option>Ikoyi-Club</option>
                    </select>
                </div>
                <table class="table table-hover table-striped" style="margin-top: 10px">
                    <table class='table table-striped' style="font-size:12px">
                        <thead>
                            <tr><td></td><td>Activity</td><td>Date</td><td></td></tr>
                        </thead>
                        <?php
                        $h = "select * from activitylog where userid='$staffid' order by id desc limit 100";
                        $q = mysql_query($h);
                        while ($e = mysql_fetch_array($q)) {
                            $act = $e['action'];
                            $description = $e['description'];
                            $dateupdated = $e['dateupdated'];

                            if ($act === "update") {
                                
                            } elseif ($act === "delete") {
                                
                            } elseif ($act === "create") {
                                
                            }

                            echo "<tr><td style='font-weight:bold'>$act</td><td>$description</td><td>$dateupdated</td><td style='width:30px; background-color:#'></td></tr>";
                        }
                        ?>
                    </table>
                </table>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="incmanagement" style="position:relative; display:none">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                Incidence reporting (Work In Progress)
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
            <div id="dasdu" style="margin-top:40px">
                <div style="margin-bottom:10px">
                    <label>Incidence</label>
                    <textarea class="form-control" rows="2"></textarea>
                    <label>Report to</label>
                    <select class="form-control">
                        <option>Officers listed here</option>
                    </select>
                    <input type="button" class="btn btn-success" value="Report Incidence">
                </div>
                <table class="table table-hover table-striped" style="margin-top: 10px">
                    <table class='table table-striped' style="font-size:12px">
                        <thead>
                            <tr><td>Incidence</td><td>Recipient</td><td>Date/Time reported</td><td></td></tr>
                        </thead>
                        <tbody>
                            <tr><td></td><td></td><td></td><td></td></tr>";
                        </tbody>
                    </table>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div style="margin-top:40px">
            <span style="font-size:25px; font-weight:400">Schedule</span>
            <?php
            ?>
            <table class="table table-responsive table-striped" style="margin-top:20px">
                <tr style="font-size:14px; font-weight:600"><td>Staff</td><td>Destination</td><td>Date</td></tr>
                <?php
                $cc = date("Y-m-d");
                $qq = "select * from carpoolschedule order by dateWtime asc";
                //echo $qq;
                $w = mysql_query($qq);

                while ($s = mysql_fetch_array($w)) {
                    $requestingstaffid = $s['requestingstaff'];
                    $destination = $s['destination'];
                    $purposeoftravel = $s['purposeoftravel'];
                    $dateWtime = $s['dateWtime'];
                    $duration = $s['duration'];
                    $approvalstatus = $s['approval'];
                    $dateadded = $s['dateadded'];

                    //Pull Staff Info.
                    $dasd = mysql_query("select * from staff where id='$requestingstaffid'");
                    $nam = mysql_fetch_array($dasd);
                    $name = $nam['lastname'] . " " . $nam['middlename'] . " " . $nam['firstname'];

                    if ($approvalstatus === "1") {
                        echo "<tr style='font-size:12px'><td>$name</td><td>$destination</td><td>$dateWtime</td></tr>";
                    } else {
                        echo "<tr style='font-size:12px; color:#ff0000'><td>$name</td><td>$destination</td><td>$dateWtime</td></tr>";
                    }
                }
                ?>

            </table>
        </div>
        <div style="margin-top:40px">

        </div>
    </div>
</div>