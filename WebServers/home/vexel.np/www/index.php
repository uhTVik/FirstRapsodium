<?php
session_start ();
?>

<html>

<head>
<link rel="stylesheet" href="/css/category.css">
<link rel="stylesheet" href="/css/index.css">
<title>Вексель</title>
</head>

<body>

<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
// echo $_SESSION['sessionId'];
// $q = mysql_query("SELECT sessionId FROM visitors");
// echo "<br> Список всех sessId:<br>";
// while ( $string = mysql_fetch_array ( $q ) ) {
// for($i = 0; $i < count ( $string ); $i ++) {
// echo $string [$i] . ' ';
// }
// echo "<br>";
// }
?>

<div class='rub'>
		<h2 class='rubname'>Распродажа</h2>
		<table class='rubtable'>
			<tr>
				<td>
					<img src='/images/stuffs/stuff1/0.png'>
				</td>
				<td>
					<img src='/images/stuffs/stuff2/0.png'>
				</td>
				<td>
					<img src='/images/stuffs/stuff1/2.png'>
				</td>
				<td>
					<img src='/images/stuffs/stuff4/0.png'>
				</td>
				<td>
					<img src='/images/stuffs/stuff5/0.png'>
				</td>
			</tr>
			<tr>
				<td><h3>Провод текстильный бежевый переходный</h3></td>
				<td><h3>Телефон сотовый ENIGMA-730</h3></td>
				<td><h3>Apple iPhone 7G Laser Blue</h3></td>
				<td><h3>Провод текстильный бежевый переходный</h3></td>
				<td><h3>Пентатоникс LambdaCore KL Lalkaheh-663</h3></td>
			</tr>
			<tr>
				<td>
					<div class="price">
						<span class='oldprice price'>12 900</span><br>
						<span class='newprice price'>8 000</span><br>
					</div>
				</td>
				<td>
					<div class="price">
						<span class='oldprice price'>76 120</span><br>
						<span class='newprice price'>68 000</span><br>
					</div>
				</td>
				<td>
					<div class="price">
						<span class='oldprice price'>2 900</span><br>
						<span class='newprice price'>1 000</span><br>
					</div>
				</td>
				<td>
					<div class="price">
						<span class='oldprice price'>900</span><br>
						<span class='newprice price'>850</span><br>
					</div>
				</td>
				<td>
					<div class="price">
						<span class='oldprice price'>82 900</span><br>
						<span class='newprice price'>43 560</span><br>
					</div>
				</td>
			</tr>
		</table>
	</div>

</body>
</html>