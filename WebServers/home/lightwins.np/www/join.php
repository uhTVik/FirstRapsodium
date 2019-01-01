<?php
function sot($str) {
	if (isset($_POST[$str]) && $_POST[$str] != "") {
		return true;
	}
	return false;
}

function enough() {
	$b = true;
	$b &= sot("d1") && sot("d2") && (sot("d3") || sot("d4")) && (sot("d5") || sot("d6"));
	$b &= sot("c1") && sot("e1");
	return $b;
}

if (sot("joined") && enough()) {
	$act = array("Повсюду искать сторонников",
			"Оказывать материальную поддержку",
			"Участвовать в наших проектах и мероприятиях",
			"Создавать материалы для движения");
	
	$nav = array("Программист",
					"Дизайнер / художник",
					"3D-моделист",
					"Фотограф",
					"Видеооператор / видеомонтажёр",
					"Водитель транспортных средств",
					"Копирайтер / Автор и редактор текстов / Писатель",
					"Хорошая физическая подготовка",
					"Юрист / адвокат",
					"Знание иностранных языков",
					"Оратор",
					"Журналист",
					"Блогер / видеоблогер",
					"PR / специалист по продвижению",
					"Музыкант / актёр",
					"Свой бизнес / организация",
					"Значительные материальные возможности");
	
	echo "ok||";
	$mail = "ФИО: ". $_POST['d1'] . "\n" .
			"Дата рождения:: ". $_POST['d2'] . "\n" .
			"Страна: ". $_POST['d3'] . "\n" .
			"Город, район, иной населенный пункт: ". $_POST['d4'] . "\n" .
			"Ссылка на профиль ВКонтакте или в других соцсетях: ". $_POST['d6'] . "\n" .
			"E-mail: ". $_POST['d5'] . "\n";
	for ($i = 1; $i < 5; $i++) {
		$name1 = "b$i";
		if ($_POST[$name1] == "YES") {
			$mail .= "Активность: " . $act[$i - 1] . " \n";
		}
	}
	for ($i = 1; $i < 18; $i++) {
		$name1 = "a$i";
		if ($_POST[$name1] == "YES") {
			$mail .= "Навык: " . $nav[$i - 1] . " \n";
		}
	}
	$mail .= "Другие навыки: " . $_POST['a18'] . "\n";
	$mail .= "Свет понравился, потому что: " . $_POST['c1'] . "\n";
// 	echo $mail;
	mail("lightwinsmail@gmail.com", "Заявка", $mail);
	?>
	<h3>Большое спасибо, ваша заявка принята. Мы скоро свяжемся с вами.</h3>
	<br>
	<p><a href='javascript:goToPage(-1);'>На главную</a></p>
	<?php
} else {
echo "ok||";
?>
<h2>Вступить в Свет</h2>
<h3>Если вы хотите присоединиться к нам, расскажите немного о себе: заполните, пожалуйста, анкету ниже.</h3>
<form id='joinf' action="javascript:join(document.getElementById('joinf'));">
<input type="hidden" name="joined" value="1">
<div>
	Имя и фамилия:<br>
	<input autocomplete="off" type="text" name="d1"><br>
	Дата рождения:<br>
	<input autocomplete="off" type="text" name="d2"><br>
	Страна:<br>
	<input autocomplete="off" type="text" name="d3"><br>
	Город, район, иной населенный пункт:<br>
	<input autocomplete="off" type="text" name="d4"><br>
	Ссылка на профиль ВКонтакте или в других соцсетях:<br>
	<input autocomplete="off" type="text" name="d6"><br>
	E-mail (необязательно):<br>
	<input autocomplete="off" type="text" name="d5"><br>
</div>

<div>
	<p>Как вы желаете участвовать в деятельности движения:</p>
	<input type="checkbox" name="b1">Повсюду искать сторонников, вести распространение идей и приглашение новых участников<br>
	<input type="checkbox" name="b2">Оказывать материальную поддержку<br>
	<input type="checkbox" name="b3">Участвовать в наших проектах и мероприятиях<br>
	<input type="checkbox" name="b4">Создавать материалы для движения (статьи, арты, плакаты, видео)<br>
</div>

<div>
	<p>Ваши навыки (профессия, специальность)</p>
	<input type="checkbox" name="a1">Программист<br>
	<input type="checkbox" name="a2">Дизайнер / художник<br>
	<input type="checkbox" name="a3">3D-моделист<br>
	<input type="checkbox" name="a4">Фотограф<br>
	<input type="checkbox" name="a5">Видеооператор / видеомонтажёр<br>
	<input type="checkbox" name="a6">Водитель транспортных средств<br>
	<input type="checkbox" name="a7">Копирайтер / Автор и редактор текстов / Писатель<br>
	<input type="checkbox" name="a8">Хорошая физическая подготовка<br>
	<input type="checkbox" name="a9">Юрист / адвокат<br>
	<input type="checkbox" name="a10">Знание иностранных языков<br>
	<input type="checkbox" name="a11">Оратор<br>
	<input type="checkbox" name="a12">Журналист<br>
	<input type="checkbox" name="a13">Блогер / видеоблогер<br>
	<input type="checkbox" name="a14">PR / специалист по продвижению<br>
	<input type="checkbox" name="a15">Музыкант / актёр<br>
	<input type="checkbox" name="a16">Свой бизнес / организация<br>
	<input type="checkbox" name="a17">Значительные материальные возможности<br>
	Другое:
	<input autocomplete="off" type="text" name="a18">
</div>

<div>
	<p>Опишите, почему вам понравился Свет?</p>
	<textarea class='c1' name="c1" cols="80" rows="5"></textarea>
</div>

<div>
	<input type="checkbox" name="e1" onchange="disableSubmit(this)"> Даю согласие на обработку персональных данных, 
	согласно ФЗ от 27.07.06 №152-ФЗ и <a href="/conf" target="_blank">политике конфиденциальности</a>. Персональные данные 
	сторонников Света относятся к сведениям конфиденциального характера. 
	Лица, имеющие доступ к данной информации не имеют права осуществлять 
	обработку персональных данных в нарушение требований, установленных
	Федеральным законом «О персональных данных»
</div>

<button type="submit" id='submit' disabled="disabled">Вступить</button>
</form>
<?php } ?>
||Хочу вступить