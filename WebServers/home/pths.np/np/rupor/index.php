<html>
<head>
</head>
<body>
<?php
if (isset($_GET['word'])) {
	$out = array();
	$word = $_GET['word'];
	$hregexp = "/[Б-ДЖЗЙ-НП-Т-Ф-ЪЬб-джзй-нп-т-ф-ъь]*[АЕЁИОУЫЭЮЯаеёиоуыэюя]([б-джзй-нп-т-ф-ъь]*$)?/u";
	preg_match_all($hregexp, $word, $out, PREG_PATTERN_ORDER);
	$rand = rand(0, sizeof($out[0]) - 1);
	$randTo1 = rand(0, 1) == 0;
	$rand1 = rand(0, sizeof($out[0]) - 1);
	if ($rand == $rand1) {
		$randTo1 = false;
	}
	if ($randTo1) {
		if ($rand > $rand1) {
			$exword = $out[0][$rand1] . $out[0][$rand];
		} else {
			$exword = $out[0][$rand] . $out[0][$rand1];
		}
		$what1 = 'что';
		if ($rand1 != 0 && $rand1 != $rand + 1) {
			$what1 = "-" . $what1;
		}
		if ($rand1 != sizeof($out[0]) - 1 && $rand1 != $rand - 1) {
			$what1 .= "-";
		}
		if ($rand == $rand1 + 1 || $rand == $rand1 - 1) {
			$what1 = '';
		}
		$out[0][$rand1] = $what1;
	} else {
		$exword = $out[0][$rand];
	}
	$what = 'что';
	if ($rand != 0 && !($randTo1 && $rand1 == 0 && $rand == 1)) {
		$what = "-" . $what;
	}
	if ($rand != sizeof($out[0]) - 1 && !($randTo1 && $rand1 == sizeof($out[0]) - 1 && $rand == sizeof($out[0]) - 2)) {
		$what .= "-";
	}
	$out[0][$rand] = $what;
	echo 'Вопрос: <b>';
	for ($i = 0; $i < sizeof($out[0]); $i++) {
		echo $out[0][$i];
	}
	echo "?</b><br>Ответ: <b>" . $exword . "</b>";
}

?>
<form action="/rupor/" method="get">
<input type="text" name="word">
<br>
<button type="submit">Use Rupor-Gitara!</button>
</form>
</body>
</html>