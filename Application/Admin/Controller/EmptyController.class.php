<?php
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller{
	function _empty(){
		// 这样写就够了
		header("HTTP/1.1 404 Not Found");
		$this -> display("Public:404");        //会自动调用配置里的 404 页面设置
	}
	 
	
}