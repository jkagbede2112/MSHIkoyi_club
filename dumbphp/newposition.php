<?php

include 'DBconnectPS.php';
include 'purifyer.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * title:s, ddescription:a
 */

$jobtitle = flushentries('title');
$jobdescription = trim($_POST['description']);

if (strlen($jobtitle) < 1 || strlen($jobdescription) < 1) {
    echo "Fill all fields";
} else {
    $r = "insert into jobdetail (jobtitle, jobdescription) values ('$jobtitle','$jobdescription')";
    $w = mysql_query($r);

    if ($w) {
        echo "New position saved";
    }else{
        echo "Position already exists";
    }
}