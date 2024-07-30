<?php

function singleNumber($nums) {
        $count = count($nums);
        if($count === 1) {
            return $nums[0];
        }
        $arrStore = [];

        

        foreach($nums as $item) {
            if(isset($arrStore[$item])) {
                $arrStore[$item] ++;
            } else {
                $arrStore[$item] = 1;
            }
        }


        foreach($arrStore as $item => $key) {
            if($arrStore[$item] === 1) {
                return $arrStore[$item];
                }
            }
    }

echo(singleNumber([-1,-1,-2]));