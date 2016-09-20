<?php
/**
 * 循环链表
 * User: yangyu
 * Date: 16/9/20
 * Time: 上午9:29
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

class cycleLinkList
{
    public $header;

    public function __construct($id = null, $name = null)
    {
        $this->header = new node($id, $name);
        $this->header->next = $this->header;
    }

    /**
     * @param $node
     */
    public function addLink($node)
    {
        $current = $this->header;
        $currentNext = $this->header->next;
        if ($current == $currentNext) {
            $currentNext->next = $node;
            $node->next = $currentNext;
            return;
        }
        while ($currentNext != $this->header) {

            $current = $currentNext;
            $currentNext = $currentNext->next;
        }
        $current->next = $node;
        $node->next = $this->header;
    }
}


