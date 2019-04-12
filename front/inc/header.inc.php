<?php 

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


<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #488fce;">
  <a class="navbar-brand" style="color: rgb(255, 255, 255);font-size:25px;" href="#">羽毛球场馆预定</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?php
			if(basename($_SERVER['SCRIPT_NAME'])=='index.php'){echo 'active';}
			?>">
        <a class="nav-link" style="font-size:15px;" href="index.php">场馆介绍 </a>
      </li>
      <li class="nav-item <?php
			if(basename($_SERVER['SCRIPT_NAME'])=='court_book.php'){echo 'active';}
			?>">
        <a class="nav-link" style="font-size:15px;" href="court_book.php">场馆预约</a>
      </li>
      <li class="nav-item <?php
			if(basename($_SERVER['SCRIPT_NAME'])=='court_manage.php'){echo 'active';}
			?>">
        <a class="nav-link" style="font-size:15px;" href="court_manage.php">订单管理</a>
      </li>
      <li class="nav-item <?php
			if(basename($_SERVER['SCRIPT_NAME'])=='court_manage.php'){echo 'active';}
			?>">
        <a class="nav-link" style="font-size:15px;" href="call_board.php">公告板</a>
	  </li>
	  <li class="nav-item <?php
			if(basename($_SERVER['SCRIPT_NAME'])=='system_login.php'){echo 'active';}
			?>">
        <a class="nav-link" style="font-size:15px;" href="system_login.php">后台管理</a>
	  </li>
	  <?php
			  if($member_id){
				$str=<<<A
									<a class="nav-link " style="margin: 0px 0px 0px 650px;float:right; font-size:15px;">您好！{$_COOKIE['sfk']['name']}</a>
A;
									echo $str;		
								}else{
				$str=<<<A
									<a class="nav-link" style="font-size:15px;" href='login.php'>登录</a>&nbsp;
									<a class="nav-link" style="font-size:15px;" href='register.php'>注册</a>
A;
									echo $str;
								}
	  ?>
     
    </ul>
  </div>
</nav>





	<!-- <div class="header_wrap" >
		<div id="header" class="auto">
			<div class="logo">羽毛球场馆预定</div>
			<div style="color:#fff;
			<?php
			if(basename($_SERVER['SCRIPT_NAME'])=='index.php'){echo 'background:#3b7fc4;';}
			?>
	display:block;
	width:70px;
	float:left;
	text-align:center;
	font-size:14px;
	cursor:pointer;"  >
				<a href='index.php'>场馆介绍</a>
			</div>
			<div style="color:#fff;
			<?php
			if(basename($_SERVER['SCRIPT_NAME'])=='court_book.php'){echo 'background:#3b7fc4;';}
			?>
	display:block;
	width:70px;
	float:left;
	text-align:center;
	font-size:14px;
	cursor:pointer;"  >
				<a href='court_book.php' class="nav.hover">场馆预约</a>
			</div>
			<div style="color:#fff;
	display:block;
	width:70px;
	float:left;
	text-align:center;
	font-size:14px;
	cursor:pointer;"  >
				<a >订单管理</a>
			</div>
			<div style="color:#fff;
	display:block;
	width:70px;
	float:left;
	text-align:center;
	font-size:14px;
	cursor:pointer;"  >
				<a >新闻查看</a>
			</div>
			<div style="color:#fff;
	display:block;
	width:70px;
	float:left;
	text-align:center;
	font-size:14px;
	cursor:pointer;"  >
				<a >留言查看</a>
			</div>
			
			<div class="login">
				<a>登录</a>&nbsp;
				<a>注册</a>
			</div>
		</div>
	</div> -->
	<!-- <div style="margin-top:55px;"></div> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>