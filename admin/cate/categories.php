<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
	<?php include_once '../include/checksession.php'?>
  <script>NProgress.start()</script>
  
  <div class="main">
    <nav class="navbar">
      <?php include_once '../include/nav.php';?>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
        <input class="btn btn-primary btn-xs" type="button" value="添加栏目" onclick="location.href='addcate.php'" />
      </div>
      <div class="row">
       
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
       
           <?php
		          $sql = 'select * from ali_cate';
		          include_once '../include/mysqli.php';
		          $result = execSql($sql,'All');
//		          print_r($result);	
		       ?>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>日期</th>
                <th>图标</th>
                <th>状态</th>
                <th>显示</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
            <?php
	          	foreach($result as $value){	
	          		
	          ?>
           
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td><?php echo $value['cate_name'];?></td>
                <th><?php echo $value['cate_slug'];?></th>
              	<th><?php echo $value['cate_addtime'];?></th>
                <th><?php echo $value['cate_icon'];?></th>
                <th><?php echo $value['cate_state'] == 1?'启用':'禁用';?></th>
                <th><?php echo $value['cate_show']==1?'显示':'隐藏';?></th>
                <td class="text-center">
                  <a href="editcate.php?id=<?php echo $value['cate_id'];?>" class="btn btn-info btn-xs">编辑</a>
                  <a href="deletecate.php?id=<?php echo $value['cate_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('您删除吗？')">删除</a>
                </td>
              </tr>
              <?php
            	}
            	?>
            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
 		<?php include_once '../include/aside.php';?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
