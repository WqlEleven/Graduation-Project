
<?php
date_default_timezone_set("Asia/Shanghai");
include_once '../include/checksession.php';
$admin_id = $_SESSION['id'];
$id = $_POST['id'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$text= $_POST['content'];
$file = $_POST['file'];
$cate_id = $_POST['category'];
$state = $_POST['status'];
$time = date('Y-m-d H:i:s');

$sql = "update ali_article set article_title='$title',article_desc='$desc',article_text='$text',
article_file='$file',article_cateid='$cate_id',article_state='$state',article_addtime='$time' where article_id=$id";
include_once '../include/mysqli.php';
$result = execSql($sql);
echo $result;
// if($result){
// 	echo '修改成功';
// 	header('refresh:2;url=posts.php');
// }
// else{
// 	echo '修改失败';
// 	header('refresh:2;url=posts.php');
// }
?>