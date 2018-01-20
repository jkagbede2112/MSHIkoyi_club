<?php

include 'DBconnectPS.php';

//planname:planname, description:description, billingjob:billingjob

$billingjob = $_POST['billingjob'];

//Adding New Category

if ($billingjob === "savebillingplan") {
    //clientname: clientname, clientplan:clientplan;
    $clientname = $_POST['clientname'];
    $clientplan = $_POST['clientplan'];

    if (strlen($clientname) < 1 || strlen($clientplan) < 1) {
        echo "One or more fields not properly filled";
        return;
    }

    $a = "insert into billingsubscriberplan (subscriberid,subscriberplanname) values ('$clientname','$clientplan')";
    $w = mysql_query($a);
    if ($w) {
        echo "$clientplan plan saved";
    } else {
        echo "Plan not added";
    }
}

if ($billingjob === "pullclient") {
    $categoryname = $_POST['categoryname'];

    $qq = "select * from billingsubscribers where clientcategory='$categoryname'";
    $ww = mysql_query($qq);

    if (mysql_num_rows($ww) < 1) {
        echo "<option>--No Client found--</option>";
        return;
    }
    echo "<option>--Select Client--</option>";
    while ($rr = mysql_fetch_array($ww)) {
        $subscribername = $rr['subscribername'];
        $subscriberid = $rr['subscriberid'];

        echo "<option value='$subscriberid'>$subscribername</option>";
    }
}

if ($billingjob === "addnewcategory") {
    $planname = $_POST['planname'];
    $description = $_POST['description'];
    if (strlen($planname) < 1 || strlen($description) < 1) {
        echo "<br><span style='color:#ff0000'>One or more fields not filled in</span>";
        return;
    }
    //Save data to billingcategorization
    $a = "insert into billingcategorization (clientcategory, categorydescription) values ('$planname','$description')";
    $c = mysql_query($a);
    if ($c) {
        echo "New categorization saved.";
    } else {
        echo "Not saved.";
    }
}

if ($billingjob === "refreshclientcategory") {
    $q = "select * from billingcategorization order by clientcategory desc";
    $w = mysql_query($q);
    $count = 1;
    while ($e = mysql_fetch_array($w)) {
        $clientcategory = $e['clientcategory'];
        $categorydescription = $e['categorydescription'];
        $dateadded = $e['dateadded'];

        if (strlen($categorydescription) < 1) {
            $categorydescription = "--";
        }
        echo "<tr><td>$count</td><td>$clientcategory</td><td>$categorydescription</td><td>$dateadded</td><td><i class='fa fa-times ptr' style='color:#ff0000'></i></td></tr>";
        $count++;
    }
}

//