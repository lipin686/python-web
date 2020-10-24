<?php
	include("cd.php");
	
	$id = $_GET['id'];
	
	$program = sql_query("SELECT * FROM `program` where `id` = '$id'")[0];
	$funs = sql_query("SELECT * FROM `fun` where `program_id` = '$id'");
	
	$tages = sql_query("SELECT * FROM `tage` where `process_id` = '{$_SESSION['process_id']}'");
	
	$_SESSION['program_id'] = $id;
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
			<p><button class="btn" onClick="location.href='process.php?id=<?=$_SESSION['process_id']?>'">返回</button></p>
			
			<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#d1" id="aaa">方案說明</a></li>
				<li><a data-toggle="tab" href="#d3">方案評分</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane well" id="d1">
					<p>執行方案編號：<?=$program['id']?></p>
					<p>執行方案名稱：<?=$program['name']?></p>
					<p>執行方案說明：<?=$program['content']?></p><br/>
					<p>
					<?php
					foreach ($funs as $e) {
					$f = sql_query("SELECT * FROM `face` where `id` = '{$e['face_id']}'")[0];
					$m = sql_query("SELECT * FROM `message` where `id` = '{$e['message_id']}'")[0];
					?>
					<div class="alert alert-info" onClick="location.href='message_see.php?id=<?=$m['id']?>&type3=<?=$id?>'">
						<?=$f['name']?>:<?=$m['name']?>
					</div>
					<?php
					}
					?>
					</p>
				</div>
				<div class="tab-pane" id="d3">
					<form action="program_count.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
						<?php
						$ccc = 0;
						foreach ($tages as $tage) {
							$c = sql_query("SELECT * FROM `tage_count` where `program_id` = '$id' and `user_id` = '{$_SESSION['id']}'")[0];
							if ($c == '') {
								$ccc += 1;
								?>
									<p><?=$tage['name']?>：
									<select name="count[]">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<input type="hidden" name="tag_id[]" value="<?=$tage['id']?>">
									<p/>
								<?php
							} else {
								echo "<p>".$tage['name'].'：'.$c['count']."</p>";
							}
						}
						if ($ccc != 0) {
							?><button class="btn btn-success">確定</button><?php
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</h4>
</body>
</html>	