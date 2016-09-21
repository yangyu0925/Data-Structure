<?php
/**
 * Created by PhpStorm.
 * User: yangyu
 * Date: 16/9/21
 * Time: 上午10:32
 */
class Node
{
    public $data;
    public $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class SingelStack
{
    private $top;
    private $length;

    public function __construct()
    {
        $this->top = null;
        $this->length = 0;
    }

    public function destroyStack()
    {
        while ($this->top) {
            $next = $this->top->next;
            unset($this->top);
            $this->top = $next;
        }
        $this->length = 0;

    }

    public function clearStack()
    {
        while ($this->top) {
            $next = $this->top->next;
            unset($this->top);
            $this->top = $next;
        }
        $this->top = null;
        $this->length = 0;
    }

    public function emptyStack()
    {
        if ($this->top == null) {
            return true;
        } else {
            return false;
        }
    }

    public function lengthStack()
    {
        return $this->length;
    }

    public function getTop()
    {
        if ($this->top == null) {
            return 'Null';
        }
        return $this->top->data;
    }

    public function push($node)
    {
        $node->next = $this->top;
        $this->top = $node;
        $this->length++;
    }

    public function pop()
    {
        if ($this->top != null) {
            $next = $this->top->next;
            unset($this->top);
            $this->top = $next;
            $this->length--;
        }
    }

    public function stackTraverse()
    {
        $arr = [];
        if ($this->top != null) {
            $current = $this->top;
            while ($current) {
                $arr[] = $current->data;
                $current = $current->next;
            }
        }
        return $arr;
    }
}

