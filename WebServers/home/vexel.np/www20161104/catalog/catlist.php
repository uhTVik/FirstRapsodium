<html>
<head>
<link rel="stylesheet" href="/css/catalog/catlist.css">
</head>
<body>
<?php
function writeCatList($cat, $subcat) {
	echo "<div class='catlist'>";
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
}
?>
</body>
</html>