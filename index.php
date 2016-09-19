<?php
/**
 * Created by PhpStorm.
 * User: yangyu
 * Date: 16/9/19
 * Time: 上午10:47
 */
require_once 'ArrayList.php';

$array = new ArrayList();
$array->initList([1,2,3,4,5,6,7,8,9,10]);
 $array->insertList(11,11);
var_dump($array->getList());
