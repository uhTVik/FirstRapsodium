<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/backgr.css">
</head>
<body>
<div class="lefttrempel"></div>
<div class="righttrempel"></div>
<?php
// for($i = 20; $i < 80; $i ++) {
// 	for($j = 10; $j < 90; $j ++) {
// 		$deg = rand ( 0, 360 ) . "deg";
// 		$top = rand ( 0, 100 ) . "%";
// 		$right = rand ( 0, 100 ) . "%";
// 		$top = $i * 1 + rand (-1, 1) . "%";
// 		$right = $j * 1 + rand (-1, 1) . "%";
// 		echo "<img class='backgr' src='/images/logo.png' style='transform:rotate($deg); top:$top; right:$right;'>";
// 	}
// }

function writeLink($siteName, $siteLocation) {
	$site = $_SERVER ['PHP_SELF'];
	$here = substr ( $site, 0, strlen ( $siteLocation ) ) == $siteLocation;
	echo "<a href='$siteLocation'";
	if ($here) {
		echo " class='here'";
	}
	echo ">$siteName</a>";
}
?>
	<div class="firstMenu">
		<ul class="firstMenu">
			<?php
			$admin = $_SESSION ['id'] == 1;
			if ($admin) {
				?>
			<li><?php writeLink("Войти&nbsp;в&nbsp;админку", "/admin/index.php")?></li>
			<?php } ?>
			<li><?php writeLink("Главная&nbsp;страница", "/index.php")?></li>
			<li><?php writeLink("Информация&nbsp;о&nbsp;заказе", "?act=info")?></li>
			<li><?php writeLink("Помощь", "/help.php")?></li>
			<?php
			$id = $_SESSION ['id'];
			if ($id == "") {
				?>
			<li><?php writeLink("Регистрация", "?act=reg")?></li>
			<li><?php writeLink("Вход", "?act=login")?></li>
			<?php
			} else {
				?>
			<li><?php writeLink("Личный кабинет", "/profile")?></li>
			<li><?php writeLink("Выход", "?act=logout")?></li>
			<?php
			}
			?>
		</ul>
	</div>
	<div class="logoname">
		<div class="logo">
			<img src="/images/logo.png" alt="логотип" width="104" height="104">
		</div>
		<div class="siteName">
			<h1 class="siteName">Вексель</h1>
			<h2 class="siteName">Интернет-магазин бытовой техники и электроники</h2>
		</div>
	</div>
	<div class="secondMenu">
		<ul class="secondMenu">
			<li><?php writeLink("Каталог&nbsp;товаров", "/catalog")?></li>
			<li><?php writeLink("Доставка", "/delivery.php")?></li>
			<li><?php writeLink("Гарантии", "/guarantees.php")?></li>
			<li><?php writeLink("Связаться&nbsp;с&nbsp;нами", "/contacts.php")?></li>
			<li><?php writeLink("Акции", "/stocks.php")?></li>
			<li><?php writeLink("Скидки", "/discounts.php")?></li>
		</ul>
	</div>
</body>
</html>