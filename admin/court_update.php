<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/config.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
$template['title']='场馆-修改';
$template['css']=array('style/public.css');

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('court.php','error','id参数错误！');
}
$query="select * from court where id={$_GET['id']}";
$link=connect();
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
	skip('court.php','error','这条版块信息不存在！');
}
if(isset($_POST['submit']))
{
	// var_dump($_POST);
	// exit();
    
    //验证
    $check_flag='update';
    include 'inc/check_court.inc.php';
    $query="update court set court_name='{$_POST['court_name']}',intro='{$_POST['intro']}' where id={$_GET['id']}";
    execute($link,$query);
    if(mysqli_affected_rows($link)==1)
    {
        
        skip('court.php','ok','恭喜你修改成功成功！');
        
    }
    else{
        skip('court.php','error','对不起，修改失败！');
    }
}

$data=mysqli_fetch_assoc($result);
?>

<?php
include_once './inc/header.inc.php';
?>

<div id="main">
	<div class="title" style="margin-bottom:20px;">修改场地-<?php echo $data['court_name']?></div>
	<form method="post">
		<table class="au">
			<tr>
				<td>修改后的场地名称</td>
				<td><input value="<?php echo $data['court_name']?>" name="court_name" type="text" /></td>
				<td>
					场地名称不得为空，最多不超过32个字符
				</td>
			</tr>
			<tr>
				<td>修改后的场地介绍</td>
				<td><textarea name="intro"><?php echo $data['intro']?></textarea></td>
				<td>
					场地介绍不得为空，最多不超过255个字符
				</td>
			</tr>
		</table>
		<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="修改" />
	</form>
</div>

<?php
include_once './inc/footer.inc.php';
?>
		