<?php

include 'DBconnectPS.php';

//clientname:a, clientdob:s, clientphone:d, clientservicerating:f, clientreason:g
$currdate = date('Y-m-d');

$clientname = cleaninput('clientname');
$clientdob = cleaninput('clientdob');
$clientphone = cleaninput('clientphone');
$clientrating = cleaninput('clientservicerating');
$clientreason = cleaninput('clientreason');

if (strlen($clientname) < 3 || strlen($clientdob < 7) || strlen($clientreason) < 10) {
    echo "One or more important fields empty";
    return;
}
$q = "insert into clientsurvey (clientname, clientvisitdate, clientphone, clientrating, clientreason, datetime) values ('$clientname','$clientdob','$clientphone','$clientrating','$clientreason','$currdate')";

$w = mysql_query($q);

if ($w) {
    echo "1";
} else {
    echo "0";
}
