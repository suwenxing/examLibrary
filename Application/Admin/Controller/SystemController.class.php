<?php

namespace Admin\Controller;


class SystemController extends PublicController {
	public function index() {
		$model = M ( 'system' )->find ();
		 
		$test = M('test')->where('tid !=0 and status != 0')->select();
		 
		$this->assign ( "test", $test );
		$this->assign ( "list", $model );
		$this->display ();
	}
	public function edit() {
		$system = M ( "system" ); // 实例化User对象
		                   // 根据表单提交的POST数据创建数据对象
		$system->create ();
		$result = $system->save (); // 根据条件保存修改的数据
		if ($result > 0) {
			$this->success ( "修改成功" );
		} else {
			$this->error ( "修改失败" );
		}
	}
	//一键解锁
	public function unlock(){
		$model = M('users');
		$result = $model->execute("update e_users set loginnum = 1");
		if($result){
			$this->success("解锁成功");
		}else{
			$this->error("解锁失败");
		}
	}
}