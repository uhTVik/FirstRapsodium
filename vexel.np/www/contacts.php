<?php
session_start ();
?>
<html>
<head>
<link rel="stylesheet" href="/css/contacts.css">
<script type="text/javascript">
function testNewMessField(field) {
	adviceTop = document.getElementsByClassName('adviceTop')[0];
	adviceTop.style.background = '#f0f0f0';
	//adviceTop.style.background = '#f0fff0';
	zeroMessage = document.getElementsByClassName('zeroMessage')[0];
	zeroMessage.style.display = 'none';
	if (field.innerHTML.length == 0) {
		field.className = "newMessField newMessFieldEMPTY";
	} else {
		field.className = "newMessField";
	}
}
</script>
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
			<h4 style="margin: 0; padding: 0;"></h4>
			<div class="postbuttons">
				<a target='_blank' href='http://gmail.com'><img class="postbutton button" alt="Гугл"
					src="/images/contacts/post/gmail.png"></a> <a target='_blank' href='http://mail.yandex.ru'><img class="postbutton button"
					alt="Яндекс" src="/images/contacts/post/yand.png"></a> <a target='_blank' href='http://mail.ru'><img
					class="postbutton button" alt="МэйлРу" src="/images/contacts/post/mail.png"></a>
			</div>
			<div class="postnames">
				<p>Gmail</p>
				<p>Yandex</p>
				<p>Mail.ru</p>
			</div>
			<h4 class='bottomh4'>
				vexel@yandex.ru
			</h4>
		</div>

		<div class="type">
			<h3>Телефон</h3>
			<h4 style="margin: 0; padding: 0;"></h4>
			<div class="postbuttons">
				<img class="postbutton button" alt="Телефон"
					src="/images/contacts/others/mob.png">
			</div>
			<div class="postnames">
				<p>Заказать звонок или позвонить</p>
			</div>
			<h4 class='bottomh4'>
				+7 921 947-56-87
			</h4>
		</div>

		<div class="type">
			<h3>Социальные сети</h3>
			<h4 style="margin: 0; padding: 0;"></h4>
			<div class="postbuttons">
				<a target='_blank' href='http://vk.com/vexelspb'><img class="postbutton button" alt="ВКонтакте"
					src="/images/contacts/socnetworks/vk.png"></a> <a target='_blank' href='http://facebook.com'><img class="postbutton button"
					alt="Facebook" src="/images/contacts/socnetworks/fb.png"></a> <a target='_blank' href='http://ok.ru'><img
					class="postbutton button" alt="Одноклассники.ру" src="/images/contacts/socnetworks/ok.png"></a>
			</div>
			<div class="postnames">
				<p>ВКонтакте</p>
				<p>Facebook</p>
				<p>OK.ru</p>
			</div>
			<h4 class='bottomh4' style="margin: 0; padding: 0;">.../vexelspb</h4>
		</div>

		<div class="type">
			<h3>Мессенджеры</h3>
			<h4 style="margin: 0; padding: 0;"></h4>
			<div class="postbuttons">
				<a target='_blank' href='http://web.telegram.org/#/im?p=@vexelspb'><img class="postbutton button" alt="Telegram"
					src="/images/contacts/messengers/tgrm.png"></a> <a target='_blank' href='http://web.whatsapp.com'>
					<img class="postbutton button" alt="WhatsApp" src="/images/contacts/messengers/wapp.png"></a>
					<a target='_blank' href='http://web.skype.com'> <img class="postbutton button" alt="Skype" 
					src="/images/contacts/others/skype.png"></a>
			</div>
			<div class="postnames">
				<p>Telegram</p>
				<p>WhatsApp</p>
				<p>Skype</p>
			</div>
			<h4 class='bottomh4' style="margin: 0; padding: 0;">vexelspb</h4>
		</div>
	</div>
	<div class="advice">
		<div class="adviceTop">
			<h3>Онлайн-консультация</h3>
		</div>
		<h4 class='zeroMessage'>Для связи со специалистом наберите текст в окне ввода и нажмите кнопку &laquo;Отправить&raquo;. 
		Вам ответят в течение 15-30 минут.</h4>
		<div class="newMessField newMessFieldEMPTY" contenteditable="true" oninput="testNewMessField(this);"></div>
		<img class="send" alt="Отправить" src="/images/grl_r.png">
	</div>
</body>
</html>