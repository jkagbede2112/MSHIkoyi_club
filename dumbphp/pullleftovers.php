<?php

include "DBconnectPS.php";

session_start();
$sitetable = $_SESSION['sitetable'];

$drugname = $_POST['drugname'];

$qw = "select qtyleft from $sitetable where drugid='$drugname'";
$wq = mysql_query($qw);
$ew = mysql_fetch_array($wq);

$qtyleft = $ew['qtyleft'];

echo $qtyleft;
