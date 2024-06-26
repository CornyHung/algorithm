<?php
 const INT_MIN = -2147483647;
 const INT_MAX = 2147483647;

 function reverse($x) {
    echo INT_MAX < $x ? 'true' : 'false';
     if($x < INT_MIN || $x  > INT_MAX) {
         return 0;   
     }
     $current = strval($x);
     $res = '';
     $isNegative = '';
     for($i = strlen($current) - 1; $i >= 0; $i --) {
         if($current[$i] == '-') {
             $negative = '-';
             break;
         }
         $res = $res.$current[$i];
     }
     return intval($negative.$res);
 }

echo reverse(9646324351);