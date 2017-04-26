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
 