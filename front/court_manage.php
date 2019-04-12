<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
if(!$member_id=is_login($link)){
	skip('login.php', 'error', '请登录!');
}



$template['title']='订单管理';
$template['css']=array('style/public.css','style/index.css');
?>


<?php include 'inc/header.inc.php'?>
<div class="container">
<ul class="list-group p-4">
    <?php
        $query="select *  from court,court_manage where member_id={$member_id} and court.id=court_manage.court_id";
        $result=execute($link,$query);
        while($data=mysqli_fetch_assoc($result))
        {
        
            $str=<<<A
            <li class="list-group-item">场馆名称：{$data['court_name']} &nbsp|&nbsp 日期：{$data['data']} &nbsp| &nbsp开始时间：{$data['start_time']} 结束时间：{$data['end_time']}  
            &nbsp|&nbsp 价格：{$data['price']} 元
            <a href="court_delete.php?id={$data['id']}">
                <button type="submit" class="btn btn-sm btn-outline-warning" style="padding:0px 30px;margin:0px 100px">取消预定</button>
            </a>
        </li>
A;
            echo $str;
        }
    ?>
   


</ul>
</div>
<?php include 'inc/footer.inc.php'?>
                         