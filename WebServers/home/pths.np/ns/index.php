<?php
require_once('common.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>NetSchool</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/auth.js"></script>
</head>
<body>
	<?php
	if ($loggedIn) {
		require_once("diary.php");
		?>
		<div class="wide">
			<a href="auth.php">Выйти</a>
			<?php
			loadDiary();
			?>
		</div>
		<?php
	} else {
	?>
	<form method="POST" id="auth" onsubmit="return authorize()" name="auth">
		<h1 id="title">NetSchool</h1>
		<input type="text" class="field top" name="login" placeholder="Логин" autofocus><br>
		<input type="password" class="field bottom" name="pass" placeholder="Пароль"><br>
		<button type="submit" name="btn">Войти в нетскул</button>
		<div class="msg-holder" id="auth-holder"></div>
	</form>
	<?php
	}
	?>
</body>
</html>