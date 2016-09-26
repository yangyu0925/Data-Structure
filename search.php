<?php

/**
 * @param $search
 * @param $arr
 * @return int
 */
function orderSearch($search, $arr)
{
    $len = count($arr);

    for ($i = 0; $i < $len; $i++) {
        if ($search == $arr[$i]) return $i;
    }

    return -1;
}

/**
 * @param $search
 * @param $arr
 * @return float|int
 */
function halfSearch($search, $arr)
{
    $len = count($arr);
    $low = 0;
    $high = $len - 1;

    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);
        if ($search > $arr[$mid]) {
            $low = $mid + 1;
        } elseif ($search < $arr[$mid]) {
            $high = $mid - 1;
        } else {
            return $mid;
        }
    }

    return -1;
}