<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/config.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
if(isset($_POST['submit']))
{
	//验证
	include 'inc/check_add.inc.php';
	
	$query="insert into court_manage(court_id,start_time,end_time,data,price) values({$_POST['court_id']},'{$_POST['start_time']}','{$_POST['end_time']}','{$_POST['data']}',{$_POST['price']})";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		skip('court.php','ok','恭喜你，添加成功！');
	}
	else{
		skip('add_court_manage.php','error','对不起，添加失败！');
	}
}


$template['title']='添加时段';
$template['css']=array('style/public.css');


?>

<?php
include_once './inc/header.inc.php';
?>

<div id="main">
	<div class="title" style="margin-bottom:20px;">添加时段</div>
	<form method="post">
		<table class="au">
		<tr>
				<td>请选择场馆</td>
				<td>
					<select name="court_id">
						<option value="0">======请选择一个场馆======</option>
						<?php
						$query="select * from court";
						$result_court=execute($link,$query);
						while ($data_court=mysqli_fetch_assoc($result_court)){
							echo "<option value='{$data_court['id']}'>{$data_court['court_name']}</option>";
						}
						?>
					</select>
				</td>
				<td>
					必须选择场馆
				</td>
			</tr>

			<tr>
                <td>开始时间</td>
                <td><input type="time" name='start_time' value="00:00"/></td>
                <td>请输入开始时间</td>
            </tr>
			<tr>
                <td>结束时间</td>
                <td><input type="time" name='end_time' value="00:00"/></td>
                <td>请输入结束时间（不得小于1小时）</td>
            </tr>
        </tr>
        <tr>
            <td>日期</td>
            <td><input type="date" name='data' value='<?php echo date('Y-m-d')?>'/></td>
            <td>请输入日期</td>
        </tr>
        
        <tr>
            <td>价格</td>
            <td><input type="text" name='price' value="0"/></td>
            <td>请输入价格</td>
        </tr>
		</table>
		<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="添加" />
	</form>
</div>

<?php
include_once './inc/footer.inc.php';
?>
	