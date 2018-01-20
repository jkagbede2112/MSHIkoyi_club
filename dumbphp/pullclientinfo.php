<?php

include 'DBconnectPS.php';

$clientid = $_POST['ding'];
$fdf = mysql_query("select * from auditclientdetails where sn='$clientid'");
$r = mysql_fetch_array($fdf);

$companyname = $r['companyname'];
$clienttypesn = $r['clienttypesn'];
$contactphone = $r['contactphone'];
$emailaddress = $r['emailaddress'];
$officeaddress = $r['officeaddress'];

$dsd = "select * from auditclienttype where sn='$clienttypesn'";
$dsds = mysql_query($dsd);
$ff = mysql_fetch_array($dsds);
$cname = $ff['companytype'];

echo "<z>$companyname</z><x>$clienttypesn</x><m>$contactphone</m><n>$emailaddress</n><v>$officeaddress</v>";
