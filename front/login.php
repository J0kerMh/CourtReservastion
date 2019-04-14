<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();

if(isset($_POST['submit'])){
    include 'inc/check_login.inc.php';
    
    
	escape($link,$_POST);
	$query="select * from member where name='{$_POST['name']}' and pw=md5('{$_POST['pw']}')";
	$result=execute($link, $query);
	if(mysqli_num_rows($result)==1){
		setcookie('sfk[name]',$_POST['name'],time()+$_POST['time']);
		setcookie('sfk[pw]',sha1(md5($_POST['pw'])),time()+$_POST['time']);
		skip('index.php','ok','登录成功！');
	}else{
		skip('login.php', 'error', '用户名或密码填写错误！');
	}
}

$template['title']='登录';
$template['css']=array('style/public.css','style/index.css');
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
    <label for="exampleInputPassword1">验证码：</label>
    <input  type="text" class="form-control" name="vcode" placeholder="验证码">
    <small id="emailHelp" class="form-text text-muted">*请输入下方验证码</small>
    <img  src="show_code.php" />
    <div style="clear:both;"></div>
  </div>
  <div class="form-group">
  <label for="exampleInputPassword1">自动登录</label>
    <select class="form-control" name="time">
        <option value="3600">1小时内</option>
        <option value="86400">1天内</option>
        <option value="259200">3天内</option>
        <option value="2592000">30天内</option>
    </select>
    <small id="emailHelp" class="form-text text-muted">*公共电脑上请勿长期自动登录</small>
   
    </div>
  <button type="submit" name= "submit" class="btn btn-outline-secondary btn-lg">登录</button>
</form>
</div>


<?php include 'inc/footer.inc.php'?>