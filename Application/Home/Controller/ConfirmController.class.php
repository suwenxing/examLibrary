<?php
namespace Home\Controller;
class ConfirmController extends PublicController{
	public function index(){
		$attention = M('system')->field('attention')->find();
		$this->assign("attention",$attention);
		$this->display();
	}
	public function qlist(){
		$model = M("test")->where('tid=0')->select();
		$this->assign("list",$model);
		$this->display("list");
	}
	public function zlist(){
		$tid = array("tid"=>$_GET['tid']);
		$md5 = M('system')->field('md5salt')->find();
	
		
		$model = M("test")->where($tid)->select();
		$this->assign("list",$model);
		$this->assign("md5",$md5);
		$this->display();
	}
}