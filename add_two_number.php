<?php
  function addTwoNumbers($l1, $l2) {
    $numberL1 = (int) implode('',array_reverse($l1));
    $numberL2 = (int) implode('',array_reverse($l2));
    $numberTotal = $numberL1 + $numberL2;
    $res = array_map('intval', str_split($numberTotal));
    
    var_dump(array_reverse($res));
}
$l1 = [2,4,3];
$l2 = [5,6,4];
addTwoNumbers($l1, $l2);
