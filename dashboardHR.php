<!DOCTYPE html>
<!--
Developed by Joseph Kayode Agbede for Mt. Sinai Hospital Ebutte-Metta. 10 - 3 - 2016.
-->
<?php
include 'dumbphp/DBconnectPS.php';
$staffCode = "HR";



?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
        <script src="JavFol/jquery-1.11.3.js" type="text/javascript"></script>
        <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="JavFol/bootstrap.min.js" type="text/javascript"></script>
        <link href="CSS/pagedefinition.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="JavFol/purplesource.js" type="text/javascript"></script>
        <script src="CSS/summernote.min.js" type="text/javascript"></script>
        <link href="CSS/summernote.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div style="z-index:1; position:fixed; width:100%; height:auto; text-align: center; padding-top:0px">
            <center>
                <span style="background-color:rgba(255,255,255,0.8); padding-top:0px; padding:2px; border-bottom-color:#660066; border-bottom-style:dotted; border-bottom-width:thin; height:100px" id='commentsatop'></span>
                <span id='commentsbuttons'></span>
            </center>
        </div>
        <div class="header">
            <span style='background-color:#480048; color:#D6D6D6; padding:10px; border-radius:4px;'><b>HR</b> - Joshua Banye</span>
            <span id="onlinestatus" class="btn btn-success" style="z-index:4">
                Online
            </span>
        </div>
        <!-- Human Resource -->
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs" style="height:100px; padding-top:15px;" class="col-lg-2 col-md-2 ">
            <span class="col-lg-2 col-md-2 mainButtons actMButtons" onclick="mainMenu('#mmDashboard', '#dashboardmanager')" id="mmDashboard">
                <i class="fa fa-th" style="font-size:30px"></i><br>
                Dashboard
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmStaff', '#staffmanager')" id='mmStaff'>
                <i class="fa fa-users" style="font-size:30px"></i><br>
                Staff
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmPayroll', '#dashboardmanager')" id='mmPayroll'>
                <i class="fa fa-calculator" style="font-size:30px"></i><br>
                Payroll
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmOnboarding', '#dashboardmanager')" id='mmOnboarding'>
                <i class="fa fa-user-plus" style="font-size:30px"></i><br>
                Onboarding
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmPositionmanagement', '#portalmanager')" id='mmPositionmanagement'>
                <i class="fa fa-print" style="font-size:30px"></i><br>
                Setting
            </span>
            <span class="col-lg-2 col-md-2 " style="color:#fff" onclick="mainMenu('#mmHumanresource', '#dashboardmanager')" id='mmHumanresource'>
                Human resource
            </span>
            <span style="position:absolute; right:10px">
                <img src="images/purplesourcelogo.png" width="200px">
            </span>
        </div>
        <!-- Dashboard -->

        <!-- Staff -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content" style="padding-bottom:10px; border-bottom-style:dotted; border-top-style:dotted; border-color:#E1E1E1; border-width:thin">
            <div id='dashboardmanager' style='display:none'>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class='col-lg-12 col-md-12 col-sm-12' style='margin-top:40px; margin-bottom:60px'>
                        <i class='fa fa-users' style='font-size:40px; color:#3D003D'></i> &nbsp; <span style='font-size:30px'><?php
                            $q = mysql_query("select * from staff");
                            echo mysql_num_rows($q);
                            ?></span> staff
                        <hr style='border-color:#D4D4D4; border-style:dotted'>
                        <i class='fa fa-building' style='font-size:40px; color:#3D003D'></i> &nbsp; <span style='font-size:30px'><?php
                            $q = mysql_query("select * from sites");
                            echo mysql_num_rows($q);
                            ?></span> Sites
                        <hr style='border-color:#D4D4D4; border-style:dotted'>
                        <i class='fa fa-sitemap' style='font-size:40px; color:#3D003D'></i> &nbsp; <span style='font-size:30px'><?php
                            $q = mysql_query("select * from departments");
                            echo mysql_num_rows($q);
                            ?></span> Departments

                    </div>
                    <div style='margin-top:40px'>
                        <div style='text-align:right; font-size:20px; margin-bottom:10px'>Site Codes</div>
                        <div>
                            <table class='table table-bordered'>
                                <?php
                                $t = "select * from sites order by sitename asc";
                                $f = mysql_query($t);
                                while ($g = mysql_fetch_array($f)) {
                                    $siteid = $g['siteid'];
                                    $sitename = $g['sitename'];

                                    echo "<tr><td>$siteid</td><td>$sitename</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id='staffmanager'>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <span style="max-width:200px">
                        <div class="ssm" onclick="proStaff('#addstaff', '#addstaffoption')" id="addstaffoption">Add Staff</div>
                        <div class="ssm ssmactive" onclick="proStaff('#updatestaff', '#updatestaffoption')" id="updatestaffoption">Update Staff info</div>
                        <div class="ssm" onclick="proStaff('#messagestaff', '#messagestaffoption')" id="messagestaffoption">Message Staff</div>
                        <div class="ssm" onclick="proStaff('#viewstaff', '#viewstaffoption')" id="viewstaffoption">View Staff</div>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px">
                    <!-- addstaff -->
                    <div id="addstaff" style="padding-top:0px; display:none">
                        <div style="padding-bottom:40px; font-size:35px; font-weight:300; color:#3D003D; text-align:right">Add Staff</div>
                        <div id='addbasicinfo'>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Basic Information</div>
                            <span>Site</span>
                            <select class="form-control" style="max-width:200px; margin-bottom:10px" id="assite">
                                <option value="-">--Select site--</option>
                                <?php
                                $r = mysql_query("select * from sites order by sitename asc");
                                while ($w = mysql_fetch_array($r)) {
                                    $siteid = $w['siteid'];
                                    $sitename = $w['sitename'];
                                    echo "<option value='$siteid'>$sitename</option>";
                                }
                                ?>
                            </select>
                            <span>Department</span>
                            <select class="form-control" style="max-width:200px; margin-bottom:10px" id="asd">
                                <option value="-">--Select department--</option>
                                <?php
                                $a = mysql_query("select * from departments order by departmentname asc");
                                while ($x = mysql_fetch_array($a)) {
                                    $deptid = $x['id'];
                                    $deptname = $x['departmentname'];
                                    echo "<option value='$deptid'>$deptname</option>";
                                }
                                ?>
                            </select>
                            <span>Job Title</span>
                            <select class="form-control" style="max-width:400px; margin-bottom:10px" id="asjt">
                                <option value="-">--Select Job Title--</option>
                                <?php
                                $a = mysql_query("select * from jobdetail order by jobtitle asc");
                                while ($x = mysql_fetch_array($a)) {
                                    $sn = $x['sn'];
                                    $jobtitle = $x['jobtitle'];
                                    echo "<option value='$sn'>$jobtitle</option>";
                                }
                                ?>
                            </select>
                            <span>First name</span>
                            <input type="text" class="form-control" style="margin-bottom:15px" placeholder="First name" id="asfn">
                            <span>Middle name</span>
                            <input type="text" class="form-control" style="margin-bottom:15px" placeholder="Middle name" id="asmn">
                            <span>Last name</span>
                            <input type="text" class="form-control" style="margin-bottom:15px" placeholder="Last name" id="asln">
                            <span>Date of birth</span>
                            <input type="date" class="form-control" style="margin-bottom:15px" id="asdob">
                            <span>Marital Status</span>
                            <select class="form-control" style="max-width:400px; margin-bottom:15px" id="asms">
                                <option value="M">Married</option>
                                <option value="S">Single</option>
                            </select>
                            <span>Gender</span>
                            <select class="form-control" style="max-width:200px; margin-bottom:15px" id="asg">
                                <option value='-'>--Select Gender--</option>
                                <option value='F'>Female</option>
                                <option value='M'>Male</option>
                            </select>
                            <span>State of origin</span>
                            <select class="form-control" id="assoo" style="margin-bottom:15px">
                                <option value='-'>--Select State--</option>
                                <?php
                                $i = mysql_query("select * from nigerianstates order by statename asc");
                                while ($w = mysql_fetch_array($i)) {
                                    $id = $w['id'];
                                    $sname = $w['statename'];
                                    echo "<option value='$id'>$sname</option>";
                                }
                                ?>
                            </select>
                            <span>Phone number</span>
                            <input type="text" class="form-control" placeholder="Phone number" style="margin-bottom:15px" id="aspn">
                            <span>Email address</span>
                            <input type="text" class="form-control" placeholder="XXXXX@mtsinaihospitals.com" style="margin-bottom:15px" id="asea">
                            <span>Home address</span>
                            <textarea class="form-control" id="asha" rows="3" style="margin-bottom:15px"></textarea>
                            <span>Highest Qualification</span>
                            <select class="form-control" style="max-width:200px; margin-bottom:15px" id="ashq">
                                <option value='-'>--Qualification--</option>
                                <option value='Phd'>Ph.D</option>
                                <option value='M.Sc'>Ms.C</option>
                                <option value='B.Sc'>Bs.C</option>
                            </select>
                            <input type='button' value='Save and proceed to Pension Details' class='btn btn-success' onclick='addbi()'>
                        </div>
                        <div id='pensiondetails' style='display:none'>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Pension Details</div>
                            <span>Pension Pin</span>
                            <input type="text" class="form-control" placeholder="Pension PIN" id="aspp" style="margin-bottom:15px">
                            <span>Pension Administrator</span>
                            <input type="text" class="form-control" placeholder="Pension PIN" id="aspa" style="margin-bottom:15px">
                            <input type='button' value='Back to basic info.' class='btn btn-warning'>
                            <input type='button' value='Save' class='btn btn-success'>
                            <input type='button' value='Save and proceed to Bank Information' class='btn btn-success'>
                        </div>
                        <div id='bankinformation' style='display:none'>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Bank Information</div>
                            <span>Bank Name</span>
                            <select class="form-control" id="asbn" style="margin-bottom:15px">
                                <option>--Select Bank--</option>
                                <?php
                                $f = mysql_query("select * from bankinformation order by bankname asc");
                                while ($w = mysql_fetch_array($f)) {
                                    $bn = $w['bankname'];
                                    $bankid = $w['bankid'];
                                    echo "<option value='$bankid'>$bn</option>";
                                }
                                ?>
                            </select>
                            <span>Account Number</span>
                            <input type="text" class="form-control" placeholder="NUBAN account number" id="asan" style="margin-bottom:15px">
                            <input type='button' value='Back to pension information' class='btn btn-warning'>
                            <input type='button' value='Save' class='btn btn-success'>
                            <input type='button' value='Save and proceed to Next of Kin' class='btn btn-success'>
                        </div>
                        <div id='nextofkindetails' style='display:none'>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Next of kin details</div>
                            <span>Name</span>
                            <input type="text" class="form-control" placeholder="Name of Next of kin" id="asnokn" style="margin-bottom:15px">
                            <span>Mobile number</span>
                            <input type="text" class="form-control" placeholder="Mobile number of Next of kin" id="asnokm" style="margin-bottom:15px">
                            <span>Address</span>
                            <textarea class="form-control" placeholder="Address of Next of kin" id="asnoka" style="margin-bottom:15px"></textarea>
                            <input type="button" class="btn btn-success" value="Add new Staff" onclick='addStaff()'>
                        </div>
                    </div>
                    <!-- updatestaff -->
                    <div id="updatestaff" style="padding-top:0px; min-height:500px; position:relative;">
                        <div style="padding-bottom:40px; font-size:35px; font-weight:300; color:#3D003D; text-align:right">Update Staff Info</div>
                        <div style="height:140px">
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#E7E7E7 ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">

                                <div>
                                    <input type="text" class="form-control" placeholder="Staff name or Staff ID" style="margin-bottom:10px" id="staffnameS">
                                    <span class="btn btn-success" style="width:100%" onclick="getstaffDet(staffnameS.value)"><i class="fa fa-search"></i> Pull information</span>
                                </div>
                            </span>
                        </div>
                        <!-- Table for staff.. -->
                        <div style="margin-bottom:20px">
                            <table class="table table-bordered" style="width:100%; display:none" id="searchedstaff">
                                <thead>
                                    <tr style="background-color:#3D003D; color:#FFECFF">
                                        <td>SN</td>
                                        <td>Staff name</td>
                                        <td>Site</td>
                                        <td>Department</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody id="searchedStaff" style="font-size:12px">
                                </tbody>
                            </table>
                        </div>
                        <!-- Update materials -->
                        <div id="updatematerial" class="col-lg-12 col-md-12" style="font-size:12px; text-align:center; background-color:#F0F0F0; padding:10px; margin-bottom:20px; margin-top:10px; display:none">
                            <span class="UM col-lg-2 col-md-2" onclick="ubi('#sbasicinfo', '#bibi')" id="bibi">
                                <i class="fa fa-list-ol"></i><br/>
                                Basic Information
                            </span>
                            <span class="UM col-lg-2 col-md-2" onclick="ubi('#sbankinfo', '#bdbd')" id="bdbd">
                                <i class="fa fa-university"></i><br/>
                                Bank Details
                            </span>
                            <span class="UM col-lg-2 col-md-2" onclick="ubi('#spensioninfo', '#pipi')" id="pipi">
                                <i class="fa fa-pinterest-square"></i><br/>
                                Pension Information
                            </span>
                            <span class="UM col-lg-2 col-md-2" onclick="ubi('#snokinfo', '#noknok')" id="noknok">
                                <i class="fa fa-user"></i><br/>
                                Next of Kin
                            </span>
                            <span class="UM col-lg-2 col-md-2" onclick="ubi('#sdocumentuploadinfo', '#dudu')"  id="dudu">
                                <i class="fa fa-cloud-upload"></i><br/>
                                Document Upload
                            </span>
                            <span class="UM col-lg-2 col-md-2" onclick="ubi('#smessagestaffinfo', '#msms')" style="color: #E10E6C"  id="msms">
                                <i class="fa fa-fax" style="color: #E10E6C"></i><br/>
                                Message staff
                            </span>
                        </div>
                        <!-- Update form -->
                        <div style="margin-top:20px">

                            <div id="sbasicinfo" style="display:none">
                                <hr style="margin-bottom:5px">
                                <div style="text-align: right; color:#83358A; font-weight:600">Basic Information <span id="temstaffid"></span></div>
                                <table style="width:100%; padding:5px;" class="table table-striped">
                                    <tr><td>First name</td><td><input type="text" style="width:100%" class="form-control" id='ubifn'></td></tr>
                                    <tr><td>Middle name</td><td><input type="text" style="width:100%" class="form-control" id='ubimn'></td></tr>
                                    <tr><td>Last name</td><td><input type="text" style="width:100%" class="form-control" id='ubiln'></td></tr>
                                    <tr><td>Gender</td><td><select class='form-control' style='max-width:200px' id='ubig'><option>Female</option><option>Male</option></select></td></tr>
                                    <tr><td>Marital Status</td><td><select class='form-control' style='max-width:200px' id='ubims'><option>Single</option><option>Married</option></select></td></tr>
                                    <tr><td>Home address</td><td><textarea class='form-control' rows='2' id='ubiha'></textarea></td></tr>
                                    <tr><td>Phone number</td><td><input type="text" style="width:100%" class="form-control" id='ubipn'></td></tr>
                                    <tr><td>email address</td><td><input type="text" style="width:100%" class="form-control" id='ubiea'></td></tr>
                                    <tr><td>Staff ID</td><td><input type="text" style="width:100%" class="form-control" id='ubisi' disabled></td></tr>
                                    <tr><td>Highest qualification</td><td><select class='form-control' style='max-width:100px' id='ubihq'><option>Phd</option><option>M.Sc</option></select></td></tr>
                                    <tr><td colspan="2" style="text-align:center"><input type="button" value="Update Basic Information" class="btn btn-success" onclick="updateBI(temstaffid.innerHTML)"></td></tr>
                                </table> 
                            </div>

                            <div id="sbankinfo" style='display:none'>
                                <hr style="margin-bottom:5px">
                                <div style="text-align: right; color:#83358A; font-weight:600">Bank Information</div>
                                <table style="width:100%; padding:5px" class="table table-striped">
                                    <tr><td>Bank name</td><td><select class="form-control" id='ubibn'>
                                                <option id='-'>--Select Bank--</option>
                                                <?php
                                                $t = mysql_query("select * from bankinformation order by bankname asc");
                                                while ($a = mysql_fetch_array($t)) {
                                                    $bankid = $a['bankid'];
                                                    $bankname = $a['bankname'];
                                                    echo "<option value='$bankid'>$bankname</option>";
                                                }
                                                ?>
                                            </select></td></tr>
                                    <tr><td>Account name</td><td><input type="text" style="width:100%" class="form-control" id='ubiana'></td></tr>
                                    <tr><td>Account number</td><td><input type="text" style="width:100%" class="form-control" id='ubian'></td></tr>
                                    <tr><td colspan="2" style="text-align:center"><input type="button" value="Update Bank Information" class="btn btn-success" onclick="updatebankdets()"></td></tr>
                                </table>
                            </div>

                            <div id="snokinfo" style='display:none'>
                                <hr style="margin-bottom:5px">
                                <div style="text-align: right; color:#83358A; font-weight:600">Next Of Kin Information</div>
                                <table style="width:100%; padding:5px;" class="table table-striped" >
                                    <tr><td>Name</td><td><input type="text" style="width:100%" class="form-control" id="ubinnok"></td></tr>
                                    <tr><td>Mobile number</td><td><input type="text" style="width:100%" class="form-control" id="ubimnnok"></td></tr>
                                    <tr><td>Address</td><td><textarea style="resize:none;" rows="2" class="form-control" id="ubianok"></textarea></tr>
                                    <tr><td colspan="2" style="text-align:center"><input type="button" value="Update Next-Of-Kin Information" class="btn btn-success" onclick='updatenokdets(temstaffid.innerHTML)'></td></tr>
                                </table> 
                            </div>

                            <div id="spensioninfo" style='display:none'>
                                <hr style="margin-bottom:5px">
                                <div style="text-align: right; color:#83358A; font-weight:600">Pension Information</div>
                                <table style="width:100%; padding:5px" class="table table-striped" >
                                    <tr><td>Pension pin</td><td><input type="text" style="width:100%" class="form-control" id='ubipp'></td></tr>
                                    <tr><td>Administrator</td><td><input type="text" style="width:100%" class="form-control" id='ubia'></td></tr>
                                    <tr><td colspan="2" style="text-align:center"><input type="button" value="Update Pension Information" class="btn btn-success" onclick='updatepensiondets(temstaffid.innerHTML)'></td></tr>
                                </table> 
                            </div>

                            <div id="sdocumentuploadinfo" style='display:none'>
                                <hr style="margin-bottom:5px">
                                <div style="text-align: right; color:#83358A; font-weight:600">Document Upload</div>
                                <table style="width:100%; padding:5px" class="table table-striped" id="documentstoupload">

                                </table> 
                            </div>

                            <div id="smessagestaffinfo" style='display:none'>
                                <hr style="margin-bottom:5px">
                                <div style="text-align: right; color:#83358A; font-weight:600">Message Staff</div>
                                <table style="width:100%; padding:5px" class="table table-striped" id="documentstoupload">
                                    <div style="padding:10px; margin-top:10px; background-color:#F0F0F0">
                                        <div><span class="msgStaff msgStaffactive" onclick="showsendsms()">SMS</span> | <span class="msgStaff" onclick="showsendemail">Email</span></div>
                                    </div>
                                </table> 
                            </div>

                        </div>
                    </div>
                    <!-- Message Staff -->
                    <div id="messagestaff" style='display:none'>
                        <div style="padding-bottom:40px; font-size:35px; font-weight:300; color:#3D003D; text-align:right">Message Staff</div>

                        <div style='margin-bottom:20px'>
                            <span>Select message group</span>
                            <select class="form-control" onchange="alert(this.value)">
                                <option value="0">--Select group--</option>
                                <option value="1">All staff</option>
                                <option value="2">Site</option>
                                <option value="3">Department</option>
                                <option value="4">Qualification</option>
                                <option value="5">Staff ID</option>
                            </select>
                        </div>

                        <div id="serverreturnedmessagetype">
                            <div id='messagesitestaff' style='margin-bottom:10px'>
                                <span>Sites</span>
                                <select class='form-control' style="max-width:300px">
                                    <option>--Select site--</option>
                                    <?php
                                    $q = mysql_query("select * from sites");
                                    while ($w = mysql_fetch_array($q)) {
                                        $siteid = $w['siteid'];
                                        $sitename = $w['sitename'];

                                        echo "<option value='$siteid'>$sitename</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id='messagedepartmentstaff' style='display:none'>
                                <span>Departments</span>
                            </div>
                            <div id='messagequalificationstaff' style='display:none'>
                                <span>Qualification</span>
                            </div>
                            <div id='messagestaffidstaff' style='display:none'>
                                <span>Staff ID</span>
                            </div>
                            <div id='messageallstaff'>
                                <div class='msgallstaff'></div>
                            </div>
                        </div>

                        <div id='staffcount' style='margin-top:20px; margin-bottom:20px'>

                        </div>
                        <hr>
                        <div>
                            <span style='padding:10px; background-color:#E1E1E1'>24 staff</span>
                            <span class='btn btn-warning pull-right'><i class='fa fa-phone'></i> SMS</span> 
                            <span class='btn btn-success pull-right' style='margin-right:5px'><i class='fa fa-mail-reply'></i> Email</span>
                        </div>

                        <hr>

                        <div id='emailmessagestaff' style='display:none'>
                            <div style='text-align:right'></div>
                            <div id='staffMessaging'></div>
                            <span class='btn btn-primary'>Send Email</span>
                        </div>
                        <div id='smsmessagestaff'>
                            <textarea rows='3' class='form-control' style='margin-bottom:10px; resize:none'></textarea>
                            <span class='btn btn-primary'>Send SMS</span>
                        </div>
                    </div>
                    <!-- View staff -->
                    <div id="viewstaff" style='display:none; min-height:300px'>
                        <div style="padding-bottom:40px; font-size:35px; font-weight:300; color:#3D003D; text-align:right">View Staff <span></span></div>
                        <div style="margin-bottom:10px">
                            <select class="form-control" style="display:inline; max-width:200px!important;" onchange="modplacehold(this.value)" id="tabletosearch">
                                <option>Staff name</option>
                                <option>Staff ID</option>
                                <option>Site</option>
                                <option>Department</option>
                            </select>
                            <span style="padding:8px; border-style:solid; border-width:thin; border-color:#F0F0F0; background-color:#fff; border-radius:4px"><input type="text" id="searchstaffib" placeholder="Search Staff" style="width:300px; border:none; display:inline; margin-right:5px"><i class="fa fa-search" style="cursor:pointer" onclick="getStaff(searchstaffib.value, tabletosearch.value)" title="Search Staff"></i></span>
                        </div>
                        <table style='width:100%' class='table table-bordered'>
                            <thead>
                                <tr style='background-color:#D4D4D4; color:#F5F5F5; font-weight:bold'>
                                    <td>SN</td>
                                    <td>Name</td>
                                    <td>Department</td>
                                    <td>Site</td>
                                </tr>
                            </thead>
                            <tbody id="viewstaffInfo">
                                <tr>
                                    <td colspan="4" style="text-align: center"><i onclick="pullviewstaff()" style="cursor:pointer; color:red">Refresh List</i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class='col-lg-12 col-md-12 col-sm-12' style='margin-top:40px; margin-bottom:60px'>
                        <i class='fa fa-users' style='font-size:40px; color:#3D003D'></i> &nbsp; <span style='font-size:30px'><?php
                            $q = mysql_query("select * from staff");
                            echo mysql_num_rows($q);
                            ?></span> staff
                        <hr style='border-color:#D4D4D4; border-style:dotted'>
                        <i class='fa fa-building' style='font-size:40px; color:#3D003D'></i> &nbsp; <span style='font-size:30px'><?php
                            $q = mysql_query("select * from sites");
                            echo mysql_num_rows($q);
                            ?></span> Sites
                        <hr style='border-color:#D4D4D4; border-style:dotted'>
                        <i class='fa fa-sitemap' style='font-size:40px; color:#3D003D'></i> &nbsp; <span style='font-size:30px'><?php
                            $q = mysql_query("select * from departments");
                            echo mysql_num_rows($q);
                            ?></span> Departments

                    </div>
                    <div style='margin-top:40px'>
                        <div style='text-align:right; font-size:20px; margin-bottom:10px'>Site Codes</div>
                        <div>
                            <table class='table table-bordered'>
                                <?php
                                $t = "select * from sites order by sitename asc";
                                $f = mysql_query($t);
                                while ($g = mysql_fetch_array($f)) {
                                    $siteid = $g['siteid'];
                                    $sitename = $g['sitename'];

                                    echo "<tr><td>$siteid</td><td>$sitename</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="footer">

                </div>
            </div>
            <div id="portalmanager" style="display:none">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <span style="max-width:200px">
                        <div class="pm" onclick="pmStaff('#posmanagement', '#positionmanagement')" id="positionmanagement">Position Management</div>
                        <div class="pm" onclick="pmStaff('#docmanagement', '#documentrequirement')" id="documentrequirement">Document Management</div>
                        <div class="pm ssmactive" onclick="pmStaff('#announcementmanagement', '#announcement')" id="announcement">Announcement</div>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none; position:relative; padding:0px" id="posmanagement">
                        <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                            Position Management
                        </div>
                        <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
                            <span class="q" onclick="chdm('#positionan', '#pman')" id="pman">Add new</span> |
                            <span class="q w" onclick="chdm('#positionv', '#pmv')" id="pmv">View</span>
                        </span>
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px; display:none" id="positionan">
                            <span>Job title</span>
                            <input type="text" class="form-control" style="margin-bottom:15px; margin-top:5px" placeholder="Job title" id="jbtitle">
                            <div style="margin-bottom:5px">Job description</div>
                            <input type="text" id="jbdscrptn" class="form-control">
                            <input type="button" value="Add Job" class="btn btn-success" onclick="addjob()">
                            <input type="button" value="Reset" class="btn btn-danger" onclick="jbdscrptn">
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px" id="positionv">
                            <div style="text-align:right; font-size:17px; color:#660066; position:relative">
                                <i class="fa fa-print" style="position:absolute; left:0px; cursor:pointer;" title="Print positions"></i>
                                <?php
                                $r = mysql_query("select * from jobdetail");
                                echo "<b>" . mysql_num_rows($r) . "</b> positions ";
                                ?> 
                            </div>
                            <table style="width:100%; margin-top:10px" class="table-bordered table">
                                <thead>
                                    <tr style="background-color:#f0f0f0; color:#660066; font-weight:bold"><td>Position</td><td>Job description</td><td>Staff</td><td></td><td></td></tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $r = "select * from jobdetail order by jobtitle asc";
                                    $w = mysql_query($r);
                                    if (mysql_num_rows($w) < 1) {
                                        echo "<tr><td colspan='3' style='color:red'>No records</td></tr>";
                                    } else {
                                        while ($qw = mysql_fetch_array($w)) {
                                            $jobtitle = $qw['jobtitle'];
                                            $jobdescription = $qw['jobdescription'];
                                            $jobsn = $qw['sn'];
                                            echo "<tr><td style='font-weight:500' id='wewe$jobsn'>$jobtitle</td><td style=font-size:12px>$jobdescription</td><td>2</td><td><span class='btn btn-success' style='padding:2px; font-size:12px' onclick='updaterecord($jobsn)' data-toggle='modal' data-target='#myModal'>Update</span></td><td style='color:red; cursor:pointer; font-size:12px' onclick='deletejob($jobsn)'>Delete</td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <hr style="border-color:#D4D4D4; border-style:dotted">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="docmanagement" style="position:relative">
                        <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                            Document Management
                        </div>
                        <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
                            <span class="z w" onclick="chdm('#dman')" id="dman">Add new</span> |
                            <span class="z" onclick="chdm('#dmu')" id="dmu">Update</span> |
                            <span class="z" onclick="chdm('#dmv')" id="dmv">View</span>
                        </span>
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div style="margin-top:40px">
                        <i class="fa fa-briefcase" style="font-size:40px; color:#3D003D"></i> &nbsp; <span style="font-size:30px"><?php
                            $w = mysql_query("select * from jobdetail");
                            echo mysql_num_rows($w);
                            ?></span> Positions
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                        <i class="fa fa-file-text-o" style="font-size:40px; color:#3D003D"></i> &nbsp; <span style="font-size:30px"><?php
                            $w = mysql_query("select * from staffrequireddocuments");
                            echo mysql_num_rows($w);
                            ?></span> Document requirements
                        <hr style="border-color:#000; border-style:dotted">
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal here -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body" id="myModalbody">
                        
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>