<html>
<head>
<link rel="stylesheet" href="/css/catalog/catlist.css">
<script type="text/javascript">
function switchtype(type) {
	var antitype = 1 - type;
	document.getElementsByClassName('catlist' + type)[0].style.display = 'block';
	document.getElementsByClassName('switchtype')[0].getElementsByTagName('span')[type].className = 'here';
	document.getElementsByClassName('switchtype')[1].getElementsByTagName('span')[type].className = 'here';
	document.getElementsByClassName('catlist' + antitype)[0].style.display = 'none';
	document.getElementsByClassName('switchtype')[0].getElementsByTagName('span')[antitype].className = '';
	document.getElementsByClassName('switchtype')[1].getElementsByTagName('span')[antitype].className = '';
}

function testpriceEnterDiv(field, type) {
	if (field.innerHTML.length == 0) {
		field.className = "priceField priceFieldEMPTY" + type;
	} else {
		field.className = "priceField";
	}
}
</script>
</head>
<body>
<?php
function writeCatList($cat, $subcat) {
	echo "<div class='catlist catlist0'>
		<div class='switchtype'><span onclick='javascript:switchtype(0);' class='here'>Каталог</span>
		<span onclick='javascript:switchtype(1);'>Фильтры</span></div>";
	$query = mysql_query ( "SELECT * FROM cats" );
	while ( $string = mysql_fetch_array ( $query ) ) {
		$subcats = unserialize($string[2]);
		$here = $cat == $string[0] && $subcat == 0 ? "class='here'" : "";
		echo "<div class='oneName'>";
		echo "<img class='piccat' src='/images/piccats/" .
			$string[0] . ".png'><h3><a $here
			href='/catalog/$string[0]'>" . $string[1] . "</a></h3></div>";
		if ($string[0] == $cat) {
			echo "<ul>";
			for ($i = 1; $i <= count($subcats); $i++) {
				$here = $subcat == $i ? "class='here'" : "";
				echo "<li><h4><a $here href='/catalog/$string[0]/$i'>" . $subcats[$i - 1] . "</a></h4></li>";
			}
			echo "</ul>";
		}
	}
	echo "</div>";
	
	echo "<div class='catlist catlist1' style='display: none;'>
		<div class='switchtype'><span onclick='javascript:switchtype(0);' class='here'>Каталог</span>
		<span onclick='javascript:switchtype(1);'>Фильтры</span></div>
		<h2>Цена</h2>
		<div class='priceEnterDiv'>
				от
				<div class='priceField priceFieldEMPTY1' contenteditable='true' oninput='testpriceEnterDiv(this, 1);'></div>
				до
				<div class='priceField priceFieldEMPTY2' contenteditable='true' oninput='testpriceEnterDiv(this, 2);'></div>
		</div>
		<h2>Бренд</h2>
		<div class='chooseCompany'>
			<input type='checkbox'> Apple
			<input type='checkbox'> Huepple<br>
			<input type='checkbox'> Figepple
			<input type='checkbox'> Pths<br>
			<input type='checkbox'> Np
			<input type='checkbox'> Slmsung<br>
		</div>
		<h2>Нам стоит обсудить фильтры</h2>
				";
	echo "</div>";
}
?>
</body>
</html>