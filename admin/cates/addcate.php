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
  <script>NProgress.start()</script>    
        <div class="col-md-4">
          <form>
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
             
            </div>
             <div class="form-group">
              <label for="icon">图标</label>
              <input id="icon" class="form-control" name="icon" type="text" placeholder="icon">
             
            </div>
             <div class="form-group">
              <label for="state">状态</label>
              <input id="state"  name="state" type="radio" value="1">启用
              <input id="state"  name="state" type="radio"value="2" >禁止             
            </div>
             <div class="form-group">
              <label for="show">别名</label>
              <input id="show"  name="show" type="radio" value="1">显示
              <input id="show"  name="show" type="radio" value="2">隐藏
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="button">添加</button>
            </div>
          </form>
        </div>       
  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>
  	$('.btn-primary').click(function(){
  		var fm = $('form');
  		var fd = new FormData(fm);
  		$.ajax({
  			data:fd,
  			type:"post",
  			dataType:'text',
  			url:"addcate_del.php",
  			success:function(data){
  				console.log(data);
  			}
  			
  		});
  	})
  </script>
  <script>NProgress.done()</script>
</body>
</html>
