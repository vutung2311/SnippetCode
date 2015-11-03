<?php

function inversionCount(array $arr)
{
    if (!function_exists('countSplitInversion')) {
        function countSplitInversion($arr) {
            $arrCount = count($arr);
            $firstHalf = array_slice($arr, 0, $arrCount/2);
            $secondHalf = array_slice($arr, $arrCount/2);
            sort($firstHalf); sort($secondHalf);
            $inversionCount = 0;
            while ( !empty($firstHalf) && !empty($secondHalf) ) {
                if ($firstHalf[0] <= $secondHalf[0]) {
                    array_shift($firstHalf);
                } elseif ($secondHalf[0] < $firstHalf[0]) {
                    array_shift($secondHalf);
                    $inversionCount += count($firstHalf);
                }
            }
            
            return $inversionCount; 
        }
    }    
    
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



