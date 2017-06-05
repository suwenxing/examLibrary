<?php

namespace Admin\Controller;

class ExportController extends PublicController {
	public function excel() {
		$data = M ( 'users' )->field ( "usernumber,username,sex,college,class,score" )->select ();
		// echo $data[0]['sex'];
		for($i = 0; $i < count ( $data ); $i ++) {
			if ($data [$i] ['sex'] == '1') {
				$data [$i] ['sex'] = "男";
			} else {
				$data [$i] ['sex'] = "女";
			}
		}
		// 导出
		export_exlcel($data);
	}
}