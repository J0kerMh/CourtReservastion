<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/config.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
$template['title']='场馆介绍';
$template['css']=array('style/public.css');


$query="select * from court";

?>

<?php
include_once './inc/header.inc.php';
?>

<div id="accordion" style="width:70%;
	margin:57px 0 0 160px;">

<?php
		$query="select * from court";
		
		$result=execute($link,$query);
		while($data=mysqli_fetch_assoc($result))
		{
			$str=<<<A
			<div class="card">
			<div class="card-header" id="heading{$data['id']}">
			<h5 class="mb-0">
			<button class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapse{$data['id']}" aria-expanded="true" aria-controls="collapse{$data['id']}">
			{$data['court_name']}(点击展开)
			</button>
			</h5>
			</div>
			
			<div id="collapse{$data['id']}" class="collapse" aria-labelledby="heading{$data['id']}" data-parent="#accordion">
			<div class="card-body">
			<textarea  rows="3" cols="142" readonly="readonly">{$data['intro']}</textarea>
			<a href="court_update.php?id={$data['id']}">
				<button type="submit" class="btn btn-sm btn-outline-info">修改</button>
			</a>
			<a href="court_delete.php?id={$data['id']}">
				<button type="submit" class="btn btn-sm btn-outline-danger">删除</button>
			</a>
				</div>
				</div>
				
A;
				echo $str;
			}
			
			?>
			
			
			</div>
			
<!-- <iframe style="float:right" frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=494410758&auto=1&height=66"></iframe>		 -->
<?php
include_once './inc/footer.inc.php';
?>
		