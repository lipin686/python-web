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

<body class="center">
	<?php include("nav.php"); ?>
	
	<div class="div_right">
		<center><h3>
			<h2>使用者管理</h2><hr/>
			
			<div class="well" style="width: 80%">
				<?php include("alert.php"); ?><br/>
				
				<p><button class="btn btn-primary" onClick="location.href='user_add.php'">新增</button></p><br/>
				
				<table class="table table-striped table-hover">
					<tr>
						<th>使用者名稱</th>
						<th>使用者帳號</th>
						<th>編輯</th>
					</tr>
					<?php
					$users = sql_query("SELECT * FROM `user`");
					foreach ($users as $user) {
					?>
					<tr>
						<th><?=$user['name']?></th>
						<th><?=$user['ac']?></th>
						<th>
							<?php
							if ($user['id'] != 1) {
							?>
							<button class="btn btn-success" onClick="location.href='user_fix.php?id=<?=$user['id']?>'">修改</button>
							<button class="btn btn-danger" onClick="location.href='user_del.php?id=<?=$user['id']?>'">刪除</button>
							<?php
							}
							?>
						</th>
					</tr>
					<?php
					}
					?>
				</table>
			</div>
		</h3></center>
	</div>
</body>
</html>	