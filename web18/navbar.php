<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			<a>
			<a class="brand">線上專案討論系統</a>
			
			<div class="collapse nav-collapse">
				<ul class="nav">
					<li><a href="manage.php">專案討論</a></li>
					<?php
					if ($_SESSION['id'] == '1') {
					?>
					<li><a href="manage_user.php">使用者管理</a></li>
					<li><a href="manage_process.php">專案管理</a></li>
					<li><a href="manage_char.php">統計管理</a></li>
					<?php
					}
					?>
					<li><a href="logout.php">登出</a></li>
				</ul>
			</div>
			
		</div>
	</div>
</div>