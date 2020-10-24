<?php
	include("cd.php");
	
	$name = $_POST['name'];
	$content = $_POST['content'];
	$count = $_POST['count'];
	$program_id = $_POST['id'];
	
	sql_exec("UPDATE `program` SET `name` = '$name', `content` = '$content' WHERE `id` = '$program_id'");
	
	
	sql_exec("DELETE FROM `fun` WHERE `program_id` = '$program_id'");
	for ($i=0;$i<$count;$i++) {
		if ($_POST['fun'.$i] != '') {
			$data = explode(":", $_POST['fun'.$i]);
			sql_exec("INSERT INTO `fun` (`program_id`, `face_id`, `message_id`) VALUES ('{$program_id}', '{$data[0]}', '{$data[1]}')");
		}
	}
	
	$_SESSION['message'] = "修改成功";
	header("location:mangae_program.php");
	exit;