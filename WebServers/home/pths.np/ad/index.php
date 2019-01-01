<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>

<html>
<head>

<title>Антидискач ФТШ</title>

<script type="text/javascript">
window.history.pushState("", "", "/");
</script>

<style type="text/css">

html {
	width: 100%;
	height: 100%;
}

body {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
}

div.kame {
	background: url(/11.png) center;
	background-size: 4%;
	width: 100%;
	height: inherit;
}

div.kkame {
	background: rgba(0, 0, 0, 0.4);
	width: 100%;
	height: inherit;
	display: flex;
	justify-content: center;
	align-items: center;
}

div.kkame2 {
	background: rgba(20, 0, 0, 0.7);
	width: 100%;
	height: inherit;
	display: flex;
	justify-content: center;
	align-items: center;
}

div.kkame3 {
	padding: 0 50px;
	font: 20pt 'Garamond';
	background: rgba(255, 255, 255, 0.7);
	display: flex;
	justify-content: center;
	align-items: center;
}

a {
	color: blue;
	text-decoration: none;
}

input {
	background: rgba(255, 255, 255, 0.7);
	width: 600px;
	height: 100px;
	border: 1px solid #eee;
	font: 50pt 'Garamond';
	outline: none;
	text-align: center;
}

</style>

</head>
<body>
<div class='kame'>

<?php

$req = $_GET['req'];

if (isset($req)) {
	if($req == "песенки" || $req == "Песенки") {
		include '/texts.php';
	} else if($req == "когда" || $req == "Когда" || $req == "when" || $req == "When") {
		?>
		<script type="text/javascript">
			location.href = "https://docs.google.com/spreadsheets/d/1XhPYj5QIPb1os-K6RI__8j0gDXtvpg6qB1zNh08-Tt0/edit";
		</script>
		<?php
	} else if($req == "документ" || $req == "Документ") {
		?>
		<script type="text/javascript">
			location.href = "https://docs.google.com/document/d/1XFYit8WYWq2VktZXWEdLVAQmhCqH7XmEJnVMIQK6viE/edit";
		</script>
		<?php
	}
	
} else {

?>
		<div class='kkame'>
			<form method="get">
				<input type="text" name="req" autofocus="autofocus"
					autocomplete="off">
			</form>
		</div>
	</div>

<?php
}
?>

</body>
</html>