<?php
defined("_pEXEC") or die('not included');
$member = FALSE;
//$member = app_user::authOpenAPIMember();
if (($member !== FALSE) || (isset($_COOKIE['login']) && isset($_COOKIE['id']) && isset($_COOKIE['pass'])) && !isset($_SESSION['auth']) && !isset($_SESSION['user']))
{
	$login = $_COOKIE['login'];
	$pass = $_COOKIE['pass'];
	$id = is_numeric($_COOKIE['id']) ? $_COOKIE['id'] : 0;
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = mysql_query($sql) or header("location: index.php?act=error_auth");
	$line = mysql_fetch_array($result);

	if (($member !== FALSE) || ($_COOKIE['login'] == md5($line['login']) && ($_COOKIE['pass']) == $line['pass']))
	{
		$user = new app_user;
		if ($member['id'] == 5764292)
		{
			$_SESSION['id'] = 2;
		}
		else
		{
			$_SESSION['id'] = $line['id'];
		}
		$user->init();
		$_SESSION['user'] = $user;
		$_SESSION['auth'] = true;
	}

}
$_SESSION['http_refer'] .= ' \n ' . $_SERVER['HTTP_REFERER'] . ' \n ';
$content = (isset($content)) ? $content
		: "Деловые отношения с Китаем. Оборудование из Китая. Обучение в Китае. Перевод на Китайский. Экскурсии по заводам Китая";
$keywords = (isset($keywords2)) ? $keywords2 : $keywords;
//"Китай, Термопласт автоматы, термопластавтоматы, Оборудование, Заводы, производство, Литье, пластмассы, Экструзия, эксрузионные линии, Услуги по Китаю, экскурсии Китай. Оборудование из китая,поездки в китай,китайское оборудование,технологии китай,китай,конференции в китае,новые тенхоолгии,промышленно оборудование,станки из китая,оборудование из китая,термопластавтоматы,ТПА,экструдеры,экструзионные линии,пенополистирол экструзионный накатка и высадка,литьевые формы,экструзионные головы,литье под давлением,экструзия,стекломагниевый лист оборудование,услуги по китаю,термопластавтоматы из китая,переработка пластмасся,учеба в китае,товары из китая,деревопласт,оборудование для переработки отходов,экструдеры,СМЛ.";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>ООО "Берег" <?=empty($title_text) ? "" : "| $title_text"; ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<!--<base href="http://<?=$_SERVER[HTTP_HOST]?>/3/"> -->
	<meta http-equiv="Content-Style-Type" content="text/css"/>
	<link rel="shortcut icon" href="favicon.png" type="image/png"/>
	<meta name="description" content="<?=empty($title_text) ? $title_text : $content; ?>"/>
	<meta name="keywords" content="<?=empty($keywords) ? $title_text : $keywords; ?>"/>
	<meta name="verify-v1" content="jJqxLQ9GNjdm3bEziQI2m+7Yq+vWZf0TbBfWOrbJ3mU=">
	<meta name="google-site-verification" content="aywoGPqLjZJKNNYw9c26cuBvVNZeZSe-_SO7WCL967M"/>
	<meta name='a5b934010e06e34ad7d02dce56f425e2' content=''>
	<link rel="stylesheet" type="text/css" href="main.css"/>
	<script type="text/javascript" src="jquery-1.3.2.js"></script>
	<script type="text/javascript" src="jquery.lightbox.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery.lightbox-0.5.css" media="screen"/>

</head>