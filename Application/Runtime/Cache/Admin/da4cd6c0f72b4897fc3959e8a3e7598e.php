<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>青岛科技大学图书馆--考试--管理后台</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/examLibrary/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/examLibrary/Public/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script src="/examLibrary/Public/assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.datatables.min.css" />
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
                <a href="javascript:;"><img src="/examLibrary/Public/assets/img/logo.png" alt=""></a>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">
                <!-- 侧边切换 -->
                <div class="am-fl tpl-header-switch-button am-icon-list">
                    <span>

                </span>
                </div>
                <!-- 搜索 -->
                <div class="am-fl tpl-header-search">
                    <form class="tpl-header-search-form" action="javascript:;">
                        <button class="tpl-header-search-btn am-icon-search"></button>
                        <input class="tpl-header-search-box" type="text" placeholder="搜索内容...">
                    </form>
                </div>
                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <a href="javascript:;">欢迎你, <span>管理员</span> </a>
                        </li>
                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="/examLibrary/admin.php/Login/logout">
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </li>
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
		<li class="sidebar-nav-link"><a href="<?php echo U('Index/index');?>"
			class="active"> <i class="am-icon-home sidebar-nav-link-logo"></i>
				首页
		</a></li>
		<li class="sidebar-nav-link"><a href="<?php echo U('Student/stulist');?>">
				<i class="am-icon-user sidebar-nav-link-logo"></i> 学生信息管理
		</a></li>
		<li class="sidebar-nav-link"><a href="javascript:;"
			class="sidebar-nav-sub-title"> <i
				class="am-icon-question sidebar-nav-link-logo"></i> 题目管理 <span
				class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
		</a>
			<ul class="sidebar-nav sidebar-nav-sub">
				<li class="sidebar-nav-link"><a href="<?php echo U('Question/quelist');?>"> <span
						class="am-icon-angle-right sidebar-nav-link-logo"></span> 题目类型管理
				</a></li>
<!--  
				<li class="sidebar-nav-link"><a href="table-list-img.html">
						<span class="am-icon-angle-right sidebar-nav-link-logo"></span>
						题目上传管理
				</a></li>
-->
			</ul></li>

		<li class="sidebar-nav-link"><a href="calendar.html"> <i
				class="am-icon-calendar sidebar-nav-link-logo"></i> 分数管理
		</a></li>
		
		<li class="sidebar-nav-link"><a href="<?php echo U('College/collegelist');?>"> <i
				class="am-icon-university sidebar-nav-link-logo"></i> 学院信息管理
		</a></li>
		<li class="sidebar-nav-link"><a href="<?php echo U('Menu/menulist');?>"> <i
				class="am-icon-list sidebar-nav-link-logo"></i> 快捷菜单管理
		</a></li>
		
		<li class="sidebar-nav-link"><a href="<?php echo U('System/index');?>"> <i
				class="am-icon-gear sidebar-nav-link-logo"></i> 系统设置管理
		</a></li>

	</ul>
</div>


<!-- 内容区域 -->
<div class="tpl-content-wrapper">

	<div class="container-fluid am-cf">
		<div class="row">
			<div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
				<div class="page-header-heading">
					<span class="am-icon-home page-header-heading-icon"></span> 管理系统首页
					<small>Qust Library</small>
				</div>
				<p class="page-header-description">欢迎使用青岛科技大学图书馆考试系统</p>
			</div>

		</div>

	</div>
	<section data-am-widget="accordion"
		class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
		<dl class="am-accordion-item am-active">
			<dt class="am-accordion-title">快捷菜单</dt>
			<dd class="am-accordion-bd am-collapse am-in">
				<div class="row  am-cf">
					<?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="am-u-sm-12 am-u-md-12 am-u-lg-3" style="float:left">
							<div class="widget am-cf">
								<div class="widget-head am-cf">
									<div class="widget-title am-fl"><?php echo ($vo["name"]); ?></div>
									<div class="widget-function am-fr">
										<a href="javascript:;" class="am-icon-cog"></a>
									</div>
								</div>
								<div class="widget-body am-fr">
									<div class="am-fl">
										<div class="widget-fluctuation-period-text">
											<?php echo ($vo["description"]); ?>
											<a href="<?php echo ($vo["url"]); ?>"><button class="widget-fluctuation-tpl-btn">
												<i class="am-icon-calendar"></i> 点击跳转
											</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div><?php endforeach; endif; ?>
				</div>
			</dd>
		</dl>
	</section>
	<section data-am-widget="accordion"
		class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
		<dl class="am-accordion-item am-active">
			<dt class="am-accordion-title">图表看板</dt>
			<dd class="am-accordion-bd am-collapse am-in">
				<div class="row am-cf">
					<div class="am-u-sm-12 am-u-md-6">
						<div class="widget am-cf">
							<div class="widget-head am-cf">
								<div class="widget-title am-fl">月度财务收支计划</div>
								<div class="widget-function am-fr">
									<a href="javascript:;" class="am-icon-cog"></a>
								</div>
							</div>
							<div
								class="widget-body-md widget-body tpl-amendment-echarts am-fr"
								id="tpl-echarts"></div>
						</div>
					</div>

					<div class="am-u-sm-12 am-u-md-6">
						<div class="widget am-cf">
							<div class="widget-head am-cf">
								<div class="widget-title am-fl">专用服务器负载</div>
								<div class="widget-function am-fr">
									<a href="javascript:;" class="am-icon-cog"></a>
								</div>
							</div>
							<div class="widget-body widget-body-md am-fr">

								<div class="am-progress-title">
									CPU Load <span class="am-fr am-progress-title-more">28%
										/ 100%</span>
								</div>
								<div class="am-progress">
									<div class="am-progress-bar" style="width: 15%"></div>
								</div>
								<div class="am-progress-title">
									CPU Load <span class="am-fr am-progress-title-more">28%
										/ 100%</span>
								</div>
								<div class="am-progress">
									<div class="am-progress-bar  am-progress-bar-warning"
										style="width: 75%"></div>
								</div>
								<div class="am-progress-title">
									CPU Load <span class="am-fr am-progress-title-more">28%
										/ 100%</span>
								</div>
								<div class="am-progress">
									<div class="am-progress-bar am-progress-bar-danger"
										style="width: 35%"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</dd>
		</dl>
	</section>
</div>
</div>
</div>
<script src="/examLibrary/Public/assets/js/amazeui.min.js"></script>
<script src="/examLibrary/Public/assets/js/amazeui.datatables.min.js"></script>
<script src="/examLibrary/Public/assets/js/dataTables.responsive.min.js"></script>
<script src="/examLibrary/Public/assets/js/app.js"></script>
<script>
	
</script>
</body>

</html>