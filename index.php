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
$list = new singelLinkList ();
$list->addLink ( new node ('aaaaaa' ) );
$list->addLink ( new node ('bbbbbb' ) );
$list->addLink ( new node ('cccccc' ) );
$list->addLink ( new node ('dddddd' ) );
echo "所有链表节点：<br/>";
$list->getLinkList();
echo "<br/>";
echo "当前链表末位节点：<br/>";
$list->getCurrent();
echo "<br/>";
echo "修改链表节点id为0的：<br/>";
$list->updateLink(0, '2222222');
echo "查找id为0的节点：<br/>";
$list->getLinkById(0);
echo "<br/>";
echo "删除链表节点id为0：<br/>";
$list->delLink(0);
echo "所有链表节点：<br/>";
$list->getLinkList();
echo "<br/>";
echo "所有链表节点：<br/>";
$list->getLinkLength ();




