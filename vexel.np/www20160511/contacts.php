<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/contacts.css">
</head>
<body>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/default.php';
include $_SERVER ['DOCUMENT_ROOT'] . '/header-menu.php';
?>
<h1 class="h">Cвязаться с нами</h1>
	<div class="contactTypes">
		<div class="type">
			<h3>E-Mail</h3>
			<h4>Войти в почту и написать</h4>
			<div class="postbuttons">
				<img class="postbutton button" alt="Гугл"
					src="/images/contacts/post/gmail.png"> <img class="postbutton button"
					alt="Яндекс" src="/images/contacts/post/yand.png"> <img
					class="postbutton button" alt="МэйлРу" src="/images/contacts/post/mail.png">
			</div>
			<h4>
				<b>vexel@yandex.ru</b>
			</h4>
		</div>

		<div class="type">
			<h3>Социальные сети</h3>
			<div class="postbuttons">
				<img class="postbutton button" alt="ВКонтакте"
					src="/images/contacts/socnetworks/vk.png"> <img class="postbutton button"
					alt="Facebook" src="/images/contacts/socnetworks/fb.png"> <img
					class="postbutton button" alt="Одноклассники.ру"
					src="/images/contacts/socnetworks/ok.png">
			</div>
		</div>

		<div class="type">
			<h3>Мессенджеры</h3>
			<div class="postbuttons">
				<img class="postbutton button" alt="Telegram"
					src="/images/contacts/messengers/tgrm.png"> <img class="postbutton button"
					alt="WhatsApp" src="/images/contacts/messengers/wapp.png"> <img
					class="postbutton button" alt="Viber"
					src="/images/contacts/messengers/viber.png">
			</div>
		</div>

		<div class="type">
			<h3>Другие способы связи</h3>
			<div class="postbuttons">
				<img class="postbutton button" alt="Телефон"
					src="/images/contacts/others/mob.png"> <img class="postbutton button"
					alt="Skype" src="/images/contacts/others/skype.png"> <img
					class="postbutton button" alt="ICQ"
					src="/images/contacts/others/icq.png">
			</div>
		</div>
	</div>
	<div class="advice">
		<textarea wrap="soft"></textarea>
		<button type="button">Отправить</button>
	</div>
</body>
</html>