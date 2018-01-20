<?php

include 'DBconnectPS.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$staffid = $_SESSION['staffid'];

$schedule = $_POST['schedule'];
$date = $_POST['datte'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];

$q = "insert into staffschedule (schedule, staffid, date, starttime, endtime) values ('$schedule','$staffid','$date','$starttime','$endtime')";

$s = mysql_query($q);

if ($s){
    echo "Schedule saved";
}else{
    echo "Schedule not logged";
}