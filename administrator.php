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

$username = $_SESSION['name'];

$siteid = $_SESSION['siteid'];



$sitetable = getsitetable($siteid);

$_SESSION['sitetable'] = $sitetable;

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

        <style>

            .btn-purplesource{

                color:#fff;

                background-color:#A800A8;

                border-color:#660066;

            }

            .btn-purplesource:hover{

                background-color:#790079;

                color:#fff;

            }

        </style>

    </head>

    <body>

        <script>

            var d = new Date();

        </script>

        <div style="position:absolute; width:100%; position:fixed; z-index:5; top: 60px">

            <center>

                <span id="popUpcu" style="display:none; max-width:250px; width:auto; font-family:raleway; font-size:14px; min-height:10px; top:0px; background-color:rgba(70,70,70,0.6); color:#fff; border-style:dotted; border-width:thin; border-color:#000; padding:8px">

                    <div id="messagehere" style="margin-bottom:10px; margin-top:8px"></div>

                    <span id="buttonshere"></span>

                </span>

            </center>

        </div>

        <div class="header">

            <span style='background-color:#480048; color:#D6D6D6; padding:10px; border-radius:4px;'><b>Hospital Administrator </b> -  <?php echo $name; ?></span>

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

                Store

            </span>

            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmClient', '#clientmanager')" id='mmClient'>

                <i class="fa fa-medkit" style="font-size:30px"></i><br>

                Client

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



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content" style="padding-bottom:10px; border-bottom-style:dotted; border-top-style:dotted; border-color:#E1E1E1; border-width:thin">



            <div id='staffmanager'>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:30px">

                    <!-- General -->

                    <div style="padding:10px;background-color:rgba(255,255,255,0.3);  height:auto; position:relative">

                        <div style="margin-top:10px; padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Overview</div>

                        <span style="position:absolute; top:5px; left:5px; font-size:30px; font-weight:bold; color:#E0E0E0"><?php echo $siteid; ?></span>

                        <span style="text-align:center">

                            <?php

                            $e = "select * from " . $sitetable . " where minimumreorderlevel > qtyleft";

                            $w = mysql_query($e);

                            $reordercount = mysql_num_rows($w);

                            echo $reordercount . " item(s) running low </span><br><br>";

                            ?>

                        </span>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); margin-top:30px">

                    <!-- General -->

                    <div style="padding:10px; height:auto; position:relative">

                        <div style="margin-top:10px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Attendance</div>

                        <?php echo date("M") ?>

                        <table class="table table-responsive" style="margin-top:20px">

                            <tr><td>New</td><td>23</td></tr>

                            <tr><td>Returning</td><td>26</td></tr>

                            <tr><td colspan="2">--------</td></tr>

                        </table>

                        <div style="text-align:center">

                            <?php

                            $e = "select * from " . $sitetable . " where minimumreorderlevel > qtyleft";

                            $w = mysql_query($e);

                            $reordercount = mysql_num_rows($w);

                            echo $reordercount . " item(s) running low </span><br><br>";

                            ?>

                        </div>

                    </div>

                </div>

                <div class='col-lg-3 col-md-3 col-sm-12 col-xs-12' style='margin-top:20px'>

                    <div id="messagestaff" style='margin-top:10px; min-height: 150px; background-color:rgba(255,255,255,0.4); padding:15px'>

                        <div style="padding-bottom:20px; font-size:25px; font-weight:300; color:#3D003D; text-align:right; position:relative">

                            <span>Schedule</span> 

                        </div>

                        <div style="min-height:140px; margin-top:40px" id="viewdrpreport">

                            <table class="table table-striped">

                                <thead>

                                    <tr style="font-size:16px; color:#790079"><td>Schedule</td><td>Date</td><td>Start</td><td>End</td></tr>

                                </thead>

                                <tbody id="scheduletable">

                                    <?php

                                    $q = "select * from staffschedule where staffid='$staffid' order by date desc";

                                    $w = mysql_query($q);

                                    if (mysql_num_rows($w) > 0) {

                                        while ($e = mysql_fetch_array($w)) {

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

                                        }

                                    } else {

                                        echo "<tr style='background-image:url(\"images/pastdate.jpg\")'><td colspan='5'>Nothing scheduled for today</td></tr>";

                                    }

                                    ?>

                                </tbody>

                            </table>

                        </div>

                        <div style='display:none'>

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

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align: center; padding:0px; margin-top:30px">

                    <div style="font-weight:400; color:#83358A; margin-bottom:10px; font-size:18px">Reminder</div>

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

                        <div class="pm" onclick="pmStaff('#remmanagement', '#documentrequirement')" id="documentrequirement">Reminder</div>

                        <div class="pm" onclick="pmStaff('#acctmanagement', '#acctsetting')" id="acctsetting">Account settings</div>

                        <div class="pm" onclick="pmStaff('#drugmanagement', '#drugsetting')" id="drugsetting">Drugs Management</div>

                        <!--<div class="pm ssmactive" onclick="pmStaff('#announcementmanagement', '#announcement')" id="announcement">Announcement</div>-->

                    </span>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">

                    <?php

                    include 'partials/remindermodule.php';

                    include 'partials/accountsetting.php';

                    include 'partials/drugsmanagement.php';

                    ?>

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

                        <div style="font-weight:600; color:#83358A; margin-bottom:40px">Drug purchase setting</div>

                        <span>Add Drug Purchase</span>

                        <span>Update drug purchase</span>

                        <span>Delete DP</span>

                        <select class="form-control">

                            <?php

                            $rr = "select * from auditdisease";

                            $e = mysql_query($rr);



                            while ($q = mysql_fetch_array($e)) {

                                $dn = $q['diseasename'];

                                echo "<option>$dn</option>";

                            }

                            ?>

                        </select>

                    </div>

                </div>

            </div>

            <?php

            include 'partials/dispensary.php';

            include 'partials/clientmanager.php';

            ?>

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