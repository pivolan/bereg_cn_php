<?php
	define( '_pEXEC', 1 );
	$modules['news']=true;
/*
	define('PATH_BASE', dirname(__FILE__) );
	define('URL_BASE', dirname(__FILE__) );

	define( 'DS', DIRECTORY_SEPARATOR );

	$_URL = preg_replace("/^(.*?)index\.php$/is", "$1", $_SERVER['SCRIPT_NAME']);
	$_URL = preg_replace("/^".preg_quote($_URL, "/")."/is", "", urldecode($_SERVER['REQUEST_URI']));
	$_URL = preg_replace("/(\/?)(\?.*)?$/is", "", $_URL);
	$_URL = preg_replace("/[^0-9A-Za-z._\\-\\/]/is", "", $_URL); // вырезаем ненужные символы (не обязательно это делать)
	$_URL = explode("/", $_URL);
	if (preg_match("/^index\.(?:html|php)$/is", $_URL[count($_URL) - 1])) unset($_URL[count($_URL) - 1]); // удаляем суффикс
	*/

	require_once("config/config.php");
	require_once("header.php");
	require_once("head.php");
	require_once("left.php");
	require_once("body.php");
	require_once("main_content.php");
	require_once("foot.php");
?>