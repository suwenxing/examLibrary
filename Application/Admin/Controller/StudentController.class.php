<?php

namespace Admin\Controller;

class StudentController extends PublicController {
	public function stulist() {
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
	public function upload() {
		$files = $_FILES ['exl'];
		// echo $files ['type'];
		// exit;
		// exl格式，否则重新上传
		if ($files ['type'] == 'application/vnd.ms-excel' || $files ['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
			// 设置参数
			$config = array (
					'maxSize' => 3145728,
					'rootPath' => 'Public',
					'savePath' => '/Uploads/',
					'saveName' => array (
							'uniqid',
							'' 
					),
					'exts' => array (
							'xls',
							'xlsx' 
					),
					'autoSub' => true,
					'subName' => array (
							'date',
							'Ymd' 
					) 
			);
			$upload = new \Think\Upload ( $config ); // 实例化上传类
			$info = $upload->upload ();
			if (! $info) {
				$this->ajaxReturn ( "上传失败，请重新上传" );
			} else {
				// 上传成功
				$file_name = $upload->rootPath . $info ['exl'] ['savepath'] . $info ['exl'] ['savename'];
				// 调用函数，用来导入exl
				$exl = import_exl ( $file_name );
				
				$count = count ( $exl );
				
				// 行宽
				$row = $exl [0] [0];
				// 检测表格导入成功后，是否有数据生成
				if ($count <= 1) {
					$this->ajaxReturn ( '您上传的excel的内容为空' );
				} else {
					// 保存数据
					$this->savaData ( $exl, $count );
				}
				
				// 上传结束
			}
		} else {
			$this->ajaxReturn ( "不是Excel文件，请重新上传" );
		}
	}
	// 存储数据
	public function savaData($exl, $count) {
		// 实例化 数据表
		$Model = M ( 'users' );
		$allAdded = true; // 先设定一个值为 true;
		$Model->startTrans (); // 开启事物
		                       // 开始组合数据
		for($i = 2; $i <= $count; $i ++) {
			if ($exl [$i] [2] == "男") {
				$exl [$i] [2] = 1;
			} else if ($exl [$i] [2] == "女") {
				$exl [$i] [2] = 0;
			} else {
				$this->ajaxReturn ( '数据导入格式不正确，请检查上传文件的格式' );
			}
			// $data = 'name=流年&email=thinkphp@qq.com';
			// 为进行为空判断
			$data = 'usernumber=' . $exl [$i] [0] . '&username=' . $exl [$i] [1] . '&sex=' . $exl [$i] [2] . '&college=' . $exl [$i] [3] . '&class=' . $exl [$i] [4] . '&loginnum = 1';
			$sign = $Model->data ( $data )->add ();
			
			if (! $sign) {
				$Model->rollback (); // 如果order添加失败事物回滚
				$allAdded = false; // 并且把allAdded设置为 false
			}
		} // for循环结束
		  // 回滚
		if ($allAdded) {
			$Model->commit ();
			// 如果allAdded为真则两条数据都成功；那么 commit事物提交
			$this->ajaxReturn ( '数据导入成功' );
		} else {
			$this->ajaxReturn ( '数据导入失败' );
		}
	}
	//显示学生信息编辑界面
	public function showstu() {
		$id = array (
				'id' => $_GET ['id'] 
		);
		$model = M ( 'users' )->where ( $id )->select ();
	
		$college = M('college')->distinct(true)->field('cname')->select();
		$clwhere = array("cname"=>$model[0]['college']);
		$class = M('college')->where($clwhere)->select();
		 
		$this->assign("list",$model[0]);
		$this->assign("college",$college);
		$this->assign("class",$class);
		$this->display();
		
	}
	// 编辑学生信息
	public function editstu() {
		 
		$data = $_POST;
		$Model = M ( 'users' );
		
		$result = $Model->data ( $data )->save ();
		if ($result > 0) {
			$this->success ( "修改成功",U('Student/stulist') );
		} else {
			$this->error ( "修改失败" );
		}
	}
	// 删除学生信息
	public function delstu() {
		$id = array (
				'id' => $_GET ['id'] 
		);
		$model = M ( 'users' )->where ( $id )->delete ();
		if ($model > 0) {
			$this->success ( "删除成功" );
		} else {
			$this->error ( "删除失败" );
		}
	}
	// 增加学生信息
	public function addstu(){
		$data = $_POST;
		$Model = M ( 'users' );
		
		$result = $Model->data ( $data )->add ();
		if ($result > 0) {
			$this->success ( "添加成功",U('Student/stulist') );
		} else {
			$this->error ( "添加失败" );
		}
	}
	//异步获取学院对应的班级信息
	public function getClass(){
		$cname = array('cname'=>$_POST['cname']);
		$model= M("college")->where($cname)->field('clname')->select();
		
		$this->ajaxReturn($model);	
	}
	
	public function newstu(){
		$college = M('college')->distinct(true)->field('cname')->select();
		array_push($college, "-------------");
		$this->assign("list",$college);
		$this->display();
	}
	//搜索
	public function seachstu(){
		$map['username|usernumber'] = $_POST['user'];
		$model=M('users');
		$result = $model->where($map)->select();
		$this->assign("list",$result);
		$this->display('stulist');
	}
	
}