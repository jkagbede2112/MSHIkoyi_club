<?php

include 'DBconnectPS.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$clientid = $_POST['clientid'];
$pregtype = $_POST['dbtable'];

$a = "select * from $pregtype where pregid='$clientid'";


$s = mysql_query($a);

$qq = mysql_fetch_array($s);

$name = $qq['name'];
$dateofbirth = $qq['dateofbirth'];
$emailaddress = $qq['emailaddress'];
$phonenumber = $qq['phonenumber'];
$lastmentrualperiod = $qq['lastmentrualperiod'];
$address = $qq['address'];
$status = $qq['status'];


echo "<a>$name</a><b>$dateofbirth</b><c>$emailaddress</c><d>$phonenumber</d><e>$lastmentrualperiod</e><f>$address</f><g>$status</g>";