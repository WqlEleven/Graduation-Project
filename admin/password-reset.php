<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Password reset &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
	<?php include_once 'include/checksession.php'?>
  <script>NProgress.start()</script>

  <div class="main">
    <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.html"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.html"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>修改密码</h1>
      </div>
      <form class="form-horizontal" id="f">
        <div class="form-group">
          <label for="old" class="col-sm-3 control-label">旧密码</label>
          <div class="col-sm-7">
            <input id="old" class="form-control" type="password" placeholder="旧密码">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">新密码</label>
          <div class="col-sm-7">
            <input id="password" class="form-control" type="password" placeholder="新密码">
          </div>
        </div>
        <div class="form-group">
          <label for="confirm" class="col-sm-3 control-label">确认新密码</label>
          <div class="col-sm-7">
            <input id="confirm" class="form-control" type="password" placeholder="确认新密码">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-7">
            <button type="button" class="btn btn-primary">修改密码</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="aside">
  		<?php include_once 'include/aside.php';?>
  </div>

  <script src="../assets/vendors/jquery/jquery.js"></script>
  <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
 <script>
 $('.btn-primary').click(function() {
 	var fm = $('form')[0];
 	var fd = new FormData(fm);
 	$.ajax({
 		url: 'passwordSet_del.php',
 		data: fd,
 		type: 'post',
 		dataType: 'text',
 		contentType: false,
 		processData: false,
 		success:function(data){
 			if (data == 1) {
 				console.log(data);
 					parent.layer.alert('修改管理员成功', function (i) {
 						var index = parent.layer.getFrameIndex(window.name);
 						parent.layer.close(index);
 						parent.layer.close(i);				
 						//重新载入页面
 						parent.location.reload();
 					});
 				} else {
 					parent.layer.alert('修改管理员失败');
 			
 				}
 		}
 	});
 })
 </script>
	<script>NProgress.done()</script>
</body>
</html>
