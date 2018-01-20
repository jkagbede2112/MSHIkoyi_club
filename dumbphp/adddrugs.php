<?php

include 'DBconnectPS.php';
//coyname, coyClientType, coyContactPhone, coyEmailAddress, coyOfficeAddress
//venname, venClientType, venContactPhone, venEmailAddress, venOfficeAddress, clientsn
$category = $_POST['category'];
$venClientType = $_POST['name'];
$requiredqty = $_POST['ADrequiredqty'];
$minimumreorder = $_POST['mro'];

if (strlen($category) < 1 || strlen($venClientType) < 1) {
    echo "0";
    return;
}

$j = "insert into drugstore (drugname, category) values('$venClientType','$category')";
$r = mysql_query($j);

if ($r) {
    echo "Saved";
    $rr = mysql_query("select * from drugstore where drugname='$venClientType'");
    $m = mysql_fetch_array($rr);
    $e = $m['sn'];
    saveallunits($e, $requiredqty, $minimumreorder);
} else {
    echo "Could not save.. try later";
}

function saveallunits($drugid, $reqqty, $mro) {
    $unitnames = ["requisitionborno_way", "requisitionegbe", "requisitionfalolu", "requisitiononikan", "requisitionikoyi_club", "requisitionisolo"];
    $count = 0;
    while ($count < sizeof($unitnames)) {
        $insert = "insert into " . $unitnames[$count] . " (drugid, requiredqty, qtyleft, minimumreorderlevel) values ('$drugid','$reqqty','$reqqty','$mro')";
        $r = mysql_query($insert);
        if ($r){
            
        }else{
            echo "Unit unsaved.";
        }
        $count++;
    }
}
