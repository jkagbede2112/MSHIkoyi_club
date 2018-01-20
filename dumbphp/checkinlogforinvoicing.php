<?php

include 'DBconnectPS.php';
$checkindate = $_POST['selectdate'];

$q = "select * from checkinlog where datetime like '%$checkindate%'";
$w = mysql_query($q);
if (mysql_num_rows($w) < 1) {
    echo "<tr><td colspan='3'>No records found</td></tr>";
    return;
}
$count = 1;
while ($e = mysql_fetch_array($w)) {
    $hospitalid = $e['hospitalid'];
    echo "<tr><td>$count</td><td>$hospitalid</td><td>Hygeia</td><td>Gold</td><td><input type='button' class='btn btn-success' value='Select' style='padding:2px; font-size:11px'></td></tr>";
    $count++;
}