<?php

include 'DBconnectPS.php';

//catname:a, catdesc:b

$catname = $_POST['catname'];
$catdesc = $_POST['catdesc'];

$q = mysql_query("insert into illnesscategory (illness, aboutilless) values ('$catname','$catdesc')");

if ($q){
    echo "saved";
}else{
    echo "Not saved";
}