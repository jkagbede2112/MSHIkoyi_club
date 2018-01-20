<?php

include 'DBconnectPS.php';

session_start();
$databasetable = getsitetable($_SESSION['siteid']);
$drugcategory = $_POST['drugcat'];

//Pull category name;
$se = "select * from drugcategory where sn='$drugcategory'";
$zz = mysql_query($se);
$za = mysql_fetch_array($zz);

$categoryname = $za['categoryname'];

$a = "select * from drugstore where category = '$drugcategory'";
$q = mysql_query($a);

if (mysql_num_rows($q) < 1) {
    echo "<tr><td colspan='3' style='text-align:center'>NO ITEM(S) FOUND</td></tr>";
    return;
}
$count = 1;
while ($vv = mysql_fetch_array($q)) {
    $drugname = $vv['drugname'];
    $drugid = $vv['sn'];

    $m = "select * from $databasetable where drugid = '$drugid'";
    $n = mysql_query($m);

    $c = mysql_fetch_array($n);
    $drugnum = $c['drugid'];
    echo "<tr><td>$count</td><td>$drugname ($categoryname)</td><td><span onclick='addtotable($drugid)' class='btn btn-success' style='padding:2px'>Add drug to store <i class='fa fa-check'></i></span></td></tr>";
    $count++;
}