<?php

include 'DBconnectPS.php';

//disease + " " + month + " " + year + " " + site + " " + value

$disease = $_POST['disease'];
$month = $_POST['month'];
$year = $_POST['year'];
$site = $_POST['site'];
$value = $_POST['value'];

echo $disease . " " . $month . " " . $year . " " . $site . " " . $value;

$r = "insert into auditdiseaseprofile (diseasesn, sitesn, value, month, year) values ('$disease','$site','$value','$month','$year')";
$w = mysql_query($r);

if ($w){
    echo "Saved";
}else{
    echo "Not saved";
}