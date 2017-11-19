<?php 
	header('Content-Type: text/html; charset=utf-8');
	mysql_query("SET NAMES 'UTF8'"); //設定語系
	$sql=mysql_connect("localhost", "root", "12345")or die("cannot connect");//連接資料庫
	$db=mysql_select_db("limesurvey")or die("cannot connect DB");

	if($sql){
		echo '連接成功'.'<br>';
	}else{
		echo '連接失敗'.'<br>';
	}

	if($db){
		echo '連接成功'.'<br>';
	}else{
		echo '連接失敗'.'<br>';
	}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
</body>
</html>