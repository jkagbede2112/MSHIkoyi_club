<?php

session_start();

$_SESSION['staffid'];
$_SESSION['name'];
$_SESSION['department'];

$destroyerofsessions = session_destroy();
if ($destroyerofsessions){
    header("Location: index.php");
}