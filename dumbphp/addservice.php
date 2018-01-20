<?php

include 'DBconnectPS.php';

$servicekind = $_POST['servicekind'];

if ($servicekind === "category") {
    $servicevalue = $_POST['servicevalue'];
    $servicedescription = $_POST['servicedescription'];

    echo $servicedescription . " - " . $servicevalue;

    if (strlen($servicevalue) < 2) {
        echo "Enter a category name";
        return;
    } else {
        if (strlen($servicedescription) < 5) {
            echo "Enter category description";
            return;
        }
        $a = "insert into billingservicecategory (servicename, servicedescription) value ('$servicevalue','$servicedescription')";
        $s = mysql_query($a);
        if ($s) {
            echo "Saved";
        } else {
            echo "Not saved.";
        }
    }
}

if ($servicekind === "serviceelement") {
    //servicecategory: a, serviceelement: b

    $servicecategory = $_POST['servicecategory'];
    $serviceelement = $_POST['serviceelement'];

    $z = "insert into billingservicecategoryelement (categoryid, elementname) value ('$servicecategory','$serviceelement')";
    $xz = mysql_query($z);
    
    if ($xz){
        echo "Saved";
    }else{
        echo "Not saved";
    }
}

if ($servicekind === "pullcategorylist") {
    $z = "select * from billingservicecategory";
    $x = mysql_query($z);

    $count = 1;
    while ($e = mysql_fetch_array($x)) {
        $servicename = $e['servicename'];
        $serviceid = $e['serviceid'];
        echo "<tr><td>$count</td><td>$servicename</td><td><i class='fa fa-times red ptr'></i></td><td></td></tr>";
        $count++;
    }
}