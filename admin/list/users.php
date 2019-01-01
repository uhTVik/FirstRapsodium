<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/admin/list.css">
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/admin/admin-menu.php';

$query = mysql_query ( "SELECT * FROM users" );
while ( $string = mysql_fetch_array ( $query ) ) {
	for($i = 0; $i < count ( $string ); $i ++) {
		echo $string [$i] . ' ';
	}
	echo "<br>";
}
?>
</body>
</html>