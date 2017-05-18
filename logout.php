<?php
	require 'core.php';
	session_destroy();
	?>
	<script>
		alert('Successfully logged out!');
	</script>
	<?php
	header('refresh:0.3,url=home.php');
?>