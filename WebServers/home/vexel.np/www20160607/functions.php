<?php
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
?>