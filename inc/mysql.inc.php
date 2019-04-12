<?php

//链接mysql
function connect ($host=DB_HOST,$user=DB_USER,$password=DB_PASSWORD,$port=DB_PORT,$database=DB_DATABASE)
{
    // $link=mysqli_connect("localhost","root","123456dsfasdf");
    // if(!$link) echo "FAILD!连接错误，用户名密码不对";
    // else echo "OK!可以连接";
    $link=@mysqli_connect($host,$user,$password,$database,$port);//@屏蔽提示

    // if($link) echo "连接成功";
    if(mysqli_connect_errno())
    {
        exit(mysqli_connect_errno());
    }
    mysqli_set_charset($link,'utf8');//转义
    return $link;
    //    var_dump(mysqli_connect_errno());
}
//执行一条SQL语句，返回结果集对象或者返回布尔值
function execute($link,$query){
    $result= mysqli_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $result;
    // var_dump(mysqli_errno($link));
    // var_dump(mysqli_error($link));

}
//执行一条SQL语句，只返回布尔值
function execute_bool($link,$query){
    $bool= mysqli_real_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $bool;

}
//一次执行多条SQL语句



function execute_multi(&$link,$arr_sqls,&$error){
    $sqls=implode(';',$arr_sqls).';';
    // echo $sqls;
    if(mysqli_multi_query($link,$sqls))
    {
        $data=array();
        $i=0;
        do{
            if($result=mysqli_store_result($link)){//获取当前结果集
                $data[$i]=mysqli_fetch_all($result);
                mysqli_free_result($result);

            }
            else{
                $data[$i]=null;
            }
            $i++;
            if(!mysqli_more_results($link)) break;//如果没有更多的结果集就跳出
        }while(mysqli_next_result($link));
        if($i==count($arr_sqls)){
            return $data;
        }
        else{
            $error="sql语句执行失败: <br/>&nbsp; 
            数组下标为{$i}的语句:{$arr_sqls[$i]}执行错误<br/>&nbsp;
            错误原因;".mysqli_error($link);
        }//返回错误的行号
    }
    else{
        $error='执行失败！请检查首条语句是否正确！<br />
        可能的错误原因：'.mysqli_error($link);
        return false;


    }



}


//获取记录数
function num($link,$sql_count){
    $result=execute($link,$sql_count);
    $count=mysqli_fetch_row($result);
    return $count[0];

}
//数据入库之前进行转义，确保数据能够顺利入库
function escape($link,$data){
    if(is_string($data))
    {
        $data=mysqli_escape_string($link,$data);

    }
    if(is_array($data)){
        foreach ($data as $key=>$val)
        {
            $data[$key]=escape($link,$val);
        }

    }
    return $data;
    // mysqli_escape_string($link,$data);

}

//关闭链接
function close($link){//传入的link是一个对象

    mysqli_close($link);

}
?>