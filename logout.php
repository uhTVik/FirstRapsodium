<?php
session_start ();
?>
<html>
<body>
<?php
if ($_GET ['act'] == "logout") {
	// сделать возможность выбора
	unset ( $_SESSION ['id'] );
	unset ( $_SESSION ['email'] );
	unset ( $_GET ['act'] );
}
?>
</body>
</html>