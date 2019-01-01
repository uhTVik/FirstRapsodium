<?php
session_start ();
?>
<html>
<body>
<?php
if ($_GET ['act'] == "login") {
	include $_SERVER ['DOCUMENT_ROOT'] . '/auth.php';
} else if ($_GET ['act'] == "reg") {
	include $_SERVER ['DOCUMENT_ROOT'] . '/reg.php';
} else if ($_GET ['act'] == "logout") {
	include $_SERVER ['DOCUMENT_ROOT'] . '/logout.php';
} else if ($_GET ['act'] == "info") {
	include $_SERVER ['DOCUMENT_ROOT'] . '/info.php';
}
?>
</body>
</html>