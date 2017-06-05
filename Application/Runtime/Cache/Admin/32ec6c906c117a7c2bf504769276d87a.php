<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>青岛科技大学图书馆登陆界面</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="/examLibrary/Public/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed"
	href="/examLibrary/Public/assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet"
	href="/examLibrary/Public/assets/css/amazeui.datatables.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>

</head>

<body data-type="login">
	<script src="/examLibrary/Public/assets/js/theme.js"></script>
	<div class="am-g tpl-g">
		<!-- 风格切换 
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
		-->
		<div class="tpl-login">
			<div class="tpl-login-content">
				<div class="tpl-login-logo"></div>
				<form class="am-form tpl-form-line-form" action="/examLibrary/admin.php/Login/login" method="post">
					<div class="am-form-group">
						<input type="text" class="tpl-form-input" name="username" id="user-name" required 
							placeholder="请输入账号">
					</div>

					<div class="am-form-group">
						<input type="password" class="tpl-form-input" name="password" id="user-name" required
							placeholder="请输入密码">

					</div>
					<!--  
					<div class="am-form-group tpl-login-remember-me">
						<input id="remember-me" type="checkbox"> <label
							for="remember-me"> 记住密码 </label>

					</div>
					-->
					<div class="am-form-group am-margin-top-lg">
						<button type="submit"
							class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">登陆</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/examLibrary/Public/assets/js/amazeui.min.js"></script>
	<script src="/examLibrary/Public/assets/js/app.js"></script>

</body>

</html>