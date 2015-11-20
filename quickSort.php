<?php

function swap(&$x, &$y) {
    if ($x === $y) {
        return;
    }
    
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}

function partition(array &$arr, $pivotIndex, $startIndex = 0, $stopIndex = null) {
    $stopIndex = ($stopIndex !== null) ? $stopIndex : count($arr) - 1;
    
    swap($arr[$startIndex], $arr[$pivotIndex]);
    
    $pivot = $arr[$startIndex];
    $i = $startIndex + 1;
    
    for ($j = $startIndex; $j <= $stopIndex && $i <= $stopIndex; $j++) {
        if ((float) $arr[$j] < (float) $pivot) {
            swap($arr[$j], $arr[$i]);
            $i++;   
        }
    }
    
    swap($arr[$startIndex], $arr[$i-1]);
    
    return ($i - 1);
}

function choosePivot($arr, $startIndex = 0, $stopIndex = null) {
    $stopIndex = ($stopIndex !== null) ? $stopIndex : count($arr) - 1;
    
    return ($startIndex + $stopIndex)/2;
}

function quickSort(array &$arr, $startIndex = 0, $stopIndex = null)
{
    $stopIndex = ($stopIndex !== null) ? $stopIndex : count($arr) - 1;
        
    if ($stopIndex - $startIndex <= 1) {
        return $arr;
    }
    
    $pivotIndex = choosePivot($arr, $startIndex, $stopIndex);
    $pivotIndex = partition($arr, $pivotIndex, $startIndex, $stopIndex);
    
    quickSort($arr, 0, $pivotIndex - 1);
    quickSort($arr, $pivotIndex + 1, $stopIndex);
}

$arr = [5, 4, 3, 2, 1, 0, -1, -2, -3, 8, 6, 4, 0, 9, 1, 2222, 3, 4, 1111, -1111, 3.4, 5.6, 777];

quickSort($arr);
print_r($arr);
