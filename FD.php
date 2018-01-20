<!DOCTYPE html>
<!--
Developed by Joseph Kayode Agbede for Mt. Sinai Hospital Ebutte-Metta. 10 - 3 - 2016.
-->
<?php
//include 'dataConn.php';
include 'dumbphp/DBconnectPS.php';

session_start();


if (!isset($_SESSION['staffid']) || !isset($_SESSION['name']) || !isset($_SESSION['department'])) {
    header("Location: index.php");
}

$department = $_SESSION['department'];
$name = $_SESSION['name'];
$staffid = $_SESSION['staffid'];
$username = "Sister";
$siteid = $_SESSION['siteid'];

function getsitetable($a) {
    if ($a === "FA") {
        return "";
    }
}
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
            <span style='background-color:#480048; color:#D6D6D6; padding:10px; border-radius:4px;'><b>Pharmacy </b> - <?php echo $siteid; ?> </span>
            <span id="onlinestatus" class="btn btn-success" style="z-index:4; padding:5px">
                <?php echo $name; ?>
            </span>
            <i class="fa fa-power-off" style="font-size:20px; color:#B1B1B1"></i>
        </div>
        <!-- Human Resource -->
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs" style="height:100px; padding-top:15px;" class="col-lg-2 col-md-2 ">
            <span class="col-lg-2 col-md-2 mainButtons actMButtons" onclick="mainMenu('#mmStaff', '#staffmanager')" id='mmStaff'>
                <i class="fa fa-th" style="font-size:30px"></i><br>
                Dashboard
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
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px;">
                    <label>Label</label>
                    <center>
                        <select class="form-control" style="width:100%">
                            <option>HCHC - Hygeia Community Health Care</option>
                            <option></option>
                        </select>
                        <div style="text-align:left">Search criteria</div>
                        <select class="form-control" style="width:100%">
                            <option>Company/HMO type</option>
                            <option>Member ID</option>
                            <option>New ID</option>
                            <option>LastName</option>
                            <option>FirstName</option>
                            <option>Legacy Code</option>
                            <option>AlternateCode</option>
                        </select>
                        <div style="text-align:left">Search text</div>
                        <input type="text" class="form-control" style="width:100%">
                        <input type="button" class="btn btn-success" value="Search" style="width:100%;">
                    </center>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; margin-top:30px">
                    <!-- General -->
                    <div id="addstaff" style="padding-top:0px; min-height:200px; position:relative">
                        <div style="margin-top:10px; padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Overview</div>
                        <span style="position:absolute; top:5px; left:5px; font-size:30px; font-weight:bold; color:#EBEBEB"><?php echo $siteid; ?></span>

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