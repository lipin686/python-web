<?php
	include("cd.php");
	
	$name = $_POST['name'];
	$content = $_POST['content'];
	$count = $_POST['count'];
	
	sql_exec("INSERT INTO `program` (`process_id`, `name`, `content`) VALUES ('{$_SESSION['process_id']}', '$name', '$content')");
	$program_id = $mysql->lastInsertId();
	
	for ($i=0;$i<$count;$i++) {
		if ($_POST['fun'.$i] != '') {
			$data = explode(":", $_POST['fun'.$i]);
			sql_exec("INSERT INTO `fun` (`program_id`, `face_id`, `message_id`) VALUES ('{$program_id}', '{$data[0]}', '{$data[1]}')");
		}
	}
	
	$_SESSION['message'] = "新增成功";
	header("location:mangae_program.php");
	exit;