<?php

include 'DBconnectPS.php';
include 'purifyer.php';

$jobsn = flushentries("jobsn");

$w = mysql_query("select * from jobdetail where sn='$jobsn'");
$e = mysql_fetch_array($w);

$jobtitle = $e['jobtitle'];
$jobdescription = $e['jobdescription'];

echo "<a>$jobtitle</a><s>$jobdescription</s>";