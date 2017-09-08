<?php
header ( "content-type:text/html;charset=utf-8" );
 if (! isset ( $_SESSION )) {
 	session_start ();
 }
 if (! isset ( $_SESSION['userName'] )) {
 	header ( "location:login.php" );
 } else {
	require_once '../dbconfig.php';
	$id = $_REQUEST['id'];
	// 删除语句
	//var_dump($id);
 	$sql = "delete from paper where id='$id'";
 	//exit($sql);
 	$result = mysql_query ( $sql, $conn );
 	if ($result) {
 		echo "<script>alert('删除成功!');</script>";
 		echo "<a href='paper.php'>返回</a>";
 	} else {
 		echo "<script>alert('删除失败!');</script>";
 		echo "<a href='paper.php'>返回</a>";
 	}
 }
?>