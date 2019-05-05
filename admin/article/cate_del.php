<?php
date_default_timezone_set("Asia/Shanghai");
include_once '../include/checksession.php';
$admin_id = $_SESSION['id'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$text= $_POST['content'];
$file = $_POST['file'];
$cate_id = $_POST['category'];
$state = $_POST['status'];
$time = date('Y-m-d H:i:s');
$sql = "insert into ali_article(article_id,article_adminid,article_title,article_desc,
 article_text,article_file,article_cateid,article_state,article_addtime) 
 values (null,$admin_id,'$title','$desc','$text','$file',$cate_id,'$state','$time')";
include_once '../include/mysqli.php';
$result = execSql($sql);
if($result){
	echo 1;
}else{
	echo 2;
}
?>