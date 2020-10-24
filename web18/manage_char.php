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
<script src="Chart.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-responsive.min.css">
<link rel="stylesheet" href="Chart.min.css">

</head>

<script>
$(function () {
	var c1 = new Chart($("#cnavas1"));
	
	$('#aaa').click();
	
	$(".ok").click(function () {
		$.ajax({
			url: 'char.php',
			type: "get",
			data: {},
			success: function (data) {
				data = JSON.parse(data);
				
				c1.config.type = $("#tttt :selected").val();
				c1.config.data = data;
				
				
			}
		})
	}).click();
	
})
</script>

<body class="center">
	<?php include("nav.php"); ?>
	
	<div class="div_right">
		<center><h3>
			<h2>統計管理</h2><hr/>
			
			<select id="tttt">
				<option value="bar">長條圖</option>
				<option value="line">折線圖</option>
				<option value="pie">圓餅圖</option>
			</select>
			<button class="btn btn-success ok">確定</button>
			
			<div class="well" style="width: 80%">
				<?php include("alert.php"); ?><br/>
				
				<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#d1" id="aaa">圖表一</a></li>
				<li><a data-toggle="tab" href="#d3">圖表一</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane" id="d1">
					<canvas id="cnavas1"></canvas>
				</div>
				<div class="tab-pane" id="d3">
					<canvas id="cnavas2"></canvas>
				</div>
			</div>
			
		</h3></center>
	</div>
</body>
</html>	