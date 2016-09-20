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

/*
require_once 'LinkList.php';
$lists = new singeLinkList();
$lists->addLink(new node(1, '1111111'));
$lists->addLink(new node(7, '1111117'));
$lists->addLink(new node(2, '1111112'));
$lists->getLinkList();
*/

require_once 'CycleLinkList.php';
$lists = new cycleLinkList();
$lists->addLink(new node(1, '1111'));
$lists->addLink(new node(2, '2222'));
$lists->addLink(new node(3, '3333'));
$lists->addLink(new node(4, '4444'));
$lists->addLink(new node(5, '5555'));
$lists->addLink(new node(6, '6666'));
$lists->addLink(new node(7, '7777'));
$lists->addLink(new node(8, '8888'));
$lists->addLink(new node(9, '9999'));
$lists->addLink(new node(10, '1010'));

$q = $lists->header->next;
while ($q != $lists->header) {
    echo $q->name.'<br>';
    $q = $q->next;
}


