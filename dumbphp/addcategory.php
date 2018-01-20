<?php

include 'DBconnectPS.php';

$category = $_POST['catname'];

$r = "insert into drugcategory (categoryname) values ('$category')";
$d = mysql_query($r);

if ($d){
    echo $category . " added.";
}else{
    echo "Not saved";
}