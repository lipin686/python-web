<?php
	include("cd.php");
	
	$id = $_GET['id'];
	$user = sql_query("SELECT * FROM `user` where `id` = '$id'")[0];
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

<body class="center">
	<?php include("nav.php"); ?>
	
	<div class="div_right">
		<center><h3>
			<h2>修改使用者</h2><hr/>
			
			<div class="well" style="width: 80%">
				<?php include("alert.php"); ?><br/>
			
				<form action="user_pull.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<p>使用者名稱：<input type="text" value="<?=$user['name']?>" name="name" required></p>
					<p>使用者帳號：<input type="text" value="<?=$user['ac']?>" name="ac" required></p>
					<p>密　　　碼：<input type="text" value="<?=$user['ps']?>" name="ps" required></p><br/>
					
					<input type="hidden" value="<?=$id?>" name="id">
					<button class="btn btn-success">確定</button>
				</form>
			</div>

		</h3></center>
	</div>
</body>
</html>	