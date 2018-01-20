<!DOCTYPE html>
<!--
Developed by Joseph Kayode Agbede for Mt. Sinai Hospital Ebutte-Metta. 10 - 3 - 2016.
-->
<?php
include 'dumbphp/DBconnectPS.php';
$staffCode = "AUDIT";

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
    </head>
    <body>
        <div style="z-index:1; position:fixed; width:100%; height:auto; text-align: center; padding-top:0px">
            <center>
                <span style="background-color:rgba(255,255,255,0.8); padding-top:0px; padding:2px; border-bottom-color:#660066; border-bottom-style:dotted; border-bottom-width:thin; height:100px" id='commentsatop'>
                    We are here as always;
                </span>
                <span id='commentsbuttons'></span>
            </center>
        </div>
        <div class="header">
            <span style='background-color:#480048; color:#D6D6D6; padding:10px; border-radius:4px;'><b>AUDIT</b> - </span>
            <span id="onlinestatus" class="btn btn-success" style="z-index:4">
                Online
            </span>
        </div>
        <!-- Human Resource -->
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs" style="height:100px; padding-top:15px;" class="col-lg-2 col-md-2 ">
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmStaff', '#staffmanager')" id='mmStaff'>
                <i class="fa fa-th" style="font-size:30px"></i><br>
                Dashboard
            </span>
            <span class="col-lg-2 col-md-2 mainButtons" onclick="mainMenu('#mmPositionmanagement', '#portalmanager')" id='mmPositionmanagement'>
                <i class="fa fa-print" style="font-size:30px"></i><br>
                Setting
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
                <!-- Menu items -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <span style="max-width:200px">
                        <div class="ssm" onclick="proStaff('#addstaff', '#addstaffoption')" id="addstaffoption">General</div>
                        <div class="ssm ssmactive" onclick="proStaff('#updatestaff', '#updatestaffoption')" id="updatestaffoption">Disease profile</div>
                        <div class="ssm" onclick="proStaff('#messagestaff', '#messagestaffoption')" id="messagestaffoption">Purchases</div>
                        <div class="ssm" onclick="proStaff('#viewstaff', '#viewstaffoption')" id="viewstaffoption">Unit Cash Collections</div>
                        <div class="ssm" onclick="proStaff('#chequesncash', '#viewchequesncash')" id="viewchequesncash">Cheques and cash</div>
                        <div class="ssm" onclick="proStaff('#dailydisbursements', '#viewdailydisbursements')" id="viewdailydisbursements">Daily Disbursements</div>
                        <div class="ssm" onclick="proStaff('#kitchenexpenses', '#viewkitchenexpenses')" id="viewkitchenexpenses">Kitchen Expenses</div>
                        <div class="ssm" onclick="proStaff('#attendance', '#viewattendance')" id="viewattendance">Attendance</div>
                        <div class="ssm" onclick="proStaff('#admissions', '#viewadmissions')" id="viewadmissions">Admissions</div>
                        <div class="ssm" onclick="proStaff('#cashmovement', '#viewcashmovement')" id="viewcashmovement">Cash movement</div>
                        <div class="ssm" onclick="proStaff('#centraladminoffice', '#viewcentraladminoffice')" id="viewcentraladminoffice">Central Admin Office</div>

                    </span>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px">
                    <!-- General -->
                    <div id="addstaff" style="padding-top:0px; display:none">
                        <div style="padding-bottom:40px; font-size:25px; font-weight:300; color:#3D003D; text-align:right">Overview</div>
                        <div id='addbasicinfo'>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; margin-bottom:10px; color:#83358A; font-weight:600">Disease profile</div>
                            <select class="form-control" style="max-width:150px">
                                <?php
                                $r = mysql_query("select * from sites");
                                while ($q = mysql_fetch_array($r)) {
                                    $id = $q['id'];
                                    $sitename = $q['sitename'];

                                    echo "<option value='$id'>$sitename</option>";
                                }
                                ?>
                            </select>
                            <div id="donutchart"></div>
                            <!--
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                            google.charts.load("current", {packages: ["corechart"]});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Disease', 'Values'],
                                    ['Thyphoid', 534],
                                    ['Ante-Natal Care', 34],
                                    ['Asthma', 42],
                                    ['Hypertension', 142],
                                    ['Malaria', 462],
                                    ['Diabetes', 24],
                                    ['URTI', 39],
                                    ['Gastro-Enteritis', 3],
                                    ['Diarrhea in children', 42],
                                    ['Deliveries', 64],
                                    ['Others', 66]
                                ]);

                                var options = {
                                    title: 'Borno Way',
                                    pieHole: 0.1,
                                    width: 700,
                                    height: 500,
                                    right: 10,
                                    bottom: 10,
                                    left: 10,
                                    top: 10,
                                    backgroundColor: {fill: 'transparent'},
                                };

                                var chart = new google.visualization.BarChart(document.getElementById('donutchart'));
                                chart.draw(data, options);
                            }
                            </script>
                            -->
                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Purchases</div>

                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Unit Cash collections</div>

                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Cash and Cheques</div>

                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Daily disbursement</div>

                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Kitchen Expenses</div>

                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Attendance</div>

                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Admissions</div>

                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Cash movement</div>

                        </div>
                        <div>
                            <hr style="margin-bottom:5px">
                            <div style="text-align: right; color:#83358A; font-weight:600">Central Admin Office</div>

                        </div>
                    </div>
                    <!-- Disease profile -->
                    <div id="updatestaff" style="padding-top:0px; min-height:500px; position:relative;">
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Disease profile</span>
                            <span class="rere" style="right:0px;" onclick="swabDP('#dpvr', '#viewreport')" id="dpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDP('#dpne', '#newentry')" id="dpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px; display:none" id="viewreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getD()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y") . "  <i class='fa fa-refresh' style='cursor:pointer' onclick='refDtable(\"\")' title='Refresh grid'></i>";
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">
                                <table class="table table-bordered table-hover">
                                    <thead style="font-weight:500; color:#480048">
                                        <tr>
                                            <td>Disease condition</td>
                                            <?php
                                            $r = mysql_query("select * from sites");
                                            while ($q = mysql_fetch_array($r)) {
                                                $ee = $q['sitename'];
                                                echo "<td>$ee</td>";
                                            }
                                            ?>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody id="diseasecondition">
                                        <?php
                                        $cMonth = date("F");
                                        $cYear = date("Y");

                                        //echo $cMonth . " " . $cYear;                                        
                                        $w = mysql_query("select * from auditdisease");

                                        while ($e = mysql_fetch_array($w)) {
                                            $diseasename = $e['diseasename'];
                                            $sn = $e['sn'];
                                            $valApp = "";
                                            $hSum = "";

                                            $r = mysql_query("select * from sites");
                                            while ($q = mysql_fetch_array($r)) {
                                                $sitesn = $q['id'];
                                                $d = "select value from auditdiseaseprofile where year='$cYear' and month='$cMonth' and diseasesn='$sn' and sitesn='$sitesn'";
                                                $z = mysql_query($d);
                                                if (mysql_num_rows($z) < 1) {
                                                    $valApp .= "<td>0</td>";
                                                    $hSum = $hSum + 0;
                                                } else {
                                                    $dd = mysql_fetch_array($z);
                                                    $value = $dd['value'];
                                                    $hSum = $hSum + $value;
                                                    $valApp .= "<td>" . $value . "</td>";
                                                    //echo $value;
                                                }
                                                //echo $d;
                                            }
                                            echo "<tr><td>$diseasename</td>$valApp<td style='font-weight:bold'>$hSum</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>
                        <!-- Table for staff.. -->
                        <div style="margin-top:40px" id="newentry">
                            <label>
                                Disease
                            </label>
                            <select class="form-control" id="ddisease">
                                <?php
                                $q = mysql_query("select * from auditdisease");
                                while ($d = mysql_fetch_array($q)) {
                                    $ds = $d['diseasename'];
                                    $dsn = $d['sn'];
                                    echo "<option value='$dsn'>$ds</option>";
                                }
                                ?>
                            </select>
                            <label>Month</label>
                            <select class="form-control" id="dmonth">
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                            <label>Year</label>
                            <select class="form-control" id="dyear">
                                <?php
                                $cYear = date('Y');
                                $pYear = $cYear - 3;
                                while ($pYear != $cYear) {
                                    echo "<option>$cYear</option>";
                                    $cYear--;
                                }
                                ?>
                            </select>
                            <label>Site</label>
                            <select class="form-control" id="dsite">
                                <?php
                                $q = mysql_query("select * from sites order by sitename asc");
                                while ($d = mysql_fetch_array($q)) {
                                    $ds = $d['sitename'];
                                    $dsn = $d['id'];
                                    echo "<option value='$dsn'>$ds</option>";
                                }
                                ?>
                            </select>
                            <label>Value</label>
                            <input type="text" class="form-control" id="dvalue">
                            <input type="button" class="btn btn-success" value="Submit" onclick="addEntry()" style="margin-top:10px">
                        </div>
                    </div>
                    <!-- Drug Purchases -->
                    <div id="messagestaff" style='display:none'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Purchases</span>
                            <span class="dp" style="right:30px;" onclick="swabDRP('#drpvr', '#viewdrpreport')" id="drpvr">View report</span>
                            <span class="dp reactive" style="right:115px;" onclick="swabDRP('#drpne', '#newdrpentry')" id="drpne">New entry</span>
                            <span style="position:absolute; right:0px; top:10px;"><i class="fa fa-cog" style="color:#660066; cursor:pointer" title="Drug purchase setting"></i></span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px; display:none" id="viewdrpreport">
                            <div style="margin-bottom:20px">
                                <select style="max-width:130px; display:inline" id="drugusageunits" class="form-control">
                                    <option>All Units</option>
                                    <?php
                                    $c = mysql_query("select * from sites");

                                    while ($p = mysql_fetch_array($c)) {
                                        $sitename = $p['sitename'];
                                        $id = $p['id'];
                                        echo "<option value='$id'>$sitename</option>";
                                    }
                                    ?>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get purchases" onclick="getDk(drugusageunits.value)" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;" id="usagebyunit">
                                <?php
                                $m = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

                                function compD($s) {
                                    global $m;
                                    $r = round(date('m') - $s);
                                    $cy = date('Y');
                                    if ($r == -1) {
                                        $r = 11;
                                        $cy = $cy - 1;
                                    } elseif ($r == -2) {
                                        $r = 10;
                                        $cy = $cy - 1;
                                    } elseif ($r == -3) {
                                        $r = 9;
                                        $cy = $cy - 1;
                                    } elseif ($r == -4) {
                                        $r = 8;
                                        $cy = $cy - 1;
                                    }
                                    echo $m[$r] . ", " . $cy;
                                }
                                ?>
                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <tbody >
                                        <?php
                                        $count = 1;
                                        $f = mysql_query("select * from auditpurchasetype");
                                        while ($w = mysql_fetch_array($f)) {
                                            $purchasetype = $w['purchasetype'];
                                            $purchasetypesn = $w['sn'];
                                            $mon = ceil(date('m'));
                                            $yea = date('Y');

                                            global $m;
                                            $constituents = "";

                                            $r = mysql_query("select * from auditpaymentcategory where purchasetypesn='$purchasetypesn'");
                                            while ($q = mysql_fetch_array($r)) {
                                                $constituents .= $q['categoryname'] . "<br>";
                                            }

                                            $value = getpurchase($yea, $m[$mon - 1], $purchasetypesn);
                                            $value1 = getpurchase($yea, $m[$mon - 2], $purchasetypesn);
                                            $value2 = getpurchase($yea, $m[$mon - 3], $purchasetypesn);
                                            $value3 = getpurchase($yea, $m[$mon - 4], $purchasetypesn);
                                            //echo $value3;
                                            echo "<tr><td>$count</td><td><a data-toggle='popover' data-content='$constituents'>$purchasetype</a></td><td class='centeralign'>$value</td><td class='centeralign'>$value1</td><td class='centeralign'>$value2</td><td class='centeralign'>$value3</td></tr>";
                                            $count++;
                                        }

                                        function getpurchase($y, $m, $purchasetypesn) {
                                            $h = "select * from auditdrugpurchases where year='$y' and month='$m' and purchasetype='$purchasetypesn'";

                                            $e = mysql_query($h);
                                            $amount = 0;
                                            if (mysql_num_rows($e) < 1) {
                                                return "0";
                                            } else {
                                                while ($qq = mysql_fetch_array($e)) {
                                                    $amount += $qq['value'];
                                                }
                                                return $amount;
                                            }
                                            //return $h;
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </span>
                        </div>
                        <div id="newdrpentry" style="margin-top:50px">
                            <label>
                                Purchase Type
                            </label>
                            <select class="form-control" id="ptype">
                                <?php
                                $q = mysql_query("select * from auditpaymentcategory");
                                while ($d = mysql_fetch_array($q)) {
                                    $ds = $d['categoryname'];
                                    $dsn = $d['sn'];
                                    echo "<option value='$dsn'>$ds</option>";
                                }
                                ?>
                            </select>
                            <label>Site</label>
                            <select class="form-control" id="ptsite">
                                <?php
                                $q = mysql_query("select * from sites order by sitename asc");
                                while ($d = mysql_fetch_array($q)) {
                                    $ds = $d['sitename'];
                                    $dsn = $d['id'];
                                    echo "<option value='$dsn'>$ds</option>";
                                }
                                ?>
                            </select>
                            <label>Month</label>
                            <select class="form-control" id="ptmonth">
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                            <label>Year</label>
                            <select class="form-control" id="ptyear">
                                <?php
                                $cYear = date('Y');
                                $pYear = $cYear - 3;
                                while ($pYear != $cYear) {
                                    echo "<option>$cYear</option>";
                                    $cYear--;
                                }
                                ?>
                            </select>

                            <label>Value</label>
                            <input type="text" class="form-control" id="ptvalue">
                            <input type="button" class="btn btn-success" value="Submit" onclick="addptEntry()" style="margin-top:10px">

                        </div>
                    </div>
                    <!-- Unit Cash Collections -->
                    <div id="viewstaff" style='display:none; min-height:300px'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Unit Cash Collections</span>
                            <span class="rere" style="right:0px;" onclick="swabDRP('#drpvr', '#viewucreport')" id="drpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDRP('#drpne', '#newucentry')" id="drpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px;" id="viewucreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getDk()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">
                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <?php
                                    $mon = date('M');
                                    $yea = date('Y');
                                    $count = 1;
                                    $f = mysql_query("select * from sites");

                                    function splitdate($r) {
                                        $dateval = split(',', $r);
                                        $month = $dateval[0];
                                        //$year = $dateval[1];
                                        global $siteid;
                                        $f = getunitcashcollection($month, '2016', $siteid);
                                        echo $f;
                                    }

                                    splitdate(compD(1));

                                    while ($w = mysql_fetch_array($f)) {
                                        $sitename = $w['sitename'];
                                        $siteid = $w['id'];

                                        $firstval = splitdate(compD(1));
                                        $secondval = splitdate(compD(2));
                                        $thirdval = splitdate(compD(3));
                                        $forthval = splitdate(compD(4));

                                        echo "<tr><td style='color:green'>$count</td><td>$sitename</td><td>$firstval</td><td>$secondval</td><td>$thirdval</td><td>$forthval</td></tr>";
                                        $count++;
                                    }

                                    function getunitcashcollection($month, $year, $siteid) {
                                        $r = "select value from auditprivatepayments where month='$month' and year='$year' and siteid='$siteid'";
                                        $e = mysql_query($r);
                                        $t = mysql_fetch_array($e);

                                        $amount = $t['value'];
                                        return $amount;
                                    }
                                    ?>
                                </table>
                            </span>
                        </div>
                        <div id="newucentry" style="margin-top:50px">
                            <label>Site</label>
                            <select class="form-control" id="uccsite">
                                <?php
                                $q = mysql_query("select * from sites order by sitename asc");
                                while ($d = mysql_fetch_array($q)) {
                                    $ds = $d['sitename'];
                                    $dsn = $d['id'];
                                    echo "<option value='$dsn'>$ds</option>";
                                }
                                ?>
                            </select>
                            <label>Month</label>
                            <select class="form-control" id="uccmonth">
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                            <label>Year</label>
                            <select class="form-control" id="uccyear">
                                <?php
                                $cYear = date('Y');
                                $pYear = $cYear - 3;
                                while ($pYear != $cYear) {
                                    echo "<option>$cYear</option>";
                                    $cYear--;
                                }
                                ?>
                            </select>

                            <label>Amount</label>
                            <input type="text" class="form-control" id="uccvalue">
                            <input type="button" class="btn btn-success" value="Submit" onclick="adduccEntry()" style="margin-top:10px">

                        </div>
                    </div>
                    <!-- Cheques and Cash -->
                    <div id="chequesncash" style='display:none; min-height:300px'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Cheques and Cash</span>
                            <span class="rere" style="right:0px;" onclick="swabDRP('#drpvr', '#viewdrpreport')" id="drpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDRP('#drpne', '#newdrpentry')" id="drpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px;" id="viewdrpreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getDk()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">

                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <?php
                                    $mon = date('M');
                                    $yea = date('Y');
                                    $count = 1;
                                    $f = mysql_query("select * from auditpurchasetype");
                                    while ($w = mysql_fetch_array($f)) {
                                        $purchasetype = $w['purchasetype'];
                                        $purchasetypesn = $w['sn'];

                                        $rr = mysql_query("select value from auditdrugpurchases where purchasetype='$purchasetypesn' and month='' and year=''");

                                        echo "<tr><td>$count</td><td>$purchasetype</td><td></td><td></td><td></td><td></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </span>
                        </div>
                    </div>
                    <!-- Daily disbursements -->
                    <div id="dailydisbursements" style='display:none; min-height:300px'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Daily disbursements</span>
                            <span class="rere" style="right:0px;" onclick="swabDRP('#drpvr', '#viewdrpreport')" id="drpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDRP('#drpne', '#newdrpentry')" id="drpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px;" id="viewdrpreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getDk()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">

                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <?php
                                    $mon = date('M');
                                    $yea = date('Y');
                                    $count = 1;
                                    $f = mysql_query("select * from auditpurchasetype");
                                    while ($w = mysql_fetch_array($f)) {
                                        $purchasetype = $w['purchasetype'];
                                        $purchasetypesn = $w['sn'];

                                        $rr = mysql_query("select value from auditdrugpurchases where purchasetype='$purchasetypesn' and month='' and year=''");

                                        echo "<tr><td>$count</td><td>$purchasetype</td><td></td><td></td><td></td><td></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </span>
                        </div>
                    </div>
                    <!-- Kitchen Expenses kitchenexpenses -->
                    <div id="kitchenexpenses" style='display:none; min-height:300px'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Kitchen Expenses</span>
                            <span class="rere" style="right:0px;" onclick="swabDRP('#drpvr', '#viewdrpreport')" id="drpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDRP('#drpne', '#newdrpentry')" id="drpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px;" id="viewdrpreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getDk()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">

                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <?php
                                    $mon = date('M');
                                    $yea = date('Y');
                                    $count = 1;
                                    $f = mysql_query("select * from auditpurchasetype");
                                    while ($w = mysql_fetch_array($f)) {
                                        $purchasetype = $w['purchasetype'];
                                        $purchasetypesn = $w['sn'];

                                        $rr = mysql_query("select value from auditdrugpurchases where purchasetype='$purchasetypesn' and month='' and year=''");

                                        echo "<tr><td>$count</td><td>$purchasetype</td><td></td><td></td><td></td><td></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </span>
                        </div>
                    </div>
                    <!--Attendance-->
                    <div id="attendance" style='display:none; min-height:300px'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Attendance</span>
                            <span class="rere" style="right:0px;" onclick="swabDRP('#drpvr', '#viewdrpreport')" id="drpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDRP('#drpne', '#newdrpentry')" id="drpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px;" id="viewdrpreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getDk()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">

                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <?php
                                    $mon = date('M');
                                    $yea = date('Y');
                                    $count = 1;
                                    $f = mysql_query("select * from auditpurchasetype");
                                    while ($w = mysql_fetch_array($f)) {
                                        $purchasetype = $w['purchasetype'];
                                        $purchasetypesn = $w['sn'];

                                        $rr = mysql_query("select value from auditdrugpurchases where purchasetype='$purchasetypesn' and month='' and year=''");

                                        echo "<tr><td>$count</td><td>$purchasetype</td><td></td><td></td><td></td><td></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </span>
                        </div>
                    </div>
                    <!--Admissions admissions-->
                    <div id="admissions" style='display:none; min-height:300px'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Admissions</span>
                            <span class="rere" style="right:0px;" onclick="swabDRP('#drpvr', '#viewdrpreport')" id="drpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDRP('#drpne', '#newdrpentry')" id="drpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px;" id="viewdrpreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getDk()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">

                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <?php
                                    $mon = date('M');
                                    $yea = date('Y');
                                    $count = 1;
                                    $f = mysql_query("select * from auditpurchasetype");
                                    while ($w = mysql_fetch_array($f)) {
                                        $purchasetype = $w['purchasetype'];
                                        $purchasetypesn = $w['sn'];

                                        $rr = mysql_query("select value from auditdrugpurchases where purchasetype='$purchasetypesn' and month='' and year=''");

                                        echo "<tr><td>$count</td><td>$purchasetype</td><td></td><td></td><td></td><td></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </span>
                        </div>
                    </div>
                    <!--Cash movement cashmovement-->
                    <div id="cashmovement" style='display:none; min-height:300px'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Cash movement</span>
                            <span class="rere" style="right:0px;" onclick="swabDRP('#drpvr', '#viewdrpreport')" id="drpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDRP('#drpne', '#newdrpentry')" id="drpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px;" id="viewdrpreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getDk()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">

                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <?php
                                    $mon = date('M');
                                    $yea = date('Y');
                                    $count = 1;
                                    $f = mysql_query("select * from auditpurchasetype");
                                    while ($w = mysql_fetch_array($f)) {
                                        $purchasetype = $w['purchasetype'];
                                        $purchasetypesn = $w['sn'];

                                        $rr = mysql_query("select value from auditdrugpurchases where purchasetype='$purchasetypesn' and month='' and year=''");

                                        echo "<tr><td>$count</td><td>$purchasetype</td><td></td><td></td><td></td><td></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </span>
                        </div>
                    </div>
                    <!-- Central Admin Office centraladminoffice-->
                    <div id="centraladminoffice" style='display:none; min-height:300px'>
                        <div style="padding-bottom:20px; font-size:20px; font-weight:300; color:#3D003D; text-align:right; position:relative">
                            <span style="position:absolute; left:0px; top:10px">Central Admin Office</span>
                            <span class="rere" style="right:0px;" onclick="swabDRP('#drpvr', '#viewdrpreport')" id="drpvr">View report</span>
                            <span class="rere reactive" style="right:85px;" onclick="swabDRP('#drpne', '#newdrpentry')" id="drpne">New entry</span>
                        </div>
                        <hr>
                        <div style="min-height:140px; margin-top:40px;" id="viewdrpreport">
                            <div style="margin-bottom:20px">
                                <label>Year : </label>
                                <select style="padding:5px" id="vryear">
                                    <?php
                                    $cYear = date('Y');
                                    $pYear = $cYear + 3;
                                    while ($pYear != $cYear) {
                                        echo "<option>$cYear</option>";
                                        $pYear--;
                                    }
                                    ?>
                                </select>
                                &nbsp; &nbsp; &nbsp; 
                                <label>Month : </label>
                                <select style="padding:5px" id="vrmonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                &nbsp; 
                                <input type="button" class="btn btn-success" value="Get data" onclick="getDk()" style="padding:4px">
                            </div>
                            <div style="text-align:right; margin-right:15px; color:#83358A" id="vrcurdate">
                                <?php
                                echo date("F, Y");
                                ?>
                            </div>
                            <span style="background-image:linear-gradient(to left,#F3F3F3,#fff ,#F3F3F3); padding:10px; min-height:100px; width:100%; display:block;">

                                <table class="table table-bordered table-hover">
                                    <tr style="font-weight:500; color:#480048">
                                        <td></td>
                                        <td></td>
                                        <td><?php echo compD(1); ?></td>
                                        <td><?php echo compD(2); ?></td>
                                        <td><?php echo compD(3); ?></td>
                                        <td><?php echo compD(4); ?></td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td></td>
                                        <td></td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                        <td>N:K</td>
                                    </tr>
                                    <?php
                                    $mon = date('M');
                                    $yea = date('Y');
                                    $count = 1;
                                    $f = mysql_query("select * from auditpurchasetype");
                                    while ($w = mysql_fetch_array($f)) {
                                        $purchasetype = $w['purchasetype'];
                                        $purchasetypesn = $w['sn'];

                                        $rr = mysql_query("select value from auditdrugpurchases where purchasetype='$purchasetypesn' and month='' and year=''");

                                        echo "<tr><td>$count</td><td>$purchasetype</td><td></td><td></td><td></td><td></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </table>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: center; padding-top:50px">
                    <div>
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
                <div class="footer">

                </div>
            </div>
            <div id="portalmanager" style="display:none">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:100px; padding-right:0px">
                    <span style="max-width:200px">
                        <div class="pm" onclick="pmStaff('#posmanagement', '#positionmanagement')" id="positionmanagement">Drug purchase Management</div>
                        <div class="pm" onclick="pmStaff('#docmanagement', '#documentrequirement')" id="documentrequirement">Clients</div>
                        <!--<div class="pm ssmactive" onclick="pmStaff('#announcementmanagement', '#announcement')" id="announcement">Announcement</div>-->
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color:rgba(255,255,255,0.3); padding-bottom:10px; padding:20px; min-height:300px">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none; position:relative; padding:0px" id="posmanagement">
                        <div style="position:absolute; left:-5px; top:-5px; font-size:20px; font-weight:400; color:#480048">
                            Purchase Management
                        </div>
                        <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
                            <span class="q" onclick="chdm('#positionan', '#pman')" id="pman">Add new</span> |
                            <span class="q w" onclick="chdm('#positionv', '#pmv')" id="pmv">View</span>
                        </span>
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px;" id="positionan">
                            <span>Purchase category</span>
                            <select class="form-control" style="margin-top:5px; margin-bottom:20px" id="pcategory">
                                <?php
                                $e = "select * from auditpurchasetype order by purchasetype asc";
                                $w = mysql_query($e);

                                while ($q = mysql_fetch_array($w)) {
                                    $sn = $q['sn'];
                                    $pt = $q['purchasetype'];
                                    $ptsn = $q['sn'];
                                    echo "<option value='$ptsn'>$pt</option>";
                                }
                                ?>
                            </select>
                            <span>Purchase type</span>
                            <input type="text" class="form-control" placeholder="New Purchase type" style="margin-top:5px" id="ptypeq">
                            <input type="button" value="Add purchase type" class="btn btn-success" onclick="adddrugtype(pcategory.value, ptypeq.value)">
                            <input type="button" value="Reset" class="btn btn-danger" onclick="jbdscrptn">
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:40px; display:none" id="positionv">
                            <div style="text-align:right; font-size:17px; color:#660066; position:relative">
                                <i class="fa fa-print" style="position:absolute; left:0px; cursor:pointer;" title="Print positions"></i>
                                <?php
                                $r = mysql_query("select * from auditpaymentcategory");
                                echo "<b>" . mysql_num_rows($r) . "</b> purchase categories ";
                                ?> 
                            </div>
                            <table style="width:100%; margin-top:10px" class="table-bordered table">
                                <thead>
                                    <tr style="background-color:#f0f0f0; color:#660066; font-weight:bold"><td>Purchase type</td><td colspan="3">Purchase category</td></tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $r = "select * from auditpaymentcategory order by categoryname asc";
                                    $w = mysql_query($r);
                                    if (mysql_num_rows($w) < 1) {
                                        echo "<tr><td colspan='4' style='color:red; text-align:center'>No records</td></tr>";
                                    } else {
                                        while ($qw = mysql_fetch_array($w)) {
                                            $categoryname = $qw['categoryname'];
                                            $purchasetypesn = $qw['purchasetypesn'];

                                            $fd = mysql_query("select * from auditpurchasetype where sn='$purchasetypesn'");
                                            $p = mysql_fetch_array($fd);
                                            $pvalue = $p['purchasetype'];

                                            $sn = $qw['sn'];
                                            echo "<tr><td style='font-weight:500' id='wewe$sn'>$categoryname</td><td style=font-size:12px>$pvalue</td><td><span class='btn btn-success' style='padding:2px; font-size:12px' onclick='updaterecord($sn)' data-toggle='modal' data-target='#myModal'>Update</span></td><td style='color:red; cursor:pointer; font-size:12px' onclick='deletejob($sn)'>Delete</td></tr>";
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
                            Client Management
                        </div>
                        <span class="col-lg-12 col-md-12" style="text-align:right; padding-right:0px">
                            <span class="z" onclick="chdmq('#diman', '#dman')" id="dman">Add new</span> |
                            <span class="z" onclick="chdmq('#dimu', '#dmu')" id="dmu">Update</span> |
                            <span class="z w" onclick="chdmq('#dimv', '#dmv')" id="dmv">View</span>
                        </span>
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                        <div id="diman" style="margin-top:40px; display:none">
                            <label>Company name</label>
                            <input type="text" class="form-control" id="addclientcn">
                            <label>Client type</label>
                            <select class="form-control" id="addclientct">
                                <option value="0">--Select Option--</option>
                                <?php
                                $r = mysql_query("select * from auditclienttype order by companytype asc");
                                while ($q = mysql_fetch_array($r)) {
                                    $sn = $q['sn'];
                                    $cat = $q['companytype'];
                                    echo "<option value='$sn'>$cat</option>";
                                }
                                ?>
                            </select>
                            <label>Contact phone number</label>
                            <input type="text" class="form-control" id="addclientcpn">
                            <label>Email address</label>
                            <input type="email" class="form-control" id="addclientea">
                            <label>Office address</label>
                            <textarea class="form-control" rows="2" id="addclientoa"></textarea>
                            <input type="button" class="btn btn-success" value="Add Client" onclick="addclientdetails()">
                        </div>
                        <div id="dimu" style="display:none">
                            <div style="font-size:18px; color:#BB9709; margin-top:60px">Update client information</div>
                            <div style="font-size:10px; text-align:right; cursor:pointer" onclick="refreshcoydropdown()">Refresh client dropdown</div>
                            <select class="form-control" style="margin-top:20px" id="coydropdown" onchange="pullclientinfo(this.value)">
                                <option>--Select Client--</option>
                                <?php
                                $r = mysql_query("select * from auditclientdetails order by companyname asc");
                                while ($w = mysql_fetch_array($r)) {
                                    $clientname = $w['companyname'];
                                    $clientid = $w['sn'];
                                    echo "<option value='$clientid'>$clientname</option>";
                                }
                                ?>
                            </select>
                            <hr style="border-color:#B1B1B1; border-style:dashed">
                            <label style="color:#3D003D; margin-top:5px">Company name</label>
                            <input type="text" class="form-control" id='coyName'>
                            <label style="color:#3D003D; margin-top:5px">Client type</label>
                            <select class="form-control" id='coyClientType'>
                                <option>-- --</option>
                                <?php
                                
                                $rd = mysql_query("select * from auditclienttype order by companytype asc");
                                while ($t = mysql_fetch_array($rd)) {
                                    $e = $t['companytype'];
                                    $rs = $t['sn'];
                                    echo "<option value='$rs'>$e</option>";
                                }
                                
                                ?>
                            </select>
                            <label style="color:#3D003D; margin-top:5px">Contact phone number</label>
                            <input type="text" class="form-control" id='coyContactPhone'>
                            <label style="color:#3D003D; margin-top:5px">Email address</label>
                            <input type="email" class="form-control" id='coyEmailAddress'>
                            <label style="color:#3D003D; margin-top:5px">Office address</label>
                            <textarea class="form-control" rows="2" id='coyOfficeAddress'></textarea>
                            <input type="button" class="btn btn-success" value="Update Client information" onclick="updateclientinfo()"> <span id="clientID" style="display:none"></span>
                        </div>
                        <div id="dimv" style="margin-top:40px">
                            <i class="fa fa-refresh" style="cursor:pointer" title="Refresh client list" onclick="getComValues()"></i>
                            <table class="table table-hover table-bordered" style="margin-top: 10px">
                                <thead>
                                    <tr style="font-weight:600; color:#003366"><td></td><td>Client name</td><td>Category</td><td>Contact Number</td><td>Email</td></tr>
                                </thead>
                                <tbody id="clientdets">
                                    <?php
                                    $q = "select * from auditclientdetails";
                                    $w = mysql_query($q);
                                    $count = 1;
                                    while ($r = mysql_fetch_array($w)) {
                                        $comName = $r['companyname'];
                                        $clienttype = $r['clienttypesn'];
                                        $contactphone = $r['contactphone'];
                                        $emailaddress = $r['emailaddress'];
                                        $officeaddress = $r['officeaddress'];

                                        $gg = mysql_query("select * from auditclienttype where sn='$clienttype'");
                                        $f = mysql_fetch_array($gg);
                                        $cName = $f['companytype'];

                                        echo "<tr><td>$count</td><td>$comName</td><td>$cName</td><td>$contactphone</td><td>$emailaddress</td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div style="margin-top:40px">
                        <i class="fa fa-briefcase" style="font-size:40px; color:#6A0633"></i> &nbsp; <span style="font-size:30px"><?php
                            $w = mysql_query("select * from auditpaymentcategory");
                            echo mysql_num_rows($w);
                            ?></span> Clients
                        <hr style="border-color:#D4D4D4; border-style:dotted">
                        <i class="fa fa-file-text-o" style="font-size:40px; color:#5E4B04"></i> &nbsp; <span style="font-size:30px"><?php
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