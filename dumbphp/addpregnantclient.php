<?php

include "DBconnectPS.php";

$patname = cleaninput("patname");
$patdob = cleaninput("patdob");
$patemail = cleaninput("patemail");
$patphone = cleaninput("patphone");
$patlmp = cleaninput("patlmp");
$pathomeaddress = cleaninput("pathomeaddress");
$patstatus = cleaninput("patstatus");

$date1 = strtotime(date("Y-m-d"));
$date2 = strtotime($patlmp);
$diff = $date1 - $date2;

$weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1;

echo $weeksgone;


$a = "insert into pregnantwomen (name, dateofbirth, emailaddress, phonenumber, lastmentrualperiod, address, status) values ('$patname','$patdob', '$patemail', '$patphone', '$patlmp', '$pathomeaddress','$patstatus')";
$s = mysql_query($a);

if ($s) {
    //echo "Inserted. You are " . $weeksgone . " weeks gone";

    $weekgone = "week" . $weeksgone;
    $a = mysql_query("select sms from pregnantwomensms where week='$weekgone'");
    $q = mysql_fetch_array($a);

    //SMS Welcome
    $sms = "Congrtulations on your pregnancy and Welcome to the Mt. Sinai Hospitals ANC, over the next few weeks you will receive supportive messages from us once a week";


    $weektopic = "Welcome to Mt. Sinai Hospital ANC Platform";
    $weeknumber = "";
    $messagebody = $sms;
    $layoutmessage = "<div style='padding:50px; padding-bottom:20px; background-image: linear-gradient(#01658D,#E5E5E5);'>
            <div style='background-color:#fff; padding:10px; margin-bottom:10px; text-align:center; font-family:verdana; position:relative; border-radius:4px'>
                <img src='http://uberit.org/PurpleSourceHMS/images/womenpregnant.png' width='200' title='PW' alt='PW' style='position:absolute; display:block; left:0px; bottom:0px; z-index:2'>
                <div style='text-align: left; margin-bottom:30px'><img src='http://uberit.org/PurpleSourceHMS/images/mtsinailogo.png' width='150' alt='Mt. Sinai Hospitals' title=''></div>
                <div style='color:#01658D; margin-bottom:50px; font-size:25px; color:#DE116E; z-index:2'>$weektopic</div>
                <div style='font-size:40px; margin-bottom:10px; color:#777'>$weeknumber</div>
                <div style='padding:10px; background-color:#DE116E; margin-bottom:100px; color:#fff; font-size:12px; z-index:2;  border-radius:4px'>
                    $messagebody
                </div>
                <div style='font-size:10px; font-family:verdana; '>
                    <div><b>Should you have questions, Kindly reach out to us</b></div><br/>
                    <span style='width:15%; margin-bottom:20px; vertical-align: top; text-align: left; display:inline-block'>
                        <b style='color:#DE116E'>Yaba</b><br>
                        No 177/179 Borno-Way, <br>Ebutte Metta, Lagos <br>
                        08129458360<br>
                    </span>
                    <span style='width:15%; margin-bottom:20px; vertical-align: top; text-align: left;  display:inline-block'>
                        <b style='color:#DE116E'>Mushin</b><br>
                        32 Olanubi Street <br> Papa-Ajao, Mushin<br>
                        07011049938<br>
                    </span>
                    <span style='width:15%; margin-bottom:20px; vertical-align: top; text-align: left; display:inline-block'>
                        <b style='color:#DE116E'>Surulere</b><br>
                        30 Falolu Street, <br> Surulere<br>
                        07016566998<br>
                    </span>
                    <span style='width:15%; margin-bottom:20px; vertical-align: top; text-align: left; display:inline-block'>
                        <b style='color:#DE116E'>Egbe</b><br>
                        105 Isolo Road, <br> Hostel Bus Stop<br>
                        Ikotun-Egbe<br>
                        07016566998<br>
                    </span>
                    <span style='width:15%; margin-bottom:20px; vertical-align: top; text-align: left; display:inline-block'>
                        <b style='color:#DE116E'>Onikan</b><br>
                        19A Military Street, <br> Onikan<br>
                        07014916240<br>
                    </span>
                    <span style='width:15%; margin-bottom:20px; vertical-align: top; text-align: left; display:inline-block'>
                        <b style='color:#DE116E'>Ikoyi Club</b><br>
                        Ikoyi Club 1938, <br> Ikoyi<br>
                        <span style='font-size:8px'>Strictly for Ikoyi Club members</span><br>
                        07016995450<br>
                    </span>
                    <div style='color:#DE116E'>www.mtsinaihospitals.com</div>
                </div>
                <hr>
                <div style='font-size:10px'>
                    You have received this message because you are subscribed to Mt. Sinai Hospitals ANC platform for free. If you do not want to receive ANC messages from us in the future, kindly click <a href='#'>here</a> to unsubscribe.
                </div>
            </div>
            </div>";

    //$sms = $q['sms'];
    sendsms($patphone, $sms);
    if (strlen($patemail) > 4) {
        $mailcontent = $sms . " <br><br>Mt Sinai Team";
        //sendmail($patemail, "Welcome to Mt. Sinai Hospital ANC", $layoutmessage);
    }
    echo "Saved";
} else {
    echo "Not inserted";
}

/*
  function sendmail($recipientemail, $subject, $mailcontent) {

  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: Mt. Sinai Hospital <frontdesk@mtsinaihospitals.com>';
  $headers .= 'Reply-To: Mt. Sinai Hospital <frontdesk@mtsinaihospitals.com>';

  mail($recipientemail, $subject, $mailcontent, $headers);
  }
 * 
 */

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
