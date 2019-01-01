<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/admin/list/stuffList.css">
<script type="text/javascript">
	function showOrHideForm() {
		var form = document.getElementsByClassName('add')[0];
		if (form.style.display != 'inherit') {
			form.style.display = 'inherit';
		} else {
			form.style.display = 'none';
		}
	}
</script>
</head>
<body>

<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/admin/admin-menu.php';
?>

<a href="javascript:showOrHideForm();">Добавить товар</a>
<form class="add" action="/admin/list/stuffs.php" method="post">
	Артикул: <input type="text" name="code">
	Название: <input type="text" name="name">
	Цена: <input type="text" name="price"><br>
	Относится к категориям:<br>
	<select name="cat" >
		<option selected="selected">Выберите категорию</option>
		<option>Компьютеры и ноутбуки</option>
		<option>Телефоны и планшеты</option>
		<option>Телевизоры</option>
		<option>Аудио и видео</option>
		<option>Устройства ввода</option>
	</select>
	<select name="subcat">
		<option selected="selected">Выберите подкатегорию</option>
		<option>Подкатегория</option>
	</select><br>
	Краткие характеристики:<br>
	<input type="text" name="lchar1">
	<input type="text" name="lchar2">
	<input type="text" name="lchar3"><br>
	Все характеристики:<br>
	<input type="text" name="char1">
	<input type="text" name="char2">
	<input type="text" name="char3"><br>
	Фотографии:<br>
	Маленькая фотография: <input type="file" name="littlephoto"><br>
	Основная фотография: <input type="file" name="mainphoto"><br>
	<button type="submit">Залить товар</button>
</form>

<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "db";
$myConnect = mysql_connect ( $dbHost, $dbUser, $dbPass );
mysql_select_db ( $dbName, $myConnect );
mysql_query ( "create database $dbName;" );
mysql_query ( "SET NAMES 'utf-8';" );
mysql_query ( "create table stuffs(
				id int AUTO_INCREMENT,
				code text NULL,
				name text NULL,
				cats text NULL,
				subcats text NULL,
				prices text NULL,
				priceTimesChange text NULL,
				price text NULL,
				commentsTime text NULL,
				commentsText text NULL,
				commentsAuthor text NULL,
				commentsRating text NULL,
				mainCharacteristic text NULL,
				allCharacteristic text NULL,
				littlePhoto text NULL,
				mainPhoto text NULL,
				photos text NULL,
				PRIMARY KEY(id));" );

if (post("code") && post("name") && post("price") && post("cat") && post("subcat")) {
	$code = vpost("code");
	$name = vpost("name");
	$cat = vpost("cat");
	$subcat = vpost("subcat");
	$price = vpost("price");
	$prices = serialize(array($price));
	$priceTimesChange = serialize(array(time()));
	$mainCharacteristic = serialize(array(vpost("lchar1"), vpost("lchar2"), vpost("lchar3")));
	$allCharacteristic = serialize(array(vpost("char1"), vpost("char2"), vpost("char3")));
// 	$littlePhoto = vpost("littlephoto");
// 	$mainPhoto = vpost("mainphoto");
	$bratan = mysql_query ( "INSERT INTO 
			stuffs(code, name, cats, subcats, prices, priceTimesChange, 
			price, mainCharacteristic, allCharacteristic) VALUES ('$code', '$name', 
			'$cat', '$subcat', '$prices', '$priceTimesChange, 
			'$price', '$mainCharacteristic', '$allCharacteristic');" );
}
$query = mysql_query ( "SELECT * FROM stuffs" );
while ( $string = mysql_fetch_array ( $query ) ) {
echo "1" . $string . "1";
	for($i = 0; $i < count ( $string ); $i ++) {
		echo $string [$i] . ' ';
	}
	echo "<br>";
}

// mysql_query("drop table stuffs");
?>
</body>
</html>