<?php

include 'DBconnectPS.php';

$r = mysql_query("select * from vendordetails order by vendorname asc");
echo "<option value='0'>--Select Vendor--</option>";
while ($w = mysql_fetch_array($r)) {
    $clientname = $w['vendorname'];
    $clientid = $w['sn'];
    echo "<option value='$clientid'>$clientname</option>";
}
