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
	<?php include_once '../include/checksession.php'?>
	
  <script>NProgress.start()</script>
	
  <div class="main">
    <nav class="navbar">
      <?php include_once '../include/nav.php'?>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>修改文章</h1>
				<?php
						$id = $_GET['article_id'];
						$sql = "select * from ali_article where article_id=$id";
						include_once '../include/mysqli.php';
						$result = execSql($sql,'One');
						// print_r($result) article_cateid
					?>
      </div>
      <form class="row">
        <div class="col-md-9">
					<div class="form-group">
						<label for="id">ID</label>
						<input id="id" class="form-control input-lg" name="id" type="text" placeholder="ID" readonly
						value="<?php echo $result['article_id']?>" >
					</div>
          <div class="form-group">
            <label for="title">标题</label>
            <input id="title" class="form-control input-lg" name="title" type="text" placeholder="文章标题"
						value="<?php echo $result['article_title']?>" >
          </div>
          <div class="form-group">
            <label for="desc">摘要</label>
            <input id="desc" class="form-control input-lg" name="desc" type="text" placeholder="文章摘要"
						value="<?php echo $result['article_desc']?>">
          </div>
          <div class="form-group">
            <label for="content">内容</label>
            <textarea id="content" name="content" ><?php echo $result['article_text']?></textarea>
          </div>
        </div>
        <div class="col-md-3">         
          <div class="form-group">
            <label for="feature">特色图像</label>
            <img class="help-block thumbnail" src="<?php echo $result['article_file'] ;?>">
            <input id="feature" class="form-control" name="feature" type="file" >
            <input id="get_src" name="file" type="hidden" value="<?php echo $result['article_file'] ;?>">
          </div>
          <div class="form-group">
            <label for="category">所属分类</label>
            <select id="category" class="form-control" name="category">
							
            </select>
          </div>
         
          <div class="form-group">
            <label for="status">状态</label>
            <select id="status" class="form-control" name="status">
              <option value="drafted">草稿</option>
              <option value="published">已发布</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="button">修改</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="aside">
    <?php include_once '../include/aside.php'?>
  </div>
  <script src="/assets/vendors/template-web.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script src="/assets/vendors/layer/layer.js"></script>
  	<script type="text/template" id="tpl">
  		{{each list value}}
  			<option value={{value.cate_id}}>{{value.cate_name}}</option>
  		{{/each}}
  	</script>
  <script type="text/javascript">
  	 var um = UM.getEditor('content', {
		    initialFrameWidth: '100%', //初始化编辑器宽度,默认500
		    initialFrameHeight:200, //初始化编辑器高度,默认500
		  });
		 $.ajax({
		 	type:"post",
		 	url:"getCate.php",
		 	dataType:'json',
		 	success:function(data){
		 		var json = {"list":data};
		 		var html = template('tpl',json);
		 		$('#category').html(html);		
		 	}
		 });	
			
		 $('#feature').change(function(){
		 	var file = this.files[0];
		 	var fd = new FormData();
		 	fd.append('f',file);
		 	$.ajax({
		 		data:fd,
		 		type:"post",
		 		url:"/admin/uploadImg.php",
		 		dataType:'text',
		 		contentType:false,
		 		processData:false,
		 		success:function(data){
		 			if(data == 2){
		 				layer.msg('文件上传成功');
		 			}else{
		 				$('.thumbnail').attr('src',data).show();
		 				$('#get_src').val(data);
		 			}
		 		}
		 	})
		 })
		$('.btn-primary').click(function(){
			var fm = $('.row')[0];
			var fd = new FormData(fm);
			$.ajax({
				data:fd,
				type:"post",
				dataType:'text',
				url:"editarticle_del.php",
				contentType:false,
				processData:false,
				success:function(data){
					console.log(data)
					if(data == 1){						
						layer.alert('文章修改成功',function(){
							window.location.href = "posts.php";
						});
					}else{
						layer.alert('文章修改失败');
					}
				}
			});
		})
  </script>
  <script>NProgress.done()</script>
</body>
</html>