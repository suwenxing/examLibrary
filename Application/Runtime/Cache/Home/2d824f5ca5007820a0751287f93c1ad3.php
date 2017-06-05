<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>选择考试项目</title>
    <link rel="icon" type="image/png" href="/examLibrary/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/examLibrary/Public/assets/i/app-icon72x72@2x.png">
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>
<script src="/examLibrary/Public/assets/js/theme.js"></script>
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">

</head>
<body class="theme-white">
	<div class="am-container tpl-confirm-content1">
		<div class="tit">请选择考试类别:</div>
		<span class="short_line"></span>
		<div class="container">
			<div class="am-g">
				<!-- Row start -->
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><a href="<?php echo U('Confirm/zlist',array('tid'=>$vo['id']));?>">
						<div class="am-u-md-3 card-box">
							<div class="widget-user">
								<div>
									<div class="wid-u-info">
										<h3 class="m-t-0 m-b-5 font-600"><?php echo (subtext($vo['title'],30)); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</a><?php endforeach; endif; ?>
				<!-- col end -->
				 
				<!-- Row end -->
			</div>
		</div>
	</div>
<script type="text/javascript">
	$('.wid-u-info').each(function(index){
		//4的倍数,显示题目栏的颜色
		if(index%8 == 0 || index%8 == 7){
			$(this).children().css("color","#f9c851");
		}else if(index%8 == 1 || index%8 == 6){
			$(this).children().css("color","#71b6f9");
		}else if(index%8 == 2 || index%8 == 5){
			$(this).children().css("color","#10c469");
		}else{
			$(this).children().css("color","#35b8e0");
		}
	})
</script>
</body>
</html>