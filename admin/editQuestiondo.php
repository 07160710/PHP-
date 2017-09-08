<?php
require_once '../dbconfig.php';
if (isset ( $_REQUEST ['title'] )) {
	$answer [] = isset ( $_REQUEST ['answer1'] ) ? 1 : 0;
	$answer [] = isset ( $_REQUEST ['answer2'] ) ? 1 : 0;
	$answer [] = isset ( $_REQUEST ['answer3'] ) ? 1 : 0;
	$answer [] = isset ( $_REQUEST ['answer4'] ) ? 1 : 0;
	$totalItems = $answer [0] + $answer [1] + $answer [2] + $answer [3];
	
	// 没有选择项
	if ($totalItems == 0) {
		echo "<javascript>alert('必须选择标准答案');</javascript>";
	} else {
		if ($totalItems == 1) {
			$type = '单';
		} else {
			$type = '多';
		}
		// 修改题干
		$id = $_REQUEST ['id'];
		$subject = $_REQUEST ['subject'];
		$title = $_REQUEST ['title'];
		$sql = "update select_question set subject='$subject',type='$type',title='$title' where id ='$id' ";
		$result = @mysql_query ( $sql );
		if ($result) {
			// 保存四个选项内容
			$items [] = $_REQUEST ['item1'];
			$items [] = $_REQUEST ['item2'];
			$items [] = $_REQUEST ['item3'];
			$items [] = $_REQUEST ['item4'];
			for($i = 0; $i < count ( $items ); $i ++) {
				$isanswer = $answer [$i];
				$content = $items [$i];
				$itemId = $_REQUEST['id'.($i+1)];
				$sql = "update select_item set isanswer='$isanswer',content='$content' where id = '$itemId'";
				mysql_query ( $sql );
			}
		}
		header("location:question.php");
	}
}
?>