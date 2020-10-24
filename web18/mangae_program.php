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
$(function () {
	$("#aaa").click();
})
</script>

<body class="bg">
	<?php include("navbar.php"); ?>
	
	<h4><center>
		<div>
			<h2>方案管理</h2><hr/>
			
			<div class="tab-pane well" id="d1">
				<?php include("alert.php"); ?><br/>
				
				<p>
					<button class="btn btn-primary" onClick="location.href='program_add.php'">新增</button>
					<button class="btn" onClick="location.href='process.php?id=<?=$_SESSION['process_id']?>'">返回</button>
				<p/>
				
				<table class="table table-striped table-hover">
					<tr>
						<th>方案名稱</th>
						<th>編輯</th>
					</tr>
					<?php
					$programs = sql_query("SELECT * FROM `program` where `process_id` = '{$_SESSION['process_id']}'");
					foreach ($programs as $program) {
					?>
					<tr>
						<th><?=$program['name']?></th>
						<th>
							<button class="btn btn-success" onClick="location.href='program_fix.php?id=<?=$program['id']?>'">修改</button>
							<button class="btn btn-danger" onClick="location.href='program_del.php?id=<?=$program['id']?>'">刪除</button>
						</th>
					</tr>
					<?php
					}
					?>
				</table>
			</div>
				
		</div>
	</center></h4>
</body>
</html>	