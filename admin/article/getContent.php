<?php
 $pageclick = $_POST['pageclick'];
 $pageview = 3;
 $start = $pageview * ($pageclick - 1);
 $sql = "select ali_article.*,ali_admin.admin_nickname,ali_cate.cate_name from ali_article 
 JOIN ali_admin ON ali_article.article_adminid=ali_admin.admin_id
JOIN ali_cate ON ali_article.article_cateid = ali_cate.cate_id
 limit $start,$pageview";
 include_once '../include/mysqli.php';
 $result = execSql($sql,'All');
 echo json_encode($result);

?>