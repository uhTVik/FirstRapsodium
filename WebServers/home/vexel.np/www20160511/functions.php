<?php
function rediect($location) {
	echo "<script type='text/javascript'>";
	echo "window.location.href = '$location'";
	echo "</script>";
}
?>