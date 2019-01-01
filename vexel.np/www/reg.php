<?php
session_start ();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
?>
<html>
<head>
<link rel="stylesheet" href="/css/reg.css">
<link rel="stylesheet" href="/css/userio.css">
</head>
<body>
	<div class="back">
		<div class="main">
			<img class="close" alt="крестик" src="/images/exit.png"
				onclick="exit();" onmouseenter="exAct(this);"
				onmouseleave="exNorm(this);" width="20px">
			<h1 class='user'>Регистрация</h1>
			<div class='user'>
<?php
$email = $_POST ['email'];
$name1 = $_POST ['name1'];
$name2 = $_POST ['name2'];
$name3 = $_POST ['name3'];
$pass1 = $_POST ['pass-1'];
$pass2 = $_POST ['pass-2'];
if (isset ( $email ) && isset ( $name1 ) && isset ( $name2 ) && isset ( $name3 ) && isset ( $pass1 ) && isset ( $pass2 )) {
	$re_email = '/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i';
	$re_name = '/^[а-яёa-z\-\s]+$/iu';
	$re_pass = '/^[а-яёa-z0-9\-\s]{5,}$/iu';
	if (! preg_match ( $re_email, $email )) {
		echo "Введён недопустимый e-mail ($email)";
	} else if (! preg_match ( $re_name, $name1 )) {
		echo "Введена недопустимая фамилия ($name1)";
	} else if (! preg_match ( $re_name, $name2 )) {
		echo "Введено недопустимое имя ($name2)";
	} else if (! preg_match ( $re_name, $name3 )) {
		echo "Введено недопустимое отчество ($name3)";
	} else if (! preg_match ( $re_pass, $pass1 )) {
		echo "Введён недопустимый пароль";
	} else if ($pass1 != $pass2) {
		echo "Пароли не совпадают";
	} else {	
		startMySQL();
		mysql_query ( "INSERT INTO users(email, surname, name, secondname, password) VALUES ('$email', '$name1', '$name2', '$name3', '$pass1');" );
		$query = mysql_query ( "SELECT * FROM users" );
		while ( $string = mysql_fetch_array ( $query ) ) {
			for($i = 0; $i < count ( $string ); $i ++) {
				echo $string [$i] . ' ';
			}
			echo "<br>";
		}
// 		mysql_query("drop table users");
//		mysql_close ( $myConnect );
	}
	?>
	<?php
} else {
	?>	
		<form method="POST" action='?act=reg'>
					<ul id='id0'>
						<li class='prompt'><p>Введите E-Mail:</p></li>
						<li class='input'><input
							oninput="test('email', 'id1', isValidEmailAddress, 0)"
							type='email' name='email' placeholder='example@yandex.ru'></li>
						<li class='okno'><img name='email' alt="ok or no" src=""
							width="24px" height="24px"></li>
					</ul>
					<ul id='id1'>
						<li class='prompt'><p>Введите фамилию:</p></li>
						<li class='input'><input
							oninput="test('name1', 'id2', isValidName, 1)" type='text'
							name='name1' placeholder='Иванов'></li>
						<li class='okno'><img name='name1' alt="ok or no" src=""
							width="24px" height="24px"></li>
					</ul>
					<ul id='id2'>
						<li class='prompt'><p>Введите имя:</p></li>
						<li class='input'><input
							oninput="test('name2', 'id3', isValidName, 2)" type='text'
							name='name2' placeholder='Иван'></li>
						<li class='okno'><img name='name2' alt="ok or no" src=""
							width="24px" height="24px"></li>
					</ul>
					<ul id='id3'>
						<li class='prompt'><p>Введите отчество:</p></li>
						<li class='input'><input
							oninput="test('name3', 'id4', isValidName, 3)" type='text'
							name='name3' placeholder='Иванович'></li>
						<li class='okno'><img name='name3' alt="ok or no" src=""
							width="24px" height="24px"></li>
					</ul>
					<ul id='id4'>
						<li class='prompt'><p>Введите пароль:</p></li>
						<li class='input'><input
							oninput="test('pass-1', 'id5', isValidPassword, 4)"
							type='password' name='pass-1' placeholder='password'>
							<input name='norepeat' type="hidden" value='0'><img
							alt="глаз" class='eye' src="/images/eye.png"></li>
						<li class='okno'><img name='pass-1' alt="ok or no" src=""
							width="24px" height="24px"></li>
					</ul>
					<ul id='id5'>
						<li class='prompt'><p>Повторите пароль:</p></li>
						<li class='input'><input
							oninput="test('pass-2', '', isPassword, 5)" type='password'
							name='pass-2' placeholder='password'></li>
						<li class='okno'><img name='pass-2' alt="ok or no" src=""
							width="24px" height="24px"></li>
					</ul>
					<ul id='submit'>
						<li class='prompt'><div style="border: 1px solid transparent;"></div></li>
						<li><input disabled="disabled" id='sButton' class='submit'
							type='submit' value='Далее'></li>
					</ul>
				</form>
	<?php
}
?>
	</div>
		</div>
	</div>
	<script type="text/javascript" async="async">
var correctness = [ 1, 1, 1, 1, 1, 1 ];
function isValidEmailAddress(emailAddress) {
	var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	return re.test(emailAddress);
};
function isValidName(name) {
	var re = /^[а-яёa-z\-\s]+$/i;
	return re.test(name);
};
function isValidPassword(password) {
	var inp = document.getElementsByName('pass-2')[0];
	if (inp != undefined) {
		test("pass-2", "", isPassword, 5);
	}
	var re = /^[а-яёa-z0-9\-\s]{5,}$/i;
	return re.test(password);
};
function isPassword(password) {
	return (password == document.getElementsByName('pass-1')[0].value);
};
function test(a, b, f, info) {
	var inp = document.getElementsByName(a)[0];
	var element = b != "" ? document.getElementById(b) : "";
	var image = document.getElementsByName(a)[1];
	if (!inp.value) {
		return;
	}
	if (f(inp.value)) {
		correctness[info] = 0;
		image.src = "/images/ok_f.png";
		if (b != "") {
			element.style.display = 'inherit';
		}
	} else {
		correctness[info] = 1;
		image.src = "/images/no_f.png";
	}
	image.style.visibility = 'visible';
	var sum = 0;
	for (var i = 0; i < correctness.length; i++) {
		sum += correctness[i];
	}
	if (sum == 0) {
		var button = document.getElementById('sButton');
		button.disabled = null;
	} else {
		var button = document.getElementById('sButton');
		button.disabled = 'disabled';
	}
};
// test('email', 'id1', isValidEmailAddress, 0);
// test('name1', 'id2', isValidName, 1);
// test('name2', 'id3', isValidName, 2);
// test('name3', 'id4', isValidName, 3);
// test('pass-1', 'id5', isValidPassword, 4);
// test('pass-2', '', isPassword, 5);
</script>
</body>
</html>