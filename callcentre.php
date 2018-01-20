<?php
//include 'dataConn.php';
include 'dumbphp/DBconnectPS.php';

error_reporting(0);
session_start();

if (!isset($_SESSION['staffid']) || !isset($_SESSION['name']) || !isset($_SESSION['department'])) {
    //header("Location: index.php");
}

$department = $_SESSION['department'];
$name = $_SESSION['name'];
$staffid = $_SESSION['staffid'];

$year = date('Y');
$montharray = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
//echo $year . "-" . $montharray[2];
$q = 0;
while ($q < sizeof($montharray)) {
    $ddd = $year . "-" . $montharray[$q];
    $qq = "select * from clientsurvey where datetime like '%$ddd%'";

    $q++;
}
?>
<!DOCTYPE html>
<!--
<?php echo $commentheader; ?>
-->

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

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            google.charts.setOnLoadCallback(drawChartmonth);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Excellent', 'Good', 'Fair', 'Bad'],
                    ['Jan', 600, 400, 1000, 30],
                    ['Feb', 870, 460, 300, 60],
                    ['Mar', 860, 1120, 1000, 66],
                    ['Apr', 990, 540, 1000, 26],
                    ['May', 1000, 400, 100, 80],
                    ['June', 1170, 460, 1000, 40],
                    ['July', 1000, 1120, 1000, 400],
                    ['Aug', 1030, 540, 700, 400],
                    ['Sept', 1000, 400, 1000, 400],
                    ['Oct', 1170, 460, 1000, 400],
                    ['Nov', 2060, 1120, 1000, 400],
                    ['Dec', 1030, 540, 900, 400]
                ]);

                var options = {
                    title: 'Customer Satisfaction Feedback <?php echo date("Y"); ?>',
                    curveType: 'function',
                    legend: {position: 'bottom'},
                    chartArea: {width: '75%'},
                    backgroundColor: {fill: '#F7F7F7'},
                    animation: {
                        "startup": true,
                        duration: 1000,
                        easing: 'out'
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
            }
            function drawChartmonth() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
<?php
$month = "-" . date('m') . "-";

$great = 0;
$good = 0;
$fair = 0;
$bad = 0;

$zz = "select * from clientsurvey where datetime like '%$month%'";
$x = mysql_query($zz);
while ($cc = mysql_fetch_array($x)) {
    $clientrating = $cc['clientrating'];
    if ($clientrating === 'Great') {
        $great++;
    } elseif ($clientrating === 'Good') {
        $good++;
    } elseif ($clientrating === 'Fair') {
        $fair++;
    } elseif ($clientrating === 'Bad') {
        $bad++;
    }
}
echo "['Great', $great],['Good', $good],['Fair', $fair],['Bad', $bad]";
?>
                ]);

                var options = {
                    title: 'Customer Feedback for <?php echo date('M') . " " . date('Y'); ?>',
                    backgroundColor: {fill: '#F0F0F0'},
                    animation: {
                        "startup": true,
                        duration: 1000,
                        easing: 'out'
                    }
                };

                var chart2 = new google.visualization.PieChart(document.getElementById('piechart'));
                chart2.draw(data, options);
            }
        </script>

    </head>
    <body>
        <?php
        $w = "select table_name from information_schema.tables where table_schema=''";
        $q = mysql_query($w);
        while ($e = mysql_num_rows($q)) {
            echo $e[''];
        }
        ?>
        <!--
        <div style="position:absolute; width:100%; position:fixed; z-index:5; top: -2px; background-color:#000; height:40px">
            <center>
                <span id="popUpcu" style="display:none; max-width:250px; width:auto; font-family:raleway; font-size:14px; min-height:10px; top:0px; background-color:rgba(30,30,30,0.9); color:#fff; border-style:dotted; border-width:thin; border-color:#000; padding:8px; border-radius:4px">
                    <div id="messagehere" style="margin-bottom:10px; margin-top:8px"></div>
                    <span id="buttonshere"></span>
                </span>
            </center>
        </div>-->
        <div class="header">
            <span style='background-color:#480048; color:#D6D6D6; padding:10px; border-radius:4px;'><b>Call Centre </b> -  <?php echo $name; ?></span>
            <span id="onlinestatus" style="z-index:4">
                <i class="fa fa-power-off" title="Sign Out" style="font-size:12px; color:#ffccff; background-color:#ff0000; padding:5px; border-radius:5px; margin-left:10px; cursor:pointer" onclick="gotoURL('signout.php');"></i>
            </span>
        </div>
        <!-- Human Resource -->
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs" style="height:100px; padding-top:15px;" class="col-lg-2 col-md-2 ">
            <span class="col-lg-2 col-md-2 mainButtons actMButtons" onclick="ccmainMenu('#mmStaff', '#staffmanager')" id='mmStaff'>
                <i class="fa fa-th" style="font-size:30px"></i><br>
                Dashboard
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="ccmainMenu('#mmANC', '#ANCmanager')" id='mmANC'>
                <i class="fa fa-users" style="font-size:30px"></i><br>
                ANC Women
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="ccmainMenu('#mmCar', '#carmanager')" id='mmCar'>
                <i class="fa fa-car" style="font-size:30px"></i><br>
                Car Pool
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="ccmainMenu('#mmReport', '#auditmanager')" id='mmReport'>
                <i class="fa fa-newspaper-o" style="font-size:30px"></i><br>
                Feedback
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="ccmainMenu('#mmClient', '#clientmanager')" id='mmClient'>
                <i class="fa fa-medkit" style="font-size:30px"></i><br>
                Client
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="ccmainMenu('#mmSetting', '#settingsmanager')" id='mmSetting'>
                <i class="fa fa-cogs" style="font-size:30px"></i><br>
                Setting
            </span>
            <span style="position:absolute; right:10px">
                <img src="images/mtsinailogo.png" width="200px">
            </span>
        </div>
        <!-- Dashboard -->

        <!-- Staff -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content" style="padding-bottom:10px; border-bottom-style:dotted; border-top-style:dotted; border-color:#E1E1E1; border-width:thin">

            <div id='staffmanager' style="margin-top:30px">
                <div class="row" style='margin-bottom:20px'>
                    <div class="col-lg-8 col-md-8" style="padding-right:0px; margin-right:0px">
                        <div id="curve_chart" style="width: 100%; height: 300px"></div>
                    </div>
                    <div class="col-lg-4 col-md-4" style="padding:0px">
                        <div id="piechart" style="width: 100%; height: 300px"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom:10px; margin-top:10px">
                        <div class="callcentremodules">
                            <div class="ccmoduletopic">
                                ANC
                                <hr style="margin-top:10px;border-color:#ff0000; border-style:dotted">
                            </div>
                            <div style="padding:20px">
                                <center>
                                    <i class="fa fa-female" style="font-size:100px"></i>
                                    <?php
                                    $qq = "select * from pregnantwomen";
                                    $w = mysql_query($qq);
                                    $e = mysql_num_rows($w);
                                    echo "<span style='font-size:50px'>" . $e . "</span>women";
                                    $firsttri = 0;
                                    $secondtri = 0;
                                    $thirdtri = 0;
                                    $due = 0;
                                    while ($a = mysql_fetch_array($w)) {
                                        $lmp = $a['lastmentrualperiod'];

                                        $timenownow = date("H:i:s");
                                        $date1 = strtotime($timenownow);
                                        $date2 = strtotime($checkin);
                                        $timediff = $date1 - $date2;
                                        $waittime = floor($timediff / (60));

                                        
                                        $date1 = strtotime(date("Y-m-d"));
                                        $date2 = strtotime($lmp);
                                        $diff = $date1 - $date2;

                                        $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1 . "wk(s)";

                                        if ($weeksgone <= 12) {
                                            $firsttri++;
                                        } elseif ($weeksgone >= 13 && $weeksgone <= 24) {
                                            $secondtri++;
                                        } elseif ($weeksgone >= 25 && $weeksgone <= 36) {
                                            $thirdtri++;
                                        } elseif ($weeksgone > 36) {
                                            $due++;
                                        }
                                    }
                                    $qq = "select * from pregnantwomen where givenbirth='1'";
                                    $w = mysql_query($qq);
                                    $e = mysql_num_rows($w);
                                    ?>
                                </center>
                                <table class="table table-striped">
                                    <tr><td>1st trimester</td><td><?php echo $firsttri ?></td></tr>
                                    <tr><td>2nd trimester</td><td><?php echo $secondtri ?></td></tr>
                                    <tr><td>3rd trimester</td><td><?php echo $thirdtri ?></td></tr>
                                    <tr><td>Due <span style='font-size:12px'>( > 36wks )</span></td><td><?php echo $due ?></td></tr>
                                    <?php
                                    $wq = "select * from pregnantwomen where givenbirth='1'";
                                    $zx = mysql_query($wq);
                                    $asa = mysql_num_rows($zx);
                                    ?>
                                    <tr><td>Post pregnancy</td><td><?php echo $e ?></td></tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom:10px; margin-top:10px">
                        <div class="callcentremodules">
                            <div class="ccmoduletopic">
                                Chronic illnesses
                                <hr style="margin-top:10px;border-color:#ff0000; border-style:dotted">
                                <table class="table table-striped" style="font-size:14px">
                                    <?php
                                    $z = "select * from illnesscategory order by illness asc";
                                    $d = mysql_query($z);
                                    while ($g = mysql_fetch_array($d)) {
                                        $illnessname = $g['illness'];
                                        $aboutillness = $g['aboutilless'];
                                        $sn = $g['sn'];

                                        $sds = mysql_query("select * from addillcategory where clientillcategory='$sn'");
                                        $count = 4;
                                        if ($count > 0) {
                                            echo "<tr><td><i class='fa fa-plus ptr gg'></i></td><td class='ptr' title='$aboutillness'>$illnessname</td><td>$count</td><td><i class='fa fa-fax ptr btn' style='z-index:5' data-toggle=\"popover\" title=\"$illnessname\" data-content=\"<label>SMS Message</label><textarea rows='2' id='ci$sn' class='form-control' style='resize:none'></textarea><input type='button' value='Send message' style='width:250px' class='btn btn-success' onclick='msgeillnesscats($sn)'>\"></i></td></tr>";
                                        } else {
                                            echo "<tr><td><i class='fa fa-plus ptr gg'></i></td><td class='ptr' title='$aboutillness'>$illnessname</td><td>$count</td><td><i class='fa fa-fax ptr btn' style='color:red'></i></td></tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom:10px; margin-top:10px">
                        <div class="callcentremodules">
                            <div class="ccmoduletopic">
                                Car pool
                                <hr style="margin-top:10px;border-color:#ff0000; border-style:dotted">
                                <table class="table table-striped" style="font-size:14px">
                                    <?php
                                    $a = "select * from carpoolschedule where approval='1' order by dateWtime desc";
                                    $s = mysql_query($a);
                                    while ($v = mysql_fetch_array($s)) {
                                        $dateWtime = $v['dateWtime'];
                                        $duration = $v['duration'];
                                        $requestingstaffid = $v['requestingstaff'];
                                        $destination = $v['destination'];

                                        $dateWtimex = substr($dateWtime, 0, 10);
                                        //echo $requestingstaffid;
                                        $zz = "select * from staff where id='$requestingstaffid'";
                                        $xx = mysql_query($zz);
                                        $dd = mysql_fetch_array($xx);
                                        $staffname = $dd['lastname'] . " " . $dd['firstname'];

                                        echo "<tr title='$staffname'><td>$destination</td><td>$dateWtime</td><td>$duration hr(s)</td><td><i class='fa fa-archive'></i></td></tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom:10px; margin-top:10px">
                        <div class="callcentremodules">
                            <div class="ccmoduletopic">
                                Patient satisfaction 
                                <hr style="margin-top:10px;border-color:#ff0000; border-style:dotted">
                                <div style="font-size:40px"><?php echo date('Y'); ?></div>
                                <table class="table table-striped" style="font-size:13px">
                                    <tr><td>Survey Date</td><td>Great</td><td>Good</td><td>Fair</td><td>Bad</td></tr>
                                    <?php
                                    $w = "select distinct(datetime) from clientsurvey order by datetime desc";
//echo $w;
                                    $zx = mysql_query($w);
                                    if (mysql_num_rows($zx) < 1) {
                                        echo "<tr><td colspan='5' style='text-align:center; color:#ff0000'>No survey records</td></tr>";
                                    }
                                    $great = 0;
                                    $good = 0;
                                    $fair = 0;
                                    $bad = 0;
                                    while ($z = mysql_fetch_array($zx)) {
                                        $uniquedate = $z['datetime'];
                                        $xx = "select * from clientsurvey where datetime='$uniquedate'";

                                        $zz = mysql_query($xx);
                                        while ($zx = mysql_fetch_array($zz)) {
                                            $clientrating = $zx['clientrating'];
                                            $datetime = $zx['datetime'];
                                            //echo $clientrating . "-";
                                            if ($clientrating === "Bad") {
                                                $bad++;
                                            }
                                            if ($clientrating === "Fair") {
                                                $fair++;
                                            }
                                            if ($clientrating === "Good") {
                                                $good++;
                                            }
                                            if ($clientrating === "Great") {
                                                $great++;
                                            }
                                        }
                                        /** */
                                        echo "<tr><td>$uniquedate</td><td>$great</td><td>$good</td><td>$fair</td><td>$bad</td></tr>";
                                        $great = 0;
                                        $good = 0;
                                        $fair = 0;
                                        $bad = 0;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include 'partials/carpoolpartial.php';
            ?>
            <div id='ANCmanager' style="display:none">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <div class="ssm ssmactive" onclick="ancpreg('#rpw', '#ancregister')" id="rpw">Register ANC client</div>
                    <div class="ssm" onclick="ancpreg('#sms', '#smsregister')" id="sms">SMS Register</div>
                    <div class="ssm" onclick="ancpreg('#ctg', '#anccategorization')" id="ctg">Categorization</div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; margin-top:10px">
                    <!-- General -->
                    <div id="ancregister" style="padding-top:0px;min-height:200px;">
                        <div style="margin-top:10px; padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">ANC Pregnant women</div>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='searchedvalues'>
                            <span class="pregwomen cdcd actbreed" onclick='manageancclient("#regclient", "#regancclient")' id='regclient'>Register Client</span>
                            <span class="pregwomen cdcd" onclick='manageancclient("#manclient", "#manancclient")' id='manclient'>Manage Client Information</span>
                            <hr style="margin-top:3px; margin-bottom:50px; border-color:#4CAE4C">

                            <div id="regancclient">
                                <label>Patient name</label>
                                <input type="text" class="form-control" id="patname">
                                <label>Date Of Birth</label>
                                <input type="date" class="form-control" id="patdob">
                                <label>Email Address</label>
                                <input type="email" class="form-control" id="patemail">
                                <label>Phone Number</label>
                                <input type="number" class="form-control" id="patphone">
                                <label>Last Menstrual Period</label>
                                <input type="date" class="form-control" id="patlmp">
                                <label>Home address</label>
                                <input type="text" class="form-control" id="patha">
                                <label>Status</label>
                                <select class="form-control" id="patstatus">
                                    <option>--Select--</option>
                                    <option value='1'>Activate</option>
                                    <option value='0'>De-Activate</option>
                                </select>
                                <input type="button" value="Register details" class="btn btn-success" onclick="regPat(patname.value, patdob.value, patemail.value, patphone.value, patlmp.value, patha.value, patstatus.value)">
                                <input type='button' value='Reset fields' class='btn btn-warning' onclick='resetancform()'>
                            </div>
                            <div id='manancclient' style='display:none'>
                                <?php
                                $q = "select * from pregnantwomen";
                                $w = mysql_query($q);
                                echo "<div style='font-size:20px; margin-bottom:20px'>" . mysql_num_rows($w) . " clients registered</div>";
                                ?>
                                <div style='text-align:right'><span onclick='getancwomen()'><i class='fa fa-refresh ptr blue' title='Refresh'></i></span></div>
                                <table class='table table-striped table-responsive' style='font-size:13px;'>
                                    <thead>
                                        <tr style='font-weight:600; color:#3D003D'><td></td><td>Name</td><td>Weeks (Appr)</td><td>Mobile Number</td><td></td><td></td><td></td></tr>
                                    </thead>
                                    <tbody id='ancsmstable'>
                                        <?php
                                        $q = "select * from pregnantwomen";
                                        $w = mysql_query($q);
                                        $count = 1;
                                        while ($a = mysql_fetch_array($w)) {
                                            $pregid = $a['pregid'];
                                            $name = $a['name'];
                                            $dateofbirth = $a['dateofbirth'];
                                            $email = $a['emailaddress'];
                                            $phonenumber = $a['phonenumber'];
                                            $lmp = $a['lastmentrualperiod'];
                                            $status = $a['status'];
                                            $givenbirth = $a['givenbirth'];

                                            if ($givenbirth === "1") {
                                                $dategivenbirth = $a['dategivenbirth'];
                                                $date1 = strtotime(date("Y-m-d"));
                                                $givenbirthdate = strtotime($dategivenbirth);
                                                //pregnant
                                                $diff = $date1 - $givenbirthdate;
                                                $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1 . "wk(s)";
                                                if ($status === "1") {
                                                    echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td><span style='color:#4CAE4C'>D</span> - $weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-off ptr' style='color:green; font-weight:bold' title='De-Activate client' onclick='deactivatepreg($pregid)'></i></td><td></td></tr>";
                                                } else {
                                                    echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td><span style='color:#4CAE4C'>D</span> - $weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-on ptr' style='color:red; font-weight:bold' title='Activate client' onclick='activatepreg($pregid)'></i></td><td></td></tr>";
                                                }
                                                $count++;
                                            } else {
                                                $dategivenbirth = $a['dategivenbirth'];

                                                $date1 = strtotime(date("Y-m-d"));
                                                $date2 = strtotime($lmp);
                                                $givenbirthdate = strtotime($givenbirth);

                                                //pregnant
                                                $diff = $date1 - $date2;

                                                //Post-pregnant


                                                $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1 . "wk(s)";
                                                if ($status === "1") {
                                                    echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td><span style='color:#3D003D'>Pr</span> - $weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-off ptr' style='color:green; font-weight:bold' title='De-Activate client' onclick='deactivatepreg($pregid)'></i></td><td><span class='delvrd'  data-toggle='modal' data-target='#myMode' onclick='deliverclient($pregid)'>D</span></td></tr>";
                                                } else {
                                                    echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td><span style='color:#3D003D'>Pr</span> - $weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-on ptr' style='color:red; font-weight:bold' title='Activate client' onclick='activatepreg($pregid)'></i></td><td><span class='delvrd'  data-toggle='modal' data-target='#myMode' onclick='deliverclient($pregid)'>D</span></td></tr>";
                                                }
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="registeredclientelle" style='display:none'>
                                <table class="table table-striped">
                                    <?php
                                    $q = mysql_query("select * from pregnantwomen");
                                    $count = 1;
                                    while ($e = mysql_fetch_array($q)) {
                                        $pregid = $e['pregid'];
                                        $name = $e['name'];
                                        $dateofbirth = $e['dateofbirth'];
                                        $phonenumber = $e['phonenumber'];
                                        $lmp = $e['lastmentrualperiod'];
                                        $address = $e['address'];

                                        echo "<tr><td>$count</td><td>$name</td><td>$dateofbirth</td><td>$phonenumber</td><td>$lmp</td><td><i class='fa fa-phone' onclick='msgclient($pregid)'></i></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="footer">

                        </div>
                    </div>
                    <div id="smsregister" style="padding-top:0px;min-height:200px; display:none">
                        <div style="margin-top:10px; padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">SMS Register</div>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='searchedvalues'>
                            <span class="pregwomen xx actbreed" onclick="pregmsges('#preg', '#pregnancysection')" id='preg'>Pregnancy</span>
                            <span class="pregwomen xx" onclick="pregmsges('#postpreg', '#postpregnancysection')" id='postpreg'>Post-Pregnancy</span>
                            <hr style="margin-top:3px; margin-bottom:20px; border-color:#4CAE4C">
                            <div id="pregnancysection">
                                <span><?php
                                    $c = mysql_query("select * from pregnantwomensms");
                                    echo "<span style='font-size:30px'>" . mysql_num_rows($c) . " SMS | </span>";
                                    ?></span><span class="addsms" style=""  data-toggle='modal' data-target='#myMode' onclick="addSMS()"><i class="fa fa-plus"></i> Add New SMS</span>
                                <table class="table table-responsive table-condensed table-striped" style="font-size:12px; margin-top:20px">
                                    <?php
                                    $pregnancy = "select * from pregnantwomensms";
                                    $q = mysql_query($pregnancy);
                                    $count = 1;
                                    while ($a = mysql_fetch_array($q)) {
                                        $weekname = strtolower($a['week']);
                                        $pages = $a['pages'];
                                        $sms = $a['sms'];
                                        $dateadded = $a['datecreated'];
                                        $smsid = "sms" . $count;
                                        $smswithcontent = $smsid . ".innerHTML";
                                        $weekid = "week" . $count;
                                        $weekidwithcontent = $weekid . ".innerHTML";
                                        if ($count < 37) {
                                            if ($pages > 1) {
                                                echo "<tr id='$count' style='color:red'><td>$count</td><td id='$weekid'>$weekname</td><td id='$smsid'>$sms</td><td>$dateadded</td><td><i class='fa fa-times ptr red' title='Delete SMS' onclick=''></i><i class='fa fa-pencil-square-o ptr darkgreen' title='Update SMS' data-toggle='modal' data-target='#myMode' onclick='updatemodal($smswithcontent,$weekidwithcontent,\"Pregnancy\")'></i></td></tr>";
                                            } else {
                                                echo "<tr id='$count'><td>$count</td><td id='$weekid'>$weekname</td><td id='$smsid'>$sms</td><td>$dateadded</td><td><i class='fa fa-times ptr red' title='Delete SMS' onclick=''></i><i class='fa fa-pencil-square-o ptr darkgreen' title='Update SMS' data-toggle='modal' data-target='#myMode' onclick='updatemodal($smswithcontent,$weekidwithcontent,\"Pregnancy\")'></i></td></tr>";
                                            }
                                        } else {
                                            if ($pages > 1) {
                                                echo "<tr style='background-color:#FEF1F7; color:red' id='$count'><td>$count</td><td id='$weekid'>$weekname</td><td id='$smsid'>$sms</td><td>$dateadded</td><td><i class='fa fa-times ptr red' title='Delete SMS' onclick=''></i><i class='fa fa-pencil-square-o ptr darkgreen' title='Update SMS' data-toggle='modal' data-target='#myMode' onclick='updatemodal($smswithcontent,$weekidwithcontent,\"Pregnancy\")'></i></td></tr>";
                                            } else {
                                                echo "<tr style='background-color:#FEF1F7' id='$count'><td>$count</td><td id='$weekid'>$weekname</td><td id='$smsid'>$sms</td><td>$dateadded</td><td><i class='fa fa-times ptr red' title='Delete SMS' onclick=''></i><i class='fa fa-pencil-square-o ptr darkgreen' title='Update SMS' data-toggle='modal' data-target='#myMode' onclick='updatemodal($smswithcontent,$weekidwithcontent,\"Pregnancy\")'></i></td></tr>";
                                            }
                                        }
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </div>
                            <div id="postpregnancysection" style="display:none">
                                <span><?php
                                    $c = mysql_query("select * from pregnantwomendelivered");
                                    echo "<span style='font-size:30px'>" . mysql_num_rows($c) . " SMS | </span>";
                                    ?></span>
                                <table class="table table-responsive table-condensed table-striped" style="font-size:12px; margin-top:20px">
                                    <?php
                                    $pregnancy = "select * from pregnantwomendelivered";
                                    $q = mysql_query($pregnancy);
                                    $count = 1;
                                    while ($a = mysql_fetch_array($q)) {
                                        $weekname = strtolower($a['week']);
                                        $sms = $a['sms'];
                                        $dateadded = $a['datecreated'];
                                        $pages = $a['pages'];
                                        $smsid = $a['smsid'];

                                        $psmsid = "psms" . $smsid;
                                        $weeknameid = "pp" . $weekname;

                                        if ($pages === "1") {
                                            echo "<tr><td>$count</td><td id='$weeknameid'>$weekname</td><td id='$psmsid'>$sms</td><td>$dateadded</td><td><i class='fa fa-times ptr red' title='Delete SMS' onclick=''></i><i class='fa fa-pencil-square-o ptr darkgreen' title='Update SMS' data-toggle='modal' data-target='#myMode' onclick='updatemodal($psmsid.innerHTML,$weeknameid.innerHTML,\"Post-pregnancy\")'></i></td></tr>";
                                        } else {
                                            echo "<tr style='color:red'><td>$count</td><td id='$weeknameid'>$weekname</td><td id='$psmsid'>$sms</td><td>$dateadded</td><td><i class='fa fa-times ptr red' title='Delete SMS' onclick=''></i><i class='fa fa-pencil-square-o ptr darkgreen' title='Update SMS' data-toggle='modal' data-target='#myMode' onclick='updatemodal($psmsid.innerHTML,$weeknameid.innerHTML,\"Post-pregnancy\")'></i></td></tr>";
                                        }
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="footer">

                        </div>
                    </div>
                    <div id="anccategorization" style="padding-top:0px;min-height:200px; display:none">
                        <div style="margin-top:10px; padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">ANC Categorization</div>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='searchedvalues'>
                            <span class="pregwomen xxc actbreed" onclick="catmsges('#firsttri', '#firsttrisection')" id='firsttri'>First Trimester</span>
                            <span class="pregwomen xxc" onclick="catmsges('#secondtri', '#secondtrisection')" id='secondtri'>Second Trimester</span>
                            <span class="pregwomen xxc" onclick="catmsges('#thirdtri', '#thirdtrisection')" id='thirdtri'>Third Trimester</span>
                            <hr style="margin-top:3px; margin-bottom:20px; border-color:#4CAE4C">
                            <div id='firsttrisection'>
                                <table class='table table-striped' style='margin-bottom:40px'>
                                    <?php
                                    $s = "select * from pregnantwomen";
                                    $x = mysql_query($s);

                                    $count = 0;
                                    $countprow = 6;
                                    $week1 = 0;
                                    $weektwo = 0;
                                    $week3 = 0;
                                    $week4 = 0;
                                    $week5 = 0;
                                    $week6 = 0;
                                    $week7 = 0;
                                    $week8 = 0;
                                    $week9 = 0;
                                    $week10 = 0;
                                    $week11 = 0;
                                    $week12 = 0;
                                    while ($a = mysql_fetch_array($x)) {
                                        $lmp = $a['lastmentrualperiod'];
                                        $status = $a['status'];

                                        $date1 = strtotime(date("Y-m-d"));
                                        $date2 = strtotime($lmp);
                                        $diff = $date1 - $date2;

                                        $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1;
                                        echo $weeksgone . " - ";
                                        if ($weeksgone === "1") {
                                            $week1++;
                                        } elseif ($weeksgone === "2") {
                                            $weektwo++;
                                        } elseif ($weeksgone === "3") {
                                            $week3++;
                                        }
                                    }
                                    echo "<tr><td><b>Week1</b> : $week1</td><td><b>Week2</b> : $weektwo</td><td><b>Week3</b> : $week3</td><td><b>Week4</b> : $week4</td><td><b>Week5</b> : $week5</td><td><b>Week6</b> : $week6</td></tr>
                                    <tr><td>Week7 : $week7</td><td>Week8 : $week8</td><td>Week9 : $week9</td><td>Week10 : $week10</td><td>Week11 : $week11</td><td>Week12 : $week12</td></tr>";
                                    ?>

                                </table>
                            </div>
                            <div id='secondtrisection' style='display: none'>
                                <table class='table table-striped' style='margin-bottom:40px'>
                                    <tr><td>Week13 : 3</td><td>Week14 : 3</td><td>Week15 : 3</td><td>Week16 : 3</td><td>Week17 : 3</td><td>Week18 : 3</td></tr>
                                    <tr><td>Week19 : 3</td><td>Week20 : 3</td><td>Week21 : 3</td><td>Week22 : 3</td><td>Week23 : 3</td><td>Week24 : 3</td></tr>
                                </table>
                            </div>
                            <div id='thirdtrisection' style='display: none'>
                                <table class='table table-striped' style='margin-bottom:20px'>
                                    <tr><td>Week1 : 3</td><td>Week2 : 3</td><td>Week3 : 3</td><td>Week4 : 3</td><td>Week5 : 3</td><td>Week6 : 3</td></tr>
                                    <tr><td>Week7 : 3</td><td>Week8 : 3</td><td>Week9 : 3</td><td>Week10 : 3</td><td>Week11 : 3</td><td>Week12 : 3</td></tr>
                                </table>
                            </div>

                        </div>
                        <div class="footer">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <?php
                    $q = "select * from pregnantwomen";
                    $w = mysql_query($q);
                    $e = mysql_num_rows($w);
                    echo "<i class='fa fa-users' style='font-size:50px; color:#F5CA1B'></i> &nbsp; &nbsp; <span style='font-size:35px'>" . $e . "</span> women registered.<hr style='border-color:#AEAEAE; border-style:dotted'>";
//echo "<i class='fa fa-laptop' style='font-size:50px; color:#E10E6C'></i> &nbsp; &nbsp; <span style='font-size:35px'>" . getleftUnits() . "</span> SMS unit(s) left.<hr style='border-color:#AEAEAE; border-style:dotted'>";

                    $q = "select * from pregnantwomensms";
                    $w = mysql_query($q);
                    $e = mysql_num_rows($w);
                    echo "<i class='fa fa-tablet' style='font-size:50px; color:#E10E6C'></i> &nbsp; &nbsp; <span style='font-size:35px'>" . $e . "</span> pregnancy SMS messages.<hr style='border-color:#AEAEAE; border-style:dotted'>";

                    $q = "select * from pregnantwomendelivered";
                    $w = mysql_query($q);
                    $e = mysql_num_rows($w);
                    echo "<i class='fa fa-tablet' style='font-size:50px; color:#E10E6C'></i> &nbsp; &nbsp; <span style='font-size:35px'>" . $e . "</span> Post pregnancy SMS messages.<hr style='border-color:#AEAEAE; border-style:dotted'>";
                    ?>
                </div>
                <!-- Modal here -->
                <div class="modal fade" id="myMode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style='background-color:#4CAE4C'>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" id="myModeLabel" style='color:#fff;'></h3>
                            </div>
                            <div class="modal-body" id="myModebody">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id='auditmanager' style="display:none">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <div class="ssm ccra ssmactive" onclick="csreport('#clientsurvey', '#clientsurveytx')" id="clientsurvey">Client survey</div>
                    <div class="ssm ccra" onclick="csreport('#clientfeedbackanalysis', '#ccreportx')" id="clientfeedbackanalysis">Feedback Analysis</div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; margin-top:10px">
                    <!-- General -->
                    <div id="clientsurveytx" style="padding-top:0px;min-height:200px;">
                        <div style="margin-top:10px; padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Client Survey</div>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='searchedvalues'>
                            <span class="pregwomen cdc actbreed" onclick='manageclient("#clientsurveyReg", "#regsurveyclient")' id='clientsurveyReg'>Register Client</span>
                            <span class="pregwomen cdc" onclick='manageclient("#manclientS", "#mansurveyclientS")' id='manclientS'>Update Information</span>
                            <hr style="margin-top:3px; margin-bottom:50px; border-color:#4CAE4C">

                            <div id="regsurveyclient">
                                <table class="table table-responsive table-condensed">
                                    <label>Patient ID (Hospital ID)</label>
                                    <input type="text" class="form-control" id="cltname">
                                    <label>Visit Date</label>
                                    <input type="date" class="form-control" id="cltdob">
                                    <label>Phone number</label>
                                    <input type="number" class="form-control" id="cltphone">
                                    <label>Service rating</label>
                                    <select class="form-control" id="cltlos">
                                        <option>Great</option>
                                        <option>Good</option>
                                        <option>Fair</option>
                                        <option>Bad</option>
                                    </select>
                                    <label>Response reason</label>
                                    <input type="text" class="form-control" id="cltrr">

                                    <input type="button" value="Submit" class="btn btn-success" onclick="surveyclient(cltname.value, cltdob.value, cltphone.value, cltlos.value, cltrr.value);">
                                </table>
                            </div>
                            <div id='mansurveyclientS' style='display:none'>
                                <?php
                                $q = "select * from clientsurvey";
                                $w = mysql_query($q);
                                echo "<div style='font-size:20px; margin-bottom:20px'>" . mysql_num_rows($w) . " records</div>";
                                ?>
                                <table class='table table-striped' style='font-size:12px'>
                                    <?php
                                    $count = 1;
                                    while ($wq = mysql_fetch_array($w)) {
                                        $clientname = $wq['clientname'];
                                        $clientvisitdate = $wq['clientvisitdate'];
                                        $clientphone = $wq['clientphone'];
                                        $clientrating = $wq['clientrating'];
                                        $clientreason = $wq['clientreason'];
                                        echo "<tr><td>$count</td><td>$clientname</td><td>$clientphone</td><td>$clientrating</td><td>$clientreason</td><td><i class='fa fa-times red ptr'></i></td><td><i class='fa fa-newspaper-o ptr'></i></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </div>
                            <div id="registeredclientelle" style='display:none'>
                                <table class="table table-striped">
                                    <?php
                                    $q = mysql_query("select * from pregnantwomen");
                                    $count = 1;
                                    while ($e = mysql_fetch_array($q)) {
                                        $pregid = $e['pregid'];
                                        $name = $e['name'];
                                        $dateofbirth = $e['dateofbirth'];
                                        $phonenumber = $e['phonenumber'];
                                        $lmp = $e['lastmentrualperiod'];
                                        $address = $e['address'];

                                        echo "<tr><td>$count</td><td>$name</td><td>$dateofbirth</td><td>$phonenumber</td><td>$lmp</td><td><i class='fa fa-phone' onclick='msgclient($pregid)'></i></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="footer">

                        </div>
                    </div>
                    <div id="ccreportx" style="padding-top:0px;min-height:200px; display:none">
                        <div style="margin-top:10px; padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Feedback Analysis</div>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='searchedvalues'>
                            <hr style="margin-top:3px; margin-bottom:20px; border-color:#4CAE4C">
                            <table class='table table-striped' style='font-size:13px'>
                                <?php
                                $w = mysql_query("select * from clientsurvey");
                                $count = 1;
                                while ($wq = mysql_fetch_array($w)) {
                                    $clientname = $wq['clientname'];
                                    $clientvisitdate = $wq['clientvisitdate'];
                                    $clientphone = $wq['clientphone'];
                                    $clientrating = $wq['clientrating'];
                                    $clientreason = $wq['clientreason'];
                                    echo "<tr><td>$count</td><td>$clientname</td><td>$clientphone</td><td>$clientrating</td><td>$clientreason</td></tr>";
                                    $count++;
                                }
                                ?>
                            </table>
                        </div>
                        <div class="footer">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:50px; padding-right:0px">
                    <center><i style='font-size:90px' class='fa fa-pie-chart'></i></center>
                    <hr style='margin-top:10px;border-color:#ff0000; border-style:dotted'/>
                    <table class='table table-striped' style='font-size:13px'>

                        <?php
                        $countall = mysql_num_rows($w);
                        echo "<tr><td colspan='3' style='text-align:center'>$countall surveys</td></tr>";

                        $gs = mysql_query("select * from clientsurvey where clientrating='Great'");
                        $gss = mysql_num_rows($gs);
                        $pgs = ($gss / $countall) * 100 . "%";
                        echo "<tr><td><i class='fa fa-circle-thin' style='color:green'></i> Great service</td><td>$gss</td><td>$pgs</td></tr>";

                        $gs = mysql_query("select * from clientsurvey where clientrating='Good'");
                        $gss = mysql_num_rows($gs);
                        $pgs = ($gss / $countall) * 100 . "%";
                        echo "<tr><td><i class='fa fa-circle-thin'></i> Good service</td><td>$gss</td><td>$pgs</td></tr>";

                        $gs = mysql_query("select * from clientsurvey where clientrating='Fair'");
                        $gss = mysql_num_rows($gs);
                        $pgs = ($gss / $countall) * 100 . "%";
                        echo "<tr><td><i class='fa fa-circle-thin'></i> Fair service</td><td>$gss</td><td>$pgs</td></tr>";

                        $gs = mysql_query("select * from clientsurvey where clientrating='Bad'");
                        $gss = mysql_num_rows($gs);
                        $pgs = ($gss / $countall) * 100 . "%";
                        echo "<tr><td><i class='fa fa-circle-thin red'></i> Poor service</td><td>$gss</td><td>$pgs</td></tr>";
                        ?>
                    </table>
                </div>
                <!-- Modal here -->
                <div class="modal fade" id="myMode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style='background-color:#4CAE4C'>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" id="myModeLabel" style='color:#fff;'></h3>
                            </div>
                            <div class="modal-body" id="myModebody">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include 'partials/clientmanager.php';
            ?>
            <div id="settingsmanager" style="display:none">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <span style="max-width:200px">
                        <div class="pm ssmactive" onclick="pmStaff('#illnesscategory', '#illnesscat')" id="illnesscat">Manage illness Category</div>
                        <div class="pm" onclick="pmStaff('#acctmanagement', '#documentrequirement')" id="documentrequirement">Account settings</div>
                        <div class="pm" onclick="pmStaff('#remmanagement', '#reminderD')" id="reminderD">Reminder</div>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px" id="illnesscategory">
                        <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                            Illness category
                        </div>
                        <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
                            <span class="q w">Manage illness</span>
                        </span>
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px;" id="positionan">
                            <div>
                                <span>Category name</span>
                                <input type='text' class='form-control' id='adcatname'>
                                <span>Category description</span>
                                <textarea class='form-control' style='resize: none' id='adcatdesc' maxlength="190"></textarea>
                                <input type="button" value="Add illness category" class="btn btn-success" onclick="addillnesscategory(adcatname.value, adcatdesc.value)">

                            </div>
                            <div style="margin-top:40px">
                                <div style="text-align: right"><i class="fa fa-refresh" style="cursor:pointer; margin-bottom:10px; margin-right:20px" onclick="refreshdrugs()" title="Refresh category list"></i> Category list</div>
                                <table class="table table-striped">
                                    <thead style='font-weight:bold'>
                                        <tr><td></td><td>Category</td><td>Description</td><td></td></tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $g = "select * from illnesscategory";
                                        $q = mysql_query($g);
                                        $count = 1;
                                        while ($x = mysql_fetch_array($q)) {
                                            $illnesscategory = $x['illness'];
                                            $illnessdescription = $x['aboutilless'];

                                            echo "<tr><td>$count</td><td>$illnesscategory</td><td>$illnessdescription</td><td><i class='fa fa-times red ptr' title='Delete category'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr style="border-color:#D4D4D4; border-style:dotted">
                    </div>
                    <?php
                    include 'partials/accountsetting.php';
                    include 'partials/remindermodule.php';
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

                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $("[data-toggle='smsreceipt']").popover({html: true});
            $('[data-toggle="popover"]').popover({
                html: true
            });
        });
    </script>
</html>