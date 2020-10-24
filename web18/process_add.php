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
$(function () {
	$(".face_add").click(function () {
		if ($(".face_div").children().length == 10) {
			alert("超過上限");
		} else {
			$.ajax({
				url: 'face_html.html',
				type: 'get',
				success: function (data){
					$(".face_div").append(data);
				}
			})
		}
	})
})
</script>

<body class="center">
	<?php include("nav.php"); ?>
	
	<div class="div_right">
		<center><h3>
			<h2>新增專案</h2><hr/>
			
			<div class="well" style="width: 80%">
				<?php include("alert.php"); ?><br/>
			
				<form action="process_save.php" method="post" class="form form-horizontal" enctype="multipart/form-data">
					<p>專案名稱：<input type="text" name="name" required></p>
					<p>專案說明：<input type="text" name="content" required></p>
					<p><input type="button" class="btn btn-info face_add" value="新增面向"></p>
					
					<div class="face_div"></div>
					
					<button class="btn btn-success">確定</button>
				</form>
			</div>

		</h3></center>
	</div>
</body>
</html>	