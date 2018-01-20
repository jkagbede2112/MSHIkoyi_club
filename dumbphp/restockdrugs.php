<?php

include 'DBconnectPS.php';

session_start();


$updatekind = "UPDATE";


$drugid = $_POST['drugid'];
$qty = $_POST['qty'];
$database = $_POST['database'];

$databasetable = converttotable($database);

$q = "select * from $databasetable where drugid ='$drugid'";
$w = mysql_query($q);

$e = mysql_fetch_array($w);

//Old stock level
$qtyleft = $e['qtyleft'];

//Add new stock
$newqty = $qtyleft + $qty;

//Update new values now
$z = "update $databasetable set qtyleft='$newqty' where drugid='$drugid'";

$x = mysql_query($z);

if ($x){
    echo "Quantity is now updated to $newqty";
    //updateuseractivity($updatekind, $userid, $updatenarrative);
}