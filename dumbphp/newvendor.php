<?php

include 'DBconnectPS.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * clientname:clientname, clienttype:clienttype, phonenumber:phonenumber, emailaddress:emailaddress, officeaddress:officeaddress
vendorname, contactperson, phonenumber, emailaddress, officeaddress
 *  */

$vendorname = $_POST['vendorname'];
$contactperson = $_POST['contactperson'];
$phonenumber = $_POST['phonenumber'];
$emailaddress = $_POST['emailaddress'];
$officeaddress = $_POST['officeaddress'];

$f = mysql_query("insert into vendordetails (vendorname, contactperson, contactphonenumber, emailaddress, officeaddress) values ('$vendorname','$contactperson','$phonenumber','$emailaddress','$officeaddress')");
 if ($f){
     echo "Saved";
 }else{
     echo "Not saved.";
 }
 