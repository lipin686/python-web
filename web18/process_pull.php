<?php
	include("cd.php");
	
	$name = $_POST['name'];
	$content = $_POST['content'];
	
	$face_name = $_POST['face_name'];
	$face_content = $_POST['face_content'];
	$face_id = $_POST['face_id'];
	
	$process_id  = $_POST['id'];
	
	sql_exec("UPDATE `process` SET `name` = '$name', `content` = '$content' WHERE `id` = '$process_id'");
	
	
	sql_exec("UPDATE `face` SET `type` = '1' WHERE `process_id` = '$process_id'");
	foreach ($face_id as $k => $id) {
		if ($id == 0){
			sql_exec("INSERT INTO `face` (`process_id`, `name`, `content`) VALUES ('$process_id' , '{$face_name[$k]}', '{$face_content[$k]}')");
		} else {
			sql_exec("UPDATE `face` SET `name` = '{$face_name[$k]}', `content` = '{$face_content[$k]}', `type` = '0' WHERE `id` = '$id'");
		}
	}
	sql_exec("DELETE FROM `face` WHERE `type` = '1'");
	
	$_SESSION['message'] = "修改成功";
	header("location:manage_process.php");
	exit;