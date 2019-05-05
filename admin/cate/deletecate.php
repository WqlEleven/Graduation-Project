<meta charset="utf-8" />
<?php
$id = $_GET['id'];
$sql = "delete from ali_cate where cate_id=$id";
include_once '../include/mysqli.php';
$result = execSql($sql);
if($result){
	echo "删除栏目成功";
	header('refresh:2;url=categories.php');
}else{
	echo "删除栏目失败";
	header('refresh:2;url=categories.php');
}
?>