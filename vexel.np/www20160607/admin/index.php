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
	<div class = "dadm">
	<h2 class="hadm">Списки</h2>
	<a class="adm" href="/admin/list/users.php">Список пользователей</a><br>
	<a class="adm" href="/admin/list/visitors.php">Список посетителей</a><br>
	<a class="adm" href="/admin/list/cats.php">Список категорий</a><br>
	<a class="adm" href="/admin/list/stuffs.php">Список товаров</a><br>
	<a class="adm" href="/admin/list/users.php">Список отзывов</a><br>
	<a class="adm" href="/admin/list/questions.php">Список вопросов</a><br>
	<a class="adm" href="/admin/list/users.php">Список заказов</a><br>
	<a class="adm" href="/admin/list/deliveries.php">Список доставок</a><br>
	</div>
	<div class = "dadm">
	<h2 class="hadm">Поиск</h2>
	<a class="adm" href="?">Поиск по пользователям</a><br>
	<a class="adm" href="?">Поиск по IP</a><br>
	<a class="adm" href="?">Поиск по товарам</a><br>
	<a class="adm" href="?">Поиск по отзывам</a><br>
	<a class="adm" href="?">Поиск по вопросам</a><br>
	<a class="adm" href="?">Общий поиск</a><br>
	</div>
	<div class = "dadm">
	<h2 class="hadm">Функции</h2>
	<a class="adm" href="?">Добавить категорию</a><br>
	<a class="adm" href="?">Добавить товар</a><br>
	<a class="adm" href="?">Добавить несколько товаров</a><br>
	<a class="adm" href="?">Найти пользователя</a><br>
	<a class="adm" href="?">Совершить доставку</a><br>
	<a class="adm" href="?"></a><br>
	</div>
	<div class = "dadm">
	<h2 class="hadm">Статистика</h2>
	<a class="adm" href="?">По пользователям</a><br>
	<a class="adm" href="?">По посетителям</a><br>
	<a class="adm" href="?">По товарам</a><br>
	<a class="adm" href="?">По времени</a><br>
	</div>
	<div class = "dadm">
	<h2 class="hadm">Страшные вещи</h2>
	<a class="adm" href="?">Закрыть доступ к сайту</a><br>
	<a class="adm" href="?">Закрыть доступ к админке</a><br>
	<a class="adm" href="?">Экспорт</a><br>
	<a class="adm" href="?">Перемещение информации</a><br>
	<a class="adm" href="?">Включить капчу</a><br>
	</div>
</body>
</html>