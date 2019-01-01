<?php

function sot($str) {
	if (isset($_POST[$str]) && $_POST[$str] != "") {
		return true;
	}
	return false;
}

function enough() {
	$b = true;
	$b &= sot("a") && sot("b");
	return $b;
}
if (sot("asked") && enough()) {
	echo "ok||";
	$mail = $_POST['a'] . " | " . $_POST['b'];
	mail("lightwinsmail@gmail.com", "Вопрос", $mail);
	?>
	<h3>Большое спасибо, ваш вопрос отправлен в систему. Мы скоро ответим на него.</h3>
	<br>
	<?php
} else {
echo "ok||";
?>		

<form id='askf' action="javascript:ask(document.getElementById('askf'));">
<input type="hidden" name="asked" value="1">
<div>
	Имя и фамилия:<br>
	<input autocomplete="off" type="text" name="a"><br>
	<p>Ваш вопрос</p>
	<textarea class='c1' name="b" cols="80" rows="5"></textarea>
</div>

<button type="submit" id='submit'>Задать вопрос</button>
</form>

<?php } ?>

<div class='center error'>Нам ещё не задали ни одного вопроса<br>

<!--
		К сожалению, задавать вопросы через форму сейчас невозможно.<br>
		Чтобы задать вопрос, воспользуйтесь разделом <a href='javascript:goToPage(1);'>контактов</a>
-->
		
</div><script>center();</script>

||Вопросы и ответы