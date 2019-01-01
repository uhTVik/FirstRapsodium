<?php
session_start();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
if(post('login') && post('pass')) {
	$email = vpost('login');
	$pass = vpost('pass');
	$re_email = '/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i';
	$re_pass = '/^[а-яa-z0-9\-\s]{5,}$/iu';
	if (! preg_match ( $re_email, $email )) {
		echo "error\nВведён недопустимый e-mail";
	} else if (! preg_match ( $re_pass, $pass )) {
		echo "error\nВведён недопустимый пароль";
	} else {
		startMySQL();
		$user_data = mysql_fetch_array ( mysql_query ( "SELECT userId FROM users WHERE email = \"$email\" AND password = \"$pass\";" ) );
		if (count ( $user_data ) == 0 || $user_data [0] == "") {
			echo "error\nВведены неправильные данные";
		} else {
			$_SESSION ['id'] = $user_data[0];
			echo "ok";
		}
	}
}
?>