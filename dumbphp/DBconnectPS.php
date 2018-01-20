<?php

mysql_connect("localhost", "root", "") or die("Cannot find database server");
mysql_select_db("purplesource") or die("Cannot reach database");

function getsitetable($a) {
    if ($a === "FA") {
        return "requisitionfalolu";
    }
    if ($a === "BW") {
        return "requisitionborno_way";
    }
    if ($a === "EG") {
        return "requisitionegbe";
    }
    if ($a === "IC") {
        return "requisitionikoyi_club";
    }
    if ($a === "MU") {
        return "requisitionmushin";
    }
}

function converttotable($val) {
    if ($val === "#BornoWay") {
        return "requisitionborno_way";
    } elseif ($val === "#Egbe") {
        return "requisitionegbe";
    } elseif ($val === "#Falolu") {
        return "requisitionfalolu";
    } elseif ($val === "#Onikan") {
        return "requisitiononikan";
    } elseif ($val === "#Surulere") {
        return "requisitionisolo";
    } elseif ($val === "#Ikoyi_club") {
        return "requisitionikoyi_club";
    }
}

function cleaninput($a) {
    $q = $_POST[$a];
    $w = strip_tags($q);

    return $w;
}

function getreminders($username) {

    $todaysdate = date("Y-m-j");
    $s = "select * from staffreminder where recipientid='$username' and remindstartdate ";

    $d = mysql_query($s);
    if (mysql_num_rows($d) > 0) {
        while ($f = mysql_fetch_array($d)) {
            $remindnote = $f['remindnote'];
            $issuer = $f['issuer'];

            $sa = "select * from staff where id='$issuer'";
            $da = mysql_query($sa);
            $qw = mysql_fetch_array($da);

            $department = $qw['department'];
            $wqwq = "select * from departments where id='$department'";
            $qqw = mysql_query($wqwq);
            $qqqq = mysql_fetch_array($qqw);

            $departmentid = $qqqq['departmentid'];
            $name = $qw['firstname'] . " " . $qw['lastname'];

            echo "<div class = 'rem'><span class = 'remC' title = '$name'>$departmentid</span>$remindnote</div>";
        }
    } else {
        echo "<div class = 'rem'><span class = 'remC' title = 'No reminder today'></span>No reminder(s) today</div>";
    }
}

$title = "PurpleSource HMS";
$commentheader = "Developed by Joseph Kayode Agbede for Mt. Sinai Hospital Ebutte-Metta. 10 - 3 - 2016.";

function getleftUnits() {

    //$ch = curl_init("http://api.ebulksms.com/balance/jkagbede@gmail.com/5bb956b300677d8dfc12bf741547c5c1cddb3418");
    //$response = curl_exec($ch);
    //curl_close($ch);

    //var_dump($response);
}

function sendmail($recipientemail, $subject, $mailcontent) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: frontdesk@mtsinaihospitals.com" . "\r\n" .
            "Reply-To: frontdesk@mtsinaihospitals.com" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

    mail($recipientemail, $subject, $mailcontent, $headers);
}

function sendsms($to, $message) {
    $toq = urlencode($to);
    //$api_username = urlencode("jkagbede@gmail.com");
    //$apikey = "44178ffdbd6b3c60b028646d60419ae1588da988";
    $messagew = urlencode(strip_tags("$message"));
    $sender = "Mt Sinai";
    $from = urlencode("$sender");
    //Cloudware dets
    $user = urlencode("62592108");
    $password = urlencode("Gbegi_123");
    $type = urlencode("0");

    //echo $hiiii;
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    //$ch = curl_init();
    ////SMARTSMS gateway ish
    $username = urlencode("mshosipitals");
    $password = urlencode("2xvb95n");
    $sender = urlencode("Mt Sinai");
    //$message = urlencode("Welcome to Mt. Sinai platform");
    //
//Gateway for SmartSMSSolutions
    $cha = curl_init("http://api.smartsmssolutions.com/smsapi.php?username=$username&password=$password&sender=$sender&recipient=$toq&message=$messagew");

//Gateway for EbulkSMS    
//$cha = curl_init("http://api.ebulksms.com/sendsms?username=$api_username&apikey=$apikey&sender=$from&messagetext=$messagew&flash=0&recipients=$toq");

////Gateway for cloudsms    
////$cha = "http://developers.cloudsms.com.ng/api.php?userid=$user&password=$password&type=$type&destination=$to&sender=$from&message=$message";
    //curl_setopt($ch, CURLOPT_URL, $cha);

    $response = curl_exec($cha);
    curl_close($cha);
}
