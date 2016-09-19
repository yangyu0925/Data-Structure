<?php

/**
 * 线性表
 * User: yangyu
 * Date: 16/9/19
 * Time: 上午9:49
 */
class ArrayList
{
    private $list;
    private $length;

    public function __construct()
    {
        $this->list = [];
        $this->length = 0;
    }

    public function initList(array $arr)
    {
        $this->list = $arr;
        $this->length = count($arr);
    }

    public function clearList()
    {
        $this->list = [];
        $this->length = 0;
    }

    public function listEmpty()
    {
        if ($this->length == 0) {
            return true;
        }
        return false;
    }

    public function listLength()
    {
        return $this->length;
    }

    public function getElem($i)
    {
        if ($i < 1 || $i > $this->length) {
            return '溢出';
        }
        return $this->list[$i - 1];
    }

    public function locateList($e)
    {
        if ($this->list) {
            for ($i = 0; $i < $this->length; $i++) {
                if ($this->list[$i] == $e) return $i+1;
            }
            return -1;
        }
    }

    public function insertLIst($i, $e)
    {
        if ($i < 1 || $i > $this->length+1) {
            die('添加元素位置有误!');
        }
        if($this->length == 0) $this->list[0] = $e;
        for ($j = $this->length; $j >= $i; $j--) {
            $this->list[$j] = $this->list[$j-1];
        }
        $this->list[$i-1] = $e;
        $this->length++;
    }

    public function deleteList($i)
    {
        if ($i < 1 || $i > $this->length) {
            die('删除元素位置有误!');
        }
        for ($j = $i; $j < $this->length; $j++) {
            $this->list[$j-1] = $this->list[$j];
        }
        unset($this->list[$this->length - 1]);
        $this->length--;
    }

    public function printList()
    {
        foreach ($this->list as $key => $value) {
            echo $key.'=>'.$value.'<br>';
        }
    }
}


