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
*/

/*
require_once 'CycleLinkList.php';
$lists = new singelCycleLinkList (new node ( 1, 'aaaaaa' ));
$lists->addLink ( new node ( 2, 'bbbbbb' ) );
$lists->addLink ( new node ( 4, 'dddddd' ) );
$lists->addLink ( new node ( 3, 'cccccc' ) );
$lists->addLink ( new node ( 5, 'eeeeee' ) );
$lists->addLink ( new node ( 6, 'ffffff' ) );
echo $lists->getLinkList ();
echo "<br>-----------约瑟夫节点--------------<br>";
print_r($lists->getJoseph ( 1, 4 ));
*/

/*
require_once 'Stack.php';
$list = new Stack([1,2,3]);
$list->push(4);
$list->push(5);
$list->push(6);
$list->pop();
echo $list->getTop();
$list->pop();
echo $list->stackLength();
var_dump($list->emptyStack());
var_dump($list->stackTraverse());
 */

/*
require_once 'singelStack.php';
$list = new SingelStack();
$list->push(new Node(1));
echo $list->getTop();
var_dump($list->stackTraverse());
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


/*
function KMPMatch($src, $par) {
    $srcL = strlen($src);
    $parL = strlen($par);

    for ($i = 0, $j = 0; $i < $srcL; ) {
        if ($src[$i] == $par[$j]) {
            $i++;
            $j++;
        } else {
            $i = $i - $j +1;
            $j = 0;
        }
        if ($j == $parL) return $i - $j;
    }
}
*/

$src = 'BBC ABCDAB ABCDABCDABDE';
$par = 'ABCDABD';


echo KMPMatch($src, $par);