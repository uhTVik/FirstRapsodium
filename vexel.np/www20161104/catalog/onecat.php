<?php
session_start ();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/catalog/catlist.php';

function writeStuffInOneCat($id, $name, $desc, $oldprice, $newprice, $rating) {
	echo "
	<div class='stuff' id='$id' onclick='rediectToStuff($id);'>
		<div class='photodiv'>
			<img class='photo' alt='Фотография' src='/images/stuffs/stuff$id/0.png'>
		</div>
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
				onmouseleave='button = false;' onclick='toBuyList($id);'>в корзину</button>
			<br> <img alt='в избранное' class='picbutton'
				src='/images/picfunc/best.png' onmouseenter='button = true;'
				onmouseleave='button = false;' onclick='toBestList($id);'>
				<img alt='в сравнение' class='picbutton' src='/images/picfunc/or.png'
				onmouseenter='button = true;' onmouseleave='button = false;' 
				onclick='toOrList($id);'> <img alt='поделиться' class='picbutton' 
				src='/images/picfunc/share.png' onmouseenter='button = true;' 
				onmouseleave='button = false;'><br>
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
			$query = mysql_query ( "SELECT catname, subcats FROM cats WHERE id = '$cat'" );
			$string = mysql_fetch_array ( $query );
			$catname = $string[0];
			$subcatarray = unserialize($string[1]);
			$subcatname = "Выберите подкатегорию";
			if ($subcat != 0)  {
				$subcatname = $subcatarray[$subcat - 1];
			}
			$catname = str_replace( array("\r", "\n"), "", $catname );
			$subcatname = str_replace( array("\r", "\n"), "", $subcatname );
			
			$stquery = mysql_query ( "SELECT cats, subcats, id, name, mainCharacteristic, prices FROM stuffs" );
			while ( $string = mysql_fetch_array ( $stquery ) ) {
				$cats = unserialize($string[0]);
				$subcats = unserialize($string[1]);
				for ($i = 0; $i < count($cats); $i++) {
					if ($cats[$i] == $catname && ($subcats[$i] == $subcatname || $subcat == 0)) {
						$prices = unserialize($string[5]);
						$oldprice = "";
						$newprice = "";
						if (count($prices) == 1) {
							$oldprice = $prices[0];
							$newprice = $prices[0];
						} else {
							$oldprice = $prices[1];
							$newprice = $prices[0];
						}
						writeStuffInOneCat($string[2], $string[3], unserialize($string[4]), $oldprice, $newprice, 0);
					}
				}
			}
// 			writeStuffInOneCat(1, "Флоттель вертмитовый с насадкой ASKI-35", array(
// 				"Тип: ручной", "Склад: сигма-образующий",
// 				"Версия: пасхалка", "Манипулятор: людьми",
// 				"Десоветизация: около Лонишин"), "15 920", "15 920", 3.5);
// 			writeStuffInOneCat(2, "Флоттель вертмитовый с насадкой ASKI-35", array(
// 				"Тип: ручной", "Склад: сигма-образующий",
// 				"Версия: пасхалка", "Манипулятор: людьми",
// 				"Десоветизация: около Лонишин"), "23 040", "15 920", 2);
// 			writeStuffInOneCat(0, "Флоттель вертмитовый с насадкой ASKI-35", array(
// 				"Тип: ручной", "Склад: сигма-образующий",
// 				"Версия: пасхалка", "Манипулятор: людьми",
// 				"Десоветизация: около Лонишин"), "600", "599", 4);
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
<script type="text/javascript" src="/js/ajax/ajax.js"></script>
<script type="text/javascript" src="/js/ajax/inlist.js"></script>
</head>
</html>