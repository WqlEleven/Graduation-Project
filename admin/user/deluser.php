<?php
$id = $_POST['id'];
$sql = "delete from ali_admin where admin_id=$id";
include_once '../include/mysqli.php';
$result = execSql($sql);
echo $result ? 1 : 2;
?>