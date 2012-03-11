<?php
	define('_pEXEC',1);
	define('_Padmine',1);
	include("config.php");
	if($user->status!='superadmin')die('You are not ADMIN');
?>
<head>
	<title>ООО "Берег" Админка</title>
	<meta http-equiv="content-type"
		content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
    <link rel="stylesheet" type="text/css" href="main.css"/>

</head>
<?
	echo "Админка<br /><br />";
	$date=date("d.m.Y",mktime());
	$date_int=strtotime($date);
	$date_str=date("d.m.Y",$date_int);
	echo "<a href='index.php?a=news'>Новости</a><br />";
	echo "<a href='index.php?a=pages'>Страницы</a><br />";
	echo "<a href='index.php?a=linkleft'>Ссылки слева</a><br />";
	echo "<a href='index.php?a=users'>Пользователи</a><br />";
	echo "<a href='index.php?a=articles'>Articles</a><br />";
	echo "<a href='index.php?a=category'>Категории</a><br />";
	echo "<a href='index.php?a=subcat'>Подкатегории</a><br />";
	echo "<br />\n";
	if($_GET['a']!='')include($_GET['a'].".php");
	echo "<br><a href='index.php'>Главная</a><br />";
?>