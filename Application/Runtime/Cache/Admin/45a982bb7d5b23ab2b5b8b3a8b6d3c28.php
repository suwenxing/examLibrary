<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>青岛科技大学学生信息列表</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="/examLibrary/Public/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed"
	href="/examLibrary/Public/assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<script src="/examLibrary/Public/assets/js/echarts.min.js"></script>
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet"
	href="/examLibrary/Public/assets/css/amazeui.datatables.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>
<script src="/examLibrary/Public/assets/js/jquery-form.js"></script>
</head>

<body data-type="widgets">
	<script src="/examLibrary/Public/assets/js/theme.js"></script>
	<div class="am-g tpl-g">
		<!-- 头部 -->
		<header>
			<!-- logo -->
			<div class="am-fl tpl-header-logo">
				<a href="javascript:;"><img src="/examLibrary/Public/assets/img/logo.png"
					alt=""></a>
			</div>
			<!-- 右侧内容 -->
			<div class="tpl-header-fluid">
				<!-- 侧边切换 -->
				<div class="am-fl tpl-header-switch-button am-icon-list">
					<span> </span>
				</div>
				<!-- 搜索 -->
				<div class="am-fl tpl-header-search">
					<form class="tpl-header-search-form" action="javascript:;">
						<button class="tpl-header-search-btn am-icon-search"></button>
						<input class="tpl-header-search-box" type="text"
							placeholder="搜索内容...">
					</form>
				</div>
				<!-- 其它功能-->
				<div class="am-fr tpl-header-navbar">
					<ul>
						<!-- 欢迎语 -->
						<li class="am-text-sm tpl-header-navbar-welcome"><a
							href="javascript:;">欢迎你, <span>管理员</span>
						</a></li>

						<!-- 退出 -->
						<li class="am-text-sm"><a href="javascript:;"> <span
								class="am-icon-sign-out"></span> 退出
						</a></li>
					</ul>
				</div>
			</div>

		</header>
		<!-- 风格切换 -->
<div class="tpl-skiner">
	<div class="tpl-skiner-toggle am-icon-cog"></div>
	<div class="tpl-skiner-content">
		<div class="tpl-skiner-content-title">选择主题</div>
		<div class="tpl-skiner-content-bar">
			<span class="skiner-color skiner-white" data-color="theme-white"></span>
			<span class="skiner-color skiner-black" data-color="theme-black"></span>
		</div>
	</div>
</div>
<!-- 侧边导航栏 -->
<div class="left-sidebar">
	<!-- 用户信息 -->
	<div class="tpl-sidebar-user-panel">
		<div class="tpl-user-panel-slide-toggleable">
			<div class="tpl-user-panel-profile-picture am-img-thumbnail">
				<img src="/examLibrary/Public/assets/img/timg.jpg" alt="">
			</div>
			<span class="user-panel-logged-in-text"> <i
				class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
				管理员
			</span>  
		</div>
	</div>

	<!-- 菜单 -->
	<ul class="sidebar-nav">
		<li class="sidebar-nav-link"><a href="index.html" class="active">
				<i class="am-icon-home sidebar-nav-link-logo"></i> 首页
		</a></li>
		<li class="sidebar-nav-link"><a href="<?php echo U('Student/stulist');?>"> <i
				class="am-icon-table sidebar-nav-link-logo"></i> 学生信息管理
		</a></li>
		<li class="sidebar-nav-link"><a href="calendar.html"> <i
				class="am-icon-calendar sidebar-nav-link-logo"></i> 日历
		</a></li>
		<li class="sidebar-nav-link"><a href="form.html"> <i
				class="am-icon-wpforms sidebar-nav-link-logo"></i> 表单

		</a></li>
		<li class="sidebar-nav-link"><a href="chart.html"> <i
				class="am-icon-bar-chart sidebar-nav-link-logo"></i> 图表

		</a></li>

		<li class="sidebar-nav-heading">Page<span
			class="sidebar-nav-heading-info"> 常用页面</span></li>
		<li class="sidebar-nav-link"><a href="javascript:;"
			class="sidebar-nav-sub-title"> <i
				class="am-icon-table sidebar-nav-link-logo"></i> 数据列表 <span
				class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
		</a>
			<ul class="sidebar-nav sidebar-nav-sub">
				<li class="sidebar-nav-link"><a href="table-list.html"> <span
						class="am-icon-angle-right sidebar-nav-link-logo"></span> 文字列表
				</a></li>

				<li class="sidebar-nav-link"><a href="table-list-img.html">
						<span class="am-icon-angle-right sidebar-nav-link-logo"></span>
						图文列表
				</a></li>
			</ul></li>
		<li class="sidebar-nav-link"><a href="sign-up.html"> <i
				class="am-icon-clone sidebar-nav-link-logo"></i> 注册 <span
				class="am-badge am-badge-secondary sidebar-nav-link-logo-ico am-round am-fr am-margin-right-sm">6</span>
		</a></li>
		<li class="sidebar-nav-link"><a href="login.html"> <i
				class="am-icon-key sidebar-nav-link-logo"></i> 登录
		</a></li>
		<li class="sidebar-nav-link"><a href="404.html"> <i
				class="am-icon-tv sidebar-nav-link-logo"></i> 404错误
		</a></li>

	</ul>
</div>


		<!-- 内容区域 -->
		<div class="tpl-content-wrapper">
			<div class="row-content am-cf">
				<div class="row">
					<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
						<div class="widget am-cf">
							<div class="widget-head am-cf">
								<div class="widget-title  am-cf">文章列表</div>


							</div>
							<div class="widget-body  am-fr">

								<div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
									<div class="am-form-group">
										<div class="am-btn-toolbar">
											<form action="/examLibrary/admin.php/Student/upload" method="post"
												id="importfrom" enctype="multipart/form-data">
												<div class="am-form-group am-form-file">
													<button type="button"
														class="am-btn am-btn-danger am-btn-sm">
														<i class="am-icon-cloud-upload"></i> 选择要上传的文件
													</button>
													<input id="import" type="file" name="exl" multiple>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
									<div class="am-form-group tpl-table-list-select">
										<select data-am-selected="{btnSize: 'sm'}">
											<option value="option1">所有类别</option>
											<option value="option2">IT业界</option>
											<option value="option3">数码产品</option>
											<option value="option3">笔记本电脑</option>
											<option value="option3">平板电脑</option>
											<option value="option3">只能手机</option>
											<option value="option3">超极本</option>
										</select>
									</div>
								</div>
								<div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
									<div
										class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
										<input type="text" class="am-form-field "> <span
											class="am-input-group-btn">
											<button
												class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"
												type="button"></button>
										</span>
									</div>
								</div>

								<div class="am-u-sm-12">
									<table width="100%"
										class="am-table am-table-compact am-table-striped tpl-table-black "
										id="example-r">
										<thead>
											<tr>
												<th>文章标题</th>
												<th>作者</th>
												<th>时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											<tr class="gradeX">
												<td>Amaze UI 模式窗口</td>
												<td>张鹏飞</td>
												<td>2016-09-26</td>
												<td>
													<div class="tpl-table-black-operation">
														<a href="javascript:;"> <i class="am-icon-pencil"></i>
															编辑
														</a> <a href="javascript:;"
															class="tpl-table-black-operation-del"> <i
															class="am-icon-trash"></i> 删除
														</a>
													</div>
												</td>
											</tr>
											<tr class="even gradeC">
												<td>有适配微信小程序的计划吗</td>
												<td>天纵之人</td>
												<td>2016-09-26</td>
												<td>
													<div class="tpl-table-black-operation">
														<a href="javascript:;"> <i class="am-icon-pencil"></i>
															编辑
														</a> <a href="javascript:;"
															class="tpl-table-black-operation-del"> <i
															class="am-icon-trash"></i> 删除
														</a>
													</div>
												</td>
											</tr>
											<tr class="gradeX">
												<td>请问有没有amazeui 分享插件</td>
												<td>王宽师</td>
												<td>2016-09-26</td>
												<td>
													<div class="tpl-table-black-operation">
														<a href="javascript:;"> <i class="am-icon-pencil"></i>
															编辑
														</a> <a href="javascript:;"
															class="tpl-table-black-operation-del"> <i
															class="am-icon-trash"></i> 删除
														</a>
													</div>
												</td>
											</tr>
											<tr class="even gradeC">
												<td>关于input输入框的问题</td>
												<td>着迷</td>
												<td>2016-09-26</td>
												<td>
													<div class="tpl-table-black-operation">
														<a href="javascript:;"> <i class="am-icon-pencil"></i>
															编辑
														</a> <a href="javascript:;"
															class="tpl-table-black-operation-del"> <i
															class="am-icon-trash"></i> 删除
														</a>
													</div>
												</td>
											</tr>
											<tr class="even gradeC">
												<td>有没有发现官网上的下载包不好用</td>
												<td>醉里挑灯看键</td>
												<td>2016-09-26</td>
												<td>
													<div class="tpl-table-black-operation">
														<a href="javascript:;"> <i class="am-icon-pencil"></i>
															编辑
														</a> <a href="javascript:;"
															class="tpl-table-black-operation-del"> <i
															class="am-icon-trash"></i> 删除
														</a>
													</div>
												</td>
											</tr>

											<tr class="even gradeC">
												<td>我建议WEB版本文件引入问题</td>
												<td>罢了</td>
												<td>2016-09-26</td>
												<td>
													<div class="tpl-table-black-operation">
														<a href="javascript:;"> <i class="am-icon-pencil"></i>
															编辑
														</a> <a href="javascript:;"
															class="tpl-table-black-operation-del"> <i
															class="am-icon-trash"></i> 删除
														</a>
													</div>
												</td>
											</tr>
											<!-- more data -->
										</tbody>
									</table>
								</div>
								<div class="am-u-lg-12 am-cf">

									<div class="am-fr">
										<ul class="am-pagination tpl-pagination">
											<li class="am-disabled"><a href="#">«</a></li>
											<li class="am-active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">»</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script src="/examLibrary/Public/assets/js/amazeui.min.js"></script>
	<script src="/examLibrary/Public/assets/js/amazeui.datatables.min.js"></script>
	<script src="/examLibrary/Public/assets/js/dataTables.responsive.min.js"></script>
	<script src="/examLibrary/Public/assets/js/app.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#import').on('change', function() {
				$.AMUI.progress.start();
				var options = {
					url : '<?php echo U("Student/upload");?>',
					type : 'post',
					success : function(data) {
						 $.AMUI.progress.done();
						 alert(data);
					},
					error:function(){
						 $.AMUI.progress.done();
						alert("添加失败，请勿重复添加");
					}
				};

				$('#importfrom').ajaxSubmit(options);
				
			});
		});
	</script>
</body>

</html>