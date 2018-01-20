<?php

include 'DBconnectPS.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * clientname:clientname, clienttype:clienttype, phonenumber:phonenumber, emailaddress:emailaddress, officeaddress:officeaddress
 */

$clientname = $_POST['clientname'];
$clienttype = $_POST['clienttype'];
$phonenumber = $_POST['phonenumber'];
$emailaddress = $_POST['emailaddress'];
$officeaddress = $_POST['officeaddress'];

$f = mysql_query("insert into auditclientdetails (companyname, clienttypesn, contactphone, emailaddress, officeaddress) values ('$clientname','$clienttype','$phonenumber','$emailaddress','$officeaddress')");
 if ($f){
     echo "Saved.";
 }else{
     echo "Not saved.";
 }