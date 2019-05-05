<?php
$email = $_POST['email'];
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
$pwd = md5($_POST['password']);

$sql = "insert into ali_admin(admin_id, admin_email, admin_slug, admin_nickname, admin_pwd) 
values(null, '$email', '$slug', '$nickname', '$pwd')";
include_once '../include/mysqli.php';
$result = execSql($sql);
echo $result ? 1 : 2;


?>