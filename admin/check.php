<?php
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$sql = "select * from ali_admin where admin_email='$email'";
include_once './include/mysqli.php';
$result = execSql($sql,'One');
if(empty($result)){
	echo 2;
	//用户名错误
}else {
	//用户名正确
	if(md5($pwd) == $result['admin_pwd']){
		session_start();
		$_SESSION['id'] = $result['admin_id'];
		$_SESSION['email'] = $result['admin_email'];
		$_SESSION['nickname'] = $result['admin_nickname'];
		$_SESSION['pic'] = $result['admin_pic'];
		
		echo 1;
		//密码正确
	}else{
		echo 3;
	}
}
?>