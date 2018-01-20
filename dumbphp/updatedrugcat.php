<?php

include 'DBconnectPS.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * drugname:a, sn:b
 */
$drugname = $_POST['drugname'];
$drugsn = $_POST['sn'];

$r = "update drugcategory set categoryname='$drugname' where sn='$drugsn'";
$e = mysql_query($r);
if ($e){
    echo "Updated";
}else{
    echo "Not updated.. contact developer";
}