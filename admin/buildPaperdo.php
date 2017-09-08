<?php
// 取出数据
require_once '../dbconfig.php';
//$data = input('post.');
$data['subject'] = $_REQUEST['subject'];
$data['total'] = $_REQUEST['total'];
$data['name'] = $_REQUEST['name'];
$data['memo'] = $_REQUEST['memo'];
//查询所有的题号
$query = "select id from select_question where subject = '".$data['subject']."'";
$result = @mysql_query($query);
while($row = mysql_fetch_array($result)){
	$questionNo[] = $row;
}
//var_dump($questionNo);
//exit();
$content = '';
$minSum = min($data['total'],count($questionNo));
for($i=0;$i<$minSum-1;$i++){
	$content .= $questionNo[$i]['id'].',';
}
$content .= $questionNo[$i]['id'];
$data['content'] = $content;

$writePaper = "insert into paper(subject,total,name,content) values('".$data['subject']."','".$data['total']."','".$data['name']."','".$data['content']."')";
$result = mysql_query($writePaper);
header("content-type:text/html;charset=utf-8");
if ($result) {
	echo "数据保存成功！";
	echo "<a href=buildPaper.php>返回</a>";
} else {
	echo "数据保存成功！";
	echo "<a href=buildPaper.php>返回</a>";
}
?>