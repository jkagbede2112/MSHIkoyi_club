<?php

include 'DBconnectPS.php';

$requiredqty = $_POST['reqQty'];
$mro = $_POST['mro'];
$qtyleft = $_POST['qtyleft'];

session_start();
$drugid = $_SESSION['drugid'];
$tabletocheck = $_SESSION['unitdrugtablename'];
$userid = $_SESSION['staffid'];
$unitname = $_SESSION['unitnameinq'];
$drugname = strtoupper($_SESSION['drugname']);

updatedrug($tabletocheck, $drugname, $drugid, $requiredqty, $mro, $userid, $unitname, $qtyleft);

function updatedrug($tablename, $drugname, $drugid, $rqdid, $mro, $userid, $unitname, $qtyleft) {
    $a ="update $tablename set requiredqty='$rqdid', minimumreorderlevel='$mro', qtyleft='$qtyleft' where drugid='$drugid'";
    $ab = mysql_query($a);

    if ($ab) {
        echo "<span>Update successful</span>";
        $updatenarrative = "Values for $drugname stock at $unitname has been updated. requiredqty set to $rqdid MRL set to $mro, Quantity left set to $qtyleft.";
        $userid = $userid;
        $activitykind = "Update";
        updateuseractivity($activitykind, $userid, $updatenarrative);
    } else {
        echo "<span>Update not successfull</span>";
    }
}

function updateuseractivity($updatekind, $userid, $updatenarrative) {
    $q = "insert into activitylog (action, userid, description) values ('$updatekind','$userid','$updatenarrative')";
    $w = mysql_query($q);
}
