<?php

include 'DBconnectPS.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$r = mysql_query("select * from auditclientdetails order by companyname asc");
echo "<option>--Select Client--</option>";
while ($w = mysql_fetch_array($r)) {
    $clientname = $w['companyname'];
    $clientid = $w['sn'];
    echo "<option value='$clientid'>$clientname</option>";
}
