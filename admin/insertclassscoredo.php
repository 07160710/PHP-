<?php
require_once '../dbconfig.php';
header("content-type:text/html;charset=utf-8");
//取表单数据
$studentId = $_REQUEST['studentId'];
$term = $_REQUEST['term'];
$subject = $_REQUEST['subject'];
$mark = $_REQUEST['mark'];

//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "INSERT INTO classscore(id,studentId, term, subject, mark) VALUES (null,'$studentId','$term','$subject',$mark)";
//exit($sql);
//var_dump(mysql_query($sql));
if(mysql_query($sql)){
	echo "插入数据成功！！！<br/>";
	echo "<a href='classscore.php'>去查看</a>";
}else{
	echo "插入失败！！！<br/>";
	echo "<a href='classscore.php'>查看</a>";
}
?>