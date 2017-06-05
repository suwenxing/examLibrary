<?php

namespace Home\Controller;

class ConfirmController extends PublicController {
	public function index() {
		$attention = M ( 'system' )->field ( 'attention' )->find ();
		$this->assign ( "attention", $attention );
		$this->display ();
	}
	public function qlist() {
		$tid = array (
				"tid" => '0',
				"status" => '1' 
		);
		$model = M ( "test" )->where ( $tid )->select ();
		$this->assign ( "list", $model );
		$this->display ( "list" );
	}
	public function zlist() {
		$tid = array (
				"tid" => $_GET ['tid'],
				"status" => '1' 
		);
		$md5 = M ( 'system' )->field ( 'md5salt' )->find ();
		
		$model = M ( "test" )->where ( $tid )->select ();
		$this->assign ( "list", $model );
		$this->assign ( "md5", $md5 );
		$this->display ();
	}
}