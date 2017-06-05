<?php

namespace Admin\Controller;

class ScoreController extends PublicController {
	public function scorelist() {
		$model = M ( 'users' ); // 实例化User对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$where = array ();
		$list = $model->where ( $where )->page ( $_GET ['p'] . ',20' )->order('usernumber')->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$count = $model->count (); // 查询满足要求的总记录数
		$Page = new \Think\Page ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show (); // 分页显示输出
	
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display (); // 输出模板
	}
	
	//搜索
	public function seachscore(){
		$map['username|usernumber'] = $_POST['user'];
		$model=M('users');
		$result = $model->where($map)->select();
		$this->assign("list",$result);
		$this->display('scorelist');
	}
}