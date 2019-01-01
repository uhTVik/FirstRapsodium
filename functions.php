<?php

function startMySQL() {
	if ($_SERVER ['DOCUMENT_ROOT'] == "Z:/home/vexel.np/www") {
		$dbHost = "localhost";
		$dbUser = "root";
		$dbPass = "";
		$dbName = "db";
	} else {
		$dbHost = "localhost";
		$dbUser = "the-np";
		$dbPass = "vexelpths";
		$dbName = "the-np";
	}
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

function writeAroundActions($stuff_id, $stuff_oldprice, $stuff_newprice) {
	echo "<div class='aroundActions'>";
			if ($stuff_oldprice != $stuff_newprice) {
				echo "<span class='oldprice price'>$stuff_oldprice</span><br>";
			}
			echo
				"<span class='newprice price'>$stuff_newprice</span>
				<button class='add button' onmouseenter='button = true;'
				onmouseleave='button = false;' onclick='toBuyList($stuff_id);'>в корзину</button>
				<br> <img alt='в избранное' class='picbutton'
				src='/images/picfunc/best.png' onmouseenter='button = true;'
				onmouseleave='button = false;' onclick='toBestList($stuff_id);'>
				<img alt='в сравнение' class='picbutton' src='/images/picfunc/or.png'
				onmouseenter='button = true;' onmouseleave='button = false;' 
				onclick='toOrList($stuff_id);'> <img alt='поделиться' class='picbutton' 
				src='/images/picfunc/share.png' onmouseenter='button = true;' 
				onmouseleave='button = false;'><br>
		</div>";
}
?>