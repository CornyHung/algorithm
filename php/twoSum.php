<?php

// function twoSum($nums, $target) {
//     // var_dump(count($nums));die;
//     $arrKey = [];
//     for($i = 0; $i <= count($nums); $i++) {
//         for($j = 0; $j <= count($nums); $j ++) {
//             // if($nums[$i] + $nums[$j] === $target) {
//             //     $arrKey = [$i, $j];
//             //     break;
//             // }
//             // continue;
//             $num2nd = $target - $nums[$i];
//             $key = array_search($num2nd, $nums);
//             // var_dump($key);die;
//             if($key || $key == 0) {
//                 // array_push($arrKey, $i, $key);
//                 $arrKey = [$i, $key];
//                 break;
//             }
//             continue;
//         }
//     }
//     var_dump($arrKey);
//     return $arrKey;
// }
function twoSum($nums, $target) {
    $arrKey = [];
    for($i = 0; $i < count($nums); $i++) {
            $num2nd = $target - $nums[$i];
            if(isset($arrKey[$num2nd])) {
                return $arrKey($i, $arrKey[$num2nd]);
            } else {
                $arrKey[$nums[$i]] = $i;
            }
    }
    return [];
}

// twoSum([3,2,4], 6);
// var_dump(twoSum([3,2,4], 6));

function threeSum($nums) {
    sort($nums);
    $count = count($nums);
    $result = [];
    for($i = 0; $i < $count; ++$i) {
        $x = $nums[$i];
        $left = $i + 1;
        $right = $count - 1;

        $target = 0 - $x;

        while($left < $right) {
            $sum = $nums[$left] + $nums[$right];
            if($target === $sum) {
                $result = [$x, $nums[$left], $nums[$right]];
                $left ++;
                $right --;
            } elseif ($sum < $target) {
                $left ++;
            } else {
                $right --;
            }
        }
        
    }
    return $result;

}

print_r(threeSum([-1,0,1,2,-1,-4]));

?>