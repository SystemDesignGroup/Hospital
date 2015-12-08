<?php
/**
 * Created by PhpStorm.
 * User: xjf13211016
 * Date: 12/4/15
 * Time: 11:48 PM
 */
set_time_limit(600);
$keyword=trim($_POST[$keyword]);
if($keyword=""){
    echo"搜索的内容不能为空";
    exit;
}
//遍历文件的函数
function lisfile($dir,$keyword,&$array){
    $handle=opendir($dir);
    while(false!==($file=readdir($handle))){
        if($file!="."&&$file!=".."){
            //若是目录则继续
            if(is_file("$dir/$file")){
                lisfile("$dir/$file",$keyword,$array);
            }
            else{//处理部分
                //读取文件内容
                $data=fread(fopen("$dir/$file","r"),filesize("$dir/$file"));
                if(preg_match("/<body([^>]+)>(.+)</body>/i",$data,$b)){//只搜索网页主题部分
                    $body=strip_tags($b["2"]);
                    }
                else{
                    $body=strip_tags($data);
                }
                if($file!="search.php"){//不搜索自身
                    if(preg_match("/$keyword/i",$body)){//检查匹配
                        if(preg_match("/<title>(.+)</title>/i",$data,$m)){
                            $title=$m["1"];
                        }
                        else{//如果找不到标题则记为没有标题
                            $title="没有标题";
                        }
                        $array[]="$dir/$file $title";
                    }
                }
            }
        }
    }
}
//定义数组
$array=array();
//执行函数
lisfile(".","$keyword",$array);
foreach($array as $value){//拆分并输出
    list($filedir,$title)=preg_split("[]",$value,2);
    echo "<a href=$filedir target=_blank>$title</a>"."<br>";
}
?>