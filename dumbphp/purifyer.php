<?php

function flushentries($entry) {
    $val = $_POST[$entry];
    $val = strip_tags($val);
    return $val;
}