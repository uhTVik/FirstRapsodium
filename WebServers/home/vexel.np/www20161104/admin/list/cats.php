<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/admin/list/catList.css">
<script type="text/javascript" src="/admin/list/js/ajax/listscripts.js"></script>
</head>
<body>

<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/admin/admin-menu.php';
?>

<a href="javascript:showOrHideForm('form1');">Добавить категорию</a>
<form id="form1" enctype='multipart/form-data' class="add" action="/admin/list/cats.php" method="post">
	Название: <input type="text" name="f1catname"><br>
	Пиктограмма: <input type="file" name="f1piccat">
	<p><a href="javascript:addInpField(this, 'form1', 'f1sc',
	'Название подкатегории: ', 1, 'text');">Добавить подкатегорию</a></p>
	<div class="f1sci">
	</div>
	<button type="submit">Добавить</button>
</form>
<br>
<a href="javascript:showOrHideForm('form2');">Добавить категории из файла</a>
<form id="form2" enctype='multipart/form-data' class="add" action="/admin/list/cats.php" method="post">
	<input type="hidden" name="f2">
	Файл: <input type="file" name="f2cats">
	<button type="submit">Добавить</button>
</form>
<br>

<?php
if (post("f1catname")) {
	$catname = vpost("f1catname");
	$subcats = array();
	for ($i = 1; post("f1sc$i"); $i++) {
		if (vpost("f1sc$i") != "") {
			$subcats[] = vpost("f1sc$i");
		}
	}
	$subcats = serialize($subcats);
	$index = (mysql_fetch_array(mysql_query("SELECT COUNT(1) FROM cats")));
	$index = $index[0] + 1;
	copy($_FILES['f1piccat']['tmp_name'], $_SERVER ['DOCUMENT_ROOT'] . "/images/piccats/" . $index . ".png");
	mysql_query ( "INSERT INTO cats(catname, subcats) VALUES ('$catname', '$subcats');" );
}

if (post("f2")) {
	$file = fopen($_FILES['f2cats']['tmp_name'], 'r');
	$catname = "";
	$subcats = array();
	while ( ! feof ( $file ) ) {
		$string = fgets ( $file );
		if ($string {0} == "\t") {
			$subcats[] = substr ( $string, 1 );
		} else {
			if ($catname != "") {
				$subcats = serialize($subcats);
				$index = (mysql_fetch_array(mysql_query("SELECT COUNT(1) FROM cats")));
				$index = $index[0];
				mysql_query ( "INSERT INTO cats(catname, subcats) VALUES ('$catname', '$subcats');" );
			}
			$catname = $string;
			$subcats = array ();
		}
	}
}

$query = mysql_query ( "SELECT * FROM cats" );
echo "<pre>";
while ( $string = mysql_fetch_array ( $query ) ) {
	echo $string[0] . ". ";
	echo $string[1];
	foreach (unserialize($string[2]) as $subcatname) {
		echo "\t" . $subcatname;
	}
	echo "<br>";
}
echo "</pre>";

// mysql_query("drop table cats");
?>
</body>
</html>