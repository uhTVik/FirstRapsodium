<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/catalog/onecat.css">
<link rel="stylesheet" href="/css/stuff.css">
<link rel="stylesheet" href="/css/toplists/best.css">
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';

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
<h1 class="h">Избранное</h1>
	<div class="frame">
		<div class="stufflist">
			<?php 
			$stquery = mysql_query ( "SELECT cats, subcats, id, name, mainCharacteristic, prices FROM stuffs" );
			while ( $string = mysql_fetch_array ( $stquery ) ) {
				$cats = unserialize($string[0]);
				$subcats = unserialize($string[1]);
				for ($i = 0; $i < count($cats); $i++) {
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
			?>
		</div>
	</div>
</body>
</html>