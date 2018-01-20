<?php

include 'DBconnectPS.php';

$datetosearch = $_POST['searchdate'];

$q = "select * from carpoolschedule where dateWtime like '%$datetosearch%' order by dateWtime desc";
$w = mysql_query($q);
$count = 1;
if (mysql_num_rows($w)<1){
    echo "<tr><td colspan='7' style='text-align:center'>Nothing scheduled logged for this date</td></tr>";
}
while ($r = mysql_fetch_array($w)) {
    $requestingstaff = $r['requestingstaff'];
    $destination = $r['destination'];
    $purposeoftravel = $r['purposeoftravel'];
    $durationofuse = $r['duration'];
    $approvalstatus = $r['approval'];

    $aa = mysql_query("select * from staff where id='$requestingstaff'");
    $wx = mysql_fetch_array($aa);

    $name = $wx['lastname'] . " " . $wx['firstname'];

    if ($approvalstatus === "1") {
        echo "<tr style='background-color:#DFFFDF'><td>$count</td><td>$name</td><td>$destination</td><td>$purposeoftravel</td><td>$durationofuse</td><td>Approved</td></tr>";
    } else {
        echo "<tr style='background-color:#FFE1E1'><td>$count</td><td>$name</td><td>$destination</td><td>$purposeoftravel</td><td>$durationofuse</td><td>Not Approved</td></tr>";
    }

    $count++;
}