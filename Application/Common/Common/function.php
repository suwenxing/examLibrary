<?php
/*
 * 处理上传exl数据 $file_name 文件路径
 */
function import_exl($file_name) {
	// $file_name= './Upload/excel/123456.xls';
	import ( "Org.Util.PHPExcel" ); // 这里不能漏掉
	import ( "Org.Util.PHPExcel.IOFactory" );
	
	$objReader = \PHPExcel_IOFactory::createReader ( 'Excel5' );
	$objPHPExcel = $objReader->load ( $file_name, $encode = 'utf-8' );
	
	$sheet = $objPHPExcel->getSheet ( 0 );
	$highestRow = $sheet->getHighestRow (); // 取得总行数
	$highestColumn = $sheet->getHighestColumn (); // 取得总列数
	
	$data = array ();
	$data [0] = array (
			$highestRow,
			$highestColumn 
	);
	// 从第2行开始读取数据,因为第一行为标题
	for($j = 2; $j <= $highestRow; $j ++) {
		// 从A列读取数据
		for($k = 'A'; $k <= $highestColumn; $k ++) {
			// 读取单元格
			$data [$j] [] = $objPHPExcel->getActiveSheet ()->getCell ( "$k$j" )->getValue ();
		}
	}
	return $data;
}
// 截取指定长度并用省略号代替
function subtext($text, $length) {
	if (mb_strlen ( $text, 'utf8' ) > $length)
		return mb_substr ( $text, 0, $length, 'utf8' ) . '...';
	return $text;
}
//导出
function export_exlcel($data){
	//引入PHPExcel库文件
	import ( "Org.Util.PHPExcel" ); // 这里不能漏掉
	import ( "Org.Util.PHPExcel.IOFactory" );
	//创建对象
	$excel = new PHPExcel();
	//Excel表格式,这里简略写了8列
	$letter = array('A','B','C','D','E','F','F');
	//表头数组
	$tableheader = array('学号','姓名','性别','学院','专业班级','分数');
	//填充表头信息
	for($i = 0;$i < count($tableheader);$i++) {
		$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
	}
	//表格数组
// 	$data = array(
// 			array('1','丽江客栈','昆明市丽江','023-65987458','13598784587','1317615477','batista_bomb@163.com'),
// 			array('2','丽江客栈','昆明市丽江','023-65987458','13598784587','1317615477','batista_bomb@163.com'),
// 			array('3','丽江客栈','昆明市丽江','023-65987458','13598784587','1317615477','batista_bomb@163.com'),
// 			array('4','丽江客栈','昆明市丽江','023-65987458','13598784587','1317615477','batista_bomb@163.com'),
// 			array('5','丽江客栈','昆明市丽江','023-65987458','13598784587','1317615477','batista_bomb@163.com'),
// 			array('6','丽江客栈','昆明市丽江','023-65987458','13598784587','1317615477','batista_bomb@163.com'),
// 			array('7','丽江客栈','昆明市丽江','023-65987458','13598784587','1317615477','batista_bomb@163.com')
// 	);
	//填充表格信息
	for ($i = 2;$i <= count($data) + 1;$i++) {
		$j = 0;
		foreach ($data[$i - 2] as $key=>$value) {
			$excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
			$j++;
		}
	}
	//创建Excel输入对象
	$write = new PHPExcel_Writer_Excel5($excel);
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
	header("Content-Type:application/force-download");
	header("Content-Type:application/vnd.ms-execl");
	header("Content-Type:application/octet-stream");
	header("Content-Type:application/download");;
	header('Content-Disposition:attachment;filename="学生考试分数导出.xls"');
	header("Content-Transfer-Encoding:binary");
	$write->save('php://output');
}