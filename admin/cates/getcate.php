<?php
$sql = "select * from ali_cate";
include_once '../include/mysqli.php';
$result_obj = execSql($sql,'All');
echo json_encode($result_obj);
?>