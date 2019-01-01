<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/search.css">
</head>
<body>
	<?php
	include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
	include_once $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
	?>
	<div class="search">
		<form method="GET" action="/search.php">
			<input type="text" name="request" placeholder="поиск товара"> <input
				type='submit' value='Искать'>
		</form>
	</div>
</body>
</html>