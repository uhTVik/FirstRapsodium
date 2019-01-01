<?php
session_start ();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
include_once $_SERVER ['DOCUMENT_ROOT'] . '/catalog/catlist.php';
?>
<html>
<head>
<link rel="stylesheet" href="/css/catalog/topstuff.css">
<link rel="stylesheet" href="/css/catalog/bottomstuff.css">
<script type="text/javascript" src="/catalog/js/zoom.js"></script>
<script type="text/javascript" src="/catalog/js/infoswitcher.js"></script>
<script type="text/javascript" src="/catalog/js/imgSwitcher.js"></script>
</head>
<body>
<?php
function readStuff($stuff) {
	;
}

if (isset ( $_GET ['stuff'] )) {
	$id = $_GET ['stuff'];
	$query = mysql_query ( "SELECT code, name, prices, mainCharacteristic, allCharacteristic, description FROM stuffs WHERE id = '$id'" );
	$string = mysql_fetch_array ( $query );
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
					<span class="code">Артикул: <?php echo $string[0]?></span>
					<?php writeRating(0);?>
					<span class="comments"><a href="?">0 отзывов</a></span><br>
					<div class="mainStuffImageDiv" onmousemove="zoom(this);"
						onmouseleave="unzoom(this);">
						<div class="zoombox"></div>
						<img id='mImg' class="mainStuffImage" alt="товар"
							src="/images/stuffs/stuff<?echo $id;?>/0.png">
					</div>
					<div class="photos">
						<img onclick="setImg(this);" src="/images/stuffs/stuff<?echo $id;?>/0.png">
						<img onclick="setImg(this);" src="/images/stuffs/stuff<?echo $id;?>/1.png">
						<img onclick="setImg(this);" src="/images/stuffs/stuff<?echo $id;?>/2.png">
						<img onclick="setImg(this);" src="/images/stuffs/stuff<?echo $id;?>/3.png">
					</div>
				</div>
				<div class="functInfo">
					<div class="whiteList"></div>
					<div class="bigStuffImageDiv">
						<img id='bImg' class="bigStuffImage" alt="товар"
							src="/images/stuffs/stuff<?echo $id;?>/0.png">
					</div>
					<h3 class="name"><?php echo $string[1]?></h3>
					<div class="leftFuncDiv">
						<?php 
						$prices = unserialize($string[2]);
						$mchars = unserialize($string[3]);
						$chars = unserialize($string[4]);
						?>
						<table>
							<?php 
							$num = 0;
							foreach ($mchars as $mchar) {
								$mchstring = explode(":", $mchar);
								$class = "";
								if ($num == count($mchars) - 1) {
									$class = " class='lasttr'";
								}
								echo "<tr$class>
										<td class='qst'>$mchstring[0]</td>
										<td class='ans'>$mchstring[1]</td>
									</tr>";
								$num++;
							}
							?>
						</table>
					</div>
					<div class="rightFuncDiv">
						<div class="price">
							<?php 
								if (count($prices) != 1) {
									echo "<span class='oldprice price'>$prices[1]</span><br>";
								}
								echo "<span class='newprice price'>$prices[0]</span><br>";
							?>
						</div>
						<button class="add button">в корзину</button>
						<br> <img alt="в избранное" class="picbutton"
							src="/images/picfunc/best.png"> <img alt="в сравнение"
							class="picbutton" src="/images/picfunc/or.png"> <img
							alt="в сравнение" class="picbutton"
							src="/images/picfunc/share.png">
					</div>
					<div class="infoTypes">
						<ul>
							<li><a href="javascript:setType(0);">Описание</a></li>
							<li><a href="javascript:setType(1);">Характеристики товара</a></li>
							<li><a href="javascript:setType(2);">Отзывы</a></li>
							<li><a href="javascript:setType(3);">Тарифы доставки</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="bottomstuff">
				<div class="infoList">
					<div id="inf0" class="descinfo">
						<?php 
							echo $string[5];
						?>
					</div>
					
					<div id="inf1" class="chars">
						<table>
							<?php 
							$num = 0;
							foreach ($chars as $char) {
								$chstring = explode(":", $char);
								$class = "";
								if (num == count($chars) - 1) {
									$class = " class='lasttr'";
								}
								echo "<tr$class>
								<td class='qst'>$chstring[0]</td>
								<td class='ans'>$chstring[1]</td>
								</tr>";
								$num++;
							}
							?>
						</table>
					</div>
					
					<div id="inf2" class="comments">
						
					</div>
					
					<div id="inf3" class="deliveries">
						
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