<?php
header ( "content-type:text/html;charset=utf-8" );
if (! isset ( $_SESSION )) {
	session_start ();
}
if (! isset ( $_SESSION['userName'] )) {
	header ( "location:login.php" );
} else {
	$id = $_REQUEST['id'];
	require_once '../dbconfig.php';
	// ɾ�����
	$sql = "delete from classscore where id='$id'";
	$result = mysql_query ( $sql, $conn );
	if ($result) {
		echo "<script>alert('删除成功!');</script>";
		echo "<a href='classscore.php'>返回</a>";
	} else {
		echo "<script>alert('删除失败!');</script>";
		echo "<a href='classscore.php'>返回</a>";
	}
}
?>