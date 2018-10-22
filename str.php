<?php
/**
1. StrToArr(): 将字符串转化为数组
2. StrCopy(): 字符串的拷贝(深拷贝，即重新申请一块新的内存来存储数据)
3. StrEmpty(): 字符串是否为空
4. StrCompare($cmpStr): 比较两个字符串的大小，如果大于，返回大于零的值；如果小于,返回小于零的值；如果等于，返回等于零的值。
5. StrLength(): 返回字符串的长度
6. ClearString(): 将字符串置为空串
7. Concat($conStr): 联接两个字符串
8. SubString($pos,$len): 返回字符串自pos个字符起，长度为len的字串。若不存在返回空串
9. Index($substr,$pos=0): 返回字串在主串中第pos个字符之后的位置。若不存在返回空串
10. StrInsert($subStr,$pos): 在主串指定的位置pos之前插入子串
11. StrDelete($pos,$len): 删除主串第pos位置起，长度为len的子串
12. Replace($subStr,$repStr): 使用repStr替换主串中的subStr

注：编程，其实编的都是对存储在内存中的数据的四个基本操作，即增，删，改，查。这与数据库的CURD操作基本一样。而比较比较复杂的操作也只不过是结合这四个基本操作来完成的。所以，掌握数据的存储结构，也就掌握了最根本的编程技巧。
 */


class SqStr{
    public $str;//保存字符串的数组
    private $length;//字符串的长度


    public function __construct($str=''){
        $this->str=$str;
        $this->length=strlen($str);
    }

    //将字符串转化为数组
    public function StrToArr(){
        $arr=array();
        for($i=0;$i<$this->length;$i++){
            $arr[]=$this->str[$i];
        }
        return $arr;
    }

    //字符串的拷贝(深拷贝，即重新申请一块新的内存来存储数据)
    public function StrCopy(){
        $string=(clone $this);
        return $string->str;
    }

    //字符串是否为空
    public function StrEmpty(){
        if($this->length==0){
            return 'Null';
        }else{
            return 'No Null';
        }
    }

    //比较两个字符串的大小，如果大于，返回大于零的值；如果小于,返回小于零的值；如果等于，返回等于零的值。
    public function StrCompare($cmpStr){
        error_reporting(E_ALL ^ E_NOTICE);
        for($i=0;$i<$this->length || $i<strlen($cmpStr);$i++){
            $str1=ord($this->str[$i]);
            $str2=ord($cmpStr[$i]);
            if($str1 != $str2){
                return $str1 - $str2;
            }
        }
        return '0';
    }

    //返回字符串的长度
    public function StrLength(){
        return $this->length;
    }

    //将字符串置为空串
    public function ClearString(){
        $this->str='';
        $this->length=0;
    }

    //联接两个字符串
    public function Concat($conStr){
        $this->length+=strlen($conStr);
        return $this->str.$conStr;
    }

    //返回字符串自pos个字符起，长度为len的字串。若不存在返回空串
    public function SubString($pos,$len){
        $othLen=$this->length - $pos + 1;
        $str='';
        for($i=$pos;$i<$this->length && $pos>0 && $othLen>$len && $i-$pos<$len;$i++){
            $str.=$this->str[$i-1];
        }
        return $str;
    }
    //或者
    public function SubString2($pos,$len){
        $othLen=$this->length - $pos + 1;
        $str='';
        if($pos<=0 || $pos>$this->length || $len<0 || $len>$othLen){
            return 'ERROR';
        }
        for($i=0;$i<$len;$i++){
            $str.=$this->str[$pos+$i-1];
        }
        return $str;
    }

    //返回字串在主串中第pos个字符之后的位置。若不存在返回空串
    public function Index($substr,$pos=0){
        $sublen=strlen($substr);
        if($pos<0 || $pos>$this->length || $substr ==''){
//            return 'ERROR';
            return 0;
        }
        $i=$pos;
        $j=0;
        while($i<$this->length&&$j<$sublen){
            if($this->str[$i]==$substr[$j]){
                $i++;
                $j++;
            }else{
                $i=$i-$j+1; //之所以这写，是因为子串在不相等的条件下，分为两种情况，第一、子串与主串完全不相等，此时的$j始终为0，而$i则每次递增一；第二、子串与主串部分相等，此时子串$j的增量与主串$i的增量相同，因此增加后$i与$j相减再加一的结果，就相当于原来的$i加一,直到$i=$this->length-1为止。
                $j=0;
            }
        }
        if($j==$sublen){  //当$j与字串的长度相等时，才说明主串中有与子串相等的字串
            return $i-$sublen+1;
        }else{
            return 0;
//            return 'ERROR';
        }
    }

    //在主串指定的位置pos之前插入子串
    public function StrInsert($subStr,$pos){
        if($pos<1 || $pos>$this->length+1){
            return 'ERROR';
        }
        $beforeStr=$afterStr='';//$beforeStr表示插入位置之前的子串
        //$afterStr表示插入位置之后的子串
        for($i=0;$i<$pos-1;$i++){
            $beforeStr.=$this->str[$i];
        }
        for($i=$pos-1;$i<$this->length;$i++){   //之所以$i=$pos-1,其一是因为$pos的取值范围是从1 到 $this->length,而字串的下标是从0 到 $this->length-1
            $afterStr.=$this->str[$i];
        }
        $this->str=$beforeStr.$subStr.$afterStr;
        $this->length=strlen($this->str);
        return $this->str;
    }

    //删除主串第pos位置起，长度为len的子串
    public function StrDelete($pos,$len){
        if($pos<1 || $pos>$this->length || $len<0){
            return 'ERROR';
        }

        $beforeStr=$afterStr='';//$beforeStr表示删除位置之前的子串
        //$afterStr表示删除位置之后的子串
        for($i=0;$i<$pos-1;$i++){  //之所以要$i<$pos-1,是因为此处是要取得$pos之前的元素，即字串下标为$pos-1之前的元素，因此要减一。
            $beforeStr.=$this->str[$i];
        }
        for($i=$pos+$len-1;$i<$this->length;$i++){ //$i=$pos+$len-1 表示要删除子串之后一个位置的下标
            $afterStr.=$this->str[$i];
        }
        $this->str=$beforeStr.$afterStr;
        $this->length=strlen($this->str);
        return $this->str;
    }

    //使用repStr替换主串中的subStr
    public function Replace($subStr,$repStr){
        $i=0;
        do{
            $i=$this->Index($subStr,$i);
            if($i){
                //所谓的替换，从存储结构上来讲就是先删除原来的，再从原来的位置插入新的。
                $this->StrDelete($i,strlen($subStr));
                $this->StrInsert($repStr,$i);
            }
        }while($i);
        return $this->str;
    }
}
 
