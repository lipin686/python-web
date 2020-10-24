<?php
	include("cd.php");
	
	$id = $_GET['id'];
	$users = sql_query("SELECT * FROM `user` where `id` != '1'");
	
	$leader = sql_query("SELECT * FROM `member`, `user` WHERE user.id = member.user_id and member.type = '1' and member.process_id = '$id'")[1];
	$members = sql_query("SELECT * FROM `member`, `user` WHERE user.id = member.user_id and member.type = '2' and member.process_id = '$id'");
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
			<h2>指定成員	</h2><hr/>
			
			<div class="well" style="width: 80%">
				<?php include("alert.php"); ?><br/>
			
				<form action="process_user_save.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<p>
						專案組長：
						<select name="leader">
							<?php
							foreach ($users as $user) {
								if ($user['id'] == $leader['user_id']) {
									?><option selected value="<?=$user['id']?>"><?=$user['name']?></option><?php									
								} else {
									?><option value="<?=$user['id']?>"><?=$user['name']?></option><?php
								}
							}
							?>
						</select>
					</p>
					<p>
						專案組員：<br/>
						<?php
						foreach ($users as $user) {
							$tf = true;;
							foreach ($members as $member) {
								if ($user['id'] == $member['user_id']) {
									$tf = false;
									?><input checked type="checkbox" name="member[]" value="<?=$user['id']?>"><?=$user['name']?><br/><?php
									break;
								}
							}
							if ($tf) {
								?><input type="checkbox" name="member[]" value="<?=$user['id']?>"><?=$user['name']?><br/><?php
							}
						}
						?>
					</p>
					
					<input type="hidden" value="<?=$id?>" name="id">
					<button class="btn btn-success">確定</button>
				</form>
			</div>

		</h3></center>
	</div>
</body>
</html>	