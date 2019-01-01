<?php
session_start();
?>
<html>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/search.php';
?>
<h1 class="hcat">Каталог товаров</h1>
<?php
function writeOneCat($name, $subcats, $number) {
	echo "<div class='onecat'>";
	if ($name != "empty") {
		echo "<img alt='пиктограмма' width='30px' src='/images/piccats/".($number).".png'>
		<h2><a href='$number'>$name</a></h2><ul>";
		$i = 1;
		foreach ( $subcats as $subcat ) {
			if ($i == count($subcats)) {
				echo "<li><h3><a href='$number/$i'>$subcat</a></h3></li>";
			} else {
				echo "<li><h3 class='notLast'><a href='$number/$i'>$subcat</a></h3></li>";
			}
			$i ++;
		}
		echo "</ul>";
	}
	echo "</div>";
}
function loadCats() {
	echo "<div style='overflow: hidden;'>
			<div class='cats'>";
	$query = mysql_query ( "SELECT * FROM cats" );
	while ( $string = mysql_fetch_array ( $query ) ) {
		writeOneCat ( $string[1], unserialize($string[2]), $string[0] );
	}
	writeOneCat ("empty", "", "");
	echo "</div></div>";
}
loadCats ();
?>
</body>
<head>
<link rel="stylesheet" href="/css/catalog/catalog.css">
<script src="/catalog/js/catalog.js" type="text/javascript"></script>
</head>
</html>