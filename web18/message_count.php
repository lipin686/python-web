<?php
	include("cd.php");
	
	$count = $_POST['count'];
	
	sql_exec("INSERT INTO `count` (`process_id`, `user_id`, `message_id`, `count`) VALUES ('{$_SESSION['process_id']}', '{$_SESSION['id']}', '{$_SESSION['message_id']}', '$count')");
	
	header("location:message.php?id=".$_SESSION['message_id']);
	exit;