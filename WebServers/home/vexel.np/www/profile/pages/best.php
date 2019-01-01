<html>
<head>
<link rel="stylesheet" href="/css/profile/best.css">
<link rel="stylesheet" href="/css/stuff.css">
<script type="text/javascript" src="/js/catalog.js"></script>
<script type="text/javascript" src="/js/ajax/ajax.js"></script>
<script type="text/javascript" src="/js/ajax/inlist.js"></script>
</head>
<body>
<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
function writeDiscountStuff($stuff_id, $stuff_name, $stuff_oldprice, $stuff_newprice) {
	echo "<div onmouseenter=\"exShow(this.getElementsByClassName('close')[0]);\" onmouseleave=\"exHide(this.getElementsByClassName('close')[0]);\" class='stuff' id='$stuff_id' onclick='rediectToStuff(this.id);'>
			<img class='close' src='/images/exit.png'
				onmouseenter='exAct(this);' onmouseleave='exNorm(this);' width='10px'>
	<h2 class='name'>$stuff_name</h2><br><div class='photo'>
	<img class='photo' alt='Фотография' src='/images/stuffs/stuff$stuff_id/0.png'></div><div class='aboutaround'>";
	writeAroundActions ( $stuff_id, $stuff_oldprice, $stuff_newprice );
	echo "</div></div>";
}
?>
	<div class="stuffs">
	<?php
	writeDiscountStuff ( 1, "Стиральная машина машина шина Apple iF", "121 000", "89 000" );
	writeDiscountStuff ( 2, "Флоттель мягкий простой", "10 000", "10 000" );
	writeDiscountStuff ( 3, "Флоттель iPhone", "68 999", "68 999" );
	writeDiscountStuff ( 4, "Старый такой телефон", "1 000", "920" );
	writeDiscountStuff ( 5, "Гитара Ройцка", "220", "100" );
	writeDiscountStuff ( 5, "Гитара Ройцка дорогая", "1 200 000", "1 000 999" );
	writeDiscountStuff ( 5, "Гитара Ройцка дорогая", "10 394 222", "9 202 000" );
	writeDiscountStuff ( 5, "Гитара Ройцка дорогая", "много", "мало" );
	writeDiscountStuff ( 5, "Гитара Ройцка дорогая", "Infinity", "Infinity - 1" );
	?>
	</div>
</body>
</html>