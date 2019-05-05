<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>毕业设计</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <?php include_once 'left.php'?>
    <?php
		 	include_once 'admin/include/mysql.php';
		 	if(isset($_GET['articleid'])){ 		
		 		$articleid = $_GET['articleid'];
		 	}else{
		 		$articleid = 2;
		 	}
		  $sql = "select ali_article.*,ali_cate.cate_name,ali_admin.admin_nickname from ali_article 
							   join ali_admin  on article_adminid=admin_id
				  			 join ali_cate  on article_cateid=cate_id
				  			 where article_id=$articleid";
		  $result_obj = mysqli_query($conn,$sql); 	
		?> 
    <div class="content">
    	<?php while($row = mysqli_fetch_assoc($result_obj)){?>
      <div class="article">
        <div class="breadcrumb">
          <dl>
            <dt>当前位置：</dt>
            <dd><a href="javascript:;"><?php echo $row['cate_name']?></a></dd>
            <dd><?php echo $row['article_title']?></dd>
          </dl>
        </div>
        <h2 class="title">
          <a href="javascript:;"><?php echo $row['article_title']?></a>
        </h2>
        <div class="meta">
          <span><?php echo $row['admin_nickname']?>发布于 <?php echo $row['article_addtime']?></span>
          <span>分类: <a href="javascript:;"><?php echo $row['cate_name']?></a></span>
          <span>阅读: (<?php echo $row['article_click']?>)</span>
          <span>评论: (<?php echo $row['article_cmt']?>)</span>
        </div>
        <div><?php echo $row['article_text']?></div>
        <?php }?>
      </div>
      
      
      <div class="panel hots">
        <h3>热门推荐</h3>
        <?php
				  $sql = "select * from ali_article order by article_click desc	limit 0,4";
				  $result_obj = mysqli_query($conn,$sql); 	
				 ?> 
        <ul>
        	<?php while($row = mysqli_fetch_assoc($result_obj)){?>
          <li>
            <a href="detail.php?articleid=<?php echo $row['article_id']?>">
              <img src="<?php echo $row['article_file']?>" alt="">
              <span><?php echo $row['article_title']?></span>
            </a>
          </li>
           <?php }?>
        </ul>
      </div>
    </div>
    <div class="footer">
      <p>版权所有德州学院</p>
    </div>
  </div>
</body>
</html>
