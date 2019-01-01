<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/userio.css">
<link rel="stylesheet" href="/css/auth.css">
</head>
<body>
<div class="back">
		<div class="main">
			<img class="close" alt="Выход" src="/images/exit.png"
				onclick="exit();" onmouseenter="exAct(this);" onmouseleave="exNorm(this);" width="20px">
			<h1 class='user'>Вход</h1>
			<span class='error'></span>
			<div class='user'>
				<form method="POST" action='javascript:login();'>
					<ul>
						<li class='prompt'><p>E-Mail:</p></li>
						<li class='input'><input type='email' name='email'
							placeholder='example@yandex.ru'></li>
					</ul>
					<ul>
						<li class='prompt'><p>Пароль:</p></li>
						<li class='input'><input type='password' name='pass'
							placeholder='password'></li>
					</ul>
					<ul id='submit'>
						<li class='prompt'><div style="border: 1px solid transparent;"></div></li>
						<li><input id='sButton' class='submit' type='submit' value='Войти'></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</body>
</html>