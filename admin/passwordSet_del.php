<?php
$old = $_POST['old'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
if($password == ''){
	$sql = "update ali_admin set admin_email='$email',admin_slug='$slug',
	admin_nickname='$nickname' where admin_id=$id";
}else{
	$sql = "update ali_admin set admin_email='$email',admin_slug='$slug',
	admin_nickname='$nickname',admin_pwd='$password' where admin_id=$id";
}
include_once '../include/mysqli.php';
$result = execSql($sql);
echo $result ? 1 : 2;
?>