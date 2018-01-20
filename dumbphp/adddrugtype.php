<?php

include 'DBconnectPS.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$category = $_POST['category'];
$sd = $_POST['type'];

$hasd = "insert into auditpaymentcategory (categoryname, purchasetypesn) values ('$sd','$category')";
$t = mysql_query($hasd);
if ($t){
    echo "Saved";
}else{
    echo $category . " " . $sd;
}