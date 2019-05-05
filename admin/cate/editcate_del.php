<meta charset="utf-8" />
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$slug = $_POST['slug'];
$icon = $_POST['icon'];
$state = $_POST['state'];
$show = $_POST['show'];

$sql = "update ali_cate set cate_name='$name',cate_slug='$slug',cate_icon='$icon',
cate_state='$state',cate_show='$show'where cate_id=$id";
include_once '../include/mysqli.php';
$result = execSql($sql);
if($result){
	echo '修改成功';
	header('refresh:2;url=categories.php');
}
else{
	echo '修改失败';
	header('refresh:2;url=editcate.php');
}
?>