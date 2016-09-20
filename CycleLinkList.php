<?php

//链表节点
class node {
    public $id; //节点id
    public $name; //节点名称
    public $next; //下一节点指针


    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
        $this->next = null;
    }
}

class singelCycleLinkList {
    private $header; //链表头节点

    //构造方法
    public function __construct($node) {
        $this->header = $node;
        $this->header->next = $this->header; //环形链表尾指针指向自己
    }

    //添加环形链表节点数据
    public function addLink($node) {
        $current = $this->header;
        $falg = false;
        while ( $current->next != $this->header ) {
            if ($current->next->id > $node->id) {
                $falg = true;
                break;
            }
            $current = $current->next;
        }
        if ($falg) {
            $node->next = $current->next;
            $current->next = $node;
        } else {
            $node->next = $this->header;
            $current->next = $node;
        }
    }

    //获取环形链表数据
    public function getLinkList() {
        $current = $this->header;
        $str = '';
        while ( $current->next != $this->header ) {
            $str .= 'id:' . $current->id . '   name:' . $current->name . "<br>";
            $current = $current->next;
        }
        $str .= 'id:' . $current->id . '   name:' . $current->name . "<br>";
        return $str;
    }

    //删除环形链表
    public function delLink($id) {
        $current = $this->header;
        $flag = false;
        while ( $current->next != $this->header ) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            $current->next = $current->next->next;
        } else {
            echo "未找到id=" . $id . "的节点！<br>";
        }
    }

    //约瑟夫问题
    public function getJoseph($n, $m) {
        $tail = $this->header;
        while ( $tail->next != $this->header ) {
            $tail = $tail->next;
        }
        //从第几个人开始数
        for($i = 1; $i < $n; $i ++) {
            $this->header = $this->header->next;
            $tail = $tail->next;
        }
        //是否是最后一个节点
        while ( $tail != $this->header ) {
            for($i = 0; $i < $m-1; $i ++) {
                $this->header = $this->header->next;
                $tail = $tail->next;
            }
            $this->header = $this->header->next;
            $tail->next = $this->header;
        }
        return $tail;
    }
}

