<?php
	session_start();
	$db_login="u178448";
	$db_pass="talliter3in";
	$db_host="u178448.mysql.masterhost.ru";
	$db_name="u178448_inv";
	mysql_connect($db_host,$db_login,$db_pass);
	mysql_select_db($db_name);
	mysql_query('SET NAMES "utf8"');
?>