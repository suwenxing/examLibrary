<?php

namespace Admin\Controller;

class MenuController extends PublicController {
	public function	menulist() {
		$model = M ( 'menu' ); // 实例化User对象
		                        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$where = array ();
		$list = $model->where ( $where )->page ( $_GET ['p'] . ',20' )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$count = $model->count (); // 查询满足要求的总记录数
		$Page = new \Think\Page ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show (); // 分页显示输出
		
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display (); // 输出模板
	}
	//显示学生信息编辑界面
	public function showmenu() {
		$id = array (
				'id' => $_GET ['id'] 
		);
		 
		$model = M ( 'menu' )->where ( $id )->select ();
		 
		$this->assign("list",$model[0]);
 
		$this->display();
		
	}
	// 编辑学生信息
	public function editmenu() {
		
		$data = $_POST;
		$status = $_POST ['status'];
		if (!$status) {
			$data['status'] = 0;
		} else {
			$data['status'] = 1;
		}
		//dump($data);
		$Model = M ( 'menu' );
		
		$result = $Model->data ( $data )->save ();
		if ($result > 0) {
			$this->success ( "修改成功",U('Menu/menulist') );
		} else {
			$this->error ( "修改失败" );
		}
	}
	// 删除学生信息
	public function delstu() {
		$id = array (
				'id' => $_GET ['id'] 
		);
		$model = M ( 'menu' )->where ( $id )->delete ();
		if ($model > 0) {
			$this->success ( "删除成功" );
		} else {
			$this->error ( "删除失败" );
		}
	}
	// 增加学生信息
	public function newmenu(){
		
		$data = $_POST;
		$status = $_POST ['status'];
		if (! $status) {
			$status = 0;
		} else {
			$status = 1;
		}
		$data ['status'] = $status;
		$Model = M ( 'menu' );
		
		$result = $Model->data ( $data )->add ();
		if ($result > 0) {
			$this->success ( "添加成功",U('Menu/menulist') );
		} else {
			$this->error ( "添加失败" );
		}
	}
	 
	public function addmenu(){
		$this->display();
	}
	 
	
}