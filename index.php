<?php
/**
 * Created by PhpStorm.
 * User: yangyu
 * Date: 16/9/19
 * Time: 上午10:47
 */
require_once 'ArrayList.php';

$array = new ArrayList();
$array->initList([1,2,3]);
$array->deleteList(2);
$array->printList();
