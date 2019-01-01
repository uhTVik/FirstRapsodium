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
<link rel="stylesheet" href="/css/delivery.css">
<script type="text/javascript" src="/js/delivery.js"></script>
<script type="text/javascript" src="/catalog/js/zoom.js"></script>
<script type="text/javascript" src="/catalog/js/infoswitcher.js"></script>
<script type="text/javascript" src="/catalog/js/imgSwitcher.js"></script>
</head>
<body>
<?php
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
					<?php writeRating(3);?>
					<span class="comments"><a href="?">1 отзыв</a></span><br>
					<div class="mainStuffImageDiv" onmousemove="zoom(this);"
						onmouseleave="unzoom(this);">
						<div class="zoombox"></div>
						<img id='mImg' class="mainStuffImage" alt="товар"
							src="/images/stuffs/stuff<?echo $id;?>/0.png">
					</div>
					<div class="photos">
						<img onclick="setImg(this);"
							src="/images/stuffs/stuff<?echo $id;?>/0.png"> <img
							onclick="setImg(this);"
							src="/images/stuffs/stuff<?echo $id;?>/1.png"> <img
							onclick="setImg(this);"
							src="/images/stuffs/stuff<?echo $id;?>/2.png"> <img
							onclick="setImg(this);"
							src="/images/stuffs/stuff<?echo $id;?>/3.png">
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
	$prices = unserialize ( $string [2] );
	$mchars = unserialize ( $string [3] );
	$chars = unserialize ( $string [4] );
	?>
						<table>
							<?php
	$num = 0;
	foreach ( $mchars as $mchar ) {
		$mchstring = explode ( ":", $mchar );
		$class = "";
		if ($num == count ( $mchars ) - 1) {
			$class = " class='lasttr'";
		}
		echo "<tr$class>
										<td class='qst'>$mchstring[0]</td>
										<td class='ans'>$mchstring[1]</td>
									</tr>";
		$num ++;
	}
	?>
									<tr>
								<td class='qst'>Экран</td>
								<td class='ans'>4,5", 7020x717, Retina</td>
							</tr>
							<tr>
								<td class='qst'>Доступ запрещён</td>
								<td class='ans'>Всем нам троим</td>
							</tr>
							<tr>
								<td class='qst'>Наполеон</td>
								<td class='ans'>vertilo kareto</td>
							</tr>
							<tr>
								<td class='qst'>СССР</td>
								<td class='ans'>29x-x</td>
							</tr>
							<tr class='lasttr'>
								<td class='qst'>Игнорирование</td>
								<td class='ans'>поверхность</td>
							</tr>
						</table>
					</div>
					<div class="rightFuncDiv">
						<div class="price">
							<?php
	if (count ( $prices ) != 1) {
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
	// echo $string[5];
	echo "Знают, когда вы говорите.
Голосовой акселерометр распознаёт, когда вы начинаете говорить. Работая вместе с направленными микрофонами, он помогает отфильтровать внешний шум и сфокусироваться на звуке вашего голоса.
Знают, когда вы слушаете.<br>
Акселерометры движения и оптические сенсоры работают совместно с процессором W1, автоматически регулируя воспроизведение и включая микрофон, чтобы вы могли пользоваться одним или двумя наушниками. Благодаря этому AirPods включают звук сразу, как только вы их наденете.Знают, когда вы говорите.
Голосовой акселерометр распознаёт, когда вы начинаете говорить. Работая вместе с направленными микрофонами, он помогает отфильтровать внешний шум и сфокусироваться на звуке вашего голоса.
Знают, когда вы слушаете.
Акселерометры движения и оптические сенсоры работают совместно с процессором W1, автоматически регулируя воспроизведение и включая микрофон, чтобы вы могли пользоваться одним или двумя наушниками. Благодаря этому AirPods включают звук сразу, как только вы их наденете.Знают, когда вы говорите.
<br>Голосовой акселерометр распознаёт, когда вы начинаете говорить. Работая вместе с направленными микрофонами, он помогает отфильтровать внешний шум и сфокусироваться на звуке вашего голоса.
Знают, когда вы слушаете.
Акселерометры движения и оптические сенсоры работают совместно с процессором W1, автоматически регулируя воспроизведение и включая микрофон, чтобы вы могли пользоваться одним или двумя наушниками. Благодаря этому AirPods включают звук сразу, как только вы их наденете.";
	?>
					</div>

					<div id="inf1" class="chars">
						<div class='lchar'>
							<div class='charpart'>
								<h3>Общие</h3>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип корпуса</h4>
									</div>
									<div class='ans'>Моноблок</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>ОС</h4>
									</div>
									<div class='ans'>IOS 8</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
							</div>
							<div class='charpart'>
								<h3>Общие</h3>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип корпуса</h4>
									</div>
									<div class='ans'>Моноблок</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>ОС</h4>
									</div>
									<div class='ans'>IOS 8</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
							</div>
							<div class='charpart'>
								<h3>Общие</h3>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип корпуса</h4>
									</div>
									<div class='ans'>Моноблок</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>ОС</h4>
									</div>
									<div class='ans'>IOS 8</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
							</div>
						</div>
						<div class='rchar'>
							<div class='charpart'>
								<h3>Общие</h3>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип корпуса</h4>
									</div>
									<div class='ans'>Моноблок</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>ОС</h4>
									</div>
									<div class='ans'>IOS 8</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
							</div>
							<div class='charpart'>
								<h3>Общие</h3>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип корпуса</h4>
									</div>
									<div class='ans'>Моноблок</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>ОС</h4>
									</div>
									<div class='ans'>IOS 8</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
							</div>
							<div class='charpart'>
								<h3>Общие</h3>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип корпуса</h4>
									</div>
									<div class='ans'>Моноблок</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>ОС</h4>
									</div>
									<div class='ans'>IOS 8</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Количество сим-карт</h4>
									</div>
									<div class='ans'>19</div>
								</div>
								<div class='qna'>
									<div class='qst'>
										<h4>Тип симочек</h4>
									</div>
									<div class='ans'>Mini</div>
								</div>
							</div>
						</div>
					</div>

					<div id="inf2" class="comments">
						<div class='addcomment'>
							<button class='button'>Добавить отзыв</button>
						</div>
						<div class='comment'>
							<div class='comname'>
								<h3>Вячеслав</h3>
								<div class='comrating'><?php writeRating(3); ?></div>
								<h4>30 июня 2017</h4>
							</div>
							<div class='combody'>
								<h4>Опыт эксплуатации: 3 месяца</h4>
								<h3>Да, бесспорно, телефон во многом приятный. Но! Приходится реально констатировать, что после ухода Стива Джобса, телефон стал обычным рядовым смартфоном с завышенным ценником чисто за бренд, цена которому до 30000 максимум! Если нет такой уж реальной необходимости покупать айфон, не выкидывайте деньги.<br><br>
								<b>Достоинства:</b><br>
								Да, бесспорно, телефон во многом приятный. Но! Приходится реально констатировать, что после ухода Стива Джобса, телефон стал обычным рядовым смартфоном с завышенным ценником чисто за бренд, цена которому до 30000 максимум! Если нет такой уж реальной необходимости покупать айфон, не выкидывайте деньги.<br>
								<b>Недостатки:</b><br>Да, бесспорно, телефон во многом приятный. Но! Приходится реально констатировать, что после ухода Стива Джобса, телефон стал обычным рядовым смартфоном с завышенным ценником чисто за бренд, цена которому до 30000 максимум! Если нет такой уж реальной необходимости покупать айфон, не выкидывайте деньги.<br><br>
								</h3>
							</div>
						</div>
					</div>

					<div id="inf3" class="deliveries">
						<?php
	function writeRate($delWay, $delPNG, $description, $delPrice) {
		echo "<div class='rate' onmousemove='rotate(this);'>
							<div class='content'>
							<div class='content1'>
							<h3>$delWay</h3>
							<img alt='пиктограмма' src='/images/delivery/$delPNG.png' height='130px'>
							<h4>$delPrice рублей</h4>
							</div>
							<div class='content2'>
							<h3>$delWay</h3>
							<p>$description</p>
							</div>
							</div>
							</div>";
						}
						?>
						<br>К сожалению, на данном этапе развития нашего магазина, услуга
						самовывоза товара недоступна, а доставка осуществляется только по
						Санкт-Петербургу и Ленинградской области. С тарифами доставки
						можно ознакомиться ниже:<br>
						<div class="del-main">
							<div class="del-info">
								<h2>Доставка по Санкт-Петербургу:</h2>
								<?php
									writeRate("Срочная доставка", 0,
											"Доставка в день заказа (при заказе 
											позднее 19:00 — на следующий день) в промежуток времени от 12:00 до 21:00.
											<br>Максимальная масса заказа – 10кг.<br>Стоимость – 300 рублей.",
											300);
									writeRate("Стандартная доставка", 1,
											"Доставка заказа в течение 1–3 дней в промежуток времени от 12:00 до 21:00.
											<br>Максимальная масса заказа – 10кг.<br>Стоимость – 100 рублей.",
											100);
								?>
							</div>


							<div class="del-info">
								<h2>Доставка по Ленинградской области:</h2>
								<?php
									writeRate("Быстрая доставка", 0,
											"Доставка в день заказа или на следующий день (при заказе 
											позднее 19:00) в промежуток времени от 15:00 до 20:00.
											<br>Максимальная масса заказа – 10кг.",
											500);
									writeRate("Стандартная доставка", 1,
											"Доставка заказа в течение 2–3 дней в промежуток времени от 15:00 до 20:00.
											<br>Максимальная масса заказа – 10кг.",
											200);
								?>
							</div>
						</div>
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