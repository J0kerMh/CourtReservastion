<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/config.inc.php';
include_once '../inc/tools.inc.php';
if(!isset($_GET['id'])||!is_numeric($_GET['id']))
{
    skip('court_manage.php','error','参数传递失败');
}
$link=connect();

$query="update court_manage set member_id=0 where id={$_GET['id']}";
execute($link,$query);
if(mysqli_affected_rows($link)==1)
{
    
    skip('court_manage.php','ok','恭喜你删除成功！');

}
else{
    skip('court_manage.php','error','对不起，删除失败！');
}

?>