<?php
	defined('_Padmine') or die('not included');
	include('../config/const.php');
	include('../config/func.php');
	include('../classes/mysql.inc');
	include('../classes/users.inc');
	include('../classes/category.inc');
	include('../classes/subcat.inc');
	include('../classes/links.inc');
	include('../classes/articles.inc');
	session_start();
	$db_login="u178448";
	$db_pass="talliter3in";
	$db_host="u178448.mysql.masterhost.ru";
	$db_name="u178448_2";
	mysql_connect($db_host,$db_login,$db_pass);
	mysql_select_db($db_name);
	mysql_query("SET NAMES 'utf8'");
	include('../config/init.php');
?>