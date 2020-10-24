<?php
	include("cd.php");
	
	$id = $_GET['id'];
	
	sql_exec("DELETE FROM `program` WHERE `id` = '$id'");
	
	$_SESSION['message'] = "刪除成功";
	header("location:mangae_program.php");
	exit;