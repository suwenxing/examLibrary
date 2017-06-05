<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$this->display();
    }
    
    public function login(){
    	if($_POST["username"] == "admin" && $_POST["password"] == "admin" ){
    		session('username',$_POST["username"]);
    		$this->redirect("Index/index");
    	}else{
    		$this->error("用户名或密码错误。");
    	}
    }
    
    public function logout(){
    	session_unset();
    	session_destroy();
    	$this -> redirect('Login/index');
    }
    
}