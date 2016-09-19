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
    private $size;


    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->list = [];
        $this->size = 0;
    }


    /**
     *初始化
     */
    public function initList($array)
    {
        $this->list = $array;
        $this->size = count($array);
    }


    /**
     *删除
     */
    public function destoryList()
    {
        if (isset($this->list)) {
            unset($this->list);
            $this->size = 0;
        }
    }


    /**
     *清空
     */
    public function clearList()
    {
        if (isset($this->list)) {
            unset($this->list);
        }
        $this->list = [];
        $this->size = 0;
    }


    /**
     * 判断是否为空
     *
     * @return bool
     */
    public function emptyList()
    {
        if (isset($this->list)) {
            if ($this->size == 0) {
                return true;
            } else {
                return false;
            }
        }
    }


    /**
     * 表长度
     * @return int
     */
    public function lenghtList()
    {
        if (isset($this->list)) {
            return $this->size;
        }
    }


    /**
     * 取元素
     *
     * @param $i
     * @return mixed
     */
    public function getElem($i)
    {
        if ($i < 1 || $i > $this->size) {
            die('溢出');
        }
        if (isset($this->list) && is_array($this->list)) {
            return $this->list[$i-1];
        }
    }


    /**
     * 是否在表中
     *
     * @param $e
     * @return int
     */
    public function locateElem($e)
    {
        if (isset($this->list) && is_array($this->list)) {
            for ($i=0; $i<$this->size; $i++) {
                if ($this->list[$i] == $e) {
                    return $i+1;
                }
            }

            return 0;
        }
    }


    /**
     * 前驱
     *
     * @param $i
     * @return mixed
     */
    public function priorElem($i)
    {
        if ($i < 1 || $i > $this->size) {
            die('溢出');
        }
        if ($i == 1) {
            die('没有前驱');
        }
        if (isset($this->list) && is_array($this->list)) {
            return $this->list[$i-2];
        }
    }


    /**
     * 后继
     *
     * @param $i
     * @return mixed
     */
    public function nextElem($i)
    {
        if ($i < 1 || $i > $this->size) {
            die('溢出');
        }
        if ($i == $this->size) {
            die('没有后继');
        }
        if (isset($this->list) && is_array($this->list)) {
            return $this->list[$i];
        }
    }


    /**
     * 插入元素
     *
     * @param $i
     * @param $e
     */
    public function insertList($i, $e)
    {
        if ($i < 1 || $i > $this->size+1) {
            die('插入元素位置有误');
        }
        if (isset($this->list) && is_array($this->list)) {
            if ($this->size == 0) {
                $this->list[0] = $e;
                $this->size++;
            } else {
                $this->size++;
                for ($j = $this->size-1; $j >= $i; $j--){
                    $this->list[$j] = $this->list[$j-1];
                }
                $this->list[$i-1] = $e;
            }
        }
    }


    /**
     * 删除元素
     *
     * @param $i
     */
    public function deleteList($i)
    {
        if ($i < 1 || $i > $this->size) {
            die('删除元素位置有误');
        }
        if (isset($this->list) && is_array($this->list)) {
            if ($this->size == $i) {
                unset($this->list[$i-1]);
            } else {
                for ($j = $i; $j < $this->size; $j++) {
                    $this->list[$j-1] = $this->list[$j];
                }
                unset($this->list[$this->size-1]);
            }
            $this->size--;
        }
    }


    /**
     *便利线性表
     */
    public function printList()
    {
        if (isset($this->list) && is_array($this->list)) {
            foreach ($this->list as $item) {
                echo $item;
            }
        }
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }



}


