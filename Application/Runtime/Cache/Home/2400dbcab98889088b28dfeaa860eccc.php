<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>选择考试项目</title>
<link rel="icon" type="image/png" href="/examLibrary/Public/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed"
	href="/examLibrary/Public/assets/i/app-icon72x72@2x.png">
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>
<script src="/examLibrary/Public/assets/js/theme.js"></script>
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">
<script src="/examLibrary/Public/assets/js/amazeui.min.js"></script>
<script src="/examLibrary/Public/assets/js/jQuery.md5.js"></script>
</head>
<body class="theme-white">
	<div class="am-container tpl-confirm-content1">
		<div class="tit">请选择考试类别:<a href="javascript:history.back(1)"  class="am-fr"><i class="am-icon-reply"></i></a></div>
		<span class="short_line">
		</span>
		
		<div class="container">
			<div class="am-g">
				<!-- Row start -->
				<ul class="am-list confirm-list" id="doc-modal-list">
					<?php if(is_array($list)): foreach($list as $k=>$vo): ?><li><a data-id="<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; ?>
				</ul>


				<!-- col end -->
				<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
					<div class="am-modal-dialog">
						<div class="am-modal-hd">挑战开始</div>
						<div class="am-modal-bd">你，确定要开始挑战吗？</div>
						<div class="am-modal-footer">
							<span class="am-modal-btn" data-am-modal-cancel>算了,我认怂</span> <span
								class="am-modal-btn" data-am-modal-confirm>来战！！</span>
						</div>
					</div>
				</div>
				<!-- Row end -->



			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function() {
			$('#doc-modal-list').find('a').add('#doc-confirm-toggle').on(
					'click', function() {
						$('#my-confirm').modal({
							relatedTarget : this,
							onConfirm : function(options) {
								var $link = $(this.relatedTarget);
								var qid =$link.data('id');
								
								var md5s = $.md5(qid.toString());  
								var url = "/examLibrary/index.php/Answer/index?id=" + qid + "&token=" + md5s;
								location.href = url;
							},
							onCancel : function() {

							}
						});
					});
		});
	</script>
</body>
</html>