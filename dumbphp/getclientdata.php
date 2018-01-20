<?php

include "DBconnectPS.php";

$searchcriteria = $_POST['searchcriteria'];
$searchvalue = $_POST['searchvalue'];

$a = "select * from enrolleelist where $searchcriteria like '%$searchvalue%'";
$q = mysql_query($a);

if (mysql_num_rows($q) < 1) {
    echo "<tr><td colspan='6' style='text-align:center; color:#ff0000; font-weight:bold'>Search returned nothing</td></tr>";
    return;
}

$count = 1;
while ($z = mysql_fetch_array($q)) {
    $hospitalnumber = $z['hospitalnumber'];
    $name = strtoupper($z['lastname']) . " " . $z['firstname'] . " " . $z['othername'];
    $gender = $z['gender'];
    echo "<tr><td>$count</td><td>$name</td><td>Hygeia</td><td>Gold</td><td>$gender</td><td><input type='button' value='Select' class='btn-success' onclick='checkpatient(\"$hospitalnumber\")'></td></tr>";
    $count++;
}