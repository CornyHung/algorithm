<?php

function isPalindrome($x) {
    $revert = 0;
    $str_x = strval($x);
    $xConvert = '';

    for ($i= strlen($str_x) - 1; $i >= 0; $i--) { 
        // die($convertX[$i]);
        $xConvert = $xConvert.$str_x[$i];
    }

    $revert = intval($xConvert);


    return $revert === $x;
}

echo isPalindrome(-123);
