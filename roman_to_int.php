<?php

function romanToInt($s) {
    if(!isset($s)) {
        return 0;
    }
    $total = 0;
    $prev = 0;

    for ($i=strlen($s) - 1; $i >= 0; $i--) { 
        $current = 0;

        switch($s[$i]){
            case 'I':
            $current = 1;
            break;
            case 'V':
            $current = 5;
            break;
            case 'X':
            $current = 10;
            break;
            case 'L':
            $current = 50;
            break;
            case 'C':
            $current = 100;
            break;
            case 'D':
            $current = 500;
            break;
            case 'M':
            $current = 1000;
            break;

            default:
            $current = 0;

            }
            $total += ($current < $prev) ? -$current : $current;

            $prev = $current;

            }    
        return $total;

}

echo romanToInt('LVIII');