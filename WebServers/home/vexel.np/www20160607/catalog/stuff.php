<?php
session_start ();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/catalog/catlist.php';
?>
<html>
<head>
<link rel="stylesheet" href="/css/catalog/topstuff.css">
<link rel="stylesheet" href="/css/catalog/bottomstuff.css">
<script type="text/javascript" src="/catalog/js/zoom.js"></script>
<script type="text/javascript" src="/catalog/js/infoswitcher.js"></script>
</head>
<body>
<?php
function readStuff($stuff) {
	;
}

if (isset ( $_GET ['stuff'] )) {
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "db";
	$myConnect = mysql_connect ( $dbHost, $dbUser, $dbPass );
	mysql_select_db ( $dbName, $myConnect );
	mysql_query ( "create database $dbName;" );
	mysql_query ( "SET NAMES 'cp1251';" );
	if ($query = mysql_query ( "SELECT * FROM stuffs WHERE stuff=" . $_GET ['stuff'] ) != false) {
		$stuff = mysql_fetch_array ( $query );
		readStuff ( $stuff );
	}
	mysql_close ( $myConnect );
	// HERE-->
	?>
	<div class="page">
	<div class="mainCat">
			<?php
	writeCatList ( 0, 0 );
	?>
		</div>
	<div class="stuffpage">
		<div class="topstuff">
			<div class="mainStuffDiv">
				<span class="code">Артикул: 10av3j2</span>
				<div class="rating">
					<img src="/images/rating/1.png"><img src="/images/rating/1.png"><img
						src="/images/rating/1.png"><img src="/images/rating/0.png"><img
						src="/images/rating/0.png">
				</div>
				<span class="comments"><a href="?">128 отзывов</a></span><br>
				<div class="mainStuffImageDiv" onmousemove="zoom(this);"
					onmouseleave="unzoom(this);">
					<div class="zoombox"></div>
					<img class="mainStuffImage" alt="товар"
						src="/images/stuff/stuff1/0.jpg">
				</div>
				<div class="photos">
					<img src="/images/stuff/stuff1/0.jpg">
					<img src="/images/stuff/stuff1/1.jpg">
					<img src="/images/stuff/stuff1/2.jpg">
					<img src="/images/stuff/stuff1/3.jpg">
				</div>
			</div>
			<div class="functInfo">
				<div class="whiteList"></div>
				<div class="bigStuffImageDiv">
					<img class="bigStuffImage" alt="товар"
						src="/images/stuff/stuff1/0.jpg">
				</div>
				<h3 class="name"> Смартфон Apple IPhone 6s 64GB Silver</h3>
				<div class="leftFuncDiv">
					<table>
						<tr>
							<td class="qst">Экран</td>
							<td class="ans">4,6", 1368x768, Retina</td>
						</tr>
						<tr>
							<td class="qst">Доступ запрещён:</td>
							<td class="ans">Админам и даунам</td>
						</tr>
						<tr>
							<td class="qst">Админы дауны:</td>
							<td class="ans">1028 кГц</td>
						</tr>
						<tr>
							<td class="qst">Время развития:</td>
							<td class="ans">16 секунд</td>
						</tr>
						<tr class='lasttr'>
							<td class="qst">Да:</td>
							<td class="ans">Информационные носители русского языка</td>
						</tr>
					</table>
				</div>
				<div class="rightFuncDiv">
					<div class="price">
						<span class="oldprice price">10 800</span><br> <span
							class="newprice price">10 700</span><br>
					</div>
					<button class="add button">в корзину</button><br>
					<img alt="в избранное" class="picbutton" src="/images/picfunc/best.png">
					<img alt="в сравнение" class="picbutton" src="/images/picfunc/or.png">
					<img alt="в сравнение" class="picbutton" src="/images/picfunc/share.png">
				</div>
				<div class="infoTypes">
					<ul>
						<li><a href="javascript:setType(0);">Характеристики товара</a></li>
						<li><a href="javascript:setType(1);">Отзывы</a></li>
						<li><a href="javascript:setType(2);">Тарифы доставки</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="bottomstuff">
			<div class="infoList">
				<div class="characteristic">
					<h3>Характеристики товара</h3>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
	// <--HERE
}
?>
<script type="text/javascript">
setType(0);
</script>
</body>
</html>