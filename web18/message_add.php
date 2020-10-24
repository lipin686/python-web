<?php
	include("cd.php");
	
	$messages = sql_query("SELECT * FROM `message` where `face_id` = '{$_SESSION['face_id']}'");
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
	
	<h4>
		<div>
			<p><button class="btn" onClick="location.href='face.php?id=<?=$_SESSION['face_id']?>'">返回</button></p>

			<div class=" well" id="d1">
				<h3>發表意見</h3><br/>
				
				<form action="message_save.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<p>標題：<input type="text" name="name" required></p>
					<p>說明：<input type="text" name="content" required></p>
					<p><input type="file" name="file"></p>
					
					<div>
						意見延伸：<br/>
						<?php
						foreach ($messages as $message) {
						?>
						<input type="checkbox" name="extend[]" value="<?=$message['id']?>"><?=$message['name']?>
						<?php
						}
						?>
					</div>
					
					<button class="btn btn-success">確定</button>
				</form>
				
			</div>
			
		</div>
	</h4>
</body>
</html>	