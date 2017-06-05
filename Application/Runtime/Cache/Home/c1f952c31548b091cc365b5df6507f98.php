<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>答题页面</title>
<head>
<link rel="icon" type="image/png" href="/examLibrary/Public/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed"
	href="/examLibrary/Public/assets/i/app-icon72x72@2x.png">
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>
<script src="/examLibrary/Public/assets/js/theme.js"></script>
<script src="/examLibrary/Public/assets/js/loaders.css.js"></script>
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/loaders.min.css" />
<link rel="stylesheet"
	href="/examLibrary/Public/assets/css/amazeui.datatables.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">
<script src="/examLibrary/Public/assets/js/jquery.cookie.js"></script>
<script src="/examLibrary/Public/assets/js/session.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		$("#OnLoading").hide();
		$("#LoadingSuccess").show();

	});
</script>
<script language="javascript">
	//防止页面后退
	history.pushState(null, null, document.URL);
	window.addEventListener('popstate', function() {
		history.pushState(null, null, document.URL);
	});
</script>
<script type="text/javascript" charset="utf-8">
	$(function() {
		//var exp = parseFloat(<?php echo ($etime); ?>/60/24);
		if ($.session.get('sec') && $.session.get('min')) {
			$("#min").html($.session.get('min'));
			$("#sec").html($.session.get('sec'))
		}

		var min = $("#min").html();
		var sec = $("#sec").html();
		var mytime = null;
		min = parseInt(min);
		sec = parseInt(sec);
		//调用函数，进行倒计时
		mytime = setInterval(fun, 1000);

		function fun() {
			sec--;
			if (sec < 0) {
				min--;
				sec = 59;
				if (min < 0) {
					alert("答题时间到,系统自动提交!");
					//alert($.session.get('question'));
					clearInterval(mytime);
					mytime = null;
					var temp = new Array();
					//$("#form").submit();
					//-------------------------------------------------
					$("div[id='option']").each(function(j, item) {
						var obj = $(this).find('input');
						var s = '';
						for ( var i = 0; i < obj.size(); i++) {
							if (obj[i].checked) {
								s += obj[i].value; //如果选中，将value添加到变量s中 
							}
						}

						if (s == '') {
							flag = 1;
							s += 'x';
						}

						temp[j] = s;

					});//each结束
					//alert(temp);
					var aj = $.ajax({
						url : "<?php echo U('Score/grade');?>",// 跳转到 action  
						async : false,
						data : {
							flag : 2,
							questions:temp
						},
						type : 'post',
						success : function(data) {
							$.session.set('sec',null);
							$.session.set('min',null);
							window.location.href = '<?php echo U("Score/index");?>';
						},
						error : function(data) {
							alert("服务器出小差了，请联系管理员。。");
						}
					});

					//--------------------------------------------------
					return;
				}
				;
			}
			;
			//min=(min<10?"0"+min:min);
			sec = (sec < 10) ? "0" + sec : sec;
			//$.cookie('sec', sec, { expires: exp });
			//$.cookie('min', min, { expires: exp });
			$.session.set('sec', sec);
			$.session.set('min', min);
			$("#min").html(min);
			$("#sec").html(sec);
		}

	});
</script>
</head>
<body class="body-color">
	<div class="header">
		<div id="dada" style="width: 100%">
			<span><font id="title">☻__<<?php echo ($title); ?>>__☻</font></span>
		</div>
		<div id="time" style="width: 100%">
			<span> <font class="time1">本次测试时间剩余</font> <font class="time2"><b
					id="min"><?php echo ($etime); ?></b></font> <font class="time1">分钟 </font> <font
				class="time2"><b id="sec"> 00 </b></font> <font class="time1">秒,<?php echo ($etime); ?>分钟后自动提交</font>
			</span>
		</div>
	</div>
	<div class="loader-inner ball-pulse ball-remark" id="OnLoading">
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div id="LoadingSuccess" class=" am-container am-containers"
		style="display: none">

		<h1 class="am-header-title header-remark">
			<a href="#left-link"> </a>
		</h1>

		<?php if(is_array($list)): foreach($list as $k=>$vo): ?><div class="am-panel am-panel-default panel-remark">
			<div class="am-panel-hd" id="question">
				<?php if($vo['type'] == 2): echo ($k+20*($p-1)+1); ?>、<?php echo ($vo['content']); ?>(多选题) <?php else: ?>
				<?php echo ($k+20*($p-1)+1); ?>、<?php echo ($vo['content']); endif; ?>
			</div>
			<div class="am-panel-bd" id="option">
				<div class="am-radio-inline">
					<input type="checkbox" name="question[<?php echo ($k); ?>]" value="A"/>A.<?php echo ($vo['aa']); ?>
				</div>
				<br />
				<div class="am-radio-inline">
					<input type="checkbox" name="question[<?php echo ($k); ?>]" value="B" />B.<?php echo ($vo['ab']); ?>
				</div>
				<br />
				<div class="am-radio-inline">
					<?php if($vo['ac'] != null): ?><input type="checkbox"
						name="question[<?php echo ($k); ?>]" value="C" />C.<?php echo ($vo['ac']); endif; ?>
				</div>
				<br />
				<div class="am-radio-inline">
					<?php if($vo['ad'] != null): ?><input type="checkbox"
						name="question[<?php echo ($k); ?>]" value="D" />D.<?php echo ($vo['ad']); endif; ?>
				</div>
			</div>
		</div><?php endforeach; endif; ?>


		<div class="am-u-lg-12 am-cf">
			<div class="am-fr">
				<!-- <div class="am-pagination tpl-pagination"><?php echo ($page); ?></div> -->
				<ul class="am-pagination"><?php echo ($page); ?>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var question = new Array();
		var flag = 0;

		$('.am-pagination a').bind('click', function() {
			$("div[id='option']").each(function(j, item) {
				var obj = $(this).find('input');
				var s = '';
				for ( var i = 0; i < obj.size(); i++) {
					if (obj[i].checked) {
						s += obj[i].value; //如果选中，将value添加到变量s中 
					}
				}

				if (s == '') {
					flag = 1;
					s += 'x';
				}

				question[j] = s;

			});//each结束

			//如果
			if (flag > 0) {
				//还有没大的题目
				alert("别着急，把本页的题目全都做完嘛。。");
				flag = 0;
				return false;
			} else {
				var aj = $.ajax({
					url : "<?php echo U('Score/grade');?>",// 跳转到 action  
					async : false,
					data : {
						flag : 0,
						questions : question
					},
					type : 'post',
					success : function(data) {
					},
					error : function(data) {
						alert("error");
					}
				});
			}
		});
		//-------------------------------------------------------------------------------
		$('#lastbtn').bind('click', function() {
			$("div[id='option']").each(function(j, item) {
				var obj = $(this).find('input');
				var s = '';
				for ( var i = 0; i < obj.size(); i++) {
					if (obj[i].checked) {
						s += obj[i].value; //如果选中，将value添加到变量s中 
					}
				}

				if (s == '') {
					flag = 1;
					s += 'x';
				}

				question[j] = s;

			});//each结束

			//如果
			if (flag > 0) {
				//还有没大的题目
				alert("别着急，把本页的题目全都做完嘛。。");
				flag = 0;
				return false;
			} else {
				var aj = $.ajax({
					url : "<?php echo U('Score/grade');?>",// 跳转到 action  
					async : false,
					data : {
						flag : 1,
						questions : question
					},
					type : 'post',
					success : function(data) {
						window.location.href = '<?php echo U("Score/index");?>';
					},
					error : function(data) {
						alert("服务器出小差了，请联系管理员。。");
					}
				});
			}
		});
	</script>
</body>
</html>