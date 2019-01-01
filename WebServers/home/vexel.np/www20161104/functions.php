<?php

function startMySQL() {
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "db";
	$myConnect = mysql_connect ( $dbHost, $dbUser, $dbPass );
	mysql_select_db ( $dbName, $myConnect );
	mysql_query ( "create database $dbName;" );
	mysql_query ( "SET NAMES 'utf-8';" );
}

function rediect($location) {
	echo "<script type='text/javascript'>";
	echo "window.location.href = '$location'";
	echo "</script>";
}

function got($varName) {
	return isset($_GET[$varName]);
}

function post($varName) {
	return isset($_POST[$varName]);
}

function vgot($varName) {
	return $_GET[$varName];
}

function vpost($varName) {
	return $_POST[$varName];
}

function writeRating($rating) {
	echo "<div class='rating'>";
	for ($i = 1; $i <= 5; $i++) {
		if ($rating == $i - 0.5) {
			echo "<img src='/images/rating/0,5.png'>";
		} else if ($rating >= $i) {
			echo "<img src='/images/rating/1.png'>";
		} else {
			echo "<img src='/images/rating/0.png'>";
		}
	}
	echo "</div>";
}

function writeLink($siteName, $siteLocation) {
	$site = $_SERVER ['PHP_SELF'];
	$here = substr ( $site, 0, strlen ( $siteLocation ) ) == $siteLocation;
	echo "<a href=\"$siteLocation\"";
	if ($here) {
		echo " class='here'";
	}
	echo ">$siteName</a>";
}
?>