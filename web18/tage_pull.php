<?php
	include("cd.php");
	
	$name = $_POST['name'];
	$id = $_POST['id'];
	
	sql_exec("UPDATE `tage` SET `name` = '$name' WHERE `id` = '$id'");
	
	$_SESSION['message'] = "修改成功";
	header("location:mange_tage.php");
	exit;