<?php
	include("cd.php");
	
	$id = $_GET['id'];
	
	$message = sql_query("SELECT * FROM `message` where `id` = '$id'")[0];
	$extend = sql_query("SELECT * FROM `extend_ms` where `message_id` = '$id'");
	
	$count = sql_query("SELECT count(*) as c, sum(`count`) as s FROM `count` where `message_id` = '$id'")[0];
		
	$_SESSION['message_id'] = $id;
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
			<p><button class="btn" onClick="location.href='face.php?id=<?=$_SESSION['face_id']?>'">返回</button></p>
			
			<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#d1" id="aaa">意見說明</a></li>
				<li><a data-toggle="tab" href="#d3">意見評分</a></li>
			</ul>
			<div class="tab-content">
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
					?>
					<div class="alert alert-info" onClick="location.href='message.php?id=<?=$m['id']?>'">
						<?=$m['name']?>
					</div>
					<?php
					}
					?>
					</p>
				</div>
				<div class="tab-pane" id="d3">
					<p>被評價總分：<?=$count['s']==''?'0':$count['s']?></p>
					<p>已被評價人數：<?=$count['c']?></p>
					<?php
					$c = sql_query("SELECT * FROM `count` where `message_id` = '$id' and `user_id` = '{$_SESSION['id']}'")[0];
					if ($c == '') {
					?>
					<form action="message_count.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
						評分：
						<select name="count">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
						<button class="btn btn-success">確定</button>
					</form>
					<?php
					} else {
					?>評分：<?=$c['count']?><?php
					}
					?>
				</div>
			</div>
		</div>
	</h4>
</body>
</html>	