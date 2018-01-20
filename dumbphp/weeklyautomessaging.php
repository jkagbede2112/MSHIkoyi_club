<?php

include "DBconnectPS.php";

//include "welcometoanc.php";

$fetchpregnantwomen = "select * from pregnantwomen where status='1' and givenbirth='0'";
$qf = mysql_query($fetchpregnantwomen);
$qwq= mysql_num_rows($qf);
$datet = date('j-M-Y');
$pregnant = "<div style='margin-bottom:40px; text-align:center; font-size:30px'>ANC SMS Report for $datet</div><div style='margin-top:40px; font-size:25px; margin-bottom:10px'>$qwq Pregnant Patients</div><table style='width:100%' border='1'>";
$count = 1;
while ($ad = mysql_fetch_array($qf)) {

    $name = $ad['name'];
    $emailaddress = $ad['emailaddress'];
    $patphone = $ad['phonenumber'];
    $patlmp = $ad['lastmentrualperiod'];
    $date1 = strtotime(date("Y-m-d"));
    $date2 = strtotime($patlmp);

    $diff = $date1 - $date2;

    $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1;
    if ($weeksgone < 5) {
        return;
    }

    $weekgone = "week" . $weeksgone;
    $a = mysql_query("select sms from pregnantwomensms where week='$weekgone'");
    $q = mysql_fetch_array($a);
    $sms = $q['sms'];
    $weeknumber = $weeksgone;

    $messagebody = $sms;
    $subject = "Mt. Sinai ANC support message for week $weeknumber";
    $weektopic = "Mt. Sinai ANC message";

    $gg = sendsmssolution($patphone, $messagebody, $name);
    $pregnant .= "<tr><td>$count</td><td>$name</td><td>$patphone</td><td>$weekgone</td><td>$messagebody</td><td>$gg</td></tr>";
    $count++;
}
$pregnant .="</table>";
echo $pregnant;

//Post pregnant women
$fetchpregnantwomen = "select * from pregnantwomen where status='1' and givenbirth='1'";
$qf = mysql_query($fetchpregnantwomen);
$rr = mysql_num_rows($qf);
$count = 1;
$pregnantd = "<div style='margin-top:40px; font-size:25px; margin-bottom:10px'>$rr Delivered Patients</div><table style='width:100%' border='1'>";
while ($ad = mysql_fetch_array($qf)) {
    $name = $ad['name'];
    $emailaddress = $ad['emailaddress'];
    $patphone = $ad['phonenumber'];
    $patlmp = $ad['dategivenbirth'];
    $date1 = strtotime(date("Y-m-d"));
    $date2 = strtotime($patlmp);

    $diff = $date1 - $date2;

    $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1;

    $weekgone = "week" . $weeksgone;
    $a = mysql_query("select sms from pregnantwomendelivered where week='$weekgone'");
    $q = mysql_fetch_array($a);
    $sms = $q['sms'];
    $weeknumber = $weeksgone;

    $messagebody = $sms;
    $subject = "Mt. Sinai ANC support message for week $weeknumber";

    $weektopic = "Mt. Sinai ANC message";

    $ret = sendsmssolution($patphone, $messagebody, $name);
    $pregnantd .= "<tr><td>$count</td><td>$name</td><td>$patphone</td><td>$weekgone</td><td>$messagebody</td><td>$ret</td></tr>";
    $count++;
}
$pregnantd .= "</table>";
echo $pregnantd;

function sendsmssolution($to, $message, $name) {
    $toq = urlencode($to);
    $messagew = urlencode("$message");
    $sender = urlencode("Mt Sinai");
    $from = $sender;

//smartSMSsolutions
    $username = urlencode("mshosipitals");
    $password = urlencode("2xvb95n");
    $cha = curl_init("http://api.smartsmssolutions.com/smsapi.php?username=$username&password=$password&sender=$sender&recipient=$toq&message=$messagew");
    $response = curl_exec($cha);

    curl_close($cha);
}

function mailm(){
        /*
      $mailmessage = "<div style='padding:50px; padding-bottom:20px; background-image: linear-gradient(#01658D,#E5E5E5);'>

      <div style='background-color:#fff; padding:10px; margin-bottom:10px; text-align:center; font-family:verdana; position:relative; border-radius:4px'>

      <img src='../images/womenpregnant.png' width='200' style='position:absolute; left:0px; bottom:0px; z-index:2'>

      <div style='text-align: left; margin-bottom:30px'><img src='http://uberit.org/PurpleSourceHMS/images/mtsinailogo.png' width='150' alt='Mt. Sinai Hospitals'></div>

      <div style='color:#01658D; margin-bottom:50px; font-size:25px; color:#DE116E; z-index:2'>$weektopic</div>

      <div style='font-size:40px; margin-bottom:10px; color:#777'>Week $weeknumber</div>

      <div style='padding:20px; background-color:#DE116E; margin-bottom:100px; color:#fff; font-size:14px; z-index:2; line-height:160%; border-radius:4px'>

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
     */

}