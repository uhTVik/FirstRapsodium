<?php
session_start ();
?>

<html>

<head>
<link rel="stylesheet" href="/css/category.css">
<title>Магазин Np</title>
</head>

<body>

<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
echo $_SESSION['sessionId'];
$q = mysql_query("SELECT sessionId FROM visitors");
echo "<br> Список всех sessId:<br>";
while ( $string = mysql_fetch_array ( $q ) ) {
	for($i = 0; $i < count ( $string ); $i ++) {
		echo $string [$i] . ' ';
	}
	echo "<br>";
}
?>

</body>
</html>