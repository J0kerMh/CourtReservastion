<?php
include_once '../inc/mysql.inc.php';
include_once '../inc/config.inc.php';
include_once '../inc/tools.inc.php';
$link=connect();
$template['title']='公告板板管理';
$template['css']=array('style/public.css');

if(isset($_POST['submit']))
{
    $query="insert into call_board (content) values('{$_POST['content']}')";
    execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		skip('court.php','ok','恭喜你，发布成功！');
	}
	else{
		skip('add_court_manage.php','error','对不起，发布失败！');
	}
}

?>

<?php
include_once './inc/header.inc.php';
?>

<div id="main">

<form  method="post">
        <div id="div2" style="width:50%"></div>
        <textarea id="text1" style=" display:none" name="content"></textarea>
        <input type="submit" id="submit" name="submit" class="btn btn-primary" style="margin:10px" value="发布" onclick="changetextarea()">
    </form>


    <!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
    <script type="text/javascript" src="../style/wangEditor.min.js"></script>

    <script type="text/javascript">
    var E = window.wangEditor
    var editor = new E('#div2')
    //自定义菜单配置
    editor.customConfig.menus = [
        'head',
        'bold',
        'italic',
        'underline',
        'fontSize',  // 字号
        'italic',  // 斜体
        'strikeThrough',  // 删除线
        'foreColor',  // 文字颜色
        'backColor',  // 背景颜色
        'link',  // 插入链接
        'list',  // 列表
        'justify',  // 对齐方式
        'quote',  // 引用
        'emoticon',  // 表情
        'code',  // 插入代码
        'undo'  // 撤销
    ]
    editor.create()
    var text1 = $('#text1');
    editor.customConfig.onchange = function (html) {
        // 监控变化，同步更新到 textarea
        text1.val(editor.txt.html());
    };

    function changetextarea(){

        text1.val(editor.txt.html());
    }
    // 初始化 textarea 的值
    text1.val(editor.txt.html())



    
</script>
</div>

<?php
include_once './inc/footer.inc.php';
?>
		