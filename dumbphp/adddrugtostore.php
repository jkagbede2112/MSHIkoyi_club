<?php

include 'DBconnectPS.php';

session_start();
$databasetable = getsitetable($_SESSION['siteid']);

$drugid = $_POST['drugid'];

$zxz = "select * from drugstore where ";

$a = "insert into $databasetable (drugid, requiredqty, qtyleft, minimumreorderlevel) values ('$drugid','0','0','0')";
echo $a;

$q = mysql_query($a);

if ($q){
    echo "Saved";
}else{
    echo "Not saved";
}