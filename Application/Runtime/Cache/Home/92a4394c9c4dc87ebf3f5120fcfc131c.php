<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>请仔细阅读注意事项以及确认自己的信息</title>
    <link rel="icon" type="image/png" href="/examLibrary/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/examLibrary/Public/assets/i/app-icon72x72@2x.png">
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>
<script src="/examLibrary/Public/assets/js/theme.js"></script>
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">

</head>
<body class="theme-white">
	<div class="am-container tpl-confirm-content">
		<div class="container container-remark ">
			<div class="tit tit-remark">信息确认</div>
			<span class="short_line"></span>
			<div class="information1">
				<span><i class="am-icon-user am-icon-fw"></i>学号：<?php echo (session('usernumber')); ?></span> <span>
					<i class="am-icon-cc am-icon-fw"></i>姓名：<?php echo (session('username')); ?>
				</span> <span> <i class="am-icon-university am-icon-fw"></i>学院：<?php echo (session('college')); ?>
				</span><span> <i class="am-icon-book am-icon-fw"></i>专业班级：<?php echo (session('class')); ?>
				</span>
			</div>
		</div>
		<hr />
		<div class="container">
			<div class="tit">注意事项</div>
			<span class="short_line"></span>
			<div class="information">
				 <?php echo (html_entity_decode($attention['attention'])); ?>
			</div>
		</div>


		<div class="am-form-group am-margin-top-lg">
			<a href="<?php echo U('Confirm/qlist');?>"><button type="button"
					id="np-status"
					class="am-btn am-btn-primary  am-btn-block am-radius">确认之后大胆答题吧！</button></a>
		</div>

	</div>

</body>
</html>