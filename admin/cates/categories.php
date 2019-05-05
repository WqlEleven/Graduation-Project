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
        <h1>分类目录</h1>
        <input type="button" value="添加栏目" id="abtn"/>
      </div>
      <div class="row">     
        <div class="col-md-8">
          <div class="page-action">
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
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
  <script src="/assets/vendors/template-web.js"></script>
  <script src="/assets/vendors/layer/layer.js"></script>
  <script type="text/template" id="tpl">
  	{{each list value}}           
      <tr>
        <td class="text-center"><input type="checkbox"></td>
        <td>{{value.cate_name}}</td>
        <th>{{value.cate_slug}}</th>
        <th>{{value.cate_addtime}}</th>
        <th>{{value.cate_icon}}</th>
        <th>{{value.cate_state}}</th>
        <th>{{value.cate_show}}</th>
       	<td class="text-center">
          <a href="" class="btn btn-info btn-xs">编辑</a>
          <a href="" class="btn btn-danger btn-xs" onclick="return confirm('您删除吗？')">删除</a>
        </td>
      </tr>
  	{{/each}}
  	
  </script>
  <script>
  	$.ajax({
  		type:"post",
  		dataType:'json',
  		url:"getcate.php",
  		success:function(data){
  			var json = {"list":data};
  			var html = template('tpl',json);
  			$('tbody').html(html);
  		}  		
  	});
  	$('#abtn').click(function(){
			layer.ready(function(){ 
	      layer.open({
	        type: 2,
	        title: '添加新栏目',
	        maxmin: false,
	        area: ['500px', '500px'],
	        content: 'addcate.php',
	      });
	    });
  	})
  </script>
  <script>NProgress.done()</script>
</body>
</html>
