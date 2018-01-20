<?php

include 'DBconnectPS.php';
include 'purifyer.php';

$staffid = flushentries("its");
$h = mysql_query("select * from staffrequireddocuments");

while ($w = mysql_fetch_array($h)) {
    $documentid = $w['sn'];
    $documentname = $w['documentstoupload'];
    
    $t = mysql_query("select * from staffuploadeddocument where staffid='$staffid' and documentid='$documentid'");
    if (mysql_num_rows($t)>0){
        echo "<tr><td>$documentname</td><td><input type='file' id='UD$documentname'></td><td><span class='btn btn-success' onclick=\"uploadF('$documentid','$staffid','$documentname')\">Re-Upload</span></td><td><i class='fa fa-check' style='color:green'></i></td></tr>";
    }else{
        echo "<tr><td>$documentname</td><td><input type='file' id='UD$documentname'></td><td><span class='btn btn-success' onclick=\"uploadF('$documentid','$staffid','$documentname')\">Upload</span></td><td><i class='fa fa-times' style='color:red'></i></td></tr>";
    }
    
}