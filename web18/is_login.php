<?php
	include("cd.php");
	
	$ac = $_POST['ac'];
	$ps = $_POST['ps'];
	
	$data = sql_query("SELECT * FROM `user` where `ac` = '$ac' and `ps` = '$ps'")[0];
	
	if ($data == '') {
		$_SESSION['message'] = "登入失敗";
		header("location:index.php");
		exit;
	}
	
	$_SESSION['id'] = $data['id'];
	header("location:manage.php");
	exit;