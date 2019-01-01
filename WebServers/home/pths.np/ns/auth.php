<?php
require_once("common.php");

if (isset($_POST["login"], $_POST["pass"])) {
	$un = $_POST["login"];
	$pw2 = md5(SALT . md5($_POST["pass"]));
	echo auth($un, $pw2);
} else {
	clearCookies();
	header("Location: ./");
}
?>