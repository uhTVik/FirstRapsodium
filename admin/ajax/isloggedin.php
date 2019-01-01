<?php
session_start ();
include $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
if (got ( 'reload' ) && vgot ( 'reload' ) == 1) {
	$notloggedin = $_SESSION ['id'] == "";
	$hasadminperm = $_SESSION ['id'] == 1;
	if ($notloggedin) {
		echo 0;
	} else if ($hasadminperm) {
		echo 2;
	} else {
		echo 1;
	}
}
?>