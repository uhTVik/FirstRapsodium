<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/discounts.css">
<link rel="stylesheet" href="/css/stuff.css">
<script type="text/javascript" src="/js/catalog.js"></script>
<script type="text/javascript" src="/js/ajax/ajax.js"></script>
<script type="text/javascript" src="/js/ajax/inlist.js"></script>
</head>
<body>
<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
function writeDiscountStuff($stuff_id, $stuff_name, $stuff_oldprice, $stuff_newprice) {
	echo "<div class='stuff' id='$stuff_id' onclick='rediectToStuff(this.id);'>" .
				"<h2 class='name'>$stuff_name</h2>" . 
				"<img class='photo' alt='Фотография' src='/images/stuffs/stuff$stuff_id/0.png'>";
	writeAroundActions($stuff_id, $stuff_oldprice, $stuff_newprice);
	echo "</div>";
}
?>
	<h1 class="hcat">Акции</h1>
	<div class="stocklist">
		<img class="stock" alt="Знакомство" src="/images/stocks/01.png">
	</div>
	<h1 class="hcat">Скидки</h1>
	<div class="stuffs">
		<?php 
			writeDiscountStuff(1, "Apple iPhone 7 128Gb", "121 000", "89 000");
			writeDiscountStuff(2, "Apple iPhone 7 64Gb", "30 000", "30 560");
			writeDiscountStuff(3, "Apple iPhone 7 32Gb", "69 000", "68 999");
			writeDiscountStuff(4, "Apple iPhone 7 16Gb", "53 000", "32 920");
			writeDiscountStuff(5, "Apple iPhone 6 128Gb", "22 022", "19 000");
			writeDiscountStuff(5, "Apple iPhone 5 128Gb", "120 000", "100 999");
			writeDiscountStuff(5, "Apple iPhone 4 128Gb", "94 222", "9 202 000");
			writeDiscountStuff(5, "Apple iPhone 3 128Gb", "69 000", "62 000");
			writeDiscountStuff(5, "Apple iPhone 2 128Gb", "69 000", "61 000");
		?>		
	</div>
</body>
</html>