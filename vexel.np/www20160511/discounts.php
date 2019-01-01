<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/discounts.css">
<link rel="stylesheet" href="/css/stuff.css">
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
?>
	<h1 class="hcat">Скидки</h1>
	<div class="stuffs">
		<div class="stuff" id="1" onclick="rediectToStuff(this.id);">
			<h2 class="name">Стиральная машина</h2>
			<img alt="Фотография" src="/images/stuff/stuff0.png">
			<div class="aroundActions">
				<span class="oldprice price">100 000</span><br>
				<span class="newprice price">60 000</span>
				<button class="add button" onmouseenter="button = true;"
					onmouseleave="button = false;">в корзину</button>
			</div>
		</div>
		<div class="stuff" id="1" onclick="rediectToStuff(this.id);">
			<h2 class="name">Флоттель мягкий простой</h2>
			<img alt="Фотография" src="/images/stuff/stuff1.png">
			<div class="aroundActions">
				<span class="oldprice price">100 000</span><br> <span
					class="newprice price">60 000</span>
				<button class="add button" onmouseenter="button = true;"
					onmouseleave="button = false;">в корзину</button>
			</div>
		</div>
		<div class="stuff" id="1" onclick="rediectToStuff(this.id);">
			<h2 class="name">Флоттель iPhone</h2>
			<img alt="Фотография" src="/images/stuff/stuff2.png">
			<div class="aroundActions">
				<span class="oldprice price">100 000</span><br> <span
					class="newprice price">60 000</span>
				<button class="add button" onmouseenter="button = true;"
					onmouseleave="button = false;">в корзину</button>
			</div>
		</div>
	</div>
</body>
</html>