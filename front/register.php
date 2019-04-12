<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();

if(isset($_POST['submit']))
{
	include_once 'inc/check_register.php';
	$query="insert into member(name,pw,register_time)
	values( '{$_POST['name']}',md5('{$_POST['pw']}'),now())";
	$result=execute($link,$query);
	if(mysqli_affected_rows($link)==1)
	{
		setcookie('sfk[name]', $_POST['name']);
		setcookie('sfk[pw]',sha1(md5($_POST['pw'])));
		skip('index.php','ok',"注册成功！");
	}
	else{
		skip('register.php','error',"注册失败！");
	}
}


$template['title']='注册';
$template['css']=array('style/public.css');
?>

<?php include 'inc/header.inc.php'?>
<div class="container">
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">用户名:</label>
    <input type="text" class="form-control" name="name"  placeholder="用户名">
    <small id="emailHelp" class="form-text text-muted">*用户名不得为空，并且长度不得超过32个字符</small>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">密码：</label>
    <input type="password" class="form-control" name="pw" placeholder="密码">
    <small id="emailHelp" class="form-text text-muted">*密码长度不得小于6位</small>
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">确认密码：</label>
    <input type="password" class="form-control" name="confirm_pw" placeholder="密码">
    <small id="emailHelp" class="form-text text-muted">*密码长度不得小于6位</small>
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">验证码：</label>
    <input  type="text" class="form-control" name="vcode" placeholder="验证码">
    <small id="emailHelp" class="form-text text-muted">*请输入下方验证码</small>
    <img  src="show_code.php" />
    <div style="clear:both;"></div>
  </div>
  <button type="submit" name= "submit" class="btn btn-outline-secondary btn-lg">提交</button>
</form>
</div>



<?php include 'inc/footer.inc.php'?>