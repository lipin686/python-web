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
<link rel="stylesheet" href="bootstrap-responsive.min.css">

</head>

<script>
</script>

<body class="bg center">
	<center><h3>
		<div class="container">
			<div class="row">
				<div class="span1"></div>
				<div class="span10">
					<h2>線上專案討論系統</h2><hr/>
					
					<?php include("alert.php"); ?><br/>
					
					<form action="is_login.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
						<p>帳號：<input type="text" name="ac" required></p>
						<p>密碼：<input type="password" name="ps" required></p><br/>
						
						<button class="btn_me">確定</button>
					</form>
					
					
				</div>
				<div class="span1"></div>
			</div>
		</div>
	</h3></center>
</body>
</html>	