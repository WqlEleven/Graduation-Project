<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Comments &laquo; Admin</title>
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
     <?php include_once 'include/nav.php'?>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有评论</h1>
      </div>
      <div class="page-action">
        <div class="btn-batch" style="display: none">
          <button class="btn btn-info btn-sm">批量批准</button>
          <button class="btn btn-warning btn-sm">批量拒绝</button>
          <button class="btn btn-danger btn-sm">批量删除</button>
        </div>
        <ul class="pagination pagination-sm pull-right">
          <?php
						$sql = "select count(*) as num from ali_comment";
						include_once 'include/mysqli.php';
						$result = execSql($sql,'One');
						$pageview = 3;
						$pagelist = ceil($result['num'] / $pageview);
					?>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>作者</th>
            <th>评论</th>
            <th>评论在</th>
            <th>提交于</th>
            <th>状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

  <div class="aside">
    <?php include_once 'include/aside.php'?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script src="/assets/vendors/template-web.js"></script>
  <script src="/assets/vendors/twbs-pagination/jquery.twbsPagination.js" ></script>
  <script type="text/javascript" src="/assets/vendors/layer/layer.js" ></script>
  <script type="text/template" id="tpl">
  {{each data value}}
  	<tr class="danger">
            <td class="text-center"><input type="checkbox"></td>
            <td>{{value.member_nickname}}</td>
            <td>{{value.cmt_content}}</td>
            <td>{{value.article_title}}</td>
            <td>{{value.cmt_addtime}}</td>
            <td>{{value.cmt_state}}</td>
            <td class="text-center">
              <!-- <a href="javascript:;" data="{{value.cmt_id}}" status="{{value.cmt_state}}" class="btn btn-info btn-xs status">批准</a> -->
              <a href="javascript:;" data="{{value.cmt_id}}" class="btn btn-danger btn-xs del">删除</a>
            </td>
          </tr>
  {{/each}}
  </script>
  <script>
  $('tbody').on('click','.del',function(){
  	 _this = $(this);
  	layer.confirm('您确定要删除吗？',function(){
  		var did = _this.attr('data');
			$.ajax({
				type:"post",
				url:"http://www.alishow.com/admin/api/comments/delCmt.php",
				data:{id:did},
				dataType:'json',
				success:function(data){
					console.log(data);
					if(data.code == 202){
						layer.alert(data.message);
						_this.parent().parent().remove();
					}else{
						layer.alert(data.message);
					}
				}
			});
  	})
  })
$('tbody').on('click','.status',function(){
  	 _this = $(this);
  	layer.confirm('您确定要批准吗？',function(){
  		var did = _this.attr('data');
			var status = _this.attr('status');
			$.ajax({
				type:"post",
				url:"http://www.alishow.com/admin/api/comments/delStatus.php",
				data:{id:did,state:status},
				dataType:'json',
				success:function(data){
					console.log(data);
					if(data.code == 202){
						layer.alert(data.message);
						_this.parent().parent().remove();
					}else{
						layer.alert(data.message);
					}
				}
			});
  	})
  })
	$('.pagination').twbsPagination({
			totalPages: <?php echo $pagelist ; ?>,
			visiblePages: 3,
			first: '首页',
			prev: '上一页',
			next: '下一页',
			last: '尾页',
			onPageClick: function (event, page) {
				$.ajax({
					data:{pageclick:page},
					type:"post",
					dataType:'json',
					url:'http://www.alishow.com/admin/api/comments/getCmt.php',
					success:function(data){
						console.log(data)
						var html = template('tpl',data);
						$('tbody').html(html);
						
					}
				})
			}
		})
  </script>
  <script>NProgress.done()</script>
</body>
</html>
