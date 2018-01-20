<?php

include 'DBconnectPS.php';

$q = "select * from auditclientdetails";
$w = mysql_query($q);
$count = 1;
while ($r = mysql_fetch_array($w)) {
    $comName = $r['companyname'];
    $clienttype = $r['clienttypesn'];
    $contactphone = $r['contactphone'];
    $emailaddress = $r['emailaddress'];
    $officeaddress = $r['officeaddress'];

    $gg = mysql_query("select * from auditclienttype where sn='$clienttype'");
    $f = mysql_fetch_array($gg);
    $cName = $f['companytype'];

    echo "<tr><td>$count</td><td>$comName</td><td>$cName</td><td>$contactphone</td><td><i class='fa fa-envelope' style='font-size:10px; cursor:pointer; color:#8b8b8b'></i> $emailaddress </td></tr>";
    $count++;
}