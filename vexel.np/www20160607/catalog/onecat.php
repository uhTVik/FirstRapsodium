<?php
session_start ();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/catalog/catlist.php';

function writeRating($rating) {
	echo "<div class='rating'>";
	for ($i = 1; $i <= 5; $i++) {
		if ($rating == $i - 0.5) {
			echo "<img src='/images/rating/0,5.png'>";
		} else if ($rating >= $i) {
			echo "<img src='/images/rating/1.png'>";
		} else {
			echo "<img src='/images/rating/0.png'>";
		}
	}
	echo "</div>";
}

function writeStuffInOneCat($id, $name, $desc, $oldprice, $newprice, $rating) {
	echo "
	<div class='stuff' id='$id' onclick='rediectToStuff($id);'>
		<img class='photo' alt='Фотография' src='/images/stuff/stuff$id.png'>
		<div class='info'>
			<h2>$name</h2>
			";
			writeRating($rating);
			echo "
			<ul>
				";
				for ($i = 0; $i < count($desc); $i++) {
					echo "<li>$desc[$i]</li>";
				}
				echo "
			</ul>
		</div>
		<div class='aroundActions'>
			";
			if ($oldprice != $newprice) {
				echo "<span class='oldprice price'>$oldprice</span><br>";
			}
			echo "
			<span class='newprice price'>$newprice</span>
			<button class='add button' onmouseenter='button = true;'
				onmouseleave='button = false;'>в корзину</button>
			<br> <img alt='в избранное' class='picbutton'
				src='/images/picfunc/best.png' onmouseenter='button = true;'
				onmouseleave='button = false;'> <img alt='в сравнение'
				class='picbutton' src='/images/picfunc/or.png'
				onmouseenter='button = true;' onmouseleave='button = false;'> <img
				alt='поделиться' class='picbutton' src='/images/picfunc/share.png'
				onmouseenter='button = true;' onmouseleave='button = false;'><br>
		</div>
	</div>
	";
}

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
			<?php
			writeStuffInOneCat(0, "Флоттель вертмитовый с насадкой ASKI-35", array(
				"Тип: ручной", "Склад: сигма-образующий",
				"Версия: пасхалка", "Манипулятор: людьми",
				"Десоветизация: около Лонишин"), "15 920", "15 920", 3.5);
			writeStuffInOneCat(1, "Флоттель вертмитовый с насадкой ASKI-35", array(
				"Тип: ручной", "Склад: сигма-образующий",
				"Версия: пасхалка", "Манипулятор: людьми",
				"Десоветизация: около Лонишин"), "23 040", "15 920", 2);
			writeStuffInOneCat(2, "Флоттель вертмитовый с насадкой ASKI-35", array(
				"Тип: ручной", "Склад: сигма-образующий",
				"Версия: пасхалка", "Манипулятор: людьми",
				"Десоветизация: около Лонишин"), "600", "599", 4);
			?>
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