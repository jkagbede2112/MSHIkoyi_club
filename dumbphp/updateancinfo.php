<?php

include 'DBconnectPS.php';

//patname:a, patdob:b, patemail:c, patphonenumber:d, patlmp:e,pathomeaddress:f, patstatus:g, patpregid:h

$patname = $_POST['patname'];
$patdob = $_POST['patdob'];
$patemail = $_POST['patemail'];
$patphone = $_POST['patphonenumber'];
$patlmp = $_POST['patlmp'];
$pataddress = $_POST['pathomeaddress'];
$patstatus = $_POST['patstatus'];
$pregid = $_POST['patpregid'];

//echo $pataddress;

$updateinfo = "update pregnantwomen set name='$patname', dateofbirth='$patdob', emailaddress='$patemail', phonenumber='$patphone', lastmentrualperiod='$patlmp', address='$pataddress', status ='$patstatus' where pregid='$pregid'";

$q = mysql_query($updateinfo);

if ($q){
    echo "Update successful";
}else{
    echo "Update not successful";
}