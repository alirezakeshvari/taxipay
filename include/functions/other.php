<?php

// Alert

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

// Time to Farsi

function timetofarsi($value)
{
    $time = explode('-', $value);
    return gregorian_to_jalali($time[0], $time[1], $time[2], '/');
}

?>