<?php
	session_start();
	error_reporting(4);
	date_default_timezone_set("Asia/Taipei");
	
	$mysql = new PDO("mysql:host=localhost;dbname=web_14;charset=utf8", "root", "");
	
	function sql_query($sql) {
		global $mysql;
		return $mysql->query($sql)->fetchALL();
	}
	function sql_exec($sql) {
		global $mysql;
		return $mysql->exec($sql);
	}