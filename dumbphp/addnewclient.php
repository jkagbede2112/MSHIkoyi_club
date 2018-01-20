<?php

include 'DBconnectPS.php';

//planname:planname, clientname:clientname, clientaddress:clientaddress, anchorname:anchorname, anchorphone:anchorphone
$planid = $_POST['planname'];
$clientname = $_POST['clientname'];
$clientaddress = $_POST['clientaddress'];
$anchorname = $_POST['anchorname'];
$anchorphone = $_POST['anchorphone'];

$q = "insert into billingsubscribers (subscribername, subscriberaddress, anchorname, anchorphone, clientcategory) "
        . "values ('$clientname','$clientaddress','$anchorname','$anchorphone','$planid')";
$w = mysql_query($q);

if ($w) {
    echo "Saved";
} else {
    echo "Not saved!";
}
