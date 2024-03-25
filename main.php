<?php

function quickSort(&$arr, $start, $end) {
    if ($start >= $end) {
        return;
    }

    $pivotIndex = partition($arr, $start, $end);
    quickSort($arr, $start, $pivotIndex - 1);
    quickSort($arr, $pivotIndex + 1, $end);
}

function partition(&$arr, $start, $end) {
    $pivot = $arr[$end];
    $pivotIndex = $start;

    for ($i = $start; $i < $end; $i++) {
        if ($arr[$i] < $pivot) {
            swap($arr, $i, $pivotIndex);
            $pivotIndex++;
        }
    }

    swap($arr, $pivotIndex, $end);
    return $pivotIndex;
}

function swap(&$arr, $i, $j) {
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

$arr = range(1, 10000000);
shuffle($arr);

quickSort($arr, 0, count($arr) - 1);
print_r($arr);

