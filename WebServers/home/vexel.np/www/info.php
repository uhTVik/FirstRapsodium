<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/userio.css">
<link rel="stylesheet" href="/css/info.css">
</head>
<body>
<div class="back">
		<div class="main">
			<img class="close" alt="Выход" src="/images/exit.png"
				onclick="exit();" onmouseenter="exAct(this);" onmouseleave="exNorm(this);" width="20px">
			<h1 class='user userh1'>Информация о заказе</h1>
			<span class='error'></span>
			<div class='user userdiv'>
				<form method="POST" action='javascript:getinfo();'>
					<ul>
						<li class='prompt'><p>E-Mail:</p></li>
						<li class='input'><input type='email' name='email'
							placeholder='example@yandex.ru'></li>
					</ul>
					<ul>
						<li class='prompt'><p>Номер заказа:</p></li>
						<li class='input'><input type='text' name='order'
							placeholder='password'></li>
					</ul>
					<ul id='submit'>
						<li class='prompt'><div style="border: 1px solid transparent;"></div></li>
						<li><input id='sButton' class='submit' type='submit' value='Войти'></li>
					</ul>
				</form>
			</div>
			<p><a href="/profile/?page=1">Все заказы</a></p>
		</div>
	</div>
</body>
</html>