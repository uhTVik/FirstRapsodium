<?php
session_start();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
if(post('login') && post('order')) {
	$email = vpost('login');
	$order = vpost('order');
	$re_email = '/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i';
	$re_order = '/^[\d]{5,}$/iu';
	if (! preg_match ( $re_email, $email )) {
		echo "error\nВведён недопустимый e-mail";
	} else if (! preg_match ( $re_order, $order )) {
		echo "error\nВведён недопустимый номер заказа";
	} else {
// 		$dbHost = "localhost";
// 		$dbUser = "root";
// 		$dbPass = "";
// 		$dbName = "db";
// 		$myConnect = mysql_connect ( $dbHost, $dbUser, $dbPass );
// 		mysql_select_db ( $dbName, $myConnect );
// 		mysql_query ( "SET NAMES 'utf-8';" );
// 		$user_data = mysql_fetch_array ( mysql_query ( "SELECT userId FROM users WHERE email = \"$email\" AND password = \"$pass\";" ) );
// 		if (count ( $user_data ) == 0 || $user_data [0] == "") {
// 			echo "error\nВведены неправильные данные";
// 		} else {
// 			$_SESSION ['id'] = $user_data[0];
// 			echo "ok";
// 		}
		echo "ok\n|\n";
		echo $order . "\n|\n";
		echo "
		<ul>
			<li class='prompt'><p>Товары:</p></li>
			<li class='input'>Смартфон Apple iPhone 6s 16Gb Silver</li>
		</ul>
		<ul>
			<li class='prompt'><p>Создан:</p></li>
			<li class='input'>09.09.2017</li>
		</ul>
		<ul>
			<li class='prompt'><p>Доставка:</p></li>
			<li class='input'>пр. Культуры, 76к2, кв.27 <br> 05.02.2017, 7:10</li>
		</ul>
		<ul>
			<li class='prompt'><p>Состояние:</p></li>
			<li class='input'>Едет</li>
		</ul>
		<ul>
			<li class='prompt'><p>Сумма:</p></li>
			<li class='input'><div class='price'>64 700</div></li>
		</ul>";
		echo "\n|\n";
		
	}
}
?>