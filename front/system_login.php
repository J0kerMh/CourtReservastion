<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();

if(isset($_POST['submit'])){
    include 'inc/check_system_login.php';
    
    
	escape($link,$_POST);
	$query="select * from admin where name='{$_POST['name']}' and pw='{$_POST['pw']}'";
	$result=execute($link, $query);
	if(mysqli_num_rows($result)==1){
		skip('../admin/court.php','ok','登录成功！');
	}else{
		skip('system_login.php', 'error', '数据库错误');
	}
}

$template['title']='系统登录';
$template['css']=array('style/public.css','style/index.css');
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>	
<meta charset="utf-8" />
<title><?php echo $template['title'] ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<?php 
foreach ($template['css'] as $val){
	echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
}
?>
</head>
<body>

<div class="container">
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">管理员账号:</label>
    <input type="text" class="form-control" name="name"  placeholder="用户名">
    <small id="emailHelp" class="form-text text-muted">*请输入管理员账号</small>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">密码：</label>
    <input type="password" class="form-control" name="pw" placeholder="密码">
    <small id="emailHelp" class="form-text text-muted">*请输入密码</small>
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>