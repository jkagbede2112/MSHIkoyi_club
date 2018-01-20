<?php

$mailaddress = "jkagbede@gmail.com";
$subject = "Testing cronjobs";
$mailbody = "Hi there this works";
$header = "";

mail($mailaddress, $subject, $mailbody, $header);


