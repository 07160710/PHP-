<?php
require_once '../dbconfig.php';
header("content-type:text/html;charset=utf-8");
//取表单数据
$studentId = $_REQUEST['studentId'];
$name = $_REQUEST['name'];
$classname = $_REQUEST['className'];
$birthday = $_REQUEST['birthday'];
$sex = $_REQUEST['sex'];
$nation = $_REQUEST['nation'];

$sql = "INSERT INTO student(id,studentId,name,className,birthday,sex,nation) VALUES (null,'$studentId','$name','$classname' ,'$birthday' ,'$sex' ,'$nation')";


if(mysql_query($sql)){
	echo "插入数据成功！！！<br/>";
	echo "<a href='index.php'>去查看</a>";
}else{
	echo "注册失败！！！<br/>";
	echo "<a href='index.php'>返回</a>";
}
?>