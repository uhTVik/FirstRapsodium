<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/profile/profile.css">
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/profile/proflist.php';
?>
<h1 class="h">
<?php 
$page = $_GET['page'] | 0;
switch ($page) {
	case 0:
		echo "Личные данные";
		break;
	case 1:
		echo "Заказы";
		break;
	case 2:
		echo "Корзина";
		break;
	case 3:
		echo "Избранное";
		break;
	case 4:
		echo "Сравнения";
		break;
}
?>
</h1>
<div class='mainprof'>
<div class="pagelist">
<?php
writeProfList($page);
?>
</div>
<div class="page">
<?php 
switch ($page) {
	case 0:
		include $_SERVER ['DOCUMENT_ROOT'] . '/profile/pages/userData.php';
		break;
	case 1:
		include $_SERVER ['DOCUMENT_ROOT'] . '/profile/pages/orders.php';
		break;
	case 2:
		include $_SERVER ['DOCUMENT_ROOT'] . '/profile/pages/buy.php';
		break;
	case 3:
		include $_SERVER ['DOCUMENT_ROOT'] . '/profile/pages/best.php';
		break;
	case 4:
		include $_SERVER ['DOCUMENT_ROOT'] . '/profile/pages/or.php';
		break;
}
?>
</div>
</div>
</body>
</html>