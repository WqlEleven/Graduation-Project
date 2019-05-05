<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>版权所有德州学院</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <?php include_once 'left.php'?>
    <div class="content">
      <div class="panel new">
      	<?php
      		if(isset($_GET['id']) && isset($_GET['name'])){    			
      			$id = $_GET['id'];
      			$name = $_GET['name'];
      		}else{
      			$id = 1;
      			$name = '潮科技';
      		}
      		include_once 'admin/include/mysql.php';
				  $sql = "select ali_article.*,ali_cate.cate_name,ali_admin.admin_nickname from ali_article 
							   join ali_admin  on article_adminid=admin_id
				  			 join ali_cate  on article_cateid=cate_id
				  			 where cate_id=$id";
				  $result_obj = mysqli_query($conn,$sql); 	
      	?>     		
        <h3><?php echo $name;?></h3>
        <?php while($row = mysqli_fetch_assoc($result_obj)){?>
        <div class="entry">
          <div class="head">
          <a href="detail.php?articleid=<?php echo $row['article_id']?>">
            	<?php echo $row['article_title']?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $row['admin_nickname']?> 发表于 <?php echo $row['article_addtime']?></p>
            <p class="brief"><?php echo $row['article_desc']?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $row['article_click']?>)</span>
              <span class="comment">评论(<?php echo $row['article_cmt']?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $row['article_good']?>)</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="<?php echo $row['article_file']?>" alt="">
            </a>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
    <div class="footer">
      <p>版权所有德州学院</p>
    </div>
  </div>
</body>
</html>
