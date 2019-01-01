<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/admin/indexAdmin.css">
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/admin/admin-menu.php';
?>
<h1 class="hadm">Админка</h1>
<p class="padm">Похоже, ты попал в админку сайта! Это значит, что у
	тебя есть доступ к данным пользователям (E-Mail, ФИО, hash от пароля, заказы, платежи), 
	к данным о товарах, ко всякой статистике, которую я на данный момент не реализовал, 
	и к прочей информации. Это значит, что ты можешь изменять данные и редактировать 
	любые странички. А ещё это значит, что ты можешь поломать сайт, поэтому советую тебе 
	быть очень аккуратным :)</p>
<div class="dadms">
	<div class = "dadm">
	<h2 class="hadm">Списки</h2>
	<a class="adm" href="/admin/list/users.php">Пользователи</a><br>
	<a class="adm" href="/admin/list/visitors.php">Посетители</a><br>
	<a class="adm" href="/admin/list/cats.php">Категории</a><br>
	<a class="adm" href="/admin/list/stuffs.php">Товары</a><br>
	<a class="adm nowrk" href="/admin/list/comments.php">Отзывы</a><br>
	<a class="adm nowrk" href="/admin/list/questions.php">Вопросы</a><br>
	<a class="adm nowrk" href="/admin/list/requests.php">Заказы</a><br>
	<a class="adm nowrk" href="/admin/list/deliveries.php">Доставки</a><br>
	</div>
	<div class = "dadm">
	<h2 class="hadm">Поиск</h2>
	<a class="adm nowrk" href="?">Искать по пользователям</a><br>
	<a class="adm nowrk" href="?">Искать по IP</a><br>
	<a class="adm nowrk" href="?">Искать по товарам</a><br>
	<a class="adm nowrk" href="?">Искать по отзывам</a><br>
	<a class="adm nowrk" href="?">Искать по вопросам</a><br>
	<a class="adm nowrk" href="?">Общий поиск</a><br>
	</div>
	<!--
	<div class = "dadm">
	<h2 class="hadm">Функции</h2>
	<a class="adm" href="?">Добавить категорию</a><br>
	<a class="adm" href="?">Добавить товар</a><br>
	<a class="adm" href="?">Добавить несколько товаров</a><br>
	<a class="adm" href="?">Найти пользователя</a><br>
	<a class="adm" href="?">Совершить доставку</a><br>
	<a class="adm" href="?"></a><br>
	</div>
	-->
	<div class = "dadm">
	<h2 class="hadm">Статистика</h2>
	<a class="adm nowrk" href="?">По пользователям</a><br>
	<a class="adm nowrk" href="?">По посетителям</a><br>
	<a class="adm nowrk" href="?">По товарам</a><br>
	<a class="adm nowrk" href="?">По времени</a><br>
	</div>
	<div class = "dadm">
	<h2 class="hadm">Страшные вещи</h2>
	<a class="adm nowrk" href="?">Закрыть доступ к сайту</a><br>
	<a class="adm nowrk" href="?">Закрыть доступ к админке</a><br>
	<a class="adm nowrk" href="?">Экспорт</a><br>
	<a class="adm nowrk" href="?">Перемещение информации</a><br>
	<a class="adm nowrk" href="?">Включить капчу</a><br>
	</div>
</div>
</body>
</html>