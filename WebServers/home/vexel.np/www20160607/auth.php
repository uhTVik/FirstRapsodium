<?php
session_start ();
?>
<html>
<head>
<script src="/js/userio.js" type="text/javascript"></script>
<link rel="stylesheet" href="/css/userio.css">
<link rel="stylesheet" href="/css/auth.css">
</head>
<body>
<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
$email = $_POST ['email'];
$pass = $_POST ['pass'];
if (isset ( $email ) && isset ( $pass )) {
	$re_email = '/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i';
	$re_pass = '/^[а-яa-z0-9\-\s]{5,}$/iu';
	if (! preg_match ( $re_email, $email )) {
		echo "Введён недопустимый e-mail";
	} else if (! preg_match ( $re_pass, $pass )) {
		echo "Введён недопустимый пароль";
	} else {
		$dbHost = "localhost";
		$dbUser = "root";
		$dbPass = "";
		$dbName = "db";
		$myConnect = mysql_connect ( $dbHost, $dbUser, $dbPass );
		mysql_select_db ( $dbName, $myConnect );
		mysql_query ( "SET NAMES 'utf-8';" );
		$user_data = mysql_fetch_array ( mysql_query ( "SELECT * FROM users WHERE email = \"$email\" AND password = \"$pass\";" ) );
		if (count ( $user_data ) == 0 || $user_data [0] == "") {
			echo "$pass";
		} else {
			$_SESSION ['id'] = $user_data [0];
			$_SESSION ['email'] = $email;
			rediect("?");
		}
	}
}
?>
<div class="back">
		<div class="main">
			<img class="close" alt="Выход" src="/images/exit.png"
				onclick="exit();" onmouseenter="exAct(this);" onmouseleave="exNorm(this);" width="20px">
			<h1 class='user'>Вход</h1>
			<div class='user'>
				<form method="POST" action='?act=login'>
					<ul>
						<li class='prompt'><p>E-Mail:</p></li>
						<li class='input'><input type='email' name='email'
							placeholder='example@yandex.ru'></li>
					</ul>
					<ul>
						<li class='prompt'><p>Пароль:</p></li>
						<li class='input'><input type='password' name='pass'
							placeholder='password'></li>
					</ul>
					<ul id='submit'>
						<li class='prompt'><div style="border: 1px solid transparent;"></div></li>
						<li><input id='sButton' class='submit' type='submit' value='Войти'></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</body>
</html>