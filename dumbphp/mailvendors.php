<?php

include 'DBconnectPS.php';

$vendorid = $_POST['vendorid'];
$sitename = $_POST['sitename'];

if ($sitename === "--" || $vendorid === "") {
    echo "Unit name is required";
} else {
    $sitename = "requisition" . strtolower($sitename);

    $r = "select * from vendordetails where sn='$vendorid'";
    $q = mysql_query($r);
    $w = mysql_fetch_array($q);

    $vendoranchorname = $w['contactperson'];
    $contactphone = $w['contactphonenumber'];
    $contactemail = $w['emailaddress'];

    //Get requisitioninfo per site;

    $a = "select * from " . $sitename . " where qtyleft < minimumreorderlevel";
    $b = mysql_query($a);

    $ds = mysql_num_rows($b);

    $mailbody = "Dear " . $vendoranchorname . ",<br/><br/> Kindly supply the following items immediately <br/>";
    $itemstocollect = "$mailbody<table style=''><tr><td></td><td>Item</td><td>Category</td><td>Quantity</td></tr>";
    $count = 1;
    while ($c = mysql_fetch_array($b)) {
        $drugid = $c['drugid'];
        $requiredqty = $c['requiredqty'];
        $qtyleft = $c['qtyleft'];
        $qtytoorder = $requiredqty - $qtyleft;

        //Pull drug details
        $drugname = mysql_query("select drugname, category from drugstore where sn='$drugid'");
        $ww = mysql_fetch_array($drugname);
        $drugnameq = $ww['drugname'];
        $drugcategory = $ww['category'];

        //Pull drug category
        $categoryname = mysql_query("select * from drugcategory where sn='$drugcategory'");
        $catName = mysql_fetch_array($categoryname);
        $categoName = $catName['categoryname'];

        $itemstocollect .= "<tr><td>$count</td><td>$drugnameq</td><td>$categoName</td><td>$qtytoorder</td></tr>";
        $count++;
    }
    $itemstocollect = $itemstocollect . "</table><br/><br/>Kind regards,";

    
    if ($ds > 0) {
        echo "Mail has been sent out";
        //Call mail function here
    //mail_attachment();
    } else {
        echo "There are no items in this unit needing to be ordered";
    }
}

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path . $filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
    $header .= "Reply-To: " . $replyto . "\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--" . $uid . "\r\n";
    $header .= "Content-Type: text/html; charset=iso-8859-1\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message . "\r\n\r\n";
    $header .= "--" . $uid . "\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
    $header .= $content . "\r\n\r\n";
    $header .= "--" . $uid . "--";
    if (mail($mailto, $subject, "", $header)) {
        echo "OK"; // or use booleans here
        //Send Vendor SMS here..
    } else {
        echo "ERROR!";
    }
}
