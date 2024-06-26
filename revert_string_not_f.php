<!--  -->
<!-- Step  -->
<!-- Take a variable and assign string to variable -->
<!-- Calculate the length of string -->
<!-- Execute a for loop and concatenate string inside for loop -->

<?php
CONST TEXT = 'Sao sao';
function handle_str_revert ($str) {
    // str pare string to arr 
    $arrStr = explode(" ", $str); // ['sao', 'sao']
    $res = "";
    $countArr = count($arrStr);
    for ($i=0; $i <= $countArr - 1; $i++) {
        $pareStr = str_split($arrStr[$i]); // => ['s', 'a', 'o']

            for ($j=0; $j <= count($pareStr) - 1; $j++) {
                $res = $res."".$pareStr[(count($pareStr) - 1) - $j];
            }
            $res = $res." ";
    }
    echo $res;
}

handle_str_revert(TEXT);
echo '<br>';
function handle_same_gg ($str) {
    $length = strlen($str);
    for ($i=$length -1; $i>= 0 ; $i--) { 
        echo $str[$i];
    }
}

handle_same_gg(TEXT);