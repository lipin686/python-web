<?php
	include("cd.php");
	
	$name = $_POST['name'];
	$ac = $_POST['ac'];
	$ps = $_POST['ps'];
	
	$data = sql_query("SELECT * FROM `user` where `ac` = '$ac'")[0];
	
	if ($data != '') {
		$_SESSION['message'] = "此帳號已被註冊";
		header("location:user_add.php");
		exit;
	}
	
	sql_exec("INSERT INTO `user` (`name`, `ac`, `ps`) VALUES ('$name', '$ac', '$ps')");
	
	$_SESSION['message'] = "新增成功";
	header("location:manage_user.php");
	exit;