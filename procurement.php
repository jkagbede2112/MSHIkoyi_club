<!DOCTYPE html>
<!--
Developed by Joseph Kayode Agbede for Mt. Sinai Hospital Ebutte-Metta. 10 - 3 - 2016.
-->

<?php
//include 'dataConn.php';
include 'dumbphp/DBconnectPS.php';

session_start();

if (!isset($_SESSION['staffid']) || !isset($_SESSION['name']) || !isset($_SESSION['department'])) {
    //header("Location: index.php");
}

$department = $_SESSION['department'];
$name = $_SESSION['name'];
$staffid = $_SESSION['staffid'];
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
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <script src="JavFol/summernote.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        $w = "select table_name from information_schema.tables where table_schema=''";
        $q = mysql_query($w);
        while ($e = mysql_num_rows($q)) {
            echo $e[''];
        }
        ?>
        <div style="position:absolute; width:100%; position:fixed; z-index:5; top: -2px">
            <center>
                <span id="popUpcu" style="display:none; max-width:250px; width:auto; font-family:raleway; font-size:14px; min-height:10px; top:0px; background-color:rgba(30,30,30,0.9); color:#fff; border-style:dotted; border-width:thin; border-color:#000; padding:8px; border-radius:4px">
                    <div id="messagehere" style="margin-bottom:10px; margin-top:8px"></div>
                    <span id="buttonshere"></span>
                </span>
            </center>
        </div>
        <div class="header">
            <span style='background-color:#480048; color:#D6D6D6; padding:10px; border-radius:4px;'><b>PROCUREMENT </b> -  <?php echo $name; ?></span>
            <span id="onlinestatus" style="z-index:4">
                <i class="fa fa-power-off" title="Sign Out" style="font-size:12px; color:#ffccff; background-color:#ff0000; padding:5px; border-radius:5px; margin-left:10px; cursor:pointer" onclick="gotoURL('signout.php');"></i>
            </span>
        </div>
        <!-- Human Resource -->
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs" style="height:100px; padding-top:15px;" class="col-lg-2 col-md-2 ">
            <span class="col-lg-2 col-md-2 mainButtons actMButtons" onclick="mainMenu('#mmStaff', '#staffmanager')" id='mmStaff'>
                <i class="fa fa-th" style="font-size:30px"></i><br>
                Dashboard
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmRequisitionmanagement', '#requisitionmanager')" id='mmRequisitionmanagement'>
                <i class="fa fa-fax" style="font-size:30px"></i><br>
                Requisition
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmCar', '#carmanager')" id='mmCar'>
                <i class="fa fa-car" style="font-size:30px"></i><br>
                Car Pool
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmPositionmanagement', '#portalmanager')" id='mmPositionmanagement'>
                <i class="fa fa-cogs" style="font-size:30px"></i><br>
                Setting
            </span>
            <span>
            </span>
            <span style="position:absolute; right:10px">
                <img src="images/purplesourcelogo.png" width="200px">
            </span>
        </div>
        <!-- Dashboard -->

        <!-- Staff -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content" style="padding-bottom:10px; border-bottom-style:dotted; border-top-style:dotted; border-color:#E1E1E1; border-width:thin">

            <div id='staffmanager'>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <span style="max-width:200px">
                        <div class="ssm ssmactive" onclick="proStaff('#addstaff', '#addstaffoption')" id="addstaffoption">Overview</div>
                        <div class="ssm" onclick="proStaff('#updatestaff', '#updatestaffoption')" id="updatestaffoption">Sites</div>
                        <div class="ssm" onclick="proStaff('#messagestaff', '#messagestaffoption')" id="messagestaffoption">Schedule</div>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; margin-top:30px">
                    <!-- General -->
                    <div id="addstaff" style="padding-top:0px;min-height:200px;">
                        <div style="margin-top:10px; padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Overview</div>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='padding:0px; margin-bottom:80px'>
                            <i class="col-lg-2 fa fa-hospital-o" style="font-size:80px; font-weight:200; color:#8F3586; position:relative">
                                <span class="locname" title="Borno-Way">BW</span>
                                <span class="gf">
                                    <?php
                                    $r = mysql_query("select * from requisitionborno_way");
                                    $e = mysql_num_rows($r);
                                    echo "Items <b>" . $e . "</b>";
                                    ?>
                                    <br>
                                    <?php
                                    $r = mysql_query("select * from requisitionborno_way where qtyleft < minimumreorderlevel");
                                    $e = mysql_num_rows($r);
                                    echo "Re-order <b>" . $e . "</b>";
                                    ?>
                                </span>
                            </i>
                            <i class="col-lg-2 fa fa-hospital-o" style="font-size:80px; font-weight:200; color:#8F3586; position:relative">
                                <span class="locname" title="Egbe">EG</span>
                                <span class="gf">
                                    <?php
                                    $r = mysql_query("select * from requisitionegbe");
                                    $e = mysql_num_rows($r);
                                    echo "Items <b>" . $e . "</b>";
                                    ?>
                                    <br>
                                    <?php
                                    $r = mysql_query("select * from requisitionegbe where qtyleft < minimumreorderlevel");
                                    $e = mysql_num_rows($r);
                                    echo "Re-order <b>" . $e . "</b>";
                                    ?>
                                </span>
                            </i>
                            <i class="col-lg-2 fa fa-hospital-o" style="font-size:80px; font-weight:200; color:#8F3586; position:relative">
                                <span class="locname" title="Onikan">ON</span>
                                <span class="gf">
                                    <?php
                                    $r = mysql_query("select * from requisitiononikan");
                                    $e = mysql_num_rows($r);
                                    echo "Items <b>" . $e . "</b>";
                                    ?>
                                    <br>
                                    <?php
                                    $r = mysql_query("select * from requisitiononikan where qtyleft < minimumreorderlevel");
                                    $e = mysql_num_rows($r);
                                    echo "Re-order <b>" . $e . "</b>";
                                    ?>
                                </span>
                            </i>
                            <i class="col-lg-2 fa fa-hospital-o" style="font-size:80px; font-weight:200; color:#8F3586; position:relative">
                                <span class="locname" title="Mushin">MS</span>
                                <span class="gf">
                                    <?php
                                    $r = mysql_query("select * from requisitionmushin");
                                    $e = mysql_num_rows($r);
                                    echo "Items <b>" . $e . "</b>";
                                    ?>
                                    <br>
                                    <?php
                                    $r = mysql_query("select * from requisitionmushin where qtyleft < minimumreorderlevel");
                                    $e = mysql_num_rows($r);
                                    echo "Re-order <b>" . $e . "</b>";
                                    ?>
                                </span>
                            </i>
                            <i class="col-lg-2 fa fa-hospital-o" style="font-size:80px; font-weight:200; color:#8F3586; position:relative">
                                <span class="locname" title="Surulere">SU</span>
                                <span class="gf">
                                    <?php
                                    $r = mysql_query("select * from requisitionfalolu");
                                    $e = mysql_num_rows($r);
                                    echo "Items <b>" . $e . "</b>";
                                    ?>
                                    <br>
                                    <?php
                                    $r = mysql_query("select * from requisitionfalolu where qtyleft < minimumreorderlevel");
                                    $e = mysql_num_rows($r);
                                    echo "Re-order <b>" . $e . "</b>";
                                    ?>
                                </span>
                            </i>
                            <i class="col-lg-2 fa fa-hospital-o" style="font-size:80px; font-weight:200; color:#8F3586;position:relative;">
                                <span class="locname" title="Ikotun">IK</span>
                                <span class="gf">
                                    <?php
                                    $r = mysql_query("select * from requisitionikoyi_club");
                                    $e = mysql_num_rows($r);
                                    echo "Items <b>" . $e . "</b>";
                                    ?>
                                    <br>
                                    <?php
                                    $r = mysql_query("select * from requisitionikoyi_club where qtyleft < minimumreorderlevel");
                                    $e = mysql_num_rows($r);
                                    echo "Re-order <b>" . $e . "</b>";
                                    ?>
                                </span>
                            </i>

                        </div>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='padding:0px'>
                            <?php
                            $todaysdate = date('Y-m-d');
                            $q = "select * from staffschedule where staffid='$staffid' and date ='$todaysdate'";
                            $w = mysql_query($q);
                            if (mysql_num_rows($w) > 0) {
                                ?>
                                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='background-image: url("images/pastdate.jpg"); border-color:#E8E8E8; border-style:solid; border-width:thin; border-radius:2px; min-height:100px'>
                                    <div style="margin-top:10px; font-size:20px; color:#3C863C">
                                        <?php
                                    } else {
                                        ?>
                                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style="background-color:#F0F0F0; border-style:solid; border-width:thin; border-color: #E8E8E8; border-radius:2px; min-height:100px">
                                            <div style="margin-top:10px; font-size:20px; color:#6A0018">
                                                <?php
                                            }
                                            ?>
                                            Schedule - <span><?php echo date('jS M Y'); ?></span>
                                            <div style="margin-top:10px">
                                                <table class="table table-striped">
                                                    <tr style='font-size:12px; color:#745E05; font-weight:600'><td>Schedule</td><td>Starttime</td><td>End time</td></tr>
                                                    <?php
                                                    $todaysdate = date('Y-m-d');
                                                    $q = "select * from staffschedule where staffid='$staffid' and date ='$todaysdate'";
                                                    $w = mysql_query($q);
                                                    while ($e = mysql_fetch_array($w)) {
                                                        $schedule = $e['schedule'];
                                                        $starttime = $e['starttime'];
                                                        $endtime = $e['endtime'];

                                                        echo "<tr style='font-size:11px; color:#745E05'><td>$schedule</td><td>$starttime</td><td>$endtime</td></tr>";
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                        <div style="margin-top:40px; font-size:25px; color:#745E05">
                                            Activity
                                        </div>
                                        <div style="margin-top:10px">
                                            <table class='table table-striped' style="font-size:12px">
                                                <thead>
                                                    <tr><td></td><td>Activity</td><td>Date</td><td></td></tr>
                                                </thead>
                                                <?php
                                                $h = "select * from activitylog where userid='$staffid' order by id desc limit 4";
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Disease profile -->
                            <div id="updatestaff" style="margin-top:10px; padding-top:0px; min-height:500px; position:relative; display:none">
                                <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                                    <span>Sites</span>
                                </div>
                                <div style="margin-bottom:40px">
                                    <label>Unit</label>
                                    <select class='form-control' onchange="loadsiteinfo(this.value)">
                                        <option value='--'>--Select Unit--</option>
                                        <?php
                                        $q = "select * from sites order by sitename asc";
                                        $w = mysql_query($q);

                                        while ($r = mysql_fetch_array($w)) {
                                            $sitename = $r['sitename'];
                                            $id = $r['id'];

                                            echo "<option>$sitename</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class='col-lg-2 col-md-2 col-sm-12 hidden-xs fa fa-hospital-o' style="font-size:80px; padding-top:40px; font-weight:200; color:#95A5BF; position:relative">
                                    <div id="unitnamea" style="position:absolute; top:10px; font-family:raleway; font-size:14px">

                                    </div>
                                </div>
                                <div class='col-lg-10 col-md-10 col-sm-12 col-xs-12' style='background-color:#F0F0F0; min-height:300px'>
                                    <div style='text-align:right; font-size:20px; margin-top:10px;padding-right:10px; color:#880000; margin-bottom:20px'>Running low</div>
                                    <div id='itemsrunninglow'>
                                        <div style='text-align: right; font-size:12px; margin-bottom:20px'>
                                            <span id="dadada">
                                                <select style='padding:5px' id="vendortomail">
                                                    <?php
                                                    $e = "select * from vendordetails order by vendorname asc";
                                                    $w = mysql_query($e);
                                                    echo "<option value='0'>--Select Pharmacy--</option>";
                                                    while ($q = mysql_fetch_array($w)) {

                                                        $vendorname = $q['vendorname'];
                                                        $vendorsn = $q['sn'];

                                                        echo "<option value='$vendorsn'>$vendorname</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <input type='button' class='btn btn-purplesource' onclick="mailvendor(vendortomail.value, unitnamea.innerHTML)" value='Re-order' style='padding:3px 5px 3px 5px; font-size:12px'>
                                            </span>
                                            <span style='cursor:pointer; margin-left:10px'>Refresh list</span>
                                        </div>
                                        <table class='table table-striped' style='font-size:12px; font-family:verdana' id="tablehodingvalues">
                                            <?php
                                            $q = "select * from requisitionborno_way where qtyleft < minimumreorderlevel";
                                            $w = mysql_query($q);
                                            $ta = "<tr style=\"font-weight:400; font-size:13px; color:#1B6A00\"><td></td><td>Item name</td><td>Category</td><td>Required</td><td>Qty left</td><td>Order</td></tr>";
                                            $count = 1;
                                            while ($e = mysql_fetch_array($w)) {
                                                $drugid = $e['drugid'];
                                                $requiredqty = $e['requiredqty'];
                                                $qtyleft = $e['qtyleft'];
                                                $minimumreorderlevel = $e['minimumreorderlevel'];

                                                $f = mysql_query("select * from drugstore where sn='$drugid'");
                                                $d = mysql_fetch_array($f);
                                                $qtytoorder = $requiredqty - $qtyleft;
                                                $drugname = $d['drugname'];
                                                $category = $d['category'];

                                                $ds = mysql_query("select * from drugcategory where sn='$category'");
                                                $re = mysql_fetch_array($ds);

                                                $categorname = $re['categoryname'];

                                                $ta .= "<tr style='color:#AA0000'><td style='color:#414141'>$count</td><td>$drugname</td><td>$categorname</td><td>$requiredqty</td><td>$qtyleft</td><td>$qtytoorder</td></tr>";
                                                $count++;
                                            }
                                            echo $ta;
                                            ?>
                                        </table>
                                        <div>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Drug Purchases -->
                            <div id="messagestaff" style='display:none; margin-top:10px; min-height: 150px'>
                                <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                                    <span>Schedule</span> 
                                </div>
                                <div style="margin-bottom:20px">
                                    <label>Schedule</label>
                                    <input type="text" class="form-control" id="sschedule">
                                    <label>Date</label>
                                    <input type="date" class="form-control" id="sdate">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding:0px">
                                        <label>Start time</label> 
                                        <input type="time" class="form-control" id="sstarttime"> 
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding:0px">
                                        <label>End time</label> 
                                        <input type="time" class="form-control" id="sendtime">  
                                    </div>
                                    <input type="button" value="Create Schedule" class="btn btn-purplesource" onclick="addschedule(sschedule.value, sdate.value, sstarttime.value, sendtime.value)">
                                </div>
                                <div style="min-height:140px; margin-top:40px;" id="viewdrpreport">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr style="font-size:20px; color:#790079"><td>Schedule</td><td>Date</td><td>Start</td><td>End</td></tr>
                                        </thead>
                                        <tbody id="scheduletable">
                                            <?php
                                            $qg = "select * from staffschedule where staffid='$staffid' order by date desc";
                                            $wg = mysql_query($qg);
                                            $xx = mysql_num_rows($w);
                                            while ($e = mysql_fetch_array($wg)) {
                                                $schedule = $e['schedule'];
                                                $date = $e['date'];
                                                $starttime = $e['starttime'];
                                                $starttime = date('h:i a', strtotime($starttime));
                                                $endtime = $e['endtime'];
                                                $endtime = date('h:i a', strtotime($endtime));
                                                if ($date < date("Y-m-d")) {
                                                    echo "<tr style='background-image:url(\"images/pastdate.jpg\")'><td>$schedule</td><td>$date</td><td>$starttime</td><td>$endtime</td><td><input type='checkbox'></td></tr>";
                                                } else {
                                                    echo "<tr style='background-image:url(\"images/notpastdate.jpg\"); color:#004F25'><td>$schedule</td><td>$date</td><td>$starttime</td><td>$endtime</td><td><input type='checkbox'></td></tr>";
                                                }
                                                echo $xx;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="newdrpentry" style="margin-top:50px">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align: center; padding-top:50px">
                            <div style="font-weight:600; color:#83358A; margin-bottom:20px">Reminder</div>
                            <?php
                            getreminders($staffid);
                            ?>
                        </div>
                        <div class="footer">

                        </div>
                    </div>
                    <div id="portalmanager" style="display:none">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                            <span style="max-width:200px">
                                <div class="pm ssmactive" onclick="pmStaff('#posmanagement', '#positionmanagement')" id="positionmanagement">Drugs Management</div>
                                <div class="pm" onclick="pmStaff('#docmanagement', '#documentrequirement')" id="documentrequirement">Drugs Vendor management</div>
                                <div class="pm" onclick="pmStaff('#remmanagement', '#reminderD')" id="reminderD">Reminder</div>
                                <div class="pm" onclick="pmStaff('#acctmanagement', '#acctsetting')" id="acctsetting">Account settings</div>
                                <div class="pm" onclick="pmStaff('#activitymanagement', '#actlog')" id="actlog">Activity log</div>
                                <div class="pm" onclick="pmStaff('#dispmanagement', '#displog')" id="displog">Dispensary log</div>
                                <div class="pm" onclick="pmStaff('#incmanagement', '#incidencereporting')" id="incidencereporting">Incidence reporting</div>
                            </span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px" id="posmanagement">
                                <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                                    Purchase Management
                                </div>
                                <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
                                    <span class="q w" onclick="chdm('#positionan', '#pman')" id="pman">Manage drugs</span> |
                                    <span class="q" onclick="chdm('#positionv', '#pmv')" id="pmv">Drug categories</span>
                                </span>
                                <hr style="border-color:#D4D4D4; border-style:dotted">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px;" id="positionan">
                                    <div>
                                        <span>Drug category</span>
                                        <select class="form-control" style="margin-top:5px; margin-bottom:20px" id="ADdrugcategory">
                                            <?php
                                            $e = "select * from drugcategory order by categoryname asc";
                                            $w = mysql_query($e);

                                            while ($q = mysql_fetch_array($w)) {
                                                $sn = $q['sn'];
                                                $pt = $q['categoryname'];
                                                echo "<option value='$sn'>$pt</option>";
                                            }
                                            ?>
                                        </select>
                                        <span>Drug name</span>
                                        <input type="text" class="form-control" placeholder="Drug name" style="margin-top:5px" id="ADdrugname">
                                        <span>Required Qty</span>
                                        <input type="text" class="form-control" placeholder="Required Quantity" style="margin-top:5px" id="ADrequiredqty">
                                        <span>Minimum Re-Order Level</span>
                                        <input type="text" class="form-control" placeholder="M.R.O" style="margin-top:5px" id="ADmro">
                                        <input type="button" value="Add new drug" class="btn btn-success" onclick="addDrug(ADdrugcategory.value, ADdrugname.value, ADrequiredqty.value, ADmro.value)">
                                        <input type="button" value="Reset" class="btn btn-danger">
                                    </div>
                                    <div style="margin-top:40px">
                                        <div style="text-align: right"><i class="fa fa-refresh" style="cursor:pointer; margin-bottom:10px; margin-right:20px" onclick="refreshdrugs()" title="Refresh drug list"></i> Drug list</div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr style="color:#fff; background-color:#790079"><td></td><td>Drug name</td><td>Drug category</td><td></td></tr>
                                            </thead>
                                            <tbody id="drugslist">
                                                <?php
                                                $e = "select * from drugstore order by drugname asc";
                                                $w = mysql_query($e);
                                                $count = 1;
                                                while ($q = mysql_fetch_array($w)) {
                                                    $r = $q['drugname'];
                                                    $g = $q['category'];

                                                    $c = "select * from drugcategory where sn='$g'";
                                                    $v = mysql_query($c);
                                                    $b = mysql_fetch_array($v);
                                                    $catname = $b['categoryname'];

                                                    echo "<tr style='color:#790079'><td>$count</td><td>$r</td><td>$catname</td><td></td></tr>";
                                                    $count++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="docmanagement" style="position:relative; display:none">
                                <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                                    Vendor Management
                                </div>
                                <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
                                    <span class="z" onclick="chdmq('#diman', '#dman')" id="dman">Add Vendor</span> |
                                    <span class="z" onclick="chdmq('#dimu', '#dmu')" id="dmu">Update</span> |
                                    <span class="z w" onclick="chdmq('#dimv', '#dmv')" id="dmv">View vendors</span>
                                </span>
                                <hr style="border-color:#D4D4D4; border-style:dotted">
                                <div id="diman" style="margin-top:40px; display:none">
                                    <label>Vendor name</label>
                                    <input type="text" class="form-control" id="addvendorvn">
                                    <label>Contact person</label>
                                    <input type="text" class="form-control" id="addvendorcp">
                                    </select>
                                    <label>Contact phone number</label>
                                    <input type="text" class="form-control" id="addvendorcpn">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" id="addvendorea">
                                    <label>Office address</label>
                                    <textarea class="form-control" rows="2" id="addvendoroa"></textarea>
                                    <input type="button" class="btn btn-success" value="Add Vendor" onclick="addvendordetails()">
                                </div>
                                <div id="dimu" style="display:none">
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
                                <div id="dimv" style="margin-top:40px">
                                    <i class="fa fa-refresh" style="cursor:pointer" title="Refresh client list" onclick="getVenValues()"></i>
                                    <table class="table table-hover table-bordered" style="margin-top: 10px">
                                        <thead>
                                            <tr style="font-weight:600; color:#003366"><td></td><td>Vendor</td><td>Contact person</td><td>phone Number</td><td>Email</td></tr>
                                        </thead>
                                        <tbody id="clientdets">
                                            <?php
                                            $q = "select * from vendordetails order by vendorname asc";
                                            $w = mysql_query($q);
                                            $count = 1;
                                            while ($r = mysql_fetch_array($w)) {
                                                $vendorName = $r['vendorname'];
                                                $contactperson = $r['contactperson'];
                                                $contactphone = $r['contactphonenumber'];
                                                $emailaddress = $r['emailaddress'];
                                                $officeaddress = $r['officeaddress'];

                                                echo "<tr><td>$count</td><td>$vendorName</td><td>$contactperson</td><td>$contactphone</td><td>$emailaddress</td></tr>";
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                            include 'partials/accountsetting.php';
                            include 'partials/remindermodule.php';
                            ?>

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
                                <i class="fa fa-briefcase" style="font-size:40px; color:#6A0633"></i> &nbsp; <span style="font-size:30px"><?php
                                    $w = mysql_query("select * from vendordetails");
                                    echo mysql_num_rows($w);
                                    ?></span> Drug vendor(s)
                                <hr style="border-color:#D4D4D4; border-style:dotted">
                                <i class="fa fa-list-alt" style="font-size:40px; color:#5E4B04"></i> &nbsp; <span style="font-size:30px"><?php
                                    $w = mysql_query("select * from drugcategory");
                                    echo mysql_num_rows($w);
                                    ?></span> Drug categories
                                <hr style="border-color:#D4D4D4; border-style:dotted">
                                <i class="fa fa-file-text-o" style="font-size:40px; color:#5E4B04"></i> &nbsp; <span style="font-size:30px"><?php
                                    $w = mysql_query("select * from drugstore");
                                    echo mysql_num_rows($w);
                                    ?></span> Drugs
                                <hr style="border-color:#D4D4D4; border-style:dotted">
                            </div>
                            <div style="margin-top:40px">

                            </div>
                        </div>
                    </div>
                    <?php
                    include 'partials/carpoolpartial.php';
                    ?>
                    <div id="requisitionmanager" style="display:none">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                            <div class='ssm spm' onclick="pullUnit('#BornoWay', '#Bwaysite')" id='Bwaysite'>Borno-Way</div>
                            <div class='ssm spm' onclick="pullUnit('#Egbe', '#Egbesite')" id='Egbesite'>Egbe</div>
                            <div class='ssm spm' onclick="pullUnit('#Falolu', '#Falolusite')" id='Falolusite'>Falolu</div>
                            <div class='ssm spm' onclick="pullUnit('#Onikan', '#Onikansite')" id='Onikansite'>Onikan</div>
                            <div class='ssm spm' onclick="pullUnit('#Mushin', '#Mushinsite')" id='Mushinsite'>Mushin</div>
                            <div class='ssm spm' onclick="pullUnit('#Ikoyi_club', '#Ikoyisite')" id='Ikoyisite'>Ikoyi-Club</div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
                            <div style="margin-top:10px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Requisition</div>
                            <div style="margin-top:30px">
                                <div style="margin-bottom:10px; font-size:25px; text-align: right" id="unitname">Egbe</div>
                                <div style="margin-bottom:10px">
                                    <span class="btn" style="padding:5px" title="Export list to excel"><img src="images/excel.png" width="30px" style="border-radius:4px"></span>
                                    <span class="btn" style="padding:5px" title="Export list to Word"><img src="images/word.png" width="30px" style="border-radius:4px"></span>
                                    <span class="btn" style="padding:5px" title="Export list to PDF"><img src="images/acrobat.png" width="30px" style="border-radius:4px"></span>
                                    <span class="btn" style="padding:5px" title="Print list" onclick="printDiv('drugsperunit')"><i class="fa fa-print" style="font-size:26px"></i></span>
                                    <span class="btn" style="padding:5px" title="Add drug" onclick="addnewdrugs()" data-toggle='modal' data-target='#myModal'><i class="fa fa-hotel" style="font-size:26px"></i></span>
                                </div>
                                <div>
                                    <input type="text" class="form-control" style="max-width:400px; display:inline" placeholder="Drug name" id="drugnamesearch">
                                    <span class="btn btn-success" onclick="">Search <i class="fa fa-search"></i></span><b> <-- WIP</b>
                                </div>
                                <div id='drugsperunit'>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr style="color:#fff; background-color:#790079"><td></td><td></td><td></td><td>Drug name</td><td>Item category</td><td title="Required quantity">Req. Qty</td><td title="Minimum re-order level">M.R.O</td><td>Qty left</td><td>Status</td><td><i class="fa fa-bullseye" style="cursor:pointer" title="WIP"></i></td></tr>
                                        </thead>
                                        <tbody id="unitdrugslist">
                                            <?php
                                            $e = "select * from " . $sitetable;
                                            $w = mysql_query($e);
                                            $count = 1;
                                            $echostatement = "";
                                            while ($q = mysql_fetch_array($w)) {
                                                $r = $q['drugid'];
                                                $requiredquantity = $q['requiredqty'];
                                                $qtyleft = $q['qtyleft'];
                                                $mro = $q['minimumreorderlevel'];

                                                $itemstoorder = $requiredquantity - $qtyleft;

                                                if ($qtyleft <= $mro) {
                                                    $status = "Re-order";
                                                } else {
                                                    $status = "<i style='color:green'>OK</i>";
                                                }

                                                $c = "select * from drugstore where sn='$r'";
                                                $v = mysql_query($c);
                                                $b = mysql_fetch_array($v);
                                                $catid = $b['category'];
                                                $drugname = $b['drugname'];

                                                $ew = mysql_query("select categoryname from drugcategory where sn='$catid'");
                                                $d = mysql_fetch_array($ew);
                                                $catn = $d['categoryname'];
                                                if ($status === "Re-order") {
                                                    $echostatement .= "<tr style='color:#790079'><td>$count</td><td><i class='fa fa-close ptr' title='Delete $drugname in $catn category' onclick='DelDinC(\"$drugname\", \"$catn\", \"$r\")'></i> </td><td> <i class='fa fa-sitemap ptr' title='Update $drugname $catn'  data-toggle='modal' data-target='#myModal' onclick=\"updatedruginfo('$drugname','$catn','$r','$sitetable')\"></td><td id='rsdDN$count'>$drugname</td><td id='rsdIC$count'>$catn</td><td id='rsdRQ$count'>$requiredquantity</td><td>$mro</td><td id='rsdQTL$count'>$qtyleft</td><td style='font-size:11px'>$status</td><td><i class='fa fa-bolt' title='Re-Stock item' style='cursor:pointer' data-toggle='modal' data-target='#myModal' onclick='ResDinC(\"$drugname\", \"$catn\", \"$r\", \"$catid\",\"$itemstoorder\")'></i></td></tr>";
                                                } else {
                                                    $echostatement .= "<tr style='color:#790079'><td>$count</td><td><i class='fa fa-close ptr' title='Delete $drugname in $catn category' onclick='DelDinC(\"$drugname\", \"$catn\", \"$r\")'></i> </td><td> <i class='fa fa-sitemap ptr' title='Update $drugname $catn'  data-toggle='modal' data-target='#myModal' onclick=\"updatedruginfo('$drugname','$catn','$r','$sitetable')\"></td><td id='rsdDN$count'>$drugname</td><td id='rsdIC$count'>$catn</td><td>$requiredquantity</td><td>$mro</td><td>$qtyleft</td><td style='font-size:11px'>$status</td><td></td></tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div style="font-size:13px">
                                <div style="font-weight:600; color:#83358A; margin-bottom:30px">Requisition setting</div>
                                <label style="font-weight:500">** When qty lft reaches or falls below M.R.O</label>
                                <select class="form-control" style="font-size:12px">
                                    <option>Email procurement officer</option>
                                    <option>SMS procurement officer</option>
                                    <option>Do nothing</option>
                                </select>
                                <input type="button" value="Save" style="width:100%" onclick="alert('Your name please')">
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