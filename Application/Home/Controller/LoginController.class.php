<?php

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller {
	public function index() {
		$this->display ();
	}
	public function login() {
		$condition ['username'] = $_POST ['sname'];
		$condition ['usernumber'] = $_POST ['sno'];
		
		$User = M ( "Users" ); // 实例化User对象
		$result = $User->where ( $condition )->select ();
		
		if ($result) {
			if ($result [0] ['loginnum'] == 1) {
				// 登陆成功，保存到session
				session ( 'userid', $result [0] ['id'] );
				session ( 'usernumber', $condition ['usernumber'] );
				session ( 'username', $condition ['username'] );
				session ( 'college', $result [0] ['college'] );
				session ( 'class', $result [0] ['class'] );
				$this->redirect ( "Confirm/index" );
			} else {
				$this->assign ( "error", "人生没有回头路，你已经挑战过一次了。。" );
				$this->display ( "index" );
			}
		} else {
			$this->assign ( "error", "小马虎,检查一下你的学号和姓名哦(*^__^*) 嘻嘻……" );
			$this->display ( "index" );
		}
	}
}

