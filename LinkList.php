<?php
header("Content-type:text/html;charset=utf-8");
//链表节点
class node {
    public static $count = -1; //自增ID 初始header，节点索引从0开始
    public $name; //节点名称
    public $next; //下一节点
    public $id; //节点ID

    public function __construct($name) {
        $this->id = self::$count;
        $this->name = $name;
        $this->next = null;
        self::$count += 1;
    }
}
//单链表
class singelLinkList {
    private $header;
    private $current;
    public $count;

    //构造方法
    public function __construct($data = null) {
        $this->header = new node ($data);
        $this->current = $this->header;
        $this->count = 0;
    }

    //添加节点数据
    public function addLink($node) {
        if($this->current->next != null)
            $this->current = $this->current->next;
        $this->count++;
        $node->next = $this->current->next;
        $this->current->next = $node;
    }

    //删除链表节点
    public function delLink($id) {
        $current = $this->header;
        $flag = false;
        while ( $current->next != null ) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            $this->count--;
            $current->next = $current->next->next;
        } else {
            echo "未找到id=" . $id . "的节点！<br>";
        }
    }

    //获取链表
    public function getLinkList() {
        $this->checkNull();
        $current = $this->header;
        while ( $current->next != null ) {
            echo 'id:' . $current->next->id . '   name:' . $current->next->name . "<br>";
            if ($current->next->next == null) {
                break;
            }
            $current = $current->next;
        }
    }

    //获取长度
    public function getLinkLength()
    {
        echo $this->count;
    }

    //获取当前节点
    public function getCurrent()
    {
        $this->checkNull();
        echo '当前节点id:' . $this->current->next->id . '   name:' . $this->current->next->name . "<br>";
    }

    //判断是否为空
    public function checkNull()
    {
        if ($this->header->next == null) {
            echo "链表为空!";
            exit;
        }
    }

    //获取节点名字
    public function getLinkById($id) {
        $this->checkNull();
        $current = $this->header;
        while ( $current->next != null ) {
            if ($current->id == $id) {
                break;
            }
            $current = $current->next;
        }
        echo '修改后id:' . $current->id . '   name:' . $current->name . "<br>";
    }

    //更新节点名称
    public function updateLink($id, $name) {
        $this->checkNull();
        $current = $this->header;
        while ( $current->next != null ) {
            if ($current->id == $id) {
                break;
            }
            $current = $current->next;
        }
        return $current->name = $name;
    }
}
