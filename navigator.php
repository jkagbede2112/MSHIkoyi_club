<?php

include 'dumbphp/DBconnectPS.php';

session_start();
if (!isset($_SESSION['staffid'])) {
    header("Location:index.php");
}

//echo $_SESSION['role'] . "<br>";
$f = $_SESSION['departmentid'];
$cc = "select * from departments where id='$f'";

$d = mysql_query($cc);
$w = mysql_fetch_array($d);

$deptname = $w['departmentname'];

echo $deptname;
$_SESSION['department'] = $deptname;

$jobdetail = $_SESSION['jobdetailid'];

$q = mysql_query("select jobtitle from jobdetail where sn='$jobdetail'");
$as = mysql_fetch_array($q);
$jobdetail = $as['jobtitle'];

$_SESSION['jobdetail'] = $jobdetail;

if ($deptname === "Procurement") {
    if ($_SESSION['role'] === "Team lead") {
        header("Location:procurement.php");
    } else {
        header("Location:http://");
    }
} elseif ($deptname === "Pharmacy") {
    header("Location:SIC.php");
} elseif ($deptname === "Business-Development") {
    if ($jobdetail === "Call Centre") {
        header("Location:callcentre.php");
    }
} elseif($deptname === "Administrative"){
    header("Location:administrator.php");
}