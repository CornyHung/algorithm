<?php
// target > $nums[$i]
function searchInsert($nums, $target)
{
    $count = count($nums);
    $index = 0;
    for ($i = $count - 1; $i >= 0; $i--) {
        if ($nums[$i] < $target) {
            return $count;
        }
        if ($nums[$i] > $target && $nums[$i - 1] < $target) {
            return $i;
        }

    }
    return $index;
}

echo searchInsert([1,3,5,6] , 7);

