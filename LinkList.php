<?php
/**
 * 单链表
 * User: yangyu
 * Date: 16/9/19
 * Time: 下午5:19
 */

class node
{
    public $id;
    public $name;
    public $next;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->next = null;
    }
}

class singeLinkList
{
    private $header;

    public function __construct($id = null, $name = null)
    {
        $this->header = new node($id, $name, null);
    }

    public function getLinkLength()
    {
        $i = 0;
        $current = $this->header;
        while ($current->name != null) {
            $i++;
            $current = $current->next;
        }
        return $i;
    }

    public function addLink($node)
    {
        $current = $this->header;
        while ($current->next != null) {
            if ($current->next->id > $node->id) {
                break;
            }
            $current = $current->next;
        }
        $node->next = $current->next;
        $current->next = $node;
    }

    public function deleteLink($id)
    {
        $current = $this->header;
        $flag = false;
        while ($current->next != null) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            $current->next = $current->next->next;
        } else {
            echo '未找到id='. $id .'的节点!<br>';
        }
    }

    public function getLinkList()
    {
        $current = $this->header;
        if ($current->next == null) {
            return '链表为空';
        }
        while ($current->next != null) {
            echo 'id'.$current->next->id.' name:'.$current->next->name.'<br>';
            if ($current->next->next == null){
                break;
            }
            $current = $current->next;
        }
    }

    public function getLinkNameById($id)
    {
        $current = $this->header;
        if ($current->next == null) {
            return '链表为空';
        }
        while ($current->next != null) {
            if ($current->id == $id) {
                break;
            }
            $current = $current->next;
        }
        return $current->name;
    }

    public function updateLink($id, $name)
    {
        $current = $this->header;
        if ($current->next == null) {
            return '链表为空';
        }
        while ($current->next != null) {
            if ($current->id == $this) {
                break;
            }
            $current = $current->next;
        }
        return $current->name = $name;
    }
}