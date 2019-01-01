<?php
session_start ();
?>
<html>
<head>
<script src="/js/ajax/ajax.js" type="text/javascript"></script>
<script src="/js/useriot.js" type="text/javascript"></script>
<script src="/js/ajax/auth.js" type="text/javascript"></script>
<script src="/js/ajax/info.js" type="text/javascript"></script>
</head>
<body>

<div id="window">

<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
if ($_GET ['act'] == "auth") {
	include $_SERVER ['DOCUMENT_ROOT'] . '/auth.php';
} else if ($_GET ['act'] == "reg") {
	include $_SERVER ['DOCUMENT_ROOT'] . '/reg.php';
} else if ($_GET ['act'] == "logout") {
	include $_SERVER ['DOCUMENT_ROOT'] . '/logout.php';
} else if ($_GET ['act'] == "info") {
	include $_SERVER ['DOCUMENT_ROOT'] . '/info.php';
}

?></div><?php

startMySQL();

mysql_query ( "create table IF NOT EXISTS cats(
				id int AUTO_INCREMENT,
				catname text NULL,
				subcats text NULL,
				PRIMARY KEY(id));" );

// mysql_query("drop table cats");

mysql_query ( "create table IF NOT EXISTS stuffs(
				id int AUTO_INCREMENT,
				code text NULL,
				name text NULL,
				cats text NULL,
				subcats text NULL,
				prices text NULL,
				priceTimesChange text NULL,
				price text NULL,
				commentsTime text NULL,
				commentsText text NULL,
				commentsAuthor text NULL,
				commentsRating text NULL,
				mainCharacteristic text NULL,
				allCharacteristic text NULL,
				description text NULL,
				PRIMARY KEY(id));" );

// mysql_query("drop table stuffs");

mysql_query ( "create table IF NOT EXISTS users(
				userId int AUTO_INCREMENT,
				email text NULL,
				surname text NULL,
				name text NULL,
				secondname text NULL,
				password text NULL,
				bestList text NULL,
				orList text NULL,
				buyList text NULL,
				PRIMARY KEY(userId));" );


mysql_query ( "create table visitors(
				id int AUTO_INCREMENT,
				sessionId text NULL,
				bestAmount int NULL,
				orAmount int NULL,
				buyAmount int NULL,
				bestList text NULL,
				orList text NULL,
				buyList text NULL,
				PRIMARY KEY(id));" );

// mysql_query("drop table visitors");
// echo "222";

if (!isset($_COOKIE['id'])) {
	if(!isset($_SESSION['sessionId'])) {
		$length = 45;
		$sessionId = "";
		$isntFree = true;
		while ($isntFree) {
			$sessionId = "";
			for ($i = 0; $i < $length; $i++) {
				$sessionId .= rand(0, 9);
			}
			$q = mysql_query("SELECT id FROM visitors WHERE sessionId = $sessionId");
			$isntFree &= mysql_fetch_array ( $q );
		}
		$_SESSION['sessionId'] = $sessionId;
		$empArr = serialize(array());
		mysql_query ( "INSERT INTO visitors(sessionId, bestAmount, orAmount, buyAmount, bestList, orList, buyList) 
				VALUES ('$sessionId', 0, 0, 0, '$empArr', '$empArr', '$empArr');" );
	} else {
		echo $_SESSION['sessionId'];
	}
} else {
	//echo $_COOKIE['id'];
}

?>
</body>
</html>