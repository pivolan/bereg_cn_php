<?php
defined("_pEXEC") or die();
setlocale(LC_ALL, "UTF-8");
	include('const.php');
	include('func.php');
	include('classes/mysql.inc');
	include('classes/content.inc');
	include('classes/uri.inc');
	include('classes/orders.inc');
	include('classes/users.inc');
	include('classes/articles.inc');
	include('classes/category.inc');
	include('classes/subcat.inc');
	include('classes/links.inc');
	include('classes/news.inc');
	include('classes/pages.inc');
	include('classes/search.inc.php');
	session_start();
	$db_login="u178448";
	$db_pass="talliter3in";
	$db_host="u178448.mysql.masterhost.ru";
	$db_name="u178448_2";
	mysql_connect($db_host,$db_login,$db_pass) or die('cannot connect');
	mysql_select_db($db_name) or die('cannot select db');
	mysql_query('SET NAMES "utf8"');
	include('init.php');
?>