<?php

include 'DBconnectPS.php';

$drugid = $_POST['drugid'];
$tabletocheck = $_POST['tabletocheck'];

//Get drug name;
$z = mysql_query("select * from drugstore where sn='$drugid'");
$x = mysql_fetch_array($z);
$drugname = $x['drugname'];

$a = "select * from $tabletocheck where drugid='$drugid'";
$s = mysql_query($a);

$w = mysql_fetch_array($s);

$requiredqty = $w['requiredqty'];
$minimumreorderlevel = $w['minimumreorderlevel'];
$qtyinstore = $w['qtyleft'];

echo "<a>$requiredqty</a><s>$minimumreorderlevel</s><d>$drugname</d><f>$tabletocheck</f><g>$qtyinstore</g>";

//Get unit name from tablename

function getunitname($tablename) {
    if ($tablename === "requisitionborno_way") {
        return "Borno-Way";
    } elseif ($tablename === "requisitionegbe") {
        return "Egbe";
    } elseif ($tablename === "requisitionfalolu") {
        return "Falolu";
    } elseif ($tablename === "requisitionmushin") {
        return "Surulere";
    } elseif ($tablename === "requisitiononikan") {
        return "Onikan";
    } elseif ($tablename === "requisitionikori_club") {
        return "Ikoyi-Club";
    }
}

//Verify values for unitdrugstable and drugid to update

session_start();
$_SESSION['unitdrugtablename'] = $tabletocheck;
$_SESSION['drugid'] = $drugid;
$_SESSION['unitnameinq'] = getunitname($tabletocheck);
$_SESSION['drugname'] = $drugname;