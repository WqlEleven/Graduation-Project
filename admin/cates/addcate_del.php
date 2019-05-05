<?php
	ini_set('date.timezone','Asia/Shanghai');
	$cate_name = $_POST['name'];
	$cate_slug = $_POST['slug'];
	$cate_icon = $_POST['icon'];
	$cate_addtime = date('Y-m-d');
	$cate_state = $_POST['state'];
	$cate_show = $_POST['show'];
	
	$sql = "insert into ali_cate values(null,'$cate_name','$cate_slug','$cate_addtime','$cate_icon',
		$cate_state,$cate_show)";
		include_once '../include/mysqli.php';
		$result = execSql($sql);
		if($result){
			header('refresh:2;url=categories.php');
		}else{
			header('refresh:2;url=addcate.php');
		}

?>