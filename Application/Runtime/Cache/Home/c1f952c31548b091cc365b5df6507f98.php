<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>Insert title here</title>
<script src="/examLibrary/Public/assets/js/jquery.min.js"></script>
<script src="/examLibrary/Public/assets/js/theme.js"></script>
<script src="/examLibrary/Public/assets/js/loaders.css.js"></script>
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/loaders.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/amazeui.datatables.min.css" />
<link rel="stylesheet" href="/examLibrary/Public/assets/css/app.css">
 <style type="text/css">
.am-container {
 width: 70%;
border: 1px;
border-radius: 4px;
display: block;
background-color: #fff;
padding-left: 1.5rem;
padding-right: 1.5rem;
margin: 5% auto 5%;
max-width: 800px;
}

</style> 
<script type="text/javascript">
 $(window).load(function() {
	 var OnLoading = document.getElementById("OnLoading"); 
	 var LoadingSuccess = document.getElementById("LoadingSuccess");
	 if(OnLoading !=true)
		 {
		 LoadingSuccess.style.display="display";
		 OnLoading.style.display="none";
		
		 }
	 else{
		 LoadingSuccess.style.display="none";
		 OnLoading.style.display="display";
	 }
  });
</script> 
 
<body style="background:#e9ecf3;">
 <div class="loader-inner ball-pulse" id="OnLoading" style="background:#e9ecf3;width:60%;height:20%px;margin:10% auto;text-align:center;padding:10%">
 <div></div>
 <div></div>
 <div></div>
 </div>
 <div id="LoadingSuccess" class="am-container">
<h1 class="am-header-title"  style="text-indent:8px; margin:5px 0 10px;">
 <a href="#left-link" >   青岛科技大学图书馆入馆测试 </a>
      </h1>
      
      
 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question1">1.最喜欢的水果 </div>
<div class="am-panel-bd" id="option1">
 <label class="am-radio-inline">
    <input type="radio" name="radio1" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio1" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio1" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio1" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>

 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question2">2.最喜欢的水果 </div>
<div class="am-panel-bd" id="option2">
 <label class="am-radio-inline">
    <input type="radio" name="radio2" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio2" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio2" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio2" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>


 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question3">3.最喜欢的水果 </div>
<div class="am-panel-bd" id="option3">
 <label class="am-radio-inline">
    <input type="radio" name="radio3" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio3" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio3" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio3" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>


 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question4">4.最喜欢的水果 </div>
<div class="am-panel-bd" id="option4">
 <label class="am-radio-inline">
    <input type="radio" name="radio4" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio4" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio4" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio4" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>


 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question5">5.最喜欢的水果 </div>
<div class="am-panel-bd" id="option5">
 <label class="am-radio-inline">
    <input type="radio" name="radio5" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio5" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio5" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio5" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>

 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question6">6.最喜欢的水果 </div>
<div class="am-panel-bd" id="option6">
 <label class="am-radio-inline">
    <input type="radio" name="radio6" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio6" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio6" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio6" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>


 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question7">7.最喜欢的水果 </div>
<div class="am-panel-bd" id="option7">
 <label class="am-radio-inline">
    <input type="radio" name="radio7" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio7" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio7" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio7" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>


 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question8">8.最喜欢的水果 </div>
<div class="am-panel-bd" id="option8">
 <label class="am-radio-inline">
    <input type="radio" name="radio8" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio8" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio8" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio8" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>


 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question9">9.最喜欢的水果 </div>
<div class="am-panel-bd" id="option9">
 <label class="am-radio-inline">
    <input type="radio" name="radio9" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio9" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio9" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio9" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>


 <div class="am-panel am-panel-default" style="margin:0 10px 10px 10px;">
  <div class="am-panel-hd" id="question10">10.最喜欢的水果 </div>
<div class="am-panel-bd" id="option10">
 <label class="am-radio-inline">
    <input type="radio" name="radio10" value="apple" data-am-ucheck checked>A.苹果
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio10" value="grape" data-am-ucheck>B.葡萄
  </label>
  <br />
  <label class="am-radio-inline">
    <input type="radio" name="radio10" value="orange" data-am-ucheck>C.橙子
  </label>
  <br />
   <label class="am-radio-inline">
    <input type="radio" name="radio10" value="cherry" data-am-ucheck>D.樱桃
  </label>
</div>
</div>



 <ul data-am-widget="pagination"
      class="am-pagination am-pagination-default" style="float:right" >


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