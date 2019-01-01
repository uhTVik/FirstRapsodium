<?php
session_start();
include $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';

if (got('list')) {
	startMySQL();
	$list = vgot('list');
	$stuff = vgot('stuff');
	$query = mysql_query("SELECT $list"."List FROM visitors WHERE sessionId = '" . $_SESSION['sessionId'] . "'");
	$string = mysql_fetch_array ( $query );
	$listarr = unserialize($string[0]);
	if ($list == "best" || $list == "or") {
		if (in_array($stuff, $listarr)) {
			$key = array_search($stuff, $listarr);
			unset($listarr[$key]);
		} else {
			$listarr[] = $stuff;
		}
	} else {
		$listarr[] = $stuff;
	}
	$query = mysql_query("UPDATE visitors SET ". $list ."Amount = " . count($listarr) .", " . $list. "List='".
			serialize($listarr) ."' WHERE sessionId='" . $_SESSION['sessionId'] . "'");
}

if(got('reload')) {
	echo update();
}

function update() {
	startMySQL();
	$query = mysql_query("SELECT bestAmount, orAmount, buyAmount 
			FROM visitors WHERE sessionId = '" . $_SESSION['sessionId'] . "'");
	$string = mysql_fetch_array ( $query );
	return $string[0] . " " . $string[1] . " " . $string[2];
}
?>