<?php 
if(empty($_POST['court_name'])){
	skip('court_update.php','error','场地名称不得为空！');
}
if(mb_strlen($_POST['court_name'])>32){
	skip('court_update.php','error','场地名称不得多余32个字符！');
}
if(empty($_POST['intro'])){
	skip('court_update.php','error','场地简介不得为空！');
}
if(mb_strlen($_POST['court_name'])>255){
	skip('court_update.php','error','场地简介不得多于255个字符！');
}

$query="select * from court where court_name='{$_POST['court_name']}'";

$result=execute($link,$query);
if(mysqli_num_rows($result)){
	skip('court_update.php','error','这个版块已经有了！');
}
?>