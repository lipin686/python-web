<?php
	include("cd.php");
	
	$id = $_GET['id'];
	
	$face = sql_query("SELECT * FROM `face` where `id` = '$id'")[0];
	$messages = sql_query("SELECT * FROM `message` where `face_id` = '$id'");
		
	$_SESSION['face_id'] = $id;
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
			<p><button class="btn" onClick="location.href='process.php?id=<?=$_SESSION['process_id']?>'">返回</button></p>
			
			<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#d1" id="aaa">面向說明</a></li>
				<li><a data-toggle="tab" href="#d3">面向意見</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane well" id="d1">
					<p>面向名稱：<?=$face['name']?></p>
					<p>面向說明：<?=$face['content']?></p>
				</div>
				<div class="tab-pane" id="d3">
					<?php
					if ($_SESSION['message_type'] == 1) {
						?><p><button class="btn btn-success" onClick="location.href='message_add.php'">發表意見</button></p><?php
					}
					
					foreach ($messages as $message) {
					?>
					<div class="alert alert-info" onClick="location.href='message.php?id=<?=$message['id']?>'">
						<?=$message['name']?>
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