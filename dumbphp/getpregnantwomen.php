<?php

include 'DBconnectPS.php';

$q = "select * from pregnantwomen";
$w = mysql_query($q);
$count = 1;

while ($a = mysql_fetch_array($w)) {
    $pregid = $a['pregid'];
    $name = $a['name'];
    $dateofbirth = $a['dateofbirth'];
    $email = $a['emailaddress'];
    $phonenumber = $a['phonenumber'];
    $lmp = $a['lastmentrualperiod'];
    $status = $a['status'];
    $givenbirth = $a['givenbirth'];

    if ($givenbirth === "1") {
        $dategivenbirth = $a['dategivenbirth'];

        $date1 = strtotime(date("Y-m-d"));
        $givenbirthdate = strtotime($dategivenbirth);

        //pregnant
        $diff = $date1 - $givenbirthdate;

        $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1 . "wk(s)";
        if ($status === "1") {
            echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td><span style='color:#4CAE4C'>D</span> - $weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-off ptr' style='color:green; font-weight:bold' title='De-Activate client' onclick='deactivatepreg($pregid)'></i></td><td></td></tr>";
        } else {
            echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td><span style='color:#4CAE4C'>D</span> - $weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-on ptr' style='color:red; font-weight:bold' title='Activate client' onclick='activatepreg($pregid)'></i></td><td></td></tr>";
        }
        $count++;
    } else {
        $dategivenbirth = $a['dategivenbirth'];

        $date1 = strtotime(date("Y-m-d"));
        $date2 = strtotime($lmp);
        $givenbirthdate = strtotime($givenbirth);

        //pregnant
        $diff = $date1 - $date2;

        //Post-pregnant


        $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1 . "wk(s)";
        if ($status === "1") {
            echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td><span style='color:#3D003D'>Pr</span> - $weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-off ptr' style='color:green; font-weight:bold' title='De-Activate client' onclick='deactivatepreg($pregid)'></i></td><td><span class='delvrd'  data-toggle='modal' data-target='#myMode' onclick='deliverclient($pregid)'>D</span></td></tr>";
        } else {
            echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td><span style='color:#3D003D'>Pr</span> - $weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-on ptr' style='color:red; font-weight:bold' title='Activate client' onclick='activatepreg($pregid)'></i></td><td><span class='delvrd'  data-toggle='modal' data-target='#myMode' onclick='deliverclient($pregid)'>D</span></td></tr>";
        }
        $count++;
    }
}

/*
while ($a = mysql_fetch_array($w)) {
    $pregid = $a['pregid'];
    $name = $a['name'];
    $dateofbirth = $a['dateofbirth'];
    $email = $a['emailaddress'];
    $phonenumber = $a['phonenumber'];
    $lmp = $a['lastmentrualperiod'];
    $status = $a['status'];


    $date1 = strtotime(date("Y-m-d"));
    $date2 = strtotime($lmp);
    $diff = $date1 - $date2;

    $weeksgone = floor($diff / (7 * 24 * 60 * 60)) + 1 . "wk(s)";
    if ($status === "1") {
        echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td>$weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-off ptr' style='color:green; font-weight:bold' title='De-Activate client' onclick='deactivatepreg($pregid)'></i></td></tr>";
    } else {
        echo "<tr><td>$count</td><td class='ptr' title='LMP : $lmp'>$name</td><td>$weeksgone</td><td>$phonenumber</td><td><i class='fa fa-times ptr red' title='Delete record' data-toggle='modal' data-target='#myMode' onclick='delpregrequest($pregid)'></i></td><td><i class='fa fa-pencil-square-o ptr' data-toggle='modal' data-target='#myMode' onclick='getpregdets($pregid)'></i></td><td><i class='fa fa-toggle-on ptr' style='color:red; font-weight:bold' title='Activate client' onclick='activatepreg($pregid)'></i></td></tr>";
    }
    $count++;
}
 * 
 */