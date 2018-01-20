<?php

include 'DBconnectPS.php';
include 'purifyer.php';

$pImage = $_FILES['filetoupload']['name'];
$fileTmpLoc = $_FILES['filetoupload']['tmp_name'];
$pfileSize = $_FILES['filetoupload']['size'];
$pfileErrorMsg = $_FILES['filetoupload']['error'];
$pfileType = $_FILES['filetoupload']['type'];

$staffid = flushentries('staffid');
$documentid = flushentries('documentid');
$documentname = flushentries('documentname');

$picturefolder = "../HDD/psource_s/$staffid/$documentname";
$picturefolder = $picturefolder . ".jpg";

if ($pfileType === "image/jpeg" || $pfileType === "image/jpg") {
    $w = move_uploaded_file($fileTmpLoc, $picturefolder);
    if ($w) {
        $q = mysql_query("insert into staffuploadeddocument (documentid, staffid) values ('$documentid','$staffid')");
        if ($q) {
            echo "Image uploaded and saved";
        } else {
            echo "Image uploaded but path not saved";
        }
    } else {
        echo "Not uploaded";
    }
} else {
    echo "File type not supported";
}