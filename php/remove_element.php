<?php
function removeElement(&$nums, $val) {
    sort($nums);
    $count = count($nums);
    $k = 0;
    for($i = 0; $i < $count ; $i ++) {
        $k = $nums[$i];
        if($k !== $val) {
            return $k;
        }
    }
}
$nums = [0,1,2,2,3,0,4,2];
var_dump(removeElement($nums, 2));