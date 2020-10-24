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
	
	<h4><center>
		<div>
			<h2>新增指標</h2><hr/>
			
			<div class="tab-pane well" id="d1">
				<?php include("alert.php"); ?><br/>
				
				<p>
					<button class="btn" onClick="location.href='mange_tage.php'">返回</button>
				<p/>
				
				<form action="tage_save.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<p>指標名稱：<input type="text" name="name" required></p>

					<button class="btn btn-success">確定</button>
				</form>
			</div>
				
		</div>
	</center></h4>
</body>
</html>	