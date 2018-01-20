<?php

include 'DBconnectPS.php';

$unitname = $_POST['unitname'];

if ($unitname === "#BornoWay") {
    getdata("requisitionborno_way");
} elseif ($unitname === "#Egbe") {
    getdata("requisitionegbe");
} elseif ($unitname === "#Falolu") {
    getdata("requisitionfalolu");
} elseif ($unitname === "#Onikan") {
    getdata("requisitiononikan");
} elseif ($unitname === "#Mushin") {
    getdata("requisitionmushin");
} elseif ($unitname === "#Ikoyi_club") {
    getdata("requisitionikoyi_club");
}

function getdata($sitetable) {
    $e = "select * from " . $sitetable;
    $w = mysql_query($e);
    $count = 1;
    $echostatement = "";
    while ($q = mysql_fetch_array($w)) {
        $r = $q['drugid'];
        $requiredquantity = $q['requiredqty'];
        $qtyleft = $q['qtyleft'];
        $mro = $q['minimumreorderlevel'];
        
        $itemstoorder = $requiredquantity - $qtyleft;

        if ($qtyleft <= $mro) {
            $status = "Re-order";
        } else {
            $status = "<i style='color:green'>OK</i>";
        }

        $c = "select * from drugstore where sn='$r'";
        $v = mysql_query($c);
        $b = mysql_fetch_array($v);
        $catid = $b['category'];
        $drugname = $b['drugname'];

        $ew = mysql_query("select categoryname from drugcategory where sn='$catid'");
        $d = mysql_fetch_array($ew);
        $catn = $d['categoryname'];
        if ($status === "Re-order") {
            $echostatement .= "<tr style='color:#666666'><td>$count</td><td><i class='fa fa-close ptr' title='Delete $drugname in $catn category' onclick='DelDinC(\"$drugname\", \"$catn\", \"$r\")'></i></td><td> <i class='fa fa-sitemap ptr' title='Update $drugname $catn'  data-toggle='modal' data-target='#myModal' onclick=\"updatedruginfo('$drugname','$catn','$r','$sitetable')\"></td><td id='rsdDN$count'>$drugname</td><td id='rsdIC$count'>$catn</td><td id='rsdRQ$count'>$requiredquantity</td><td>$mro</td><td id='rsdQTL$count'>$qtyleft</td><td style='font-size:11px'>$status</td><td><i class='fa fa-bolt' title='Re-Stock item' style='cursor:pointer' data-toggle='modal' data-target='#myModal' onclick='ResDinC(\"$drugname\", \"$catn\", \"$r\", \"$catid\",\"$itemstoorder\")'></i></td></tr>";
        } else {
            $echostatement .= "<tr style='color:#666666'><td>$count</td><td><i class='fa fa-close ptr' title='Delete $drugname in $catn category' onclick='DelDinC(\"$drugname\", \"$catn\", \"$r\")'></i></td><td> <i class='fa fa-sitemap ptr' title='Update $drugname $catn'  data-toggle='modal' data-target='#myModal' onclick=\"updatedruginfo('$drugname','$catn','$r','$sitetable')\"></td><td id='rsdDN$count'>$drugname</td><td id='rsdIC$count'>$catn</td><td>$requiredquantity</td><td>$mro</td><td>$qtyleft</td><td style='font-size:11px'>$status</td><td></td></tr>";
        }

        $count++;
    }
    echo $echostatement;
}
