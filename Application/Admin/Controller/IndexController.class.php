<?php

namespace Admin\Controller;

class IndexController extends PublicController {
	public function index() {
		// 学院列表数组
		//$cjson = $this->getCollege ();
		// 获取人数
		$pjson = $this->getPeople ();
		 
		// 获取分数
		$this->getAvg ();
		
		
		$list = M ( 'menu' )->where ( 'status=1' )->select ();
		$this->assign ( "pjson", $pjson );
		//$this->assign ( "cjson", $cjson );
		$this->assign ( "list", $list );
		$this->display ();
	}
	
	// 获取学院信息
	public function getCollege() {
		$carry = array ();
		$college = M ( 'college' )->distinct ( true )->field ( 'cname' )->select ();
		foreach ( $college as $value ) {
			array_push ( $carry, $value ['cname'] );
		}
		// 学院json
		$cjson = json_encode ( $carry );
		return $cjson;
	}
	// 获取分数人数
	public function getPeople() {
		// 建立不同分数段的数组
		$a = 0;
		$b = 0;
		$c = 0;
		$d = 0;
		$e = 0;
		
		$model = M ( 'users' )->field ( 'score' )->select ();
		 
		for($i=0;$i<count($model);$i++){
			$grade = (int)$model[$i]['score'];
			if( $grade >= 90){
				 $a+=1;
			}else if($grade >=80){
				 $b+=1;
			}else if($grade >= 70){
				$c+=1;
			}else if($grade >=60){
				$d+=1;
			}else{
				$e+=1;
			}
		}
		
		 
		$result = array (
				$a,
				$b,
				$c,
				$d,
				$e 
		);
		
		$pjson = json_encode ( $result );
		return $pjson;
	}
	// 获取平均分
	public function getAvg() {
		$college = array();
		$avg = array();
		$result = M('users')->query("select sum(score)/count(id) as avg,college from e_users group by college");
		for ($i = 0; $i < count($result); $i++) {
			array_push($college,$result[$i]['college']);
			array_push($avg,(int)$result[$i]['avg']);
		}
		$cjson = json_encode ( $college );
		$ajson = json_encode ( $avg );
		 
		$this->assign("cjson",$cjson);
		$this->assign("ajson",$ajson);
	}
}