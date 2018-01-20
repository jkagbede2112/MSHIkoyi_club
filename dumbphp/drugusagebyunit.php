<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'DBconnectPS.php';

$unitname = $_POST['unity'];

$m = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

function compD($s) {
    global $m;
    $r = round(date('m') - $s);
    $cy = date('Y');
    if ($r == -1) {
        $r = 11;
        $cy = $cy - 1;
    } elseif ($r == -2) {
        $r = 10;
        $cy = $cy - 1;
    } elseif ($r == -3) {
        $r = 9;
        $cy = $cy - 1;
    } elseif ($r == -4) {
        $r = 8;
        $cy = $cy - 1;
    }
    echo $m[$r] . ", " . $cy;
}
?>
<table class="table table-bordered table-hover">
    <tr style="font-weight:500; color:#480048">
        <td></td>
        <td></td>
        <td><?php echo compD(1); ?></td>
        <td><?php echo compD(2); ?></td>
        <td><?php echo compD(3); ?></td>
        <td><?php echo compD(4); ?></td>
    </tr>
    <tr style="text-align: center">
        <td></td>
        <td></td>
        <td>N:K</td>
        <td>N:K</td>
        <td>N:K</td>
        <td>N:K</td>
    </tr>
    <?php
    $count = 1;
    $f = mysql_query("select * from auditpurchasetype");
    while ($w = mysql_fetch_array($f)) {
        $purchasetype = $w['purchasetype'];
        $purchasetypesn = $w['sn'];
        $mon = ceil(date('m'));
        $yea = date('Y');

        global $m;
        $constituents = "";

        $r = mysql_query("select * from auditpaymentcategory where purchasetypesn='$purchasetypesn'");
        while ($q = mysql_fetch_array($r)) {
            $constituents = $q['categoryname'] . "<br>";
        }

        $value = getpurchase($yea, $m[$mon - 1], $purchasetypesn);
        $value1 = getpurchase($yea, $m[$mon - 2], $purchasetypesn);
        $value2 = getpurchase($yea, $m[$mon - 3], $purchasetypesn);
        $value3 = getpurchase($yea, $m[$mon - 4], $purchasetypesn);
        //echo $value3;
        echo "<tr><td>$count</td><td><a data-toggle='popover' data-content='$constituents'>$purchasetype</a></td><td class='centeralign'>$value</td><td class='centeralign'>$value1</td><td class='centeralign'>$value2</td><td class='centeralign'>$value3</td></tr>";
        $count++;
    }

    function getpurchase($y, $m, $purchasetypesn) {
        global $unitname;
        $h = "select * from auditdrugpurchases where year='$y' and month='$m' and purchasetype='$purchasetypesn' and sitesn='$unitname'";

        $e = mysql_query($h);
        $amount = 0;
        if (mysql_num_rows($e) < 1) {
            return "0";
        } else {
            while ($qq = mysql_fetch_array($e)) {
                $amount += $qq['value'];
            }
            return $amount;
        }
        //return $h;
    }
    ?>
</table>