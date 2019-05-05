<meta charset="utf-8" />
<?php
	session_start();
	session_destroy();
	// echo 'é€å‡ºæˆåŠ';
	echo 'Login Out Success';
	header('refresh:2;url=/admin/login.html');

?>