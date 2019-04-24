<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();

$member_id=is_login($link);

$template['title']='首页';
$template['css']=array('style/public.css','style/index.css');
?>
<?php include 'inc/header.inc.php'?>

<div class="card-deck" style="height:100px;width:80%;margin:57px 0 0 160px;">

	<?php
		$query="select * from court";

		$result=execute($link,$query);
		while($data=mysqli_fetch_assoc($result))
		{
			$str=<<<A
			<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="{$data['photo']}" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">{$data['court_name']}</h5>
			  <p class="card-text">{$data['intro']}</p>
			</div>
		  </div>
A;
			echo $str;
		}
	
	?>
 
</div>

<?php include 'inc/footer.inc.php'?>