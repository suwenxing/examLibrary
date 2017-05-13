<?php

namespace Admin\Controller;
 
class CommonController extends PublicController {
	public function upload(){
		$files = $_FILES['exl'];
		// exl格式，否则重新上传
		if($files['type'] !='application/vnd.ms-excel'){
			$this->error('不是Excel文件，请重新上传');
		}
	
		// 上传
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('xls');// 设置附件上传类型
		$upload->rootPath  =     './Upload/'; // 设置附件上传根目录
		$upload->savePath  =     'excel/'; // 设置附件上传（子）目录
		//$upload->subName   =     array('date', 'Ym');
		$upload->subName   =     '';
		// 上传文件
		$info   =   $upload->upload();
	
		$file_name =  $upload->rootPath.$info['exl']['savepath'].$info['exl']['savename'];
		$exl = $this->import_exl($file_name);
	
		// 去掉第exl表格中第一行
		unset($exl[0]);
	
		// 清理空数组
		foreach($exl as $k=>$v){
			if(empty($v)){
				unset($exl[$k]);
			}
		};
		// 重新排序
		sort($exl);
	
		$count = count($exl);
		// 检测表格导入成功后，是否有数据生成
		if($count<1){
			$this->error('未检测到有效数据');
		}
	
		// 开始组合数据
		foreach($exl as $k=>$v){
	
			$goods[$k]['goods_sn'] = $v;
	
			// 查询数据库
			$where['goods_sn'] = array('like','%'.$v.'%');
			$res = M('goods')->where($where)->find();
	
			$goods[$k]['goods_name'] = $res['goods_name'];
			$goods[$k]['goods_thumb'] = $res['goods_thumb'];
			if($res){
				// 是否匹配成功
				$goods[$k]['is_match']    = '1';
				$f += 1;
			}else{
				// 匹配失败
				$goods[$k]['is_match']    = '0';
				$w += 1;
			}
	
		}
		// 实例化数据
		$this->assign('goods',$goods);
		//print_r($f);
	
		// 统计结果
		$total['count'] = $count;
		$total['success'] = $f;
		$total['error'] = $w;
		$this->assign('total',$total);
	
		// 删除Excel文件
		unlink($file_name);
		$this->display('info');
	
	}
	/* 处理上传exl数据
	 * $file_name  文件路径
	*/
	public function import_exl($file_name){
		//$file_name= './Upload/excel/123456.xls';
		import("Org.Util.PHPExcel");   // 这里不能漏掉
		import("Org.Util.PHPExcel.IOFactory");
		$objReader = \PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($file_name,$encode='utf-8');
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow(); // 取得总行数
		$highestColumn = $sheet->getHighestColumn(); // 取得总列数
	
		for($i=1;$i<$highestRow+1;$i++){
			$data[] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue();
		}
		return $data;
	}
}

?>