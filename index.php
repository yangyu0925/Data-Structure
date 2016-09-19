<?php
/**
 * Created by PhpStorm.
 * User: yangyu
 * Date: 16/9/19
 * Time: 上午10:47
 */

/*
require_once 'ArrayList.php';

$array = new ArrayList();
$array->initList([1,2,3]);
$array->deleteList(4);
$array->printList();
*/

require_once 'LinkList.php';
$lists = new singeLinkList();
$lists->addLink(new node(1, '1111111'));
$lists->addLink(new node(7, '1111117'));
$lists->addLink(new node(2, '1111112'));
$lists->getLinkList();
