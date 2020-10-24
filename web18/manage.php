<?php
	include("cd.php");
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
	
	<center><h3>
		<div>
			<h2>專案討論</h2><hr/>
			
			<?php
			if ($_SESSION['id'] == '1') {
				$processs = sql_query("SELECT * FROM `process`");
				foreach ($processs as $process) {
					?>
					<div class="alert alert-info" onClick="location.href='process.php?id=<?=$process['id']?>'">
						<?=$process['name']?>
					</div>
					<?php
				}
			} else {
				$processs = sql_query("SELECT * FROM `process`, `member` where member.process_id = process.id and member.user_id = '{$_SESSION['id']}'");
				foreach ($processs as $process) {
					?>
					<div class="alert alert-info" onClick="location.href='process.php?id=<?=$process['process_id']?>'">
						<?=$process['name']?>
					</div>
					<?php
				}
			}
			?>
		</div>
	</h3></center>
</body>
</html>	