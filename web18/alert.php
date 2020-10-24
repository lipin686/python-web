<?php
if ($_SESSION['message'] != "") {
	?>
	<div class="alert alert-info">
		<?=$_SESSION['message']?>
	</div>
	<?php
	$_SESSION['message'] = "";
}
?>