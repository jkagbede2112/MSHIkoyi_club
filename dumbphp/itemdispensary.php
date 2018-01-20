<?php

include "DBconnectPS.php";

//drugcategory: drugcategory, drugsincatt: drugsincatt, quantityrequested: quantityrequested

session_start();
$sitetable = $_SESSION['sitetable'];
$department = $_SESSION['department'];
$name = $_SESSION['name'];
$staffid = $_SESSION['staffid'];
$username = $_SESSION['name'];
$siteid = $_SESSION['siteid'];

$drugcategory = $_POST['drugcategory'];
$drugsincatt = $_POST['drugsincatt'];
$quantityrequested = $_POST['quantityrequested'];
$patientname = $_POST['patientname'];
$patientid = $_POST['patientid'];

//echo ">>>".$patientid . "<<<";

$selec = "select lastname from enrolleelist where hospitalnumber='$patientid'";
$a = mysql_query($selec);
if (mysql_num_rows($a)<1){
    echo "Invalid Patient ID";
    return;
}

$q = mysql_query("select * from $sitetable where drugid='$drugsincatt'");
$w = mysql_fetch_array($q);

$qtyleft = $w['qtyleft'];

$calc = $qtyleft - $quantityrequested;

if ($calc < 0) {
    echo "You cannot dispense $quantityrequested, you have $qtyleft left";
    return;
}

$ss = "insert into drugsusage (SiteID, patientID, DrugID, InitialQty, QtyDispensed, QtyLeft, userid) values ('$siteid','$patientname', '$drugsincatt', '$qtyleft', '$quantityrequested', '$calc', '$staffid')";
$dd = mysql_query($ss);

if ($dd) {
    echo "Dispense successful.<br/><span style='font-size:30px'> $calc left in store</span>";
    $aa = "update $sitetable set qtyleft ='$calc' where drugid='$drugsincatt'";
    $qqm = mysql_query($aa);
} else {
    echo "<div style='color:red; font-size:25px'>Not dispensed.</div> This record may have been entered before";
}