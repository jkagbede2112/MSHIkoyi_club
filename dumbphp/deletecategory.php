<?php

include 'DBconnectPS.php';

$sntodelete = $_POST['sn'];

$r = "delete from drugcategory where sn='$sntodelete'";
$e = mysql_query($r);
if ($e){
    echo "Delete successful";
}else{
    echo "Not deleted";
}