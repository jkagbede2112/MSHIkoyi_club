<?php

include 'DBconnectPS.php';

$deliverydate = $_POST['deliverydate'];
$clientid = $_POST['clientid'];

$s = "update pregnantwomen set givenbirth='1', dategivenbirth='$deliverydate' where pregid='$clientid'";
$qq = mysql_query($s);
echo $s;
if ($qq){
    echo "Saved!";
}else{
    echo "Not saved";
}
