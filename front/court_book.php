<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
if(!$member_id=is_login($link)){
	skip('login.php', 'error', '请登录!');
}

if(isset($_POST['submit2']))
{
    // var_dump($_POST);
    // exit();
    foreach ($_POST['id'] as $id){
        
        if(is_numeric($id))
        {
            $query[]="update court_manage set member_id={$member_id} where id={$id}";
        }
    }
    // var_dump($query);
    // exit();
    if(execute_multi($link,$query,$error))
	{
		skip('index.php','ok','预定成功！');
	}
	else
	{
		skip('court_book.php','eroor',$error);

	}
}

$template['title']='场馆预约';
$template['css']=array('style/public.css','style/index.css');
?>


<?php include 'inc/header.inc.php'?>
<div class="container">
    <form method='post' >
    <?php 
          if(isset($_POST['submit1']))
            {
                $query="select court_name from court where id={$_POST['court_id']}";
                $result=execute($link,$query);
                $data=mysqli_fetch_assoc($result);

                ?>

<div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputCity">日期</label>
            <input type="date" name="data" class="form-control" name='data' value='<?php echo $_POST['data'];?>' />
        </div>

        <div class="form-group col-md-3">
        <label for="inputState">场馆</label>
        <select name="court_id" class="form-control">
        <?php
              echo "<option value='{$_POST['court_id']}'>{$data['court_name']}</option>";
             
            }
            else{
         ?>   
        <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputCity">日期</label>
            <input type="date" name="data" class="form-control" name='data' value=''/>
        </div>

        <div class="form-group col-md-3">
        <label for="inputState">场馆</label>
        <select name="court_id" class="form-control">
        <option value="0">请选择一个场馆</option>
        <?php
						$query="select * from court";
						$result_court=execute($link,$query);
						while ($data_court=mysqli_fetch_assoc($result_court)){
							echo "<option value='{$data_court['id']}'>{$data_court['court_name']}</option>";
						}
        ?>

        <?php
          }?>
        </select>
        </div>
        <div class="form-group col-md-3">

            
            <button type="submit" name="submit1" class="btn btn-sm btn-primary" style="margin:30px">选择</button>       
        </div>
        <div class="container">       
<?php
    if(isset($_POST['submit1']))
    {
        echo '<div class="btn-group-toggle " data-toggle="buttons">';
        $query="select * from court_manage where court_id={$_POST['court_id']} and data='{$_POST['data']}' and id='0'";
        $result=execute($link,$query);
                        while ($data=mysqli_fetch_assoc($result)){
                            $str=<<<A

                            <label class="btn btn-secondary ">
                                <input type="checkbox" name="id[{$data['id']}]" value="{$data['id']}"  checked autocomplete="off"> {$data['start_time']} - {$data['end_time']} 
                            </label>
                         
A;
							echo $str;
						}
        echo ' </div>';

        echo '<button type="submit" name="submit2" class="btn btn-lg btn-primary" style="margin:30px 0px">预约</button> ';
    }
    
?> 
</div>
    </form>

</div>

<?php include 'inc/footer.inc.php'?>