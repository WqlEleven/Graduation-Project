<meta charset="utf-8" />
<?php
	session_start();
	session_destroy();
	// echo '�出成�';
	echo 'Login Out Success';
	header('refresh:2;url=/admin/login.html');

?>