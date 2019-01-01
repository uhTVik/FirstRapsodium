<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/admin/topAdmin.css">
</head>
<body>
<?php
function writeLink($siteName, $siteLocation) {
	$site = $_SERVER ['PHP_SELF'];
	$here = $site == $siteLocation || $site == $siteLocation . "/index.php";
	echo "<a href='$siteLocation'";
	if ($here) {
		echo " class='here'";
	}
	echo ">$siteName</a>";
}
?>
	<div class="firstMenu">
		<ul class="firstMenu">
			<li><?php writeLink("Вопросы", "/admin/")?></li>
			<li><?php writeLink("Заказы", "/admin/")?></li>
			<li><?php writeLink("Админка", "/admin/index.php")?></li>
			<li><?php writeLink("Выход&nbsp;на&nbsp;главную&nbsp;страницу", "/index.php")?></li>
			<?php
			$id = $_SESSION ['id'];
			if ($id == "") {
				?>
			<li><?php writeLink("Регистрация", "?act=reg")?></li>
			<li><?php writeLink("Вход", "?act=login")?></li>
			<?php
			} else {
				?>
			<li><?php writeLink("Выход", "?act=logout")?></li>
			<?php
			}
			?>
		</ul>
	</div>
	<div class="logoname">
		<div class="logo">
			<img src="/images/logo.png" alt="логотип" width="104" height="104" style="transform: rotate(180deg);">
		</div>
		<div class="siteName">
			<h1 class="siteName">Вексель</h1>
			<h2 class="siteName">Интернет-магазин бытовой техники и электроники</h2>
		</div>
	</div>
	<div class="secondMenu">
		<ul class="secondMenu">
			<li><?php writeLink("Пользователи", "/admin/list/users.php")?></li>
			<li><?php writeLink("Посетители", "/admin/list/visitors.php")?></li>
			<li><?php writeLink("Категории", "/admin/list/cats.php")?></li>
			<li><?php writeLink("Товары", "/admin/list/stuffs.php")?></li>
			<li><?php writeLink("Отзывы", "/admin/list/reviews.php")?></li>
			<li><?php writeLink("Доставки", "/admin/list/delivery.php")?></li>
			<li><?php writeLink("Поиск", "/admin/search/")?></li>
		</ul>
	</div>
</body>
</html>