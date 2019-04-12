<?php 

if(!$_POST['court_id'])
{
    skip('add_court_manage.php','error','必须选择一个场地！');
}
if(
    strtotime($_POST['end_time'])-strtotime($_POST['start_time'])<1){
	skip('add_court_manage.php','error','时间填写有误！');
}
if(strtotime($_POST['data'])-strtotime(date('Y-m-d'))<0){
	skip('add_court_manage.php','error','日期填写有误！');
}
if($_POST['price']<=0){
	skip('add_court_manage.php','error','请输入合适的价格！');
}

?>