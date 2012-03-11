<?php
/**
 * ИСПОЛЬЗУЕТСЯ файл generate.php для генерации статистики
 */
require_once(__DIR__ . '/config/config_inv.php');
require_once(__DIR__ . '/config/const.php');
require_once(__DIR__.'/classes/mysql.inc.php');
require_once(__DIR__.'/classes/facestat.inc.php');
require_once(__DIR__.'/classes/users.inc.php');
require_once(__DIR__.'/classes/articles.inc.php');
require_once(__DIR__.'/classes/daystat.inc.php');
require_once(__DIR__.'/classes/const.inc.php');
$users=new _Users;
if(isset($_SESSION['user']))
	if($_SESSION['login']==$_COOKIE['login']&&$_SESSION['id']==$_COOKIE['id']){
		//$users=$_SESSION['user'];
		$users->init($_SESSION['id']);
		$_SESSION['auth']==false;
		if($users->login!=$_SESSION['login']) $users=new _Users;
		else $_SESSION['auth']==true;
	}
$facestat_overall=new _Facestat_overall;
$facestat_percent=new _Facestat_percent;
$facestat_top=new _Facestat_top;
$daystat=new _Daystat;
?>