<?php 
$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
$state = isset($_GET['state']) ? $_GET['state'] : $_POST['state'];

$sql = "update ali_comment set state='$$state' where cmt_id=$id";

include_once '../../include/mysql.php';
$result_bool = mysqli_query($conn, $sql);

if ($result_bool) {
    echo '{"code": 202, "message": "批准评论成功", "result":"success"}';
} else {
    echo '{"code": 203, "message": "批准评论失败", "result":"error"}';
}
?>