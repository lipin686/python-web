<?php
	include("cd.php");
	
	$name = $_POST['name'];
	$ac = $_POST['ac'];
	$ps = $_POST['ps'];
	$id = $_POST['id'];
	
	$data = sql_query("SELECT * FROM `user` where `ac` = '$ac' and `id` != '$id'")[0];
	
	if ($data != '') {
		$_SESSION['message'] = "此帳號已被註冊";
		header("location:user_fix.php?id=".$id);
		exit;
	}
	
	sql_exec("UPDATE `user` SET `name` = '$name', `ac` = '$ac', `ps` = '$ps' WHERE `id` = '$id'");
	
	$_SESSION['message'] = "修改成功";
	header("location:manage_user.php");
	exit;