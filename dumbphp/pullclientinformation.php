<?php

include 'DBconnectPS.php';

$patientid = $_POST['patientid'];

$e = "select * from enrolleelist where hospitalnumber = '$patientid'";

$w = mysql_query($e);

if (mysql_num_rows($w) < 1) {
    echo "<div style='text-align:center; color:red; font-size:25px'>Hospital ID not on database</div>";
}

$puller = mysql_fetch_array($w);

$name = $puller['lastname'] . " " . $puller['firstname'] . " " . $puller['othername'] . " ( $patientid )";
$address = $puller['homeaddress'];
$gender = $puller['gender'];
$phonenumber = $puller['phonenumber'];

$dates = date('h:i:s a');
//echo $dates;
echo "<label style='font-size:27px'>$name</label><br><label>$address</label><br/><label>$gender - $phonenumber</label><div style='text-align:right; font-size:20px'>$dates</div><input class='btn btn-primary' value='Check-In' onclick='checkinpatient(\"$patientid\")'>";