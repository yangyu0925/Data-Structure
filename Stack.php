<?php
/**
 * 顺序栈
 *
 * User: yangyu
 * Date: 16/9/21
 * Time: 上午9:30
 */
class Stack
{
    /**
     * @var array
     */
    public $array;
    /**
     * @var int
     */
    public $top;

    /**
     * 构造栈
     *
     * Stack constructor.
     * @param array $arr
     */
    public function __construct(array $arr = [])
    {
        $this->array = $arr;
        $this->top = count($arr) - 1;
    }

    /**
     *摧毁栈
     */
    public function destroyStack()
    {
        $this->array = null;
        $this->top = -1;
    }

    /**
     *清空栈
     */
    public function clearStack()
    {
        $this->array = [];
        $this->top = -1;
    }

    /**
     * 判断是否为空
     *
     * @return bool
     */
    public function emptyStack()
    {
        if (count($this->array) == 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * 栈的长度
     *
     * @return int
     */
    public function stackLength()
    {
        return count($this->array);
    }

    /**
     * 获取元素
     *
     * @return mixed|string
     */
    public function getTop()
    {
        if ($this->top == -1) {
            return 'Error';
        }
        return $this->array[$this->top];
    }

    /**
     * 入栈
     *
     * @param $elem
     */
    public function push($elem)
    {
        $this->top++;
        $this->array[$this->top] = $elem;
    }

    /**
     * 出栈
     *
     * @return mixed|string
     */
    public function pop()
    {
        if ($this->top == -1) {
            return 'Error';
        }
        $del = $this->array[$this->top];
        unset($this->array[$this->top]);
        $this->top--;
        return $del;
    }

    /**
     * 遍历
     *
     * @return array|null
     */
    public function stackTraverse()
    {
        if (is_null($this->array)) {
            return null;
        }
        $arr = [];
        for ($i = 0; $i <= $this->top; $i++){
            $arr[] = $this->array[$i];
        }
        return$arr;
    }

    /**
     * @return array
     */
    public function stackTraverse2()
    {
        return $this->array;
    }
}