<?php
function getSubArrWithMinOrMaxVal(array $array, string $col, string $type = 'max')
{
    $val = $array[array_key_first($array)];
    
    foreach($array as $arr){
        $valIsMinOrMax = ($type === 'max' && (abs($val[$col]) < abs($arr[$col]))) 
        || ($type === 'min' && (abs($val[$col]) > abs($arr[$col])));

        if($valIsMinOrMax){
            $val = $arr;
        }
    }

    return $val;
}
function getPostData()
{
    return $_POST;
}

?>
