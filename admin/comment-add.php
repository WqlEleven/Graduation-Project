<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Add new post &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
  
  <link href="/assets/vendors/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">  
  <script type="text/javascript" src="/assets/vendors/umeditor/third-party/jquery.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="/assets/vendors/umeditor/umeditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/assets/vendors/umeditor/umeditor.min.js"></script>
  <script type="text/javascript" src="/assets/vendors/umeditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
	<?php include_once '/include/checksession.php'?>
  <script>NProgress.start()</script>

  <div class="main">
    <nav class="navbar">
      <?php include_once '/include/nav.php'?>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>写评论</h1>
      </div>
			<?php
					$article_id = $_GET['article_id'];
				?>
      <form class="row">
        <div class="col-md-9">
					<div class="form-group">
						<label for="id">ID</label>
						<input id="id" class="form-control input-lg" name="id" type="text" placeholder="新闻ID" readonly
						value="<?php echo $article_id ?>" >
					</div>
					<div class="form-group">
						<label for="title">写评论</label>
						<input id="title" class="form-control input-lg" name="title" type="text" placeholder="写评论">
					</div>
          <div class="form-group">
            <button class="btn btn-primary" type="button">发表评论</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="aside">
    <?php include_once '/include/aside.php'?>
  </div>
  <script src="/assets/vendors/template-web.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script src="/assets/vendors/layer/layer.js"></script>
  	<script type="text/template" id="tpl">
  		{{each list value}}
  			<option value="1">{{value.cate_name}}</option>
  		{{/each}}
  	</script>
  <script type="text/javascript">
		$('.btn-primary').click(function(){
			var fm = $('.row')[0];
			var fd = new FormData(fm);
			console.log(fd)
			$.ajax({
				data:fd,
				type:"post",
				dataType:'text',
				url:"commentAdd_del.php",
				contentType:false,
				processData:false,
				success:function(data){
					if(data == 1){						
						layer.alert('发表评论成功',function(){
							window.location.href = "comments.php";
						});
					}else{
						layer.alert('发表评论失败');
					}
				}
			});
		})
  </script>
  <script>NProgress.done()</script>
</body>
</html>