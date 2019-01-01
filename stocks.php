<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/stocks.css">
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
?>
<h1 class="h">Список доступных акций</h1>
	<div class="stocklist">
		<img class="stock" alt="Знакомство" src="/images/stocks/01.png">
	</div>
</body>
</html>