<?php

include 'DBconnectPS.php';
session_start();
$siteid = $_SESSION['siteid'];

$q = "select * from drugsusage where siteid='$siteid' order by DateTime Desc LIMIT 150";
//echo $q;
$w = mysql_query($q);
if (mysql_num_rows($w) < 1) {
    echo "<tr><td colspan='7'>No records</td></tr>";
}
$count = 1;
while ($d = mysql_fetch_array($w)) {
    $drugid = $d['DrugID'];
    $initialqty = $d['InitialQty'];
    $qtydispensed = $d['QtyDispensed'];
    $qtyleft = $d['QtyLeft'];
    $userid = $d['userid'];
    $datedispensed = $d['DateTime'];
    $patientname = $d['patientID'];

    //Get Staff name
    $sasa = mysql_query("select * from staff where id='$userid' or userid='$userid'");
    $qqw = mysql_fetch_array($sasa);

    $staffname = $qqw['lastname'] . " " . $qqw['firstname'] . " " . $qqw['middlename'];

    //Get drug name
    $qq = mysql_query("select * from drugstore where sn='$drugid'");
    $ww = mysql_fetch_array($qq);
    $drugname = $ww['drugname'];
    $drugcategory = $ww['category'];

    $qqqq = "select * from drugcategory where sn='$drugcategory'";
    $wwww = mysql_query($qqqq);
    $ee = mysql_fetch_array($wwww);

    $categorynameq = $ee['categoryname'];

    echo "<tr style='font-size:13px'><td><b>$count</b></td>"
    . "<td>$drugname ($categorynameq)</td>"
    . "<td>$initialqty</td>"
    . "<td>$qtydispensed</td>"
    . "<td>$qtyleft</td>"
    . "<td>$patientname</td>"
    . "<td>$datedispensed</td>"
    . "<td><i class='fa fa-user' title='$staffname'></i></td></tr>";
    $count++;
}