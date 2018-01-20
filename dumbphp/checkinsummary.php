<?php

include 'DBconnectPS.php';

$todaysdate = date('Y-m-d');
$r = "select * from checkinlog where datetime like '%$todaysdate%'";
$t = mysql_query($r);

$count = 1;
while ($j = mysql_fetch_array($t)) {
    $hospitalID = $j['hospitalid'];
    $checkin = $j['checkin'];

    $a = "select * from enrolleelist where hospitalnumber='$hospitalID'";

    $q = mysql_query($a);
    $zz = mysql_fetch_array($q);
    $hospitalid = $zz['hospitalnumber'];
    $clientname = $zz['lastname'] . " " . $zz['firstname'] . " " . $zz['othername'];
    $clientphone = $zz['phonenumber'];
    $clientemail = $zz['emailaddress'];
    $clientgender = $zz['gender'];
    $clientdob = $zz['dateofbirth'];

    $timenownow = date("H:i:s");

    $date1 = strtotime($timenownow);
    $date2 = strtotime($checkin);

    $timediff = $date1 - $date2;

    $waittime = floor($timediff / (60));

    if ($waittime >60){
        $waittimehr = $waittime%60;
        $waittimemins = $waittime - ($waittimehr * 60);
        $waittime = $waittimehr . "Hr(s) " . $waittimemins . "Mins(s)";
    }
    echo "<tr style='font-size:12px'><td>$count</td><td>$hospitalID</td><td>$checkin</td><td>$waittime</td></tr>";
    $count++;
}