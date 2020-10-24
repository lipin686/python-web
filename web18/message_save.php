<?php
	include("cd.php");
	
	$name = $_POST['name'];
	$content = $_POST['content'];
	
	$file = $_FILES['file'];
	$file_name = "";
	
	$create_time = date("Y/m/d H:i:s");
	
	$extend = $_POST['extend'];
	
	if ($file['name'] != '') {
		$file_name = "file/".uniqid().'.'.explode(".", $file['name'])[1];
		copy($file['tmp_name'], $file_name);
	}
	
	sql_exec("INSERT INTO `message` (`face_id`, `name`, `content`, `file`, `create_time`) VALUES ('{$_SESSION['face_id']}', '$name', '$content', '$file_name', '$create_time')");
	$message_id = $mysql->lastInsertId();
	
	foreach ($extend as $e) {
		sql_exec("INSERT INTO `extend_ms` (`message_id`, `extend_id`) VALUES ('$message_id', '$e')");
	}
	
	header("location:face.php?id=".$_SESSION['face_id']);
	exit;