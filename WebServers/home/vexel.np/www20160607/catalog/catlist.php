<html>
<head>
<link rel="stylesheet" href="/css/catalog/catlist.css">
</head>
<body>
<?php
function writeCatList($cat, $subcat) {
	echo "<div class='catlist'>";
	$file = fopen ( "cats", "r" );
	$catIndex = 0;
	$subcatIndex = 1;
	while ( ! feof ( $file ) ) {
		$string = fgets ( $file );
		if (! feof ( $file )) {
			if ($string {0} == "\t") {
				if ($catIndex == $cat) {
					$here = $subcat == $subcatIndex ? "class='here'" : "";
					echo "<li><h4><a $here href='/catalog/$catIndex/$subcatIndex'>" . substr ( $string, 1 ) . "</a></h4></li>";
					$subcatIndex ++;
				}
			} else {
				$catIndex ++;
				if ($catIndex == $cat + 1) {
					echo "</ul>";
				}
				$here = $cat == $catIndex && $subcat == 0 ? "class='here'" : "";
				echo "<div class='oneName'>";
				echo "<img class='piccat' src='/images/piccat/" . $catIndex . ".png'><h3><a $here href='/catalog/$catIndex'>" . $string . "</a></h3></div>";
				if ($catIndex == $cat) {
					echo "<ul>";
				}
			}
		}
	}
	echo "</div>";
}
?>
</body>
</html>