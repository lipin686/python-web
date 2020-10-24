<?php
	include("cd.php");
	
	$id = $_GET['id'];
	
	$message = sql_query("SELECT * FROM `message` where `id` = '$id'")[0];
	$extend = sql_query("SELECT * FROM `extend_ms` where `message_id` = '$id'");
	
	$count = sql_query("SELECT count(*) as c, sum(`count`) as s FROM `count` where `message_id` = '$id'")[0];
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
			<p>
				<?php
				if ($_GET['type1'] != '') {
				?><button class="btn" onClick="location.href='program_add.php'">返回</button><?php
				} else if ($_GET['type2'] != '') {
				?><button class="btn" onClick="location.href='program_fix.php?id=<?=$_GET['type2']?>'">返回</button><?php
				} else {
				?><button class="btn" onClick="location.href='program.php?id=<?=$_GET['type3']?>'">返回</button><?php
				}
				?>
			</p>
			
			<div class="tab-pane well" id="d1">
				<p>編號：<?=$message['id']?></p>
				<p>標題：<?=$message['name']?></p>
				<p>說明：<?=$message['content']?></p><br/>
				<p><a href="<?=$message['file']?>"><?=$message['file']?></a></p>
				<p>發表的時間：<?=$message['create_time']?></p><br/>
				<p>
				<?php
				foreach ($extend as $e) {
				$m = sql_query("SELECT * FROM `message` where `id` = '{$e['extend_id']}'")[0];
				
				if ($_GET['type1'] != '') {
				?><div class="alert alert-info" onClick="location.href='message_see.php?id=<?=$m['id']?>&type1=1'"><?=$m['name']?></div><?php
				} else if ($_GET['type2'] != '') {
				?><div class="alert alert-info" onClick="location.href='message_see.php?id=<?=$m['id']?>&type2=<?=$_GET['type2']?>'"><?=$m['name']?></div><?php
				} else {
				?><div class="alert alert-info" onClick="location.href='message_see.php?id=<?=$m['id']?>&type3=<?=$_GET['type3']?>'"><?=$m['name']?></div><?php
				}
				
				
				}
				?>
				</p>
			</div>
				
		</div>
	</h4>
</body>
</html>	