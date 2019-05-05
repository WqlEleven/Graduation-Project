<?php
date_default_timezone_set("Asia/Shanghai");
include_once '/include/checksession.php';
$admin_id = $_SESSION['id'];
$title = $_POST['title'];
$article_id = $_POST['id'];
$time = date('Y-m-d H:i:s');
$sql = "insert into ali_comment(cmt_content,cmt_articleid,cmt_memid,cmt_addtime) 
 values ('$title',$article_id,$admin_id,'$time')";
include_once '/include/mysqli.php';
$result = execSql($sql);
if($result){
	echo 1;
}else{
	echo 2;
}
?>