<?php
define('_pEXEC', 1);
$modules['news'] = true;

$title_text = "Поставки производственного оборудования из Китая";

ob_start("ob_gzhandler");
require_once dirname(__FILE__) . '/Twig/Autoloader.php';
Twig_Autoloader::register();
require_once("config/config_db.php");
session_start();
app_user::init_user_from_session();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array('debug' => true));
$context = array(
	'user' => $user
);
echo $twig->render('main_page.twig', $context);
ob_end_flush();