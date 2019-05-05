<?php
	session_start();
	if(empty($_SESSION['id'])){
		echo '您尚未登录，请先登录';
		header('refresh:2;url=/admin/login.html');
		die();
	}
?>