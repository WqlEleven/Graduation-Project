<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
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
        <h1>管理员列表</h1>
        <input class="btn btn-primary btn-xs" type="button" value="添加管理员" id="addBtn" />
      </div>
     
      <div class="row">
      
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th class="text-center" width="80">头像</th>
                <th>邮箱</th>
                <th>别名</th>
                <th>昵称</th>
                <th>状态</th>
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
      <td class="text-center"><img class="avatar" src="/assets/img/default.png"></td>
      <td>{{value.admin_email}}</td>
      <td>{{value.admin_slug}}</td>
      <td>{{value.admin_nickname}}</td>
      <td>{{value.admin_state}}</td>
      <td class="text-center">
        <a href="javascript:;" data="{{value.admin_id}}" class="btn edit btn-default btn-xs">编辑</a>
        <a href="javascript:;" data="{{value.admin_id}}"class="btn del btn-danger btn-xs">删除</a>
      </td>
    </tr>
    {{/each}}
  </script>
  <script>
  	$.ajax({
  		url:"getAdminList.php", 		
  		type:"get",
  		dataType:'json',
  		success:function(data){
		console.log(data)
  			var json = {"list":data};
				
				var html = template('tpl',json);
				$('tbody').html(html);
  		} 		
  	});
  	
	 $('#addBtn').click(function () {
   
    layer.ready(function(){ 
      layer.open({
        type: 2,
        title: '添加新管理员',
        maxmin: false,
        area: ['500px', '500px'],
        content: 'adduser.php',
      });
    });
  })

  $('tbody').on('click','.del',function(){
  	 _this = $(this);
  	layer.confirm('您确定要删除吗？',function(){
  		var did = _this.attr('data');
			$.ajax({
				type:"post",
				url:"deluser.php",
				data:{id:did},
				dataType:'text',
				success:function(data){
					if(data == 1){
						layer.msg('删除管理员成功');
						_this.parent().parent().remove();
					}else{
						layer.msg('删除管理员失败!');
					}
				}
			});
  	})
  })
  $('tbody').on('click','.edit',function(){
  	var did = $(this).attr('data');
	layer.ready(function(){ 
      layer.open({
        type: 2,
        title: '编辑管理员',
        maxmin: false,
        area: ['500px', '530px'],
        content: 'edituser.php?id=' + did,
      });
    });  
})
  </script>
  <script>NProgress.done()</script>
</body>
</html>
