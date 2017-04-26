<?php

namespace Admin\Controller;

use Think\Controller;

class StudentController extends Controller {
	public function stulist() {
		$this->display ();
	}
	public function upload() {
		$files = $_FILES ['exl'];
		// exl格式，否则重新上传
		if ($files ['type'] != 'application/vnd.ms-excel') {
			$this->ajaxReturn ( "不是Excel文件，请重新上传" );
		} else {
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
							'xls' 
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
					//保存数据
					$this->savaData ( $exl, $count );
				}
				
				// 上传结束
			}
		}
	}
	// 存储数据
	public function savaData($exl, $count) {
		// 实例化 数据表
		$Model = M ( 'test' );
		$allAdded = true; // 先设定一个值为 true;
		$Model->startTrans (); // 开启事物
		                       // 开始组合数据
		for($i = 2; $i <= $count; $i ++) {
			// $data = 'name=流年&email=thinkphp@qq.com';
			// 为进行为空判断
			$data = 'id=' . $exl [$i] [0] . '&account=' . $exl [$i] [1] . '&nickname=' . $exl [$i] [2];
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
			$this->ajaxReturn ( '添加成功' );
		} else {
			$this->ajaxReturn ( '添加失败' );
		}
	}
}