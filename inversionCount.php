<?php

function countSplitInversion($arr) {
    $arrCount = count($arr);
    $firstHalf = array_slice($arr, 0, $arrCount/2);
    $secondHalf = array_slice($arr, $arrCount/2);
    sort($firstHalf); sort($secondHalf);
    $inversionCount = 0;
    while ( !empty($firstHalf) && !empty($secondHalf) ) {
        if ((float) $firstHalf[0] <= (float) $secondHalf[0]) {
            array_shift($firstHalf);
        } elseif ((float) $secondHalf[0] < (float) $firstHalf[0]) {
            array_shift($secondHalf);
            $inversionCount += count($firstHalf);
        }
    }
    
    return $inversionCount; 
}

function inversionCount(array $arr)
{
    $arrCount = count($arr);
    if ($arrCount <= 1) {
        return 0;
    }
    
    $x = inversionCount(array_slice($arr, 0, $arrCount/2));
    $y = inversionCount(array_slice($arr, $arrCount/2));
    $z = countSplitInversion($arr);
    
    return ($x + $y + $z);
}

$integerArray = explode(PHP_EOL, trim(file_get_contents('IntegerArray.txt')));
echo inversionCount($integerArray) . PHP_EOL;



