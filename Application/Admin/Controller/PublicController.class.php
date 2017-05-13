<?php

namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller {

	Public function _initialize(){
		if(!isset($_SESSION['username'])){
			$this ->redirect('Login/index');
		}
	}
	public function _empty(){
		$this->display('Public:404');
	}
}