<?php 
if(empty($_POST['name'])){
	skip('login.php', 'error', '管理员账户不得为空！');
}
if(empty($_POST['pw'])){
	skip('login.php', 'error', '密码不得为空！');
}
if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
	skip('login.php', 'error','验证码输入错误！');
}
?>