<?php

include "DBconnectPS.php";

$searchcriteria = strtolower($_POST['searchcriteria']);
$searchvalue = $_POST['searchvalue'];
$companyname = $_POST['companyname'];

$qq = "select * from enrolleelist where $searchcriteria like '%$searchvalue%'";
$ww = mysql_query($qq);
$num = mysql_num_rows($ww);

$preparedisplay = "<div><span style='font-size:60px; font-weight:400'>$num</span> result(s) found for $searchcriteria - <span style='font-size:20px'>$searchvalue</span> </div>";

while ($q = mysql_fetch_array($ww)) {
    $memberid = $q['memberid'];
    $lastname = $q['lastname'];
    $firstname = strtolower($q['firstname']);
    $othername = strtolower($q['othername']);
    $gender = $q['gendername'];
    $legacycode = $q['legacycode'];
    $dependantid = $q['dependantid'];
    $company = $q['company'];
    $month = $q['month'];
    $year = $q['year'];
    $groupname = $q['groupname'];
    $planname = $q['planname'];
    $name = $lastname . " " . $firstname . " " . $othername;

    $preparedisplay .= "<div class='frontdesklist'>".
            "<span style='font-size:16px'><span style='font-size:25px; color:#3D003D'>$name</span><br/>".
            "<span style='color:#0099FF'>$gender</span><br/>$groupname<br/><b>MemberID -</b> $memberid<br/>".
            "<b>Dependant ID -</b> $dependantid<br/> <b>Plan name - </b> $planname".
            "</span></div>";

}

echo $preparedisplay;
