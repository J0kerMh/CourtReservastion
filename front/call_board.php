<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();

// if(isset($_POST['submit2']))
// {
//     var_dump($_POST);
//     exit();
// }
$member_id=is_login($link);
$template['title']='场馆预约';
$template['css']=array('style/public.css');
?>


<?php include 'inc/header.inc.php'?>




<?php
$query="select * from call_board";
$result=execute($link,$query);
while($data=mysqli_fetch_assoc($result))
{
    $str=<<<A
    <div class="container " >
    <div class="card border-dark mb-3 text-center" style="width: 70rem;">
    <div class="card-header">公告1</div>
  <div class="card-body">
    <p class="card-text">
    {$data['content']}
    </p>
  </div>
    </div>
    </div>
A;

    echo $str;


}
?>
<?php include 'inc/footer.inc.php'?>
                         