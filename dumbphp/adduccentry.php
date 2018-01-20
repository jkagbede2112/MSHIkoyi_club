<?php

include 'DBconnectPS.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$uccvalue = $_POST['uccvalues'];
$uccmonths = $_POST['uccmonths'];
$uccyears = $_POST['uccyears'];
$uccsites = $_POST['uccsites'];

$r = "insert into auditprivatepayments (siteid, value, month, year) values ('$uccsites','$uccvalue','$uccmonths', '$uccyears')";
$e = mysql_query($r);

if ($e) {
    echo "Saved";
} else {
    echo "Not saved";
}