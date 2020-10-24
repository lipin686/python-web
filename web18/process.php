<?php
	include("cd.php");
	
	$id = $_GET['id'];
	
	$process = sql_query("SELECT * FROM `process` where `id` = '$id'")[0];
	$faces = sql_query("SELECT * FROM `face` where `process_id` = '$id'");
	
	$leader = sql_query("SELECT * FROM `member`, `user` WHERE user.id = member.user_id and member.type = '1' and member.process_id = '$id'");
	$members = sql_query("SELECT * FROM `member`, `user` WHERE user.id = member.user_id and member.type = '2' and member.process_id = '$id'");
	
	$_SESSION['process_id'] = $id;
	$_SESSION['message_type'] = $process['type'];
	$_SESSION['process_type'] = false;
	if ($leader[0]['user_id'] == $_SESSION['id'] || $leader[1]['user_id'] == $_SESSION['id']){
		$_SESSION['process_type'] = true;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>無標題文件</title>

<script src="jquery-3.4.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-responsive.min.css	">

</head>

<script>
$(function () {
	$("#aaa").click();
})
</script>

<body class="bg">
	<?php include("navbar.php"); ?>
	
	<h4>
		<div>
			<p><button class="btn" onClick="location.href='manage.php'">返回</button></p>
			
			<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#d1" id="aaa">專案說明</a></li>
				<li><a data-toggle="tab" href="#d2">執行方案</a></li>
				<li><a data-toggle="tab" href="#d3">專案面向</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane well" id="d1">
					<p>專案名稱：<?=$process['name']?></p>
					<p>專案說明：<?=$process['content']?></p>
				</div>
				<div class="tab-pane" id="d2">
					<?php
					if ($_SESSION['process_type']) {
						?>
						<p>
							<button class="btn btn-info" onClick="location.href='mange_tage.php'">指標管理</button>
							<button class="btn btn-primary" onClick="location.href='mangae_program.php'">方案管理</button>
						</p>
						<?php
					}
					
					
					$programs = sql_query("SELECT * FROM `program` left JOIN(SELECT count(*) as c, sum(`count`) as s , program_id FROM `tage_count` GROUP by program_id) as a on a.program_id = program.id where process_id = '$id' ORDER BY `a`.`program_id` DESC");
					$tage_count = count(sql_query("SELECT * FROM `tage` where `process_id` = '{$_SESSION['process_id']}'"));
					$tf = true;
					
					foreach ($programs as $program) {
						$u = sql_query("SELECT * FROM `tage_count` where program_id = '{$program['id']}' and user_id = '1'")[0];
						if ($u == '') {
							if ((count($members)+1)*$tage_count != $program['c'] || program['c'] == '') {
								$tf = false;
								break;
							}
						} else {
							if ((count($members)+2)*$tage_count != $program['c'] || program['c'] == '') {
								$tf = false;
								break;
							}
						}
					}
					
					if ($tf) {
						foreach ($programs as $program) {
						?>
						<div class="alert alert-info" onClick="location.href='program.php?id=<?=$program['id']?>'">
							<?=$program['name']?><br/>
							評分總分：<?=$program['s']?>
						</div>
						<?php
						}
					} else {
						$programs = sql_query("SELECT * FROM `program` where `process_id` = '$id'");
						foreach ($programs as $program) {
						?>
						<div class="alert alert-info" onClick="location.href='program.php?id=<?=$program['id']?>'">
							<?=$program['name']?>
						</div>
						<?php
						}
					}
					
					?>
				</div>
				<div class="tab-pane" id="d3">
					<?php
					if ($_SESSION['process_type']) {
						if ($_SESSION['message_type'] == 1) {
							?><p><button class="btn btn-danger" onClick="location.href='message_type.php?type=2'">暫停發表</button></p><?php
						} else {
							?><p><button class="btn btn-success" onClick="location.href='message_type.php?type=1'">開始發表</button></p><?php
						}
					}
					foreach ($faces as $face) {
					?>
					<div class="alert alert-info" onClick="location.href='face.php?id=<?=$face['id']?>'">
						<?=$face['name']?>
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</h4>
</body>
</html>	