<div id="clientmanager" style="display:none">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
        <span style="max-width:200px">
            <div class="pm aavv ssmactive" onclick="pmClient('#clientcategory', '#addclient')" id="addclient">Add Patient</div>
            <div class="pm aavv" onclick="pmClient('#updatecategory', '#updateclient')" id="updateclient">Update Patient</div>
            <div class="pm aavv" onclick="pmClient('#clientmanagement', '#viewclient')" id="viewclient">View Patient</div>
        </span>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px" id="clientcategory">
            <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                Add Patient
            </div>
            <hr style="border-color:#D4D4D4; border-style:dotted">
            
            <span class="pregwomen cdcd actbreed delean" onclick='manageancclient("#regclient", "#regancclient")' id='regclient'>Personal Info</span>
            <span class="pregwomen cdcd delean" onclick='manageancclient("#manclient", "#manancclient")' id='manclient'>Manage Client</span>
            <span class="pregwomen cdcd delean" onclick='manageancclient("#conclient", "#manancclient")' id='conclient'>Client Contact</span>
            <span class="pregwomen cdcd delean" onclick='manageancclient("#idclient", "#manancclient")' id='idclient'>ID</span>
            <hr style="margin-top:3px; margin-bottom:50px; border-color:#4CAE4C">
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px;" id="positionan">
                <div>
                    <span><span class="cp">*</span>Hospital ID</span>
                    <input type='text' class='form-control' id='clienthospitalid'>
                    <span><span class="cp">*</span>First name</span>
                    <input type='text' class='form-control' id='clientfirstname'>
                    <span><span class="cp">*</span>Other name</span>
                    <input type='text' class='form-control' id='clientothername'>
                    <span><span class="cp">*</span>Last name</span>
                    <input type='text' class='form-control' id='clientlastname'>
                    <span><span class="cp">*</span>Date Of Birth</span>
                    <input type='date' class='form-control' id='clientdob'>
                    <span><span class="cp">*</span>Gender</span>
                    <select class='form-control' id='clientgender'>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <span><span class="cp">*</span>Phone number</span>
                    <input type='number' class='form-control' id='clientphone'>
                    <span>Email address</span>
                    <input type='email' class='form-control' id='clientemailaddress'>

                    <span><span class="cp">*</span>Home address</span>
                    <textarea style="resize: none" class="form-control" rows="2" id="clientaddy"></textarea>
                    <input type="button" value="Add patient" class="btn btn-success" onclick="addclient(clienthospitalid.value, clientfirstname.value, clientothername.value, clientlastname.value, clientdob.value, clientgender.value, clientphone.value, clientemailaddress.value, clientaddy.value)">

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
                Update clients
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
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div style="margin-top:40px">
            <center><i style='font-weight:200; font-size:100px' class='fa fa-user-md'></i></center>
            <hr style="margin-top:10px;border-color:#ff0000; border-style:dotted">
            <table class="table table-striped" style="font-size:15px">
                <?php
                $z = "select * from illnesscategory order by illness asc";
                $d = mysql_query($z);

                while ($g = mysql_fetch_array($d)) {
                    $illnessname = $g['illness'];
                    $aboutillness = $g['aboutilless'];
                    $sn = $g['sn'];

                    $sds = mysql_query("select * from addillcategory where clientillcategory='$sn'");
                    $count = mysql_num_rows($sds);

                    echo "<tr><td class='ptr' title='$aboutillness'>$illnessname</td><td>$count</td><td><i class='fa fa-fax ptr'></i></td></tr>";
                }
                ?>
            </table>

        </div>
        <div style="margin-top:40px">

        </div>
    </div>
</div>