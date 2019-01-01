<?php
session_start ();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/catalog/catlist.php';
?>
<html>
<body>
<?php
if (isset ( $_GET ['cat'] )) {
	if ($_GET ['cat'] == 0) {
		rediect ( "/catalog" );
	}
	$cat = $_GET ['cat'] | 0;
	$subcat = $_GET ['subcat'] | 0;
	?>
	<h1 class="hcat">Каталог товаров</h1>
	<div class="mainCat">
		<?php
	writeCatList ( $cat, $subcat );
	?>
		<div class="stuffList">
			<div class="stuff" id="1" onclick="rediectToStuff(this.id);">
				<img alt="Фотография" src="/images/stuff/stuff0.png">
				<div class="info">
					<h2>Флоттель вертмитовый с насадкой ASKI-35</h2>
					<ul>
						<li>Тип: ручной</li>
						<li>Склад: сигма-образующий</li>
						<li>Версия: пасхалка</li>
						<li>Манипулятор: людьми</li>
						<li>Десоветизация: около Лонишин</li>
					</ul>
				</div>
				<div class="aroundActions">
					<span class="newprice price">89 560</span>
					<button class="add button" onmouseenter="button = true;"
						onmouseleave="button = false;">в корзину</button>
				</div>
			</div>
			<div class="stuff" id="2" onclick="rediectToStuff(this.id);">
				<img alt="Фотография" src="/images/stuff/stuff1.png">
				<div class="info">
					<h2>Кусок-брусок для гитарного манипулятора</h2>
					<ul>
						<li>Тип: ручной</li>
						<li>Склад: сигма-образующий</li>
						<li>Версия: пасхалка</li>
						<li>Манипулятор: людьми</li>
						<li>Десоветизация: около Лонишин</li>
					</ul>
				</div>
				<div class="aroundActions">
					<span class="oldprice price">10 800</span><br>
					<span class="newprice price">10 700</span>
					<button class="add button" onmouseenter="button = true;"
						onmouseleave="button = false;">в корзину</button>
				</div>
			</div>

			<div class="stuff" id="3" onclick="rediectToStuff(this.id);">
				<img alt="Фотография" src="/images/stuff/stuff2.png">
				<div class="info">
					<h2>Флоттель вертмитовый с насадкой ASKI-35</h2>
					<ul>
						<li>Тип: ручной</li>
						<li>Склад: сигма-образующий</li>
						<li>Версия: пасхалка</li>
						<li>Манипулятор: людьми</li>
						<li>Десоветизация: около Лонишин</li>
					</ul>
				</div>
				<div class="aroundActions">
					<span class="newprice price">263</span>
					<button class="add button" onmouseenter="button = true;"
						onmouseleave="button = false;">в корзину</button>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>
</body>
<head>
<link rel="stylesheet" href="/css/catalog/onecat.css">
<link rel="stylesheet" href="/css/stuff.css">
<script type="text/javascript" src="/js/catalog.js"></script>
</head>
</html>