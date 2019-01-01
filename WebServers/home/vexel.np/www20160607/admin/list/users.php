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
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "db";
$myConnect = mysql_connect ( $dbHost, $dbUser, $dbPass );
mysql_select_db ( $dbName, $myConnect );
mysql_query ( "create database $dbName;" );
mysql_query ( "create table users(
				userId int AUTO_INCREMENT,
				email text NULL,
				surname text NULL,
				name text NULL,
				secondname text NULL,
				password text NULL,
				PRIMARY KEY(userId));" );
mysql_query ( "SET NAMES 'utf-8';" );
$query = mysql_query ( "SELECT * FROM users" );
while ( $string = mysql_fetch_array ( $query ) ) {
	for($i = 0; $i < count ( $string ); $i ++) {
		echo $string [$i] . ' ';
	}
	echo "<br>";
}
mysql_close ( $myConnect );
?>
</body>
</html>