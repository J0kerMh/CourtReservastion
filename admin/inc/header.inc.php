<?php 

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title'] ?></title>
<meta name="keywords" content="后台界面" />
<meta name="description" content="后台界面" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<?php 
foreach ($template['css'] as $val){
	echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
}
?>
</head>
<body>
<div id="top">
	<div class="logo">
		管理中心
	</div>
	<ul class="nav">
	</ul>
	<div class="login_info">
		<a href="../front/index.php" style="color:#fff;">网站首页</a>&nbsp;|&nbsp;
		管理员： admin <a href="#">[注销]</a>
	</div>
</div>
<div id="sidebar">
	<ul>
		<li>
			<div class="small_title">系统</div>
			<ul class="child">
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='court.php'){echo 'class="current"';}?> href="editIntro.php">系统信息</a></li>
				<li><a href="#">管理员</a></li>
				<li><a href="#">添加管理员</a></li>
				<li><a href="#">站点设置</a></li>
			</ul>
		</li>
		<li><!--  class="current" -->
			<div class="small_title">内容管理</div>
			<ul class="child">
				
				<li><a  <?php if(basename($_SERVER['SCRIPT_NAME'])=='court.php'){echo 'class="current"';}?> href="court.php">场馆介绍</a></li>
				<?php
					if(basename($_SERVER['SCRIPT_NAME'])=='court_update.php')
					{
						echo '<li><a class="current">编辑场馆介绍</a></li>';
					}
				?>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='add_court_manage.php'){echo 'class="current"';}?> href="add_court_manage.php">添加预约时段</a></li>
				<li><a href="#">订单管理</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='call_board_manage.php'){echo 'class="current"';}?> href="call_board_manage.php">发布公告</a></li>
			</ul>
		</li>
		<li>
			<div class="small_title">用户管理</div>
			<ul class="child">
				<li><a href="#">用户列表</a></li>
			</ul>
		</li>
	</ul>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>