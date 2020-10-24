<?php
	include("cd.php");
	
	$name = $_POST['name'];
	
	sql_exec("INSERT INTO `tage` (`process_id`, `name`) VALUES ('{$_SESSION['process_id']}', '$name')");
	
	$_SESSION['message'] = "新增成功";
	header("location:mange_tage.php");
	exit;