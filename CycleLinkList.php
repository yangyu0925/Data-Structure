<?php
/**
 * 循环链表
 * User: yangyu
 * Date: 16/9/20
 * Time: 上午9:29
 */
class Node
{
    public $id;
    public $data;
    public $next;

    public function __construct($id = null, $data = null)
    {
        $this->id = $id;
        $this->data = $data;
        $this->next = null;
    }
}

class CycleLinkList
{
    public $header;

    public function __construct(Node $node)
    {
        $this->header = $node;
        $this->header->next = $this->header;
    }

    public function addLink(Node $node)
    {
        $current = $this->header;
        while ($current->next != $this->header) {
            if ($current->next->id > $node->id){
                break;
            }
            $current = $current->next;
        }
        $node->next = $current->next;
        $current->next = $node;
    }

    public function getLinkList()
    {
        $current = $this->header;
        if ($current->next == $this->header) {
            echo '空链表!';
            return;
        }
        while ($current->next != $this->header) {
            echo 'id:'.$current->next->id.'数据:'.$current->next->data.'<br>';
            $current = $current->next;
        }
    }

    public function deleteLink($id)
    {
        $current = $this->header;
        $flag = false;
        while ($current->next != $this->header) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            $current->next = $current->next->next;
        } else {
            echo'没有找到相应数据!<br>';
        }
    }

    public function getLinkNameById($id)
    {
        $current = $this->header;
        $flag = false;
        while ($current->next != $this->header) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            echo $current->next->data.'<br>';
        } else {
            echo'没有找到相应数据!<br>';
        }
    }

    public function updateLink($id, $data)
    {
        $current = $this->header;
        $flag = false;
        while ($current->next != $this->header) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            $current->next->data = $data;
        } else {
            echo'没有找到相应数据!<br>';
        }
    }
}


