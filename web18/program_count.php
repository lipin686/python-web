<?php
	include("cd.php");
	
	$count = $_POST['count'];
	$tag_id = $_POST['tag_id'];
	
	foreach ($tag_id as $k => $id) {
		sql_exec("INSERT INTO `tage_count` (`process_id`, `program_id`, `user_id`, `tage_id`, `count`) VALUES ('{$_SESSION['process_id']}', '{$_SESSION['program_id']}', '{$_SESSION['id']}', '$id', '{$count[$k]}')");
	}
	
	
	header("location:program.php?id=".$_SESSION['program_id']);
	exit;