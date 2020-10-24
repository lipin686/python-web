<?php
	include("cd.php");
	
	$id = $_GET['id'];
	$program = sql_query("SELECT * FROM `program` where `id` = '$id'")[0];
	$funs = sql_query("SELECT * FROM `fun` where `program_id` = '$id'");
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

</script>

<body class="bg">
	<?php include("navbar.php"); ?>
	
	<h4><center>
		<div>
			<h2>修改方案</h2><hr/>
			
			<div class="tab-pane well" id="d1">
				<?php include("alert.php"); ?><br/>
				
				<p>
					<button class="btn" onClick="location.href='mangae_program.php'">返回</button>
				<p/>
				
				<form action="program_pull.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<p>名稱：<input type="text" value="<?=$program['name']?>" name="name" required></p>
					<p>說明：<input type="text" value="<?=$program['content']?>" name="content" required></p>

					<p>
					<?php
					$faces = sql_query("SELECT * FROM `face` where `process_id` = '{$_SESSION['process_id']}'");
					foreach ($faces as $k1 => $face) {
						$messages = sql_query("SELECT * FROM `message` where `face_id` = '{$face['id']}'");
						foreach ($messages as $k2 => $message) {
							
							$c = sql_query("SELECT sum(`count`) as s FROM `count` where `message_id` = '{$message['id']}'")[0];
							
							$tf = true;
							foreach ($funs as $fun) {
								if ($fun['face_id'] == $face['id'] && $fun['message_id'] == $message['id']) {
									$tf = false;
									?>
									<div class="alert alert-info">
										<input type="radio" checked name="fun<?=$k1?>" value="<?=$face['id']?>:<?=$message['id']?>">
										<a href='message_see.php?id=<?=$message['id']?>&type2=<?=$id?>'><?=$face['name']?>:<?=$message['name']?> <br/>評分:<?=$c['s']?></a>
									</div>
									<?php
									break;
								}
							}
							if ($tf) {
							?>
							<div class="alert alert-info">
								<input type="radio" name="fun<?=$k1?>" value="<?=$face['id']?>:<?=$message['id']?>">
								<a href='message_see.php?id=<?=$message['id']?>&type2=<?=$id?>'><?=$face['name']?>:<?=$message['name']?> <br/>評分:<?=$c['s']?></a>
							</div>
							<?php
							}
						}
					}
					?>
					</p>
					
					<input type="hidden" value="<?=count($faces)?>" name="count">
					<input type="hidden" value="<?=$id?>" name="id">
					<button class="btn btn-success">確定</button>
				</form>
			</div>
				
		</div>
	</center></h4>
</body>
</html>	