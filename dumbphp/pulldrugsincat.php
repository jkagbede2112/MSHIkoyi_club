<?php

include 'DBconnectPS.php';

session_start();
$siteid = $_SESSION['siteid'];

$sitetable = getsitetable($siteid);

$drugcategory = $_POST['drugcategory'];

$a = "select * from drugstore where category='$drugcategory'";
$x = mysql_query($a);
$optionvalues = "<option>--Select--</option>";
while ($v = mysql_fetch_array($x)){
    $drugsn = $v['sn'];
    $drugname = $v['drugname'];
    
    $sel = mysql_query("select * from $sitetable where drugid='$drugsn'");
    if (mysql_num_rows($sel)>0){
        $optionvalues .= "<option value='$drugsn'>$drugname</option>";
    }
}

echo $optionvalues;

/*
$gg = "select * from $sitetable where category ='$drugcategory'";
echo $gg;


$getdrugfromcategory = mysql_query($gg);

echo "<option>--Select--</option>";
while ($ww = mysql_fetch_array($getdrugfromcategory)) {
    $drugname = $ww['drugname'];
    $drugsn = $ww['sn'];

    $a = "select * from $unitTable where drugid='$drugsn'";
    $s = mysql_query($a);

    while ($q = mysql_fetch_array($s)) {
        $sn = $q['sn'];
        $drugid = $q['drugid'];

        $getfromdrugstore = "select * from drugstore where sn='$drugid'";
        $qqqw = mysql_query($getfromdrugstore);
        $drugname = mysql_fetch_array($qqqw);
        $drgname = $drugname['drugname'];

        echo "<option value='$sn'>$drgname</option>";
    }
}
 * 
 */
