<?php

include 'DBconnectPS.php';
//content: chroniccontent, illnesscategory: a
$content = $_POST['content'];
$illnesscategory = $_POST['illnesscategory'];


$a = "select * from addillcategory where clientillcategory='$illnesscategory'";

$s = mysql_query($a);
$clientcount = mysql_num_rows($s);
while ($z = mysql_fetch_array($s)) {
    $clientphone = $z['clientphone'];
    sendsms($clientphone, $content);
}

$x = "insert into chronicmessages(illnesscategory, recipientnumber, messagecontent) values ('$illnesscategory','$clientcount','$content')";
$a = mysql_query($x);