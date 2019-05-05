<?php
 $pageclick = $_POST['pageclick'];
 $pageview = 3;
 $start = $pageview * ($pageclick - 1);
	$sql = "SELECT ali_comment.cmt_id,ali_comment.cmt_content,ali_comment.cmt_addtime,ali_comment.cmt_state,ali_article.article_title,ali_article.article_id
			,ali_member.member_nickname FROM ali_comment
			JOIN ali_article ON ali_comment.cmt_articleid=ali_article.article_id
			JOIN ali_member ON ali_member.member_id=ali_comment.cmt_memid  
			limit $start,$pageview";
include_once '../../include/mysql.php';
//$result = execSql($sql,'All');
$result_obj = mysqli_query($conn, $sql);

$arr = [];
while ($row = mysqli_fetch_assoc($result_obj)) {
    $arr[] = $row;
}

if (!empty($arr)) {
    $result = [
        'code' => 200,
        'data' => $arr,
        'message' => '获取评论数据成功'
    ];
} else {
    $result = [
        'code' => 201,
        'data' => null,
        'message'  => '没有评论数据'
    ];
}

echo json_encode($result);


?>