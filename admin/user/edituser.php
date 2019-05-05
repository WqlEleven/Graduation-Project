<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Document</title>
	<link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
<link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
	<?php
		$id = $_GET['id'];
		$sql = "select * from ali_admin where admin_id=$id";
		include_once '../include/mysqli.php';
		$result = execSql($sql,'One');
	?>
	<div class="col-md-4">
      <form id="f">
        <h2>编辑管理员</h2>
         <div class="form-group">
            <label for="email">ID</label>
            <input id="id" class="form-control" name="id" readonly type="text" value="<?php echo $result['admin_id'];?>">
        </div>
        <div class="form-group">
            <label for="email">邮箱</label>
            <input id="email" class="form-control" name="email" type="email" value="<?php echo $result['admin_email'];?>">
        </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" value="<?php echo $result['admin_slug'];?>">
            </div>
            <div class="form-group">
              <label for="nickname">昵称</label>
              <input id="nickname" class="form-control" name="nickname" type="text" value="<?php echo $result['admin_nickname'];?>">
            </div>
            <div class="form-group">
              <label for="password">密码</label>
              <input id="password" class="form-control" name="password" type="text" placeholder="密码">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="button">修改</button>
            </div>
          </form>
        </div>
<script src="../../assets/vendors/jquery.1.11.js"></script>
     <script>
     	$('.btn-primary').click(function() {
				var re = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/; 
				if (re.test($("*[name='email']").val())) {
     		var fm = $('form')[0];
     		var fd = new FormData(fm);
     		$.ajax({
     			url: 'edituser_del.php',
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
				} else {
					alert("邮箱格式不正确");
				}
     	})
     </script>
</body>
</html>

