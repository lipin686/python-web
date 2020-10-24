<?php
	include("cd.php");
	
	$name = $_POST['name'];
	$content = $_POST['content'];
	$face_name = $_POST['face_name'];
	$face_content = $_POST['face_content'];
	$face_id = $_POST['face_id'];
	
	sql_exec("INSERT INTO `process` (`name`, `content`, `type`) VALUES ('$name', '$content', '1')");
	$process_id = $mysql->lastInsertId();
	
	foreach ($face_id as $k => $id) {
		sql_exec("INSERT INTO `face` (`process_id`, `name`, `content`) VALUES ('$process_id' , '{$face_name[$k]}', '{$face_content[$k]}')");
	}
	
	$_SESSION['message'] = "新增成功";
	header("location:manage_process.php");
	exit;