<?php
	include("cd.php");
	
	$id = $_GET['id'];
	
	sql_exec("DELETE FROM `user` WHERE `id` = '$id'");
	
	$_SESSION['message'] = "刪除成功";
	header("location:manage_user.php");
	exit;