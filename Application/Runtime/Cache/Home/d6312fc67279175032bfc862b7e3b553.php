<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>成绩确认</title>
<link rel="icon" type="image/png" href="/examLibrary/Public/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed"
	href="/examLibrary/Public/assets/i/app-icon72x72@2x.png">
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>
<script src="/examLibrary/Public/assets/js/theme.js"></script>
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet"
	href="/examLibrary/Public/assets/css/amazeui.datatables.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">
<script language="javascript">
	//防止页面后退
	history.pushState(null, null, document.URL);
	window.addEventListener('popstate', function() {
		history.pushState(null, null, document.URL);
	});
</script>
</head>
<body class="theme-white">
	<div class="tpl-login" id="form-with-tooltip">
		<div class="tpl-login-content tpl-login-content-remark">
			<h1 class="am-header-title">
				<a href="#left-link"> 闯关完毕！ </a>
			</h1>
			<hr data-am-widget="divider" style=""
				class="am-divider am-divider-default" />
			<div class="passorno">
				<b> 英雄您已闯关结束！</b>
			</div>
			<div class="score">
				<!-- <div class="grade1">
					<b>你的得分是：</b>
				</div>
				 <div class="grade">98</div> -->
			</div>


		</div>



	</div>
</body>
</html>