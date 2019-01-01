<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
if (got('cat')) {
	startMySQL();
	$query = mysql_query("SELECT subcats FROM cats WHERE id = \"".vgot('cat')."\"");
	$string = mysql_fetch_array ( $query );
	$subcatsarray = unserialize($string[0]);
	echo vgot('num') . "\n";
	foreach ($subcatsarray as $subcat) {
		echo "$subcat";
	}
}

if (got('getcats')) {
	startMySQL();
	$query = mysql_query ( "SELECT * FROM cats" );
	echo vgot('getcats') . "\n";
	while ( $string = mysql_fetch_array ( $query ) ) {
		echo "$string[1]";
	}
}
?>