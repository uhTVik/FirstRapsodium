<?php

define("VER", "559135512");
define("LT", "554107945");
define("SALT", "57519082218");
define("LOGIN_CORRECT", 0);
define("LOGIN_INCORRECT_PAIR", 1);
define("LOGIN_DDOS", 2);
define("LOGIN_ALREADY_LOGGED_IN", 3);

header("Content-Type: text/html; charset=utf-8");

function nsopen($uri, $params) {
	$body = "";
	foreach ($params as $name => $value) {
		$body .= urlencode($name) . "=" . ($value) . "&";
	}
	$l = strlen($body);
	
	$socket = fsockopen("netschool.school.ioffe.ru", 80);
	fputs($socket, "POST $uri HTTP/1.1\r\n");
	fputs($socket, "Host: netschool.school.ioffe.ru\r\n");
	fputs($socket, "Content-Type: application/x-www-form-urlencoded\r\n");
	fputs($socket, "Content-Length: $l\r\n");
	fputs($socket, "\r\n");
	fputs($socket, $body);
	return $socket;
}

function readHeaders($socket) {
	$headers = array();
	$line = fgets($socket);
	$tokens = explode(" ", $line);
	$code = $tokens[1];
	$cookies = "";
	$redirect;
	while (1) {
		$line = fgets($socket);
		$line = substr($line, 0, -2);
		if ($line == "") {
			break;
		}
		if (substr($line, 0, 10) == "Set-Cookie") {
			$cookies .= substr($line, 12);
		}
		if (substr($line, 0, 8) == "Location") {
			$redirect = substr($line, 10);
		}
	}
	return array($code, $cookies, $redirect);
}

function auth($un, $pw2) {
	$un = mb_strtolower($un);
	$socket = nsopen("/asp/postlogin.asp", array(
		'UN' => $un,
		'VER' => VER,
		'LT' => LT,
		'LoginType' => '1',
		'ECardID' => '',
		'CID' => '2',
		'SID' => '1',
		'PID' => '-1',
		'CN' => '1',
		'SFT' => '2',
		'SCID' => '1',
		'PW2' => $pw2
	));
	list($code, $cookies, $redirect) = readHeaders($socket);
	fclose($socket);
	if ($code == 200) {
		return LOGIN_CORRECT;
	}
}
?>