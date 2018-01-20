<?php

include 'DBconnectPS.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

$cMonth = $_POST['month'];
$cYear = $_POST['year'];

$w = mysql_query("select * from auditdisease");

while ($e = mysql_fetch_array($w)) {
    $diseasename = $e['diseasename'];
    $sn = $e['sn'];
    $valApp = "";
    $hSum = "";

    $r = mysql_query("select * from sites");
    while ($q = mysql_fetch_array($r)) {
        $sitesn = $q['id'];
        $d = "select value from auditdiseaseprofile where year='$cYear' and month='$cMonth' and diseasesn='$sn' and sitesn='$sitesn'";
        $z = mysql_query($d);
        if (mysql_num_rows($z) < 1) {
            $valApp .= "<td>0</td>";
            $hSum = $hSum + 0;
        } else {
            $dd = mysql_fetch_array($z);
            $value = $dd['value'];
            $hSum = $hSum + $value;
            $valApp .= "<td>" . $value . "</td>";
            //echo $value;
        }
        //echo $d;
    }
    echo "<tr><td>$diseasename</td>$valApp<td style='font-weight:bold'>$hSum</td></tr>";
}
