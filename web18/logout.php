<?php
	include("cd.php");
	
	session_unset();
	
	$_SESSION['message'] = "登出成功";
	header("location:index.php");
	exit;
