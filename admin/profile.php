<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
	<?php include_once 'include/checksession.php'?>
  <script>NProgress.start()</script>

  <div class="main">
    <nav class="navbar">
      <?php include_once 'include/nav.php';?>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>我的个人资料</h1>
        <?php
					$id = $_SESSION['id'];
					$sql = "select * from ali_admin where admin_id=$id";
					include_once 'include/mysqli.php';
					$result = execSql($sql,'One');
				?>
      </div>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-3 control-label">头像</label>
          <div class="col-sm-6">
            <label class="form-image">
              <input id="avatar" type="file" >
              <img id="avatar_img" src="<?php echo $result['admin_pic'] ;?>">              	
              <i class="mask fa fa-upload"></i>              
            </label>
            <input id="img_src" name="pic" value="" class="help-block" type="hidden"/>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">邮箱</label>
          <div class="col-sm-6">
            <input id="email" class="form-control" name="email" type="type" value="<?php echo $result['admin_email'] ;?>" placeholder="邮箱" readonly>
           
          </div>
        </div>
        <div class="form-group">
          <label for="slug" class="col-sm-3 control-label">别名</label>
          <div class="col-sm-6">
            <input id="slug" class="form-control" name="slug" type="type" value="<?php echo $result['admin_slug'] ;?>" placeholder="slug">
           
          </div>
        </div>
        <div class="form-group">
          <label for="nickname" class="col-sm-3 control-label">昵称</label>
          <div class="col-sm-6">
            <input id="nickname" class="form-control" name="nickname" type="type" value="<?php echo $result['admin_nickname'] ;?>" placeholder="昵称">
            <p class="help-block">限制在 2-16 个字符</p>
          </div>
        </div>
        <div class="form-group">
          <label for="bio" class="col-sm-3 control-label">简介</label>
          <div class="col-sm-6">
            <textarea id="bio" class="form-control" placeholder="Bio" name="sign" cols="30" rows="6"><?php echo $result['admin_sign'] ;?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="button" class="btn btn-primary">更新</button>
            <!-- <a class="btn btn-link" href="password-reset.php">修改密码</a> -->
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="aside">
      <?php include_once 'include/aside.php';?>
  </div>
  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script src="/assets/vendors/layer/layer.js"></script>
  <script>
  	$('.btn-primary').click(function(){
  		var fm = $('.form-horizontal')[0];
  		var fd = new FormData(fm);
  		$.ajax({
  			data:fd,
  			type:"post",
  			dataType:'text',
  			contentType: false,
			  processData: false,
  			url:"personup.php",
  			success:function(data){
					if(data == 1){
						layer.alert('更新成功');
					}else{
						layer.alert('更新失败');
					}
  			}
  		});
  	})
  	$('#avatar').change(function(){
		var file = this.files[0];
		var fd = new FormData();
		fd.append('f',file);
		$.ajax({
			data:fd,
			type:"post",
			url:"uploadImg.php",
			dataType:'text',
			contentType:false,
			processData:false,
			success:function(data){
				if(data == 2){
					layer.msg('头像上传失败');
				}else{
					layer.msg('头像上传成功');
					$('#avatar_img').attr('src',data);
					$('#img_src').val(data);
				}
			}
		});
  	})
  </script>
  <script>NProgress.done()</script>
</body>
</html>