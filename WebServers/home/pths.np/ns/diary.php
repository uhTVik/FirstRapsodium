<?php
require_once("common.php");
if (!$loggedIn) exit;

function loadDiary($offset = 0) {
	$socket = nsopen("/asp/Curriculum/Assignments.asp", array(
		"DATE" => date("d.m.y", time() + $offset * 3600 * 24 * 7)
	));
	$echo = false;
	while (1) {
		$line = fgets($socket);
		$line = trim($line);
		if ($line == '<table class="table table-bordered table-thin table-xs print-block">') {
			$echo = true;
		}
		if ($echo) {
			echo $line;
			if ($line == "</table>") break;
		}
	}
	fclose($socket);
}

if (isset($_POST["offset"])) {
	loadDiary($_POST["offset"]);
}
?>