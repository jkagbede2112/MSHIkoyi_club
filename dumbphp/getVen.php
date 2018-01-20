<?php

include 'DBconnectPS.php';

$q = "select * from vendordetails order by vendorname asc";
$w = mysql_query($q);
$count = 1;
while ($r = mysql_fetch_array($w)) {
    $vendorName = $r['vendorname'];
    $contactperson = $r['contactperson'];
    $contactphone = $r['contactphonenumber'];
    $emailaddress = $r['emailaddress'];
    $officeaddress = $r['officeaddress'];

    echo "<tr><td>$count</td><td>$vendorName</td><td>$contactperson</td><td>$contactphone</td><td>$emailaddress</td></tr>";
    $count++;
}