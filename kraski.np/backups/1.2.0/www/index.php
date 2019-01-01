<?php
session_start();
?>
<html lang="ru">
<head>
	<meta charset="UTF-8">
    <script type="text/javascript">
        var goToPage = 'main';
        <?php
        $page = $_GET['page'];
        if (isset($page)) {
            echo "goToPage = '$page';";
        }
        ?>
    </script>
	<script type="text/javascript" src="/js/main.js"></script>
	<link rel="stylesheet" href="/main.css">
	<title>Краски Чувашии</title>
</head>
<body>
<div id="back-l"></div>
<div id="back-r"></div>
<div id='top'>
	<div class='top-div' id='top-logo'>
		<a href="/index.php"><img src="/images/logo-kraski.png" alt="main logo"></a>
		<h3>#КраскиЧувашии</h3>
	</div>
	<div class='top-div' id='top-name-and-info'>
		<div>
			<h2>Всероссийский конкурс</h2>
			<h1>«Краски Чувашии»</h1>
		</div>
		<div id='top-info'>
			<h3>18 участников</h3>
			<div>
				<a href="https://vk.com/kraski_chuvashia"><img src="/images/contacts/vk.png" alt="VK"></a> <a
					href="https://www.facebook.com/kraskikonkurs"><img
					src="/images/contacts/fb.png" alt="FB"></a> <a
					href="https://www.instagram.com/kraski_chuvashia/"><img
					src="/images/contacts/inst.png" alt="INST"></a>
			</div>
		</div>
	</div>
	<div class='top-div switch-box' id='top-switch-box'>
		<img class='switch go-left' src="/images/go-left.png" alt="left">
		<div class='switch-div'>
			<img src="/images/competition/feofanova.png" alt="photo"> <span>Охрименко&nbsp;Алиса,
					п.&nbsp;Кандалакша, 13&nbsp;лет</span>
		</div>
		<img class='switch go-right' src="/images/go-right.png" alt="right">
	</div>
</div>
<div id="main">
	<div id="main-left">
		<ul class="menu menu-v" id="ul-left">
			<li class="join" onclick="go('join')">Принять участие</li>
			<li onclick="go('about');">О конкурсе</li>
			<li onclick="go('chuvashia');">О Чувашии</li>
			<li onclick="go('news');">Наши новости</li>
		</ul>
	</div>
	<div id="main-right">
		<ul class="menu menu-h" id="ul-right">
			<li onclick="go('main');">Галерея</li>
			<li onclick="go('team');">Команда проекта</li>
			<li onclick="go('partners');">Партнеры</li>
			<li onclick="go('contacts');">Контакты</li>
		</ul>

		<div id="page">

		</div>
	</div>

</div>
<div id="bottom">
	© «Краски Чувашии» — 2018<br> Полное или частичное
	копирование материалов запрещено, при согласованном копировании ссылка
	на ресурс обязательна.
</div>
</body>
</html>