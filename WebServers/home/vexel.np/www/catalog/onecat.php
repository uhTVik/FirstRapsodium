<?php
session_start ();
?>
<html>
<body>
<?php
function writeStuffInOneCat($stuff_id, $stuff_name, $stuff_desc, $stuff_oldprice, $stuff_newprice, $stuff_rating) {
	echo "
	<div class='stuff' id='$stuff_id' onclick='rediectToStuff($stuff_id);'>
		<div class='photodiv'>
			<img class='photo' alt='Фотография' src='/images/stuffs/stuff$stuff_id/0.png'>
		</div>
		<div class='info'>
			<h2>$stuff_name</h2>";
	writeRating($stuff_rating);
	echo "<ul>";
	for ($i = 0; $i < count($stuff_desc); $i++) {
		echo "<li>$stuff_desc[$i]</li>";
	}
	echo "</ul></div>";
	writeAroundActions($stuff_id, $stuff_oldprice, $stuff_newprice);
	echo "</div>";
}

include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/catalog/catlist.php';
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
			writeStuffInOneCat(1, "Смартфон Apple iPhone 7 128Gb", array(
				"Разрешение:  1334x750", "Камера: 12МП",
				"Память: 128Гб", "Количество сим-карт: 2",
				"ОС: iOS8"), "43 989", "43 989", 3.5);
			writeStuffInOneCat(2, "Apple iPhone SE 32Gb", array(
				"Разрешение:  1334x750", "Камера: 12МП",
				"Память: 128Гб", "Количество сим-карт: 2",
				"ОС: iOS8"), "56 222", "45 320", 5);
			writeStuffInOneCat(3, "Apple iPhone SE 64Gb", array(
				"Разрешение:  1334x750", "Камера: 12МП",
				"Память: 128Гб", "Количество сим-карт: 2",
				"ОС: iOS8"), "60 210", "59 911", 4);
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