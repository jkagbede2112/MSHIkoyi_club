<?php

include 'DBconnectPS.php';

//type: "0", pregid: a

$type = $_POST['type'];
$pregid = $_POST['pregid'];

if ($type === "1"){
    //echo "De-activated now going on activate. PregID " . $pregid ;
    $a = "update pregnantwomen set status='1' where pregid='$pregid'";
    $s = mysql_query($a);
    if ($s){
        echo "Updated";
    }else{
        echo "Could not update..try again later";
    }
}else{
    //echo "Activated.. going on de-activate.  PregID " . $pregid;
    $a = "update pregnantwomen set status='0' where pregid='$pregid'";
    $s = mysql_query($a);
    if ($s){
        echo "Updated";
    }else{
        echo "Could not update..try again later";
    }
}