<?php
session_start ();
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/catalog/catlist.php';
?>
<html>
<head>
<link rel="stylesheet" href="/css/catalog/stuff.css">
<script type="text/javascript" src="/catalog/js/zoom.js"></script>
</head>
<body>
<?php
function readStuff($stuff) {
	;
}

if (isset ( $_GET ['stuff'] )) {
	if ($_GET ['stuff'] == 0) {
		rediect ( "/catalog" );
	} else {
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
							<img src="images/rating/1.png">
							<img src="images/rating/1.png">
							<img src="images/rating/1.png">
							<img src="images/rating/0.png">
							<img src="images/rating/0.png">
						</div>
						<span class="comments"><a href="?">128 отзывов</a></span><br>
						<div class="mainStuffImageDiv" onmousemove="zoom(this);" onmouseleave="unzoom(this);">
							<div class="zoombox"></div>
							<img class="mainStuffImage" alt="товар" src="/images/stuff/big/stuff0.jpg">
						</div>
					</div>
					<div class="functInfo">
						<div class="bigStuffImageDiv">
							<img class="bigStuffImage" alt="товар" src="/images/stuff/big/stuff0.jpg">
						</div>
						<h3 class="name">Кусок-брусок для гитарного манипулятора</h3>
						<div class="price">
							<div class="price">
								<span class="oldprice price">10 800</span><br>
								<span class="newprice price">10 700</span><br>
							</div>
							<span class="comments"><a href="?">128 отзывов</a></span><br>							
							<div class="rating">
								Рейтинг:
								<img src="images/rating/1.png">
								<img src="images/rating/1.png">
								<img src="images/rating/1.png">
								<img src="images/rating/0.png">
								<img src="images/rating/0.png">
								на основании 32 голосов
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		// <--HERE
	}
}
?>
</body>
</html>