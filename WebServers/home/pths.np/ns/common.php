<?php

define("VER", "559135512");
define("LT", "554107945");
define("SALT", "57519082218");
define("LOGIN_CORRECT", 0);
define("LOGIN_INCORRECT_PAIR", 1);
define("LOGIN_DDOS", 2);
define("LOGIN_ALREADY_LOGGED_IN", 3);

header("Content-Type: text/html; charset=utf-8");

function params() {
	if (isset($_COOKIE["ver"], $_COOKIE["at"])) {
		return "AT=" . $_COOKIE["at"] . "&";
	}
	return "";
}

function cookies() {
	if (isset($_COOKIE["c"])) {
		return $_COOKIE["c"];
	}
	return "";
}

function clearCookies() {
	$time = time() - 1;
	setcookie("un", "", $time);
	setcookie("pw2", "", $time);
	setcookie("at", "", $time);
	setcookie("c", "", $time);
	unset($_COOKIE["un"]);
	unset($_COOKIE["pw2"]);
	unset($_COOKIE["at"]);
	unset($_COOKIE["c"]);
}

function test() {
	$socket = nsopen("/asp/Announce/ViewAnnouncements.asp");
	list($code, $cookies, $redirect) = readHeaders($socket);
	fclose($socket);
	return $code == 200;
}

// attempting to login
$loggedIn = false;
if (isset($_COOKIE["at"], $_COOKIE["c"])) {
	if (test()) {
		$loggedIn = true;
	} else {
		if (isset($_COOKIE["un"], $_COOKIE["pw2"])) {
			if (auth() == LOGIN_CORRECT) {
				$LoggedIn = true;
			}
		}
	}
}

function nsopen($uri, $params = array()) {
	$body = params();
	foreach ($params as $name => $value) {
		$body .= urlencode($name) . "=" . urlencode($value) . "&";
	}
	$body = str_replace("%F0", "%D0", $body);
	$l = strlen($body);
	
	$socket = fsockopen("netschool.school.ioffe.ru", 80);
	$req = "POST $uri HTTP/1.1\r\n" .
	       "Host: netschool.school.ioffe.ru\r\n" .
	       "Cookie: " . cookies() . "\r\n" .
	       "Content-Type: application/x-www-form-urlencoded\r\n" .
	       "Content-Length: $l\r\n" .
	       "\r\n" . $body;
	fputs($socket, $req);
	return $socket;
}

function readHeaders($socket) {
	$headers = array();
	$line = fgets($socket);
	$tokens = explode(" ", $line);
	$code = $tokens[1];
	$cookies = "";
	$redirect = "";
	while (1) {
		$line = fgets($socket);
		$line = substr($line, 0, -2);
		if ($line == "") {
			break;
		}
		if (substr($line, 0, 10) == "Set-Cookie") {
			$cookie = substr($line, 12);
			$i = strpos($cookie, ";");
			$cookie = substr($cookie, 0, $i + 1);
			$cookies .= $cookie;
		}
		if (substr($line, 0, 8) == "Location") {
			$redirect = substr($line, 10);
		}
	}
	return array($code, $cookies, $redirect);
}

function extractValue($line, $name) {
	// name="name" value="value"
	$i = strpos($line, 'name="' . $name . '"');
	$line = substr($line, $i + 15 + strlen($name));
	$i = strpos($line, '"');
	return substr($line, 0, $i);
}

function auth($un, $pw2) {
	clearCookies();
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
	if ($code == 200) {
		$line = fgets($socket, 215);
		$at = extractValue($line, "AT");
		setcookie("un", $un);
		setcookie("pw2", $pw2);
		setcookie("at", $at);
		setcookie("c", $cookies);
		fclose($socket);
		return LOGIN_CORRECT;
	} else {
		fclose($socket);
		if (strpos($redirect, "/asp/error.asp?DEST=&ET=%D0%92") !== false) {
			return LOGIN_DDOS;
		} else {
			return LOGIN_INCORRECT_PAIR;
		}
	}
}
?>