<?php

include 'DBconnectPS.php';

$patientid = $_POST['patientid'];

$times = date('H:i:s');
$dates = date('m-d-y');

$w = mysql_query("insert into checkinlog (hospitalid,checkin, date)values('$patientid','$times','$dates')");

if ($w){
    echo "<span style='color:#337AB7'>Checked In</span>";
}else{
    echo "Not checked In";
}