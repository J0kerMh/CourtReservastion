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


$template['title']='场馆预约';
$template['css']=array('style/public.css','style/index.css');
?>


<?php include 'inc/header.inc.php'?>


<?php include 'inc/footer.inc.php'?>
                         