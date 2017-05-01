<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Amaze UI Admin index Examples</title>
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
<script type="text/javascript">
	function check() {
		var username = document.getElementById("user-name").value;
		var usernumber = document.getElementById("user-number").value;
		var re1 = /^[0-9]{10}$/;
		var re2 = /^[\u4e00-\u9fa5]{2,4}$/;

		if (!(re1.test(usernumber))) {
			alert("学号只能是10位数字哦~");
			return false;
		}
		if (!(re2.test(username))) {
			alert("姓名只能为2--4位中文哦~");
			return false;
		}
	}
</script>



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
		<div class="tpl-login" id="form-with-tooltip">
			<div class="tpl-login-content">
				<div class="tpl-login-logo"></div>
				<form class="am-form tpl-form-line-form"
					action="/examLibrary/index.php/Login/login" onsubmit="return check()">
					<div class="am-form-group">
						<input type="text" class="tpl-form-input" id="user-number"
							required oninvalid="setCustomValidity('不输入学号就想走吗！不存在的！')"
							oninput="setCustomValidity('')" placeholder="童鞋，你的学号是多少O(∩_∩)O">
					</div>

					<div class="am-form-group">
						<input type="text" class="tpl-form-input" id="user-name" required
							oninvalid="setCustomValidity('不输入姓名就想走吗！不存在的！')"
							oninput="setCustomValidity('')" placeholder="童鞋，久仰您的的大名(*^__^*) ">

					</div>
					<!--  
					<div class="am-form-group tpl-login-remember-me">
						<input id="remember-me" type="checkbox"> <label
							for="remember-me"> 记住密码 </label>

					</div>
					-->
					<div class="am-form-group am-margin-top-lg">
						<button type="submit"
							class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn"
							style="margin-top: 36px;">进入考试吧！加油！</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/examLibrary/Public/assets/js/amazeui.min.js"></script>
	<script src="/examLibrary/Public/assets/js/app.js"></script>

</body>

</html>