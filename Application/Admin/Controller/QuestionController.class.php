<?php

namespace Admin\Controller;

class QuestionController extends PublicController {
	public function quelist() {
		$model = M ( 'test' ); // 实例化User对象
		                       // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$where = array (
				"tid" => 0 
		);
		$list = $model->where ( $where )->page ( $_GET ['p'] . ',20' )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$count = $model->count (); // 查询满足要求的总记录数
		$Page = new \Think\Page ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show (); // 分页显示输出
		
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display (); // 输出模板
	}
	public function addtype() {
		$id = $_GET ['id'];
		$this->assign ( "tid", $id );
		$this->display (); // 输出模板
	}
	// 增加题目类型
	public function addcate() {
		// 获取父级菜单
		$tid = $_POST ['tid'];
		$title = $_POST ['title'];
		$status = $_POST ['status'];
		if (! $status) {
			$status = 0;
		} else {
			$status = 1;
		}
		
		$Model = M ( 'test' );
		
		$data ['title'] = $title;
		$data ['addtime'] = time ();
		$data ['status'] = $status;
		
		// 若果id不为空或者不为0,即子菜单
		if ($tid != null && $tid != 0) {
			$data ['tid'] = $tid;
		} else { // 父菜单
			$data ['tid'] = 0;
		}
		
		$result = $Model->data ( $data )->add ();
		
		if ($result > 0) {
			$this->success ( "添加成功", U ( 'Question/quelist' ) );
		} else {
			$this->error ( "添加失败", U ( 'Question/quelist' ) );
		}
	}
	// eidttype
	public function edittype() {
		$id = array (
				'id' => $_GET ['id'] 
		);
		$model = M ( 'test' );
		$result = $model->where ( $id )->select ();
		
		$this->assign ( "list", $result [0] );
		$this->display ();
	}
	public function editcate() {
		// 获取父级菜单
		$id = $_POST ['id'];
		$tid = $_POST ['tid'];
		$title = $_POST ['title'];
		$status = $_POST ['status'];
		if (! $status) {
			$status = 0;
		} else {
			$status = 1;
		}
		
		$Model = M ( 'test' );
		$data ['id'] = $id;
		$data ['title'] = $title;
		$data ['addtime'] = time ();
		$data ['status'] = $status;
		
		// 若果id不为空或者不为0,即子菜单
		if ($tid != null && $tid != 0) {
			$data ['tid'] = $tid;
			$result = $Model->data ( $data )->save ();
		} else { // 父菜单
			$data ['tid'] = 0;
			$result = $Model->data ( $data )->save ();
		}
		
		if ($result > 0) {
			$this->success ( "修改成功" );
		} else {
			$this->error ( "修改失败" );
		}
	}
	public function upload() {
		$files = $_FILES ['exl'];
		$tid = $_POST ['tid'];
		
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
					$this->savaData ( $exl, $count, $tid );
				}
				
				// 上传结束
			}
		} else {
			$this->ajaxReturn ( "不是Excel文件，请重新上传" );
		}
	}
	// 存储数据
	public function savaData($exl, $count, $tid) {
		
		// 实例化 数据表
		$Model = M ( 'quest' );
		$allAdded = true; // 先设定一个值为 true;
		$Model->startTrans (); // 开启事物
		                       // 开始组合数据
		for($i = 2; $i <= $count; $i ++) {
			switch ($exl [$i] [0]) {
				case "单选题" :
					$exl [$i] [0] = 1;
					break;
				case "多选题" :
					$exl [$i] [0] = 2;
					break;
				case "是非题" :
					$exl [$i] [0] = 3;
					break;
				case "必选题" :
					$exl [$i] [0] = 4;
					break;
				default :
					$exl [$i] [0] = 0;
					break;
			}
			// $data = 'type=1&content=题目信息&aA=A&aB=B&aC=C&aD=D&answer=A';
			$data = 'tid=' . $tid . '&type=' . $exl [$i] [0] . '&content=' . $exl [$i] [1] . '&aA=' . $exl [$i] [2] . '&aB=' . $exl [$i] [3] . '&aC=' . $exl [$i] [4] . '&aD=' . $exl [$i] [5] . '&answer=' . $exl [$i] [6];
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
			$this->ajaxReturn ( '题目导入成功' );
		} else {
			$this->ajaxReturn ( '题目导入失败' );
		}
	}
	// 删除
	public function deltype() {
		$id = array (
				'id' => $_GET ['id'] 
		);
		
		$model = M ( 'test' )->where ( $id )->delete ();
		if ($model > 0) {
			$this->success ( "删除成功" );
		} else {
			$this->error ( "删除失败" );
		}
	}
	// 添加子菜单
	public function addqueslist() {
		$id = array (
				"tid" => $_GET ['id'] 
		);
		$list = M ( 'test' )->where ( $id )->select ();
		$this->assign ( "id", $_GET ['id'] );
		$this->assign ( "list", $list );
		$this->display (); // 输出模板
	}
	// 删除题目信息
	public function delquest() {
		$tid = array (
				"tid" => $_GET ['id'] 
		);
		$id = array (
				"id" => $_GET ['id']
		);
		$model = M ( 'quest' )->where ( $tid )->delete ();
		$model1 = M ( 'test' )->where ( $id )->delete ();
		if ($model > 0 && $model1 > 0) {
			$this->success ( "删除成功" );
		} else {
			$this->error ( "删除失败" );
		}
	}
	
	
	public function lookques() {
		$model = M ( 'quest' ); // 实例化User对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$where = array (
				"tid" => $_GET['id']
		);
		$list = $model->where ( $where )->page ( $_GET ['p'] . ',20' )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$count = $model->count (); // 查询满足要求的总记录数
		$Page = new \Think\Page ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show (); // 分页显示输出
	
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display (); // 输出模板
	}
	
	// 删除题目信息
	public function deltimu() {
		 
		$id = array (
				"id" => $_GET ['id']
		);
		$model = M ( 'quest' )->where ( $id )->delete ();
		 
		if ($model > 0 ) {
			$this->success ( "删除成功" );
		} else {
			$this->error ( "删除失败" );
		}
	}
	// 编辑题目信息
	public function edittimu() {
			
		$id = array (
				"id" => $_GET ['id']
		);
		$model = M ( 'quest' )->where ( $id )->select ();

		$this->assign ( 'list', $model[0] ); 
		$this->display (); // 输出模板
	}
	// 编辑题目信息
	public function savetimu() {
			
		$data = I();
		$result = M ( 'quest' )->data ( $data )->save ();
		if ($result > 0) {
			$this->success ( "修改成功" ,U('Question/lookques',array('id'=>I('tid'))));
		} else {
			$this->error ( "修改失败" );
		}
	 
	}
}