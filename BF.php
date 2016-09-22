<?php
/**
 * BF算法
 * User: yangyu
 * Date: 16/9/22
 * Time: 下午2:11
 */

function index($str, $reg, $start = 0)
{
    $strlen = strlen($str);
    $reglen = strlen($reg);

    if ($start > $strlen) {
        throw new Exception('Error');
    }

    $i = $start;
    $j = 0;

    while ($i < $strlen && $j < $reglen) {
        if ($str[$i] == $reg[$j]) {
            $i++;
            $j++;
        } else {
            $i = $i-$j+1;
            $j = 0;
        }
        if ($j >= $reglen) {
            return $i - $reglen;
        }
    }

    return '-1';
}