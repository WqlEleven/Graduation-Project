<?php
$sql = "select * from ali_cate where cate_state=1";
include_once '../include/mysqli.php';
$result = execSql($sql,'All');
echo json_encode($result);
?>