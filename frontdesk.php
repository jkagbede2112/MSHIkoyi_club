<!DOCTYPE html>
<!--
Developed by Joseph Kayode Agbede for Mt. Sinai Hospital Ebutte-Metta. 10 - 3 - 2016.
-->
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

        <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
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
        <div style="position:absolute; width:100%; position:fixed; z-index:5; top: 60px">
            <center>
                <span id="popUpcu" style="display:none; max-width:250px; width:auto; font-family:raleway; font-size:14px; min-height:10px; top:0px; background-color:rgba(30,30,30,0.9); color:#fff; border-style:dotted; border-width:thin; border-color:#000; padding:8px; border-radius:4px">
                    <div id="messagehere" style="margin-bottom:10px; margin-top:8px"></div>
                    <span id="buttonshere"></span>
                </span>
            </center>
        </div>
        <div class="header" style="background-color: #E10E6C">
            <span style='background-color:#A60B51; color:#D6D6D6; padding:10px; border-radius:4px;'><b>FRONTDESK - Kayode Agbede</b></span>

            <i class="fa fa-power-off" style="font-size:20px; color:#ffccff; background-color:#A60B51; padding:5px; border-radius:2px; margin-left:10px; font-weight:50; cursor:pointer"></i>
        </div>
        <!-- Human Resource -->
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs" style="height:100px; padding-top:15px;" class="col-lg-2 col-md-2 ">
            <span class="col-lg-2 col-md-2 mainButtons actMButtons" onclick="mainMenu('#mmStaff', '#staffmanager')" id='mmStaff'>
                <i class="fa fa-th" style="font-size:30px"></i><br>
                Dashboard
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmRegister', '#clientmanager')" id='mmRegister'>
                <i class="fa fa-list-ul" style="font-size:30px"></i><br>
                Patients
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmCheckin', '#checkinmanager')" id='mmCheckin'>
                <i class="fa fa-clock-o" style="font-size:30px"></i><br>
                Check-In
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmInvoice', '#invoicingmanager')" id='mmInvoice'>
                <i class="fa fa-barcode" style="font-size:30px"></i><br>
                Invoicing
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmCar', '#carmanager')" id='mmCar'>
                <i class="fa fa-car" style="font-size:30px"></i><br>
                Car Pool
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmFDSetting', '#settingsmanager')" id='mmFDSetting'>
                <i class="fa fa-cogs" style="font-size:30px"></i><br>
                Setting
            </span>
            <span style="position:absolute; right:10px">
                <img src="images/mtsinailogo.png" width="200px">
            </span>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content" style="padding-bottom:10px; border-bottom-style:dotted; border-top-style:dotted; border-color:#E1E1E1; border-width:thin">
            <div id='staffmanager'>
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
                                <table class="table table-striped table-condensed" style="font-size:12px">
                                    <?php
                                    $z = "select * from illnesscategory order by illness asc";
                                    $d = mysql_query($z);

                                    while ($g = mysql_fetch_array($d)) {
                                        $illnessname = $g['illness'];
                                        $aboutillness = $g['aboutilless'];
                                        $sn = $g['sn'];

                                        $sds = mysql_query("select * from addillcategory where clientillcategory='$sn'");
                                        $count = mysql_num_rows($sds);
                                        if ($count > 0) {
                                            echo "<tr><td></td><td class='ptr' title='$aboutillness'>$illnessname</td><td>$count</td><td><i class='fa fa-fax ptr btn' style='z-index:5' data-toggle=\"popover\" title=\"$illnessname\" data-content=\"<label>SMS Message</label><textarea rows='2' id='ci$sn' class='form-control' style='resize:none'></textarea><input type='button' value='Send message' style='width:250px' class='btn btn-success' onclick='msgeillnesscats($sn)'>\"></i></td></tr>";
                                        } else {
                                            echo "<tr><td></td><td class='ptr' title='$aboutillness'>$illnessname</td><td>$count</td><td><i class='fa fa-fax ptr btn' style='color:red'></i></td></tr>";
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
                                <table class="table table-striped" style="font-size:12px">
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
                    <!-- Patient satisfaction -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-bottom:10px; margin-top:10px">
                        <div class="callcentremodules">
                            <div class="ccmoduletopic">
                                Patient satisfaction 
                                <hr style="margin-top:10px;border-color:#ff0000; border-style:dotted">
                                <div style="font-size:40px"><?php echo date('Y'); ?></div>
                                <table class="table table-striped" style="font-size:12px">
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
            </div>
            <?php
            include 'partials/carpoolpartial.php';
            include 'partials/clientmanager.php';
            include 'partials/checkin.php';
            include 'partials/invoicing.php';
            ?>
            <div id="settingsmanager" style="display:none">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <span style="max-width:200px">
                        <div class="pm" onclick="pmStaff('#acctmanagement', '#documentrequirement')" id="documentrequirement">Account settings</div>
                        <div class="pm ssmactive" onclick="pmStaff('#remmanagement', '#reminderD')" id="reminderD">Manage Clients</div>
                        <div class="pm" onclick="pmStaff('#illnesscategory', '#illnesscat')" id="illnesscat">Manage services</div>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:relative; padding:0px; display:none" id="illnesscategory">
                        <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                            Manage services
                        </div>
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px; padding:0px;" id="positionan">
                            <div>
                                <span class="pregwomen xxcat actbreed" onclick="catmsge('#servicecattri', '#servicecattrisection')" id="servicecattri">Service Categories</span>
                                <span class="pregwomen xxcat" onclick="catmsge('#serviceeltri', '#serviceeltrisection')" id="serviceeltri">Service elements</span>
                                <hr style="margin-top:3px; margin-bottom:20px; border-color:#4CAE4C">
                            </div>
                            <div style="margin-top:40px">
                                <div id="servicecattrisection">
                                    <div class="col-md-5" style="padding:10px; background-color:#e5e5e5; min-height:100px">
                                        <label style="font-weight:500; font-size:12px">Service category name</label>
                                        <input type="text" style="padding:0px; width:100%; margin-bottom:5px; font-size:12px; padding:2px" id="sccname">
                                        <label style="font-weight:500; font-size:12px">Category description</label>
                                        <input type="text" style="padding:0px; width:100%; margin-bottom:5px; font-size:12px; padding:2px" id="sccdescription">
                                        <input type="button" value="Add Category" style="font-size:12px" onclick="addservicecategory(sccname.value, sccdescription.value)">
                                        <span style="font-size:12px" id="msscresponse">response here</span>
                                    </div>
                                    <div class="col-md-7" style="padding:10px; min-height:100px">
                                        <div style="text-align:right">
                                            <i class="fa fa-refresh ptr" onclick="getcategorylist()"></i> 
                                        </div>
                                        <table class="table table-condensed" style="font-size:12px">
                                            <thead style="font-weight:600">
                                                <tr><td></td><td>Service category</td><td></td><td></td></tr>
                                            </thead>
                                            <tbody id="servicecatlisting">
                                                <?php
                                                $q = "select * from billingservicecategory";
                                                $w = mysql_query($q);
                                                $count = 1;
                                                while ($e = mysql_fetch_array($w)) {
                                                    $servicename = $e['servicename'];
                                                    $serviceid = $e['serviceid'];
                                                    echo "<tr><td>$count</td><td>$servicename</td><td><i class='fa fa-times red ptr'></i></td><td></td></tr>";

                                                    $count++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="serviceeltrisection" style="display:none">
                                    <div class="col-md-5" style="padding:10px; background-color:#e5e5e5; min-height:100px">
                                        <label style="font-weight:500; font-size:12px">Service category name</label>
                                        <select style="width:100%; font-size:12px; padding:5px" id="sescname">
                                            <?php
                                            $a = 'select * from billingservicecategory order by servicename desc';
                                            $s = mysql_query($a);
                                            while ($d = mysql_fetch_array($s)) {
                                                $servicename = $d['servicename'];
                                                $serviceid = $d['serviceid'];
                                                echo "<option value='$serviceid'>$servicename</option>";
                                            }
                                            ?>
                                        </select>
                                        <label style="font-weight:500; font-size:12px; margin-top:10px">Service element</label>
                                        <input type="text" style="padding:0px; width:100%; margin-bottom:5px; font-size:12px; padding:2px" id="scccdescription">
                                        <input type="button" value="Add Service Element" style="font-size:12px" onclick="addserviceelement(sescname.value, scccdescription.value)">
                                        <span style="font-size:12px" id="msscresponse">response here</span>
                                    </div>
                                    <div class="col-md-7" style="padding:10px; min-height:100px">
                                        <div style="text-align:right">
                                            <i class="fa fa-refresh ptr" onclick="getcategorylist()"></i> 
                                        </div>
                                        <table class="table table-condensed" style="font-size:12px">
                                            <thead style="font-weight:600">
                                                <tr><td></td><td>Service categories w/ elements</td><td></td><td></td></tr>
                                            </thead>
                                            <tbody id="servicecatlisting">
                                                <?php
                                                $q = "select * from billingservicecategory";
                                                $w = mysql_query($q);
                                                $count = 1;
                                                while ($e = mysql_fetch_array($w)) {
                                                    $servicename = $e['servicename'];
                                                    $serviceid = $e['serviceid'];
                                                    echo "<tr style=background-color:#E5E5E5><td>$count</td><td>$servicename</td><td></td><td></td></tr>";
                                                    $qw = "select * from billingservicecategoryelement where categoryid='$serviceid'";
                                                    $ww = mysql_query($qw);
                                                    if (mysql_num_rows($ww) < 1) {
                                                        echo "<tr><td>**</td><td colspan='3' style='color:#E10E6C'>No service element</td></tr>";
                                                    } else {
                                                        while ($ee = mysql_fetch_array($ww)) {
                                                            $elementname = $ee['elementname'];
                                                            echo "<tr style='color:#3399CC'><td>*</td><td>$elementname</td><td></td><td></td></tr>";
                                                        }
                                                        $count++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                    </div>
                    <?php
                    include 'partials/accountsetting.php';
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="remmanagement" style="position:relative; padding:0px">
                        <div class="col-md-12" style="font-size:20px; font-weight:400; color:#480048; margin-bottom:30px">
                            Manage Clients

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="searchedvalues">
                            <span class="pregwomen xxc actbreed" onclick="catmsges('#firsttri', '#firsttrisection')" id="firsttri">Client category</span>
                            <span class="pregwomen xxc" onclick="catmsges('#secondtri', '#secondtrisection')" id="secondtri">Client</span>
                            <span class="pregwomen xxc" onclick="catmsges('#thirdtri', '#thirdtrisection')" id="thirdtri">Client Plan</span>
                            <span class="pregwomen xxc" onclick="catmsges('#fourthtri', '#fourthtrisection')" id="fourthtri">Service Charge</span>
                            <hr style="margin-top:3px; margin-bottom:20px; border-color:#4CAE4C">
                            <div id="firsttrisection">
                                <div style="margin-bottom:10px; margin-top:10px; font-size:12px; cursor:pointer"><i class="fa fa-plus-circle" style="font-size:25px"></i> Add Category</div>
                                <div class="col-lg-12" style="margin-bottom:20px">
                                    <div class="row">
                                        <div class="col-md-12" style="background-color:rgba(0,0,0,0.1); padding:10px; padding-top:20px; font-size:12px">
                                            <div class="row" style="margin-bottom:5px">
                                                <div class="col-md-4">Category Name</div>
                                                <div class="col-md-8"><input type="text" style="font-size:12px; width:100%" id="acpn"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Description</div>
                                                <div class="col-md-8"><input type="text" style="font-size:12px; width:100%" id="acdescription"></div>
                                            </div>
                                            <div class="row" style="text-align: center; margin-top:10px">
                                                <input type="button" value="Add Category" onclick="addbillingcategory()">
                                                <span style="font-size:11px" id="addnewcatresponse">..</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:right; font-size:12px; margin-top:30px; cursor:pointer" onclick="refreshclientcategory()"><i class="fa fa-refresh"></i> Refresh</div>
                                <table class="table table-striped table-condensed" style="margin-bottom:40px; margin-top:10px">
                                    <thead style="font-weight:500">
                                        <tr><td></td><td>Plan</td><td>Description</td><td>Date Added</td><td></td></tr>
                                    </thead>
                                    <tbody style="font-size:12px" id="billingcategorypipu">
                                        <?php
                                        $q = "select * from billingcategorization order by clientcategory desc";
                                        $w = mysql_query($q);
                                        $count = 1;
                                        while ($e = mysql_fetch_array($w)) {
                                            $clientcategory = $e['clientcategory'];
                                            $categorydescription = $e['categorydescription'];
                                            $dateadded = $e['dateadded'];

                                            if (strlen($categorydescription) < 1) {
                                                $categorydescription = "--";
                                            }
                                            echo "<tr><td>$count</td><td>$clientcategory</td><td>$categorydescription</td><td>$dateadded</td><td><i class='fa fa-times ptr' style='color:#ff0000'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="secondtrisection" style="display: none;">
                                <div class="col-lg-12" style="margin-bottom:20px">
                                    <div class="row" style="background-color:#E4E4E4; padding:20px; padding-top:20px; font-size:12px">
                                        <div class="row" style="margin-bottom:5px">
                                            <div class="col-md-4">Category</div>
                                            <div class="col-md-8">
                                                <select style="width:100%; padding:4px" id="pnclient">
                                                    <?php
                                                    $z = "select * from billingcategorization order by clientcategory ASC";
                                                    $x = mysql_query($z);
                                                    while ($c = mysql_fetch_array($x)) {
                                                        $categoryid = $c['categoryid'];
                                                        $clientcategory = $c['clientcategory'];
                                                        echo "<option value='$categoryid'>$clientcategory</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:5px">
                                            <div class="col-md-4">Client name</div>
                                            <div class="col-md-8"><input type="text" style="font-size:12px; width:100%" id="cnclient"></div>
                                        </div>
                                        <div class="row" style="margin-bottom:5px">
                                            <div class="col-md-4">Client address</div>
                                            <div class="col-md-8"><textarea type="text" rows="2" style="font-size:12px; width:100%" id="caclient"></textarea></div>
                                        </div>
                                        <div class="row" style="margin-bottom:5px">
                                            <div class="col-md-4">Contact name</div>
                                            <div class="col-md-8"><input type="text" style="font-size:12px; width:100%" id="anclient"></div>
                                        </div>
                                        <div class="row" style="margin-bottom:5px">
                                            <div class="col-md-4">Contact Phone</div>
                                            <div class="col-md-8"><input type="text" style="font-size:12px; width:100%" id="apclient"></div>
                                        </div>
                                        <div class="row" style="text-align: center; margin-top:10px">
                                            <input type="button" value="Add Client" onclick="addbillingclientcategory()">
                                            <span style="font-size:11px" id="addnewcatresponse">Server response here..</span>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:right; font-size:12px; margin-top:30px; cursor:pointer" onclick="refreshclientcategory()"><i class="fa fa-refresh"></i> Refresh</div>
                                <table class="table table-striped table-condensed" style="margin-bottom:40px; margin-top:10px">
                                    <thead style="font-weight:500">
                                        <tr><td></td><td>Client Category</td><td>Client(s)</td><td>Date Added</td><td></td></tr>
                                    </thead>
                                    <tbody style="font-size:12px" id="billingcategoryclient">

                                        <?php
                                        $z = "select *  from billingcategorization";
                                        $x = mysql_query($z);

                                        while ($c = mysql_fetch_array($x)) {
                                            $clientcategory = $c['clientcategory'];
                                            $categoryid = $c['categoryid'];

                                            //Pull clients under each category
                                            $q = "select * from billingsubscribers where clientcategory='$categoryid'";
                                            $g = mysql_query($q);

                                            $xc = "<tr><td></td><td>$clientcategory</td><td>";
                                            $count = 1;
                                            if (mysql_num_rows($g) < 1) {
                                                $xc .= "<div>-x-x-x-x-x-x-x-x-</div>";
                                            } else {
                                                while ($b = mysql_fetch_array($g)) {
                                                    $subscribername = $b['subscribername'];
                                                    $anchorname = $b['anchorname'];
                                                    $anchorphone = $b['anchorphone'];
                                                    $dateadded = $b['dateadded'];
                                                    $xc .= "<div>$count - $subscribername (<span style='color:#007ACC'>$anchorname - $anchorphone</span>) </div>";
                                                    $count++;
                                                }
                                            }
                                            $xc .= "</td><td></td></tr>";
                                            echo $xc;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="thirdtrisection" style="display: none;">
                                <div class="row" style="background-color:#E4E4E4; padding:20px; padding-top:20px; font-size:12px">
                                    <div class="row" style="margin-bottom:5px">
                                        <div class="col-md-4">Category</div>
                                        <div class="col-md-8">
                                            <select style="width:100%; padding:4px" id="cpcategory" onchange="pullcategory(this.value, 1)">
                                                <option>--Select--</option>
                                                <?php
                                                $z = "select * from billingcategorization order by clientcategory ASC";
                                                $x = mysql_query($z);
                                                while ($c = mysql_fetch_array($x)) {
                                                    $categoryid = $c['categoryid'];
                                                    $clientcategory = $c['clientcategory'];
                                                    echo "<option value='$categoryid'>$clientcategory</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:5px">
                                        <div class="col-md-4">Client</div>
                                        <div class="col-md-8">
                                            <select style="width:100%; padding:4px" id="cpclient">
                                                <option>--Select--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:5px">
                                        <div class="col-md-4">Plan</div>
                                        <div class="col-md-8"><input type="text" style="font-size:12px; width:100%" id="cpplan"></textarea></div>
                                    </div>
                                    <div class="row" style="text-align: center; margin-top:10px">
                                        <input type="button" value="Add Plan" onclick="addbillingclientplan()">
                                        <span style="font-size:11px" id="addnewcpresponse">Server response here..</span>
                                    </div>
                                </div>
                                <div style="margin-top:40px">
                                    <div style="font-size:25px">Clients</div>
                                    <div>
                                        <div style="margin-top:20px">

                                        </div>
                                        <table class="table table-condensed table-striped">
                                            <tr><td></td><td>Client</td><td>Plan</td><td></td></tr>
                                            <tbody style="font-size:12px">
                                                <?php
                                                $qh = "select * from billingsubscribers order by subscribername asc";
                                                $wh = mysql_query($qh);
                                                $countv = 1;
                                                while ($eh = mysql_fetch_array($wh)) {
                                                    $subscribername = $eh['subscribername'];
                                                    $subscriberid = $eh['subscriberid'];
                                                    //Pull plans

                                                    $m = "select * from billingsubscriberplan where subscriberid='$subscriberid'";
                                                    $n = mysql_query($m);

                                                    while ($b = mysql_fetch_array($n)) {
                                                        $planname = $b['subscriberplanname'];
                                                        $v = "<tr><td>$countv</td><td>$subscribername</td><td>$planname</td></tr>";
                                                        echo $v;
                                                        $countv++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="fourthtrisection" style="display: none;">
                                <div class="row" style="background-color:#E4E4E4; padding:20px; padding-top:20px; font-size:12px">
                                    <div class="row" style="margin-bottom:5px">
                                        <div class="col-md-4">Category</div>
                                        <div class="col-md-8">
                                            <select style="width:100%; padding:4px" id="sccategory" onchange="pullcategory(this.value, 2)">
                                                <option>--Select--</option>
                                                <?php
                                                $z = "select * from billingcategorization order by clientcategory ASC";
                                                $x = mysql_query($z);
                                                while ($c = mysql_fetch_array($x)) {
                                                    $categoryid = $c['categoryid'];
                                                    $clientcategory = $c['clientcategory'];
                                                    echo "<option value='$categoryid' >$clientcategory</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:5px">
                                        <div class="col-md-4">Client</div>
                                        <div class="col-md-8">
                                            <select style="width:100%; padding:4px" id="scclient" onchange="pullplans(this.value)">
                                                <option>--Select--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:5px">
                                        <div class="col-md-4">Plan</div>
                                        <div class="col-md-8">
                                            <select style="width:100%; padding:4px" id="scplan">
                                                <option>--Select--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="text-align: center; margin-top:10px">
                                        <input type="button" value="Enter Service Charge" onclick="pullservicecharge(scplan.value)">
                                        <span style="font-size:11px" id="addnewcpresponse">..</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
                        </span>
                        <hr style="border-color:#D4D4D4; border-style:dotted; margin-bottom: 40px">
                        <div id="dassR">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div style="margin-top:40px">
                        <i class="fa fa-briefcase" style="font-size:40px; color:#6A0633"></i> &nbsp; <span style="font-size:30px"><?php
                                                $w = mysql_query("select * from billingsubscribers");
                                                echo mysql_num_rows($w);
                                                ?></span> Client(s)
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                        <i class="fa fa-list-alt" style="font-size:40px; color:#5E4B04"></i> &nbsp; <span style="font-size:30px"><?php
                            $w = mysql_query("select * from billingsubscriberplan");
                            echo mysql_num_rows($w);
                                                ?></span> Plans
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                    </div>
                    <div style="margin-top:40px">

                    </div>
                </div>
            </div>
        </div>
        <div style="font-size:12px; text-align:center; margin-bottom:100px">
            HMS Version - Mar2016
        </div>
    </body>
</html>