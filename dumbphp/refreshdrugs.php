<?php

include 'DBconnectPS.php';

$e = "select * from drugstore order by drugname asc";
$w = mysql_query($e);
$count = 1;
while ($q = mysql_fetch_array($w)) {
    $r = $q['drugname'];
    $g = $q['category'];

    $c = "select * from drugcategory where sn='$g'";
    $v = mysql_query($c);
    $b = mysql_fetch_array($v);
    $catname = $b['categoryname'];

    echo "<tr style='color:#790079'><td>$count</td><td>$r</td><td>$catname</td><td style='font-size:11px; color:#000'>Update/Delete</td></tr>";
    $count++;
}