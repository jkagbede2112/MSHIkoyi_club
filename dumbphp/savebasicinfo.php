<?php

include 'DBconnectPS.php';
include 'purifyer.php';


$errorcount = 0;
$errorreport = "<span style='color:red'>";

$site = flushentries('site');
$department = flushentries('department');
$jobtitle = flushentries('jobtitle');
$firstname = flushentries('firstname');
$middlename = flushentries('middlename');
$lastname = flushentries('lastname');
$dob = flushentries('dob');
$maritalstatus = flushentries('maritalstatus');
$gender = flushentries('gender');
$stateoforigin = flushentries('stateoforigin');
$phonenumber = flushentries('phonenumber');
$emailaddress = flushentries('emailaddress');
$homeaddress = flushentries('homeaddress');
$highestqualification = flushentries('highestqualification');

if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) === false) {
    
} else {
    $errorcount++;
    $errorreport .= "$emailaddress is not a valid email address <br/>";
}

if ($errorcount > 0) {
    $errorreport .= "</span>";
    echo $errorreport;
    return;
}

//Initial password for user generated here.
$password = chr(rand(65, 90)) . chr(rand(97, 122)) . chr(rand(65, 90)) . rand(65, 90) . chr(rand(65, 90)) . rand(65, 90);
$pts = md5($password);

$userid = $site . $department . rand(1000, 2000);
$dirpath = "HDD/psource_s/" . $userid;
//echo $userid;

$s = "insert into staff (userid, staffid, unecnryptedpass, password, firstname, middlename, lastname, department, siteid, role, jobdetail, maritalstatus, gender, emailaddress, phonenumber, homeaddress, highestqualification, dirpath, syncstatus) "
        . "values('$userid','$userid','$password','$pts','$firstname','$middlename','$lastname','$department','$site','$department','$jobtitle','$maritalstatus','$gender','$emailaddress','$phonenumber','$homeaddress','$highestqualification','$dirpath','0')";
       
echo $s;

$as = mysql_query($s);
$subject = 'A Mt. Sinai Portal Account has been opened for you.';
$mailbody = "Dear $lastname, <br> A Mt. Sinai portal account has been created for you. Below are your log in details. <br/><br/>"
        . "Username(Your email address) - $emailaddress<br/>"
        . "Password - $password <br/><br/>"
        . "Kindly change your password ASAP.<br/><br/>"
        . "Kind regards,<br/>"
        . "Human Resource Manager.";
$smsbody = "Your Mt. Sinai EMS username is $emailaddress and password is $password";
if ($as) {
    $sa = mysql_query("insert into pensiondetails (staffid) values('$userid')");
    //Initiate Bank record.
    $sad = mysql_query("insert into bankdetails (staffid) values('$userid')");
    //Initiate Next Of Kin Information
    $sad = mysql_query("insert into nokdetails (staffid) values('$userid')");
    mkdir("../" . $dirpath);
    echo "1";
    //mail user//////////////////////////////////
    mailuser($emailaddress,$subject,$mailbody);
    sendsms($phonenumber, $smsbody);
} else {
    echo "0";
}

function mailuser($to, $subject, $message) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: frontdesk@mtsinaihospitals.com" . "\r\n" .
            "Reply-To: frontdesk@mtsinaihospitals.com" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();
    mail($to, $subject, $message, $header);
}

function sendsmsx($to, $message) {
    $toq = urlencode($to);
    $api_username = urlencode("jkagbede@gmail.com");
    $apikey = "5bb956b300677d8dfc12bf741547c5c1cddb3418";
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
    //$cha = curl_init("http://api.ebulksms.com:8080/sendsms?username=$api_username&apikey=$apikey&sender=$from&messagetext=$messagew&flash=0&recipients=$toq");
    //$cha = "http://developers.cloudsms.com.ng/api.php?userid=$user&password=$password&type=$type&destination=$to&sender=$from&message=$message";
    //curl_setopt($ch, CURLOPT_URL, $cha);

    $response = curl_exec($cha);
    echo $response;
    curl_close($cha);
}
