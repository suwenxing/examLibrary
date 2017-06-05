<?php

namespace Home\Controller;


class AnswerController extends PublicController {
	public function index() {
		$md5id = md5 ( $_GET ['id'] );
		// 获取题目信息和时间信息
		$title = M ( 'test' )->where ( 'id = ' . $_GET ['id'] )->field ( 'title' )->find ();
		$etime = M ( 'system' )->where ( 'id= 1' )->field ( "etime" )->find ();
		$this->assign ( "title", $title ['title'] );
		$this->assign ( "etime", $etime ['etime'] );
		$list = array ();
		if ($_GET ['p'] == null) {
			$_GET ['p'] = 1;
		}
		$this->assign ( "p", $_GET ['p'] );
		if ($md5id == $_GET ['token']) {
			// 如果没有缓存
			if (! $_SESSION ['data']) {
				$tid = array (
						'tid' => $_GET ['id'] 
				);
				$result = M ( 'quest' )->where ( $tid )->select ();
				// 对数据进行处理
				$list1 = $this->chuli ( $result );
				session ( 'data', $list1 );
			}
			$data = $_SESSION ['data'];
			// 分页处理
			// $_GET[p]获取
			for($i = ($_GET ['p'] - 1) * 20; $i < $_GET ['p'] * 20; $i ++) {
				array_push ( $list, $data [$i] );
			}
			// dump($list);
			// $list
			$this->assign ( 'list', $list ); // 赋值数据集
			$count = count ( $data );
			$Page = new \Think\Page2 ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数
			$show = $Page->show (); // 分页显示输出
			$this->assign ( 'page', $show ); // 赋值分页输出
			$this->display (); // 输出模板
		} else {
			// 非法侵入
			$this->redirect ( "Confirm/index" );
		}
	}
	// 数据处理
	public function chuli($result) {
		$subject = array ();
		$other = array ();
		foreach ( $result as $list ) {
			// type==4为必选题
			if ($list ['type'] == 4) {
				array_push ( $subject, $list );
			} else {
				array_push ( $other, $list );
			}
		}
		// 从非必选中选70个
		shuffle ( $other );
		for($i = 0; $i < 70; $i ++) {
			array_push ( $subject, $other [$i] );
		}
		shuffle ( $subject );
		return $subject;
	}
}