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

    /**
     * ArrayList constructor.
     */
    public function __construct()
    {
        $this->list = [];
        $this->length = 0;
    }

    /**
     * @param array $array
     */
    public function initList(array $array)
    {
        $this->list = $array;
        $this->length = count($array);
    }

    /**
     *
     */
    public function destroyList()
    {
        unset($this->list);
        $this->length = 0;
    }

    /**
     *
     */
    public function clearList()
    {
        $this->list = [];
        $this->length = 0;
    }

    /**
     * @return bool
     */
    public function listEmpty()
    {
        if (count($this->list) == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return int
     */
    public function listLength()
    {
        return count($this->list);
    }

    /**
     * @param $i
     * @return mixed
     */
    public function getElem($i)
    {
        if ($i < 1 || $i > $this->length){
            die('元素不存在');
        }
        if ($this->list) {
            return $this->list[$i-1];
        }
    }

    /**
     * @param $e
     * @return int
     */
    public function locateElem($e)
    {
        if ($this->list) {
            for ($i = 0; $i<$this->length; $i++){
                if ($this->list[$i] == $e) {
                    return $i+1;
                }
            }
        }
        return 0;
    }

    /**
     * @param $i
     * @return mixed
     */
    public function priorElem($i)
    {
        if ($i < 1 || $i > $this->length) {
            die('元素不存在');
        }
        if ($this->list) {
            if ($i == 1) {
                die('没有前驱');
            }
            return $this->list[$i-2];
        }
    }

    /**
     * @param $i
     * @return mixed
     */
    public function nextElem($i)
    {
        if ($i < 1 || $i > $this->length) {
            die('元素不存在');
        }
        if ($this->list) {
            if ($i == $this->length) {
                die('没后后继');
            }
            return $this->list[$i];
        }
    }

    /**
     * @param $i
     * @param $e
     */
    public function insertList($i, $e)
    {
        if ($i < 1 || $i > $this->length+1) {
            die('插入元素位置错误');
        }
        if ($this->length == 0) {
            $this->list[0] = $e;
            $this->length++;
        } else {
            $this->length++;
            for ($j = $this->length - 1; $j >= $i; $j--) {
                $this->list[$j] = $this->list[$j-1];
            }
            $this->list[$i-1] = $e;
        }

    }

    /**
     * @param $i
     */
    public function deleteList($i)
    {
        if ($i < 1 || $i > $this->length) {
            die('删除元素位置错误');
        }
        if ($i == $this->length) {
            unset($this->list[$i - 1]);
        } else {
            for ($j = $i; $j < $this->length; $j++) {
                $this->list[$i-1] = $this->list[$j];
            }
            unset($this->list[$i - 1]);
        }
        $this->length--;
    }

    /**
     *
     */
    public function printList()
    {
        foreach ($this->list as $value) {
            echo $value.'<br>';
        }
    }
}


