<?php 
$arr = explode('/', $_SERVER['PHP_SELF']);
// print_r($arr);
?>
<div class="profile">
      <img class="avatar" src="<?php echo $_SESSION['pic']?>">
      <h3 class="name"><?php echo $_SESSION['nickname']?></h3>
    </div>
    <ul class="nav">
      <li <?php if($arr[2] == 'index.php') echo 'class="active"';?>>
        <a href="/admin/index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li <?php if($arr[2] == 'article' || $arr[2] == 'cate') echo 'class="active"';?>>
        <a href="#menu-posts" 
        	<?php if($arr[2] != 'article' && $arr[2] != 'cate') echo 'class="collapsed"';?> 
        	data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>新闻<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapsed collapse">
          <li><a href="/admin/article/posts.php">所有新闻</a></li>
          <li><a href="/admin/article/post-add.php">写新闻</a></li>
          <li><a href="/admin/cate/categories.php">分类目录</a></li>
        </ul>
      </li>
      <li <?php if($arr[2] == 'comments.php') echo 'class="active"';?>>
        <a href="/admin/comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li <?php if($arr[2] == 'user') echo 'class="active"';?>>
        <a href="/admin/user/users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <!-- <li><a href="nav-menus.html">导航菜单</a></li> -->
          <li><a href="/admin/slides.php">图片轮播</a></li>
          <!-- <li><a href="/admin/settings.php">网站设置</a></li> -->
        </ul>
      </li>
    </ul>