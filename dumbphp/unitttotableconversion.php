<?php

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

function updateuseractivity($updatekind, $userid, $updatenarrative) {
    $q = "insert into activitylog (action, userid, description) values ('$updatekind','$userid','$updatenarrative')";
    $w = mysql_query($q);
}
