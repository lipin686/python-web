<?php
	include("cd.php");
	
	$id = $_GET['id'];
	
	sql_exec("DELETE FROM `tage` WHERE `id` = '$id'");
	
	$_SESSION['message'] = "刪除成功";
	header("location:mange_tage.php");
	exit;