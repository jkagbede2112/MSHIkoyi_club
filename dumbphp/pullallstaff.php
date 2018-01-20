<?php
include 'DBconnectPS.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pullallstaff
 *
 * @author Joseph Kayode Agbede
 */
$oi = mysql_query("select * from staff");
$count = 1;
while ($ye = mysql_fetch_array($oi)){
    $name = $ye['firstname'] . " " . $ye['middlename'] . " " . $ye['lastname'];
    $userid = $ye['userid'];
    $dept = resolvedept($userid);
    $site = resolvesite($userid);
    $deptname = pulldeptname(resolvedept($userid));
    
    echo "<tr><td>$count</td><td>$name</td><td>$deptname</td><td>$site</td></tr>";
    $count++;
}

function pulldeptname($deptid){
    $ois = mysql_query("select * from departments where departmentid='$deptid'");
    $t = mysql_fetch_array($ois);
    
    return $t['departmentname'];
}

function resolvedept($userid){
    $iv = substr($userid, 2, 2);
    return $iv;
}

function resolvesite($userid){
    $iv = substr($userid, 0, 2);
    return $iv;
}