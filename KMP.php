<?php
/**
 * Created by PhpStorm.
 * User: yangyu
 * Date: 16/9/23
 * Time: 上午8:48
 */

function KMP($str) {
    $arr[0] = 0;
    $strL = strlen($str);

    for ($i = 1, $j = 0; $i < $strL; $i++) {
        if ($str[$i] == $str[$j]) {
            $arr[$i] = $arr[$i - 1] + 1;
            $j++;
        } else {
            $j = 0;
            $arr[$i] = 0;
        }
    }

    return $arr;
}

function KMPMatch($src, $par) {
    $arr = KMP($par);

    $srcL = strlen($src);
    $parL = strlen($par);

    for ($i = 0, $j = 0; $i < $srcL; ) {
        if ($src[$i] == $par[$j]) {
            $i++;
            $j++;
        } else {
            if ($j == 0 && $src[$i] != $par[$j]) {
                $i++;
            }
            $j = $arr[$j - 1 >= 0 ? $j - 1 : 0];
        }

        if ($j == $parL) return $i - $j;
    }
}

