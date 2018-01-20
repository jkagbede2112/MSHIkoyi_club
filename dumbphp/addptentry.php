<?php

include 'DBconnectPS.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * ptvalues:ptvalues, ptmonths:ptmonths, ptyears:ptyears, ptsites:ptsites, ptypes:ptypes
 */

$ptvalue = $_POST['ptvalues'];
$ptmonths = $_POST['ptmonths'];
$ptyears = $_POST['ptyears'];
$ptsites = $_POST['ptsites'];
$ptypes = $_POST['ptypes'];

$r = "insert into auditdrugpurchases (purchasetype, sitesn, value, month, year) values ('$ptypes','$ptsites','$ptvalue','$ptmonths', '$ptyears')";
$e = mysql_query($r);

if ($e){
    echo "Saved";
}else{
    echo "Not saved";
}