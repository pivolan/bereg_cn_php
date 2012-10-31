<?php

defined("_pEXEC") or die();
setlocale(LC_ALL, "UTF-8");
function __autoload($class_name)
{
	$path = dirname(__FILE__) . '/../' . str_replace('_', '/', $class_name) . '.php';
	require_once($path);
}

include('config_db.php');
/*
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
include('classes/search.inc.php');*/
session_start();
$user = null;
app_user::init_user_from_session();
