<?php

include "DBconnectPS.php";

$patientid = $_POST['patientid'];

$selec = "select lastname, firstname, othername, gender, phonenumber from enrolleelist where hospitalnumber='$patientid'";
$a = mysql_query($selec);
if (mysql_num_rows($a)<1){
    echo "Hospital Record Not Found";
    return;
}
$wq = mysql_fetch_array($a);

$name = $wq['lastname'] . " " . $wq['firstname'] . " " . $wq['othername'];
$gender = $wq['gender'];
$phonenumber = $wq['phonenumber'];

echo "<div style='margin-bottom:10px; border-style:solid; border-width:thin; border-radius:2px; border-color:#E5E5E5; padding:10px'><span style='font-size:25px'>$name</span><br>$gender<br>$phonenumber</div>";