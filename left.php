<?php
 	include_once 'admin/include/mysql.php';
  $sql = 'select * from ali_cate where cate_show=1';
  $result_obj = mysqli_query($conn, $sql);	
 ?> 
    <div class="header">
      <h1 class="logo" style="overflow: hidden;">
				<a href="index.php"><img src="assets/img/logo1.png" alt="" style="width: 90%;height: 60px;margin-top: 25px;"></a></h1>
      <ul class="nav">
      	<?php while($row = mysqli_fetch_assoc($result_obj)){?>
        <li>
        	<a href="list.php?id=<?php echo $row['cate_id']?> & name=<?php echo $row['cate_name']?>">
        	<i class="fa <?php echo $row['cate_icon']?>"></i><?php echo $row['cate_name']?></a>
        </li>
        <?php }?>       
      </ul>
      <div class="search">
      </div>
      <div class="slink">
      </div>
    </div>
    <div class="aside">
      <div class="widgets">
        <h4>随机推荐</h4>
        <?php
        	$sql = " select * from ali_article order by rand() limit 0, 5";
        	$result_obj = mysqli_query($conn,$sql);
        ?>
        <ul class="body random">
        	<?php while($row = mysqli_fetch_assoc($result_obj)){?>
          <li>
            <a href="detail.php?articleid=<?php echo $row['article_id']?>">
              <p class="title"><?php echo $row['article_title']?></p>
              <p class="reading">阅读(<?php echo $row['article_click']?>)</p>
              <div class="pic">
                <img src="<?php echo $row['article_file']?>" alt="">
              </div>
            </a>
          </li>
         <?php }?>
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <?php
        	$sql = " select ali_comment.*,ali_member.member_nickname from ali_comment 
										JOIN ali_member ON cmt_memid = member_id
										order by cmt_addtime desc limit 0, 6";
        	$result_obj = mysqli_query($conn,$sql);
        ?>
        <ul class="body discuz">
        	<?php while($row = mysqli_fetch_assoc($result_obj)){?>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span><?php echo $row['member_nickname']?></span><?php echo $row['cmt_addtime']?>
                </p>
                <p><?php echo $row['cmt_content']?></p>
              </div>
            </a>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
  
