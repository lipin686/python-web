<?php
	include("cd.php");
	
	$type = $_GET['type'];
	
	sql_exec("UPDATE `process` SET `type` = '$type' WHERE `id` = '{$_SESSION['process_id']}'");
	
	header("location:process.php?id=".$_SESSION['process_id']);
	exit;