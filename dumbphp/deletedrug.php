<?php

include 'DBconnectPS.php';
include 'unitttotableconversion.php';

session_start();
$userid = $_SESSION['staffid'];

$drugid = $_POST['drugid'];
$unitname = $_POST['unitname'];
$tablename = converttotable($unitname);
$drugname = $_POST[''];

$q = "delete from $tablename where drugid='$drugid'";
$w = mysql_query($q);

if ($w) {
    //updateuseractivity($updatekind, $userid, $updatenarrative)
    $updatenarrative = "Deleted $drugname from $tablename";
    updateuseractivity("Delete", $userid, "We have deleted the record");
    echo "<span style='color:#fff'>Deleted</span>";
} else {
    echo "Not deleted!";
}
