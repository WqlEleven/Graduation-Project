<?php
	$pic = $_POST['pic'];
	$email = $_POST['email'];
	$slug = $_POST['slug'];
	$nickname = $_POST['nickname'];
	$sign = $_POST['sign'];
	$sql = "update ali_admin set admin_sign='$sign',admin_slug='$slug',
	admin_nickname='$nickname',admin_pic='$pic'where admin_email='$email'";
	include_once 'include/mysqli.php';
	$result = execSql($sql);
	echo $result ? 1 : 2;
?>