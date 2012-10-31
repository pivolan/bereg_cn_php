<?php
define('_pEXEC', 1);
$modules['news'] = true;
switch ($_SERVER['HTTP_HOST']) {
	case 'briket.bereg-cn.ru':
		$_GET['cat'] = 'Pererabotka_othodov';
		$_GET['subcat'] = 'Proizvodstvo_toplivnyh_briketovrerabotka_othodov';
		$_GET['article'] = 'Linijа_dljа_proizvodstva_toplivnyh_briketov_iz_opilok';
		$content = "Производство топливных брикетов, брикеты из опилок, линия для производства топливных брикетов.";
		$keywords2 = "Брикеты, топливные, брикет, опилок, из опилок, топливный брикет, брикет из опилок.";
		$modules['news'] = false;
		require('projects.php');
		die();
		break;
	default:
		break;
}
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
ob_start("ob_gzhandler");
require_once("config/config.php");
$title_text = "Поставки производственного оборудования из Китая";
require_once("header.php");
require_once("head.php");
require_once("left.php");
require_once("body.php");
require_once("main_content.php");
require_once("foot.php");
ob_end_flush();
?>