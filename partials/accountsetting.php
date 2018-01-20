<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="acctmanagement" style="position:relative; display:none">
    <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
        Account Setting
    </div>
    <hr style="border-color:#D4D4D4; border-style:dotted">
    <div id="daspiy" style="margin-top:40px;">
        <label>Name</label>
        <?php
        $staffid = $_SESSION['staffid'];
        $r = "select * from staff where id='$staffid'";

        $e = mysql_query($r);
        $q = mysql_fetch_array($e);
        $name = strtoupper($q['lastname']) . " " . $q['middlename'] . " " . $q['firstname'];
        $phonenumber = $q['phonenumber'];
        $emailaddress = $q['emailaddress'];
        $address = $q['homeaddress'];

        echo "<input type='text' class='form-control' id='addvendorvn' value='$name' disabled>";
        ?>

        <label>Phone</label>
        <input type="text" class="form-control" value='<?php echo $phonenumber; ?>' disabled>
        </select>
        <label>Email</label>
        <input type="text" class="form-control" value='<?php echo $emailaddress ?>' disabled>
        <label>Address</label>
        <input type="email" class="form-control" value='<?php echo $address ?>' disabled>
        <br/><br/>
        <label>Old Password</label>
        <input type="text" class="form-control" id="oldpass" onblur="checkvalidity(this.value)" o>
        <label>New Password (5 characters minimum)</label>
        <input type="password" class="form-control" id="newpass" onblur="newpassword(this.value)">
        <label>Repeat New Password</label>
        <input type="password" class="form-control" id="newpass2" onblur="verifypass(this.value)">
        <input type="button" class="btn btn-success" value="Change Password" onclick="changepassword(oldpass.value, newpass.value, newpass2.value)">
    </div>
    <div id="dassy" style="display:none">
        <div style="font-size:18px; color:#BB9709; margin-top:60px">Update vendor information</div>
        <div style="font-size:10px; text-align:right; cursor:pointer" onclick="refreshvendordropdown()">Refresh client dropdown</div>
        <select class="form-control" style="margin-top:20px" id="coydropdown" onchange="pullvendorinfo(this.value)">
            <option>--Select vendor--</option>
            <?php
            $r = mysql_query("select * from vendordetails order by vendorname asc");
            while ($w = mysql_fetch_array($r)) {
                $clientname = $w['vendorname'];
                $clientid = $w['sn'];
                echo "<option value='$clientid'>$clientname</option>";
            }
            ?>
        </select>
        <hr style="border-color:#B1B1B1; border-style:dashed">
        <label style="color:#3D003D; margin-top:5px">Vendor name</label>
        <input type="text" class="form-control" id='venName'>
        <label style="color:#3D003D; margin-top:5px">Contact person</label>
        <input type="text" class="form-control" id='vencontactName'>
        <label style="color:#3D003D; margin-top:5px">Contact phone number</label>
        <input type="text" class="form-control" id='venContactPhone'>
        <label style="color:#3D003D; margin-top:5px">Email address</label>
        <input type="email" class="form-control" id='venEmailAddress'>
        <label style="color:#3D003D; margin-top:5px">Office address</label>
        <textarea class="form-control" rows="2" id='venOfficeAddress'></textarea>
        <input type="button" class="btn btn-success" value="Update vendor information" onclick="updatevendorinfo()"> <span id="clientID" style="display:none"></span>
    </div>
    <!--
    <div id="dasduy" style="margin-top:40px">
        <span style="font-size:25px">
            Email me
        </span>
        <table class="table table-hover table-bordered" style="margin-top: 10px; margin-bottom:20px">
            <thead>
                <tr><td><input type="checkbox"> My reminder daily</td></tr>
                <tr><td><input type="checkbox"> Any assigned task</td></tr>
                <tr><td><input type="checkbox"> My daily activities</td></tr>
                <tr><td><input type="checkbox"> When consumables left reaches or falls below M.R.O</td></tr>
                <tr><td><input type="checkbox"> Weekly inventory reports at all units</td></tr>
                <tr><td><input type="checkbox"> Email me my schedule daily</td></tr>
                <tr><td><input type="checkbox"> Email me any scheduled task</td></tr>         
            </thead>
        </table>
        <span style="font-size:25px">
            SMS me
        </span>
        <table class="table table-hover table-bordered" style="margin-top: 10px">
            <thead>
                <tr><td><input type="checkbox"> My reminder daily</td></tr>
                <tr><td><input type="checkbox"> My daily schedule</td></tr>
                <tr><td><input type="checkbox"> Any assigned task</td></tr>
                <tr><td><input type="checkbox"> My daily activities</td></tr>
                <tr><td><input type="checkbox"> When qty lft reaches or falls below M.R.O</td></tr>
                <tr><td><input type="checkbox"> Weekly inventory reports at all units</td></tr>
                <tr><td><input type="checkbox"> Email me my schedule daily</td></tr>
                <tr><td><input type="checkbox"> Email me any scheduled task</td></tr>         
            </thead>
        </table>
    </div>-->
</div>