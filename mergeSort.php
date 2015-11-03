<?php

function mergeSort(array $arr)
{
    $arrCount = count($arr);
    if ($arrCount <= 1) {
        return $arr;
    }
        
    $firstHalf = mergeSort(array_slice($arr, 0, $arrCount/2));
    $secondHalf = mergeSort(array_slice($arr, $arrCount/2));

    $resultArr = [];
    while ( !empty($firstHalf) && !empty($secondHalf) ) {
        if ($firstHalf[0] <= $secondHalf[0]) {
            $resultArr[] = array_shift($firstHalf);
        } elseif ($secondHalf[0] < $firstHalf[0]) {
            $resultArr[] = array_shift($secondHalf);
        }
    }
    
    $resultArr = array_merge($resultArr, empty($firstHalf) ? $secondHalf : $firstHalf);

    return $resultArr;
}

$arr = [5, 4, 3, 2, 1, 0, -1, -2, -3];

print_r(mergeSort($arr));
