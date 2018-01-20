<?php

include 'DBconnectPS.php';
error_reporting(0);

$siteid = $_POST['siteid'];

$siterequisitiondatabase = "requisition" . strtolower($siteid);

$z = "select * from " . $siterequisitiondatabase . " where qtyleft < minimumreorderlevel";

$q = mysql_query($z);

$vendorcomputerlist = "";

$reporttopage = "<table class='table table-striped' style='font-size:12px; font-family:verdana'>" .
        "<tr style=\"font-weight:400; font-size:13px; color:#1B6A00\"><td></td><td>Item name</td><td>Category</td><td>Required</td><td>Qty left</td><td>Order</td></tr>";

$count = 1;
if (mysql_num_rows($q) < 1) {
    $reporttopage .= "<tr><td colspan='6' style='text-align:center; color:#ff0000; background-color:#FFE1E1'>**We are good here**</td></tr>";
} else {
    
    while ($e = mysql_fetch_array($q)) {
        $drugid = $e['drugid'];
        $requiredqty = $e['requiredqty'];
        $qtyleft = $e['qtyleft'];
        $minimumreorderlevel = $e['minimumreorderlevel'];

        $f = mysql_query("select * from drugstore where sn='$drugid'");
        $d = mysql_fetch_array($f);
        $qtytoorder = $requiredqty - $qtyleft;
        $drugname = $d['drugname'];
        $category = $d['category'];

        $ds = mysql_query("select * from drugcategory where sn='$category'");
        $re = mysql_fetch_array($ds);

        $categorname = $re['categoryname'];

        $reporttopage .= "<tr style='color:#AA0000'><td style='color:#414141'>$count</td><td>$drugname</td><td>$categorname</td><td>$requiredqty</td><td>$qtyleft</td><td>$qtytoorder</td></tr>";
        $count++;
    }
}

echo $reporttopage;
