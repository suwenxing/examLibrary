<?php

namespace Home\Controller;

use Think\Controller;

class ScoreController extends Controller {
	public function index() {
		$this->display ();
	}
	public function grade() {
		$data = $_POST;
		$question = $data ['questions'];
		// dump($data);
		$se = session ( "questions" );
		if ($se) {
			// session不为空，进行拼接
			$temp = session ( "questions" );
			$d = array_merge ( $temp, $question );
			session ( "questions", $d );
		} else {
			session ( "questions", $question );
		}
		
		if ($_POST ['flag'] == 1 || $_POST ['flag'] == 2) {
			$this->panfen ();
		}
	}
	
	// 判分
	public function panfen() {
		$a = $_SESSION ['data'];
		$b = $_SESSION ['questions'];
		$num = 0;
		
		for($i = 0; $i < count ( $a ); $i ++) {
			if ($a [$i] ['answer'] == $b [$i]) {
				$num += 1;
			}
		}
		$id = array (
				'id' => $_SESSION ['userid'] 
		);
		$loginnum = M ( 'users' )->where ( $id )->field ( 'loginnum' )->find ();
		if($loginnum <= 0){
			$this->redirect("Login/index");
		}
		$loginnum = $loginnum ['loginnum'] - 1;
		// 将分数存到数据库并清空session
		$data = array (
				'id' => $_SESSION ['userid'],
				'usernumber' => $_SESSION ['usernumber'],
				'loginnum' => $loginnum,
				'score' => $num 
		);
		$result = M ( 'users' )->data ( $data )->save ();
		if ($result > 0) {
			// 清空所有的session
			session_unset ();
			session_destroy ();
		} else {
			echo "error";
		}
	}
}