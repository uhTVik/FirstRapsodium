<?php
session_start ();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
if (isset ( $_GET ['id'] )) {
	if ($_GET ['id'] == 0) {
		if (!isset ( $_SESSION ['id'] )) {
			rediect ( "/" );
		} else {
			$id = $_SESSION ['id'];
			$permission = true;
			$dbHost = "localhost";
			$dbUser = "root";
			$dbPass = "";
			$dbName = "db";
			$myConnect = mysql_connect ( $dbHost, $dbUser, $dbPass );
			mysql_select_db ( $dbName, $myConnect );
			mysql_query ( "create database $dbName;" );
			mysql_query ( "SET NAMES 'utf-8';" );
			$query = mysql_query ( "SELECT * FROM users WHERE userId=" . $id );
			$userInfo = mysql_fetch_array ( $query );
			if ($permission) {
				for ($i = 0; $i < count ( $userInfo ); $i ++) {
					echo "<h3>$userInfo[$i]</h3>";
				}
			}
			mysql_close ( $myConnect );
		}
	}
}
?>