<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
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
      <?php include_once '../include/nav.php'?>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有新闻</h1>
        <a href="post-add.php" class="btn btn-primary btn-xs">写新闻</a>
      </div>
      <div class="page-action">
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
        </form>
        <ul class="pagination pagination-sm pull-right">
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>

  <div class="aside">
  	<?php include_once '../include/aside.php'?>
  </div>
	<?php 
						$sql = "select count(*) as num from ali_article";
						include_once '../include/mysqli.php';
						$result = execSql($sql,'One');
						$pageview = 3;
						$allpage = ceil($result['num'] / $pageview);
					?>
  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script src="/assets/vendors/twbs-pagination/jquery.twbsPagination.js"></script>
  <script src="/assets/vendors/template-web.js"></script>
	<script src="/assets/vendors/layer/layer.js"></script>
  <script type="text/template" id="tpl">
  	{{each list value}}
  		<tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>{{value.article_title}}</td>
            <td>{{value.admin_nickname}}</td>
            <td>{{value.cate_name}}</td>
            <td class="text-center">{{value.article_addtime}}</td>
            <td class="text-center">{{value.article_state}}</td>
            <td class="text-center" style="width: 150px;">
              <a href="editarticle.php?article_id={{value.article_id}}"  class="btn btn-default btn-xs ">编辑</a>
              <a href="javascript:;" data="{{value.article_id}}" class="btn btn-danger btn-xs del">删除</a>
							<a href="../comment-add.php?article_id={{value.article_id}}" data="{{value.cmt_id}}" class="btn btn-default btn-xs ">写评论</a>
            </td>
          </tr>
  	{{/each}}
  </script>
  <script>
  	$('.pagination').twbsPagination({
			totalPages: <?php echo $allpage ; ?>,
			visiblePages: 5,
			first: '首页',
			prev: '上一页',
			next: '下一页',
			last: '尾页',
			onPageClick: function (event, page) {
				$.ajax({
					data:{pageclick:page},
					type:"post",
					dataType:'json',
					url:'getContent.php',
					success:function(data){
						console.log(data)
						var json = {"list":data};
						var html = template('tpl',json);
						$('tbody').html(html);
						
					}
				})
			}
		})
		$('tbody').on('click','.del',function(){
			_this = $(this);
			layer.confirm('您确定要删除吗？',function(){
				var did = _this.attr('data');
				$.ajax({
					type:"post",
					url:"delarticle.php",
					data:{id:did},
					dataType:'text',
					success:function(data){
						if(data == 1){
							layer.msg('删除成功');
							_this.parent().parent().remove();
						}else{
							layer.msg('删除失败!');
						}
					}
				});
			})
		})
  </script>
  <script>NProgress.done()</script>
</body>
</html>
