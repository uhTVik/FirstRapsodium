<?php
session_start ();
?>
<html>
<head>
<script type="text/javascript" src="/js/delivery.js"></script>
<link rel="stylesheet" href="/css/delivery.css">
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
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
	<h1 class="h">Доставка</h1>
	<div class="del-main">
		<div class="del-info">
			<h2>Тарифы доставки по Санкт-Петербургу (в пределах КАД):</h2>
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
				writeRate("Доставка тяжёлых товаров", 2,
						"Доставка заказа в течение 1–3 дней в промежуток времени от 14:00 до 20:00.
						<br>Тариф для заказов от 10кг.<br>Стоимость – 200 рублей.",
						200);
			?>
		</div>
		
		
		<div class="del-info">
			<h2>Тарифы доставки по Ленинградской области и Великим Лукам:</h2>
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
				writeRate("Ланлан доставка", 2,
						"Идёшево, идорого",
						200);
			?>
		</div>
	</div>
</body>
</html>