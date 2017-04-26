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
				$exl = $this->import_exl ( $file_name );
				 
				$count = count ( $exl );
				//行宽
				$row = $exl[0][0];
				// 检测表格导入成功后，是否有数据生成
				if ($count < 1) {
					$this->ajaxReturn ( '您上传的excel为空' );
				}
				//dump($exl[0]['0']);
				//实例化 数据表
				$Model = M('test');
				// 开始组合数据
				//echo  'id=' . $exl[2][0] .'&account=' . $exl[2][1] .'&nickname=' . $exl[2][2]; 
				for($i = 2; $i <= $count; $i++) {
						//$data = 'name=流年&email=thinkphp@qq.com';
						//为进行为空判断
						$data = 'id=' . $exl[$i][0] .'&account=' . $exl[$i][1] .'&nickname=' . $exl[$i][2];
						$Model->data($data)->add();
				}
				
				// 上传结束
			}
		}
	}
	
	/*
	 * 处理上传exl数据 $file_name 文件路径
	 */
	public function import_exl($file_name) {
		// $file_name= './Upload/excel/123456.xls';
		import ( "Org.Util.PHPExcel" ); // 这里不能漏掉
		import ( "Org.Util.PHPExcel.IOFactory" );
		$objReader = \PHPExcel_IOFactory::createReader ( 'Excel5' );
		$objPHPExcel = $objReader->load ( $file_name, $encode = 'utf-8' );
		$sheet = $objPHPExcel->getSheet ( 0 );
		$highestRow = $sheet->getHighestRow (); // 取得总行数
		$highestColumn = $sheet->getHighestColumn (); // 取得总列数
		
		$data = array ();
		$data[0]=array ($highestRow,$highestColumn);
		// 从第2行开始读取数据,因为第一行为标题
		for($j = 2; $j <= $highestRow; $j ++) {
			// 从A列读取数据
			for($k = 'A'; $k <= $highestColumn; $k++) {
				// 读取单元格
				$data [$j] [] = $objPHPExcel->getActiveSheet ()->getCell ( "$k$j" )->getValue ();
			}
		}
		return $data;
	}
}