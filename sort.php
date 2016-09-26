<?php

/**
 * @param $arr
 * @return mixed
 */
function maopao($arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        for ($j = $len - 1; $j >= $i; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $tmp;
            }
        }
    }
    return $arr;
}

/**
 * @param $arr
 * @return mixed
 */
function xuanze($arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len; $i++){
        $min = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$min]) $min = $j;
        }
        if ($min != $i) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $tmp;
        }
    }
    return $arr;
}

/**
 * @param $arr
 * @return mixed
 */
function insertSort($arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $tmp = $arr[$i];
        $j = $i - 1;
        while ($arr[$j] > $tmp) {
            $arr[$j + 1] = $arr[$j];
            $arr[$j] = $tmp;
            $j--;
            if ($j < 0) break;
        }
    }
    return $arr;
}

/**
 * @param $arr
 * @return array
 */
function quickSort($arr)
{
    $len = count($arr);
    if ($len < 1) return $arr;
    $value = $arr[0];
    $left = [];
    $right = [];

    for ($i = 1; $i < $len; $i++) {
        if ($arr[$i] <= $value) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);

    return array_merge($left, [$value], $right);
}