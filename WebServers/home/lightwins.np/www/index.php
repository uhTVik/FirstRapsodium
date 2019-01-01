<?php
session_start ();
$ksbwidth = 240;
?>
<html>
<head>
<title>Свет | Главная страница</title>
<link rel="stylesheet" href="/css/default.css">
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">$(window).on('load', function () {
    var $preloader = $('#p_prldr');
    $preloader.delay(300).fadeOut('slow');
});</script>
<script type="text/javascript" src="/js/functions.js"></script>
<script type="text/javascript" src="/js/color.js"></script>
<script type="text/javascript" src="/js/draw.js"></script>
<script type="text/javascript" src="/js/ajax/ajax.js"></script>
<script type="text/javascript" src="/js/ajax/pages.js"></script>
<script type="text/javascript">
var fastPage = -1;
function reloadWindow() {
	if (sectionClicked == -1) {
		x0 = document.body.clientWidth / 2;
		y0 = document.body.clientHeight / 2;
		canvasInit();
		center();
		drawInit(<?=$ksbwidth?>);
		if (fastPage != -1) {
			fastToPage(fastPage);
		}
	}
}

window.onload = reloadWindow;
window.onresize = reloadWindow;

window.addEventListener('popstate', function(e) {
	isBack = true;
	goToPage(e.state);
}, false);

history.pushState(-1, null, "/");
</script>

</head>
<body onmousemove="checkMouseInSection(event)"
	onmousedown="md(event, 1);" onmouseup="md(event, 0);"
	onclick="clickSection();">
	<div id="p_prldr">
		<div class="contpre">
		</div>
	</div>
	<div class="canvasContainer">
		<canvas class="canvas center" id="canvasdown"></canvas>
		<canvas class="canvas center" id="canvas"></canvas>
		<canvas class="canvas center" id="canvasactive"></canvas>
		<div class='ksb center' id='ksb'>
			<canvas class="canvas center" id="canvasup"></canvas>
			<h1 id="lights"><span>Общественное движение</span><br />Свет</h1>
			<img id="lightImg" src="/images/ksb rgba.png" width="<?echo $ksbwidth?>px"
				class='center'>
		</div>
	</div>
	<div class="section">
		Хочу<br />вступить
	</div>
	<div class="section">Контакты</div>
	<div class="section">События</div>
	<div class="section">
		Вопросы<br />и ответы
	</div>
	<div class="section">Материалы</div>
	<div class="section">Программа</div>
	<div class="section">Идеология</div>
	<div class="section">
		Кто мы<br />такие?
	</div>
	<div id="page"></div>
	<div id="ver">version 2.2.0</div>
	<div class='main' id='main'><a href='javascript:goToPage(-1);'>Главная</a></div>
</body>
<?php 
if (isset($_GET['page'])) {
	echo "<script>fastPage = ".$_GET['page'].";</script>";
	if ($_GET['page'] == 6) {
		if (isset($_GET['ideochap'])) {
			echo "<script>ideochap = ".$_GET['ideochap'].";</script>";
		}
	}
}
?>
</html>