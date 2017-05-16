<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>答题页面</title>
<head>
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>
<script src="/examLibrary/Public/assets/js/theme.js"></script>
<script src="/examLibrary/Public/assets/js/loaders.css.js"></script>
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/loaders.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.datatables.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">

<script type="text/javascript">
$(window).load(function() {
	 $("#OnLoading").hide();
	 $("#LoadingSuccess").show();
	
	
});
 
</script> 
</head>
<body class="body-color">
 <div class="loader-inner ball-pulse ball-remark" id="OnLoading" >
   <div></div>
   <div></div>
   <div></div>
 </div>
 <div id="LoadingSuccess" class=" am-container am-containers" style="display:none">
  
   <h1 class="am-header-title header-remark">
             <a href="#left-link" >   青岛科技大学图书馆入馆测试 </a>
    </h1> 
  
    
<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">1.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio1" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio1" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio1" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio1" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>


<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">2.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio2" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio2" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio2" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio2" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>



<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">3.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio3" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio3" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio3" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio3" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>

<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">4.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio4" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio4" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio4" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio4" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>



<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">5.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio5" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio5" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio5" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio5" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>

<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">6.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio6" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio6" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio6" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio6" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>

<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">7.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio7" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio7" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio7" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio7" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>

<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">8.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio8" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio8" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio8" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio8" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>

<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">9.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio9" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio9" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio9" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio9" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>

<div class="am-panel am-panel-default panel-remark" >
  <div class="am-panel-hd" id="question1">10.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <div class="am-radio-inline">
    <input type="radio" name="radio10" value="apple" data-am-ucheck>A.苹果
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio10" value="grape" data-am-ucheck>B.葡萄
  </div>
  <br />
  <div class="am-radio-inline">
    <input type="radio" name="radio10" value="orange" data-am-ucheck>C.橙子
  </div>
  <br />
   <div class="am-radio-inline">
    <input type="radio" name="radio10" value="cherry" data-am-ucheck>D.樱桃
  </div>
</div>
</div>



 <ul data-am-widget="pagination" class="am-pagination am-pagination-default pagination-remark">

      <li class="am-pagination-first ">
        <a href="#" class="">第一页</a>
      </li>

      <li class="am-pagination-prev ">
        <a href="#" class="">上一页</a>
      </li>


      <li class="am-active">
        <a href="#" class="am-active">1</a>
      </li>
      <li class="">
        <a href="#" class="">2</a>
      </li>
      <li class="">
         <a href="#" class="">3</a>
      </li>
      <li class="">
         <a href="#" class="">4</a>
      </li>
      <li class="">
         <a href="#" class="">5</a>
      </li>

      <li class="am-pagination-next ">
        <a href="#" class="">下一页</a>
      </li>

      <li class="am-pagination-last ">
        <a href="#" class="">最末页</a>
      </li>
  </ul>
 </div>
</body>
</html>