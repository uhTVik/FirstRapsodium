<html>
<head>
<link rel="stylesheet" href="/css/catalog/catlist.css">
</head>
<body>
<?php
function writeProfList($page) {
	echo "<div class='catlist'>";
		echo "<div class='oneName'>";
		echo "<img class='piccat' src='/images/picprofs/0.png'>
		<h3><a" . getHere(0, $page) . " href='/profile/?page=0'>Личные данные</a></h3></div>";
		echo "<div class='oneName'>";
		echo "<img class='piccat' src='/images/picprofs/1.png'>
		<h3><a" . getHere(1, $page) . " href='/profile/?page=1'>Заказы</a></h3></div>";
		echo "<div class='oneName'>";
		echo "<img class='piccat' src='/images/picprofs/2.png'>
		<h3><a" . getHere(2, $page) . " href='/profile/?page=2'>Корзина</a></h3></div>";
		echo "<div class='oneName'>";
		echo "<img class='piccat' src='/images/picprofs/3.png'>
		<h3><a" . getHere(3, $page) . " href='/profile/?page=3'>Избранное</a></h3></div>";
		echo "<div class='oneName'>";
		echo "<img class='piccat' src='/images/picprofs/4.png'>
		<h3><a" . getHere(4, $page) . " href='/profile/?page=4'>Сравнения</a></h3></div>";
	echo "</div>";
}

function getHere($num, $page) {
	if ($num == $page) {
		return " class='here'";
	}
	return "";
}

?>
</body>
</html>