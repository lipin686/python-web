<?php
	include("cd.php");
	
	$leader = $_POST['leader'];
	$members = $_POST['member'];
	$process_id  = $_POST['id'];
	
	$ddd = $leader.', ';
	
	foreach ($members as $k => $member) {
		if ($member == $leader) {
			$_SESSION['message'] = "組長組員重複";
			header("location:process_user.php?id=".$process_id);
			exit;
		}
	}
	
	sql_exec("DELETE FROM `member` WHERE `process_id` = '$process_id'");
	
	sql_exec("INSERT INTO `member` (`process_id`, `user_id`, `type`) VALUES ('$process_id' , '1', '1')");
	sql_exec("INSERT INTO `member` (`process_id`, `user_id`, `type`) VALUES ('$process_id' , '$leader', '1')");
	foreach ($members as $k => $member) {
		sql_exec("INSERT INTO `member` (`process_id`, `user_id`, `type`) VALUES ('$process_id' , '$member', '2')");
		$ddd .= $member.',';
	}
	$ddd .= '1';
	
	sql_exec("DELETE FROM `count` WHERE process_id = '$process_id' and user_id not in ($ddd)");
	sql_exec("DELETE FROM `tage_count` WHERE process_id = '$process_id' and user_id not in ($ddd)");
	
	$_SESSION['message'] = "指定成功";
	header("location:manage_process.php");
	exit;