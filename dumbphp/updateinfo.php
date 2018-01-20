<?php

include 'DBconnectPS.php';
include 'purifyer.php';

$staffid = flushentries('a');

echo $staffid;

$h = mysql_query("select * from staff where userid='$staffid'");
$d = mysql_fetch_array($h);

$firstname = $d['firstname'];
$middlename = $d['middlename'];
$lastname = $d['lastname'];
$maritalstatus = $d['maritalstatus'];
switch($maritalstatus){
    case "M":
        $maritalstatus = "Married";
        break;
    
    case "S":
        $maritalstatus = "Single";
        break;
}
$gender = $d['gender'];
switch($gender){
    case "M":
        $gender = "Male";
        break;
    
    case "F":
        $gender = "Female";
        break;
}
$emailaddress = $d['emailaddress'];
$phonenumber = $d['phonenumber'];
$homeaddress = $d['homeaddress'];
$highestqualification = $d['highestqualification'];

echo "<q>$firstname</q><w>$middlename</w><e>$lastname</e><r>$maritalstatus</r><t>$gender</t><y>$emailaddress</y><u>$phonenumber</u><i>$homeaddress</i><o>$highestqualification</o>";