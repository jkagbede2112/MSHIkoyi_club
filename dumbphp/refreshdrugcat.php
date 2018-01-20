<?php

include 'DBconnectPS.php';

$r = "select * from drugcategory order by categoryname asc";
$w = mysql_query($r);
if (mysql_num_rows($w) < 1) {
    echo "<tr><td colspan='4' style='color:red; text-align:center'>No records</td></tr>";
} else {
    while ($qw = mysql_fetch_array($w)) {
        $categoryname = $qw['categoryname'];
        $drugtypesn = $qw['sn'];

        $ass = mysql_query(" select * from drugstore where category='$drugtypesn'");
        $e = mysql_num_rows($ass);

        echo "<tr><td style='font-weight:500' id='id$drugtypesn'>$categoryname</td><td>$e</td><td><span class='btn btn-success' style='padding:2px; font-size:12px' onclick='updaterecord(id$drugtypesn.innerHTML, $drugtypesn)' data-toggle='modal' data-target='#myModal'>Update</span></td><td style='color:red; cursor:pointer; font-size:12px' onclick='deletecategory($drugtypesn,\"$categoryname\")'>Delete</td></tr>";
    }
}