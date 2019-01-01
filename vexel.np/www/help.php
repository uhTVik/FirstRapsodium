<?php 
session_start();
?>
<html>
<head>
<style type="text/css">
h1.redact {
	color: rgba(255, 0, 0, 0.7);
	font: 40pt 'Segoe Ui Light';
	text-align: center;
}
img.redact {
	width: 300px;
	height: 300px;
}
</style>
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
?>
<h1 class='redact'>Данный раздел ещё редактируется. <br>Приносим свои извинения! <br>
<img class='redact' src='/images/special/notready.png'></h1>
</body>
</html>