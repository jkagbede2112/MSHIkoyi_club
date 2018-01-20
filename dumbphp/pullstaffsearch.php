<?php
include 'DBconnectPS.php';
include 'purifyer.php';

$val = flushentries('its');

$i = "select * from staff where staffid like '%$val%' or middlename like '%$val%' or lastname like '%$val%' or lastname  like '%$val%' or emailaddress like '%$val%' order by lastname asc";
$w = mysql_query($i);

$count = 1;
while ($rere = mysql_fetch_array($w)){
    $staffname = strtoupper($rere['lastname']) ." ". $rere['firstname'] . " " . $rere['middlename'];
    $staffid = $rere['staffid'];
    $userid = $rere['userid'];
    $dept = resolvedept($staffid);
    $site = resolvesite($userid);
    $deptname = pulldeptname(resolvedept($userid));
    
    echo "<tr><td>$count</td><td>$staffname</td><td>$site</td><td>$deptname</td><td><i class='fa fa-upload ptr' onclick=\"pullifu('$staffid')\"></i></td></tr>";
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