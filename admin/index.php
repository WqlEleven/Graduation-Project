<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>新闻管理系统</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
	<?php include_once 'include/checksession.php';?>
	
  <script>NProgress.start()</script>

  <div class="main">
  	<nav class="navbar">
    	<?php include_once 'include/nav.php';?>
    </nav>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>One Belt, One Road</h1>
        <p>Thoughts, stories and ideas.</p>
        <p><a class="btn btn-primary btn-lg" href="/admin/article/post-add.php" role="button">写新闻</a></p>
      </div>
			<!--  -->
			<?php
			 	include_once 'include/mysql.php';
			  $sql = 'select count(1) FROM ali_article';
			  $result =mysqli_query($conn, $sql);	
				$article = mysqli_fetch_array($result);
				$sqlb = 'select count(1) FROM ali_cate';
				$resultb =mysqli_query($conn, $sqlb);	
				$cate = mysqli_fetch_array($resultb);
				$sqlc = 'select count(1) FROM ali_comment';
				$resultc =mysqli_query($conn, $sqlc);	
				$comment = mysqli_fetch_array($resultc);
			 ?> 
    <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
             <li class="list-group-item"><strong><?php echo $article[0]?>篇文章</li>
              <li class="list-group-item"><strong><?php echo $cate[0]?></strong>个分类</li>
              <li class="list-group-item"><strong><?php echo $comment[0]?></strong>条评论</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>

  <div class="aside">
    <?php include_once 'include/aside.php';?>
  </div>

  <script src="../assets/vendors/jquery/jquery.js"></script>
  <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
