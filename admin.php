<?php
	define("_pEXEC",1);
	require_once("config/config.php");
	$title_text="Админка";
	if($user->status!='admin'&&$user->status!='superadmin')header("location:index.php") or die();
	require_once("header.php");
	require_once("head.php");
	require_once("left.php");
	require_once("body.php");
?>
<link rel="stylesheet" href="admin.css" type="text/css">
<script type="text/javascript" src="jquery.form.js"></script>
	<h2><a href="admin.php">Админка</a></h2>
<?
	if(isset($_SESSION['error'])){
		echo "<p>$_SESSION[error]</p>";
		unset($_SESSION['error']);
	}
	switch($_GET['act']){
		case 'pages':{
			$pages=new app_page;
			$title="Страницы";
			if(isset($_GET['id'])){
				$pages->initelse("id='$_GET[id]'");
				$pages->one();
				include_once('forms/pageedit.php');
			}else{
				$pages->initelse("id!=''");
				include('forms/pagelist.php');
			}
		}break;
		case 'app_article':{
			$title='Все материалы';
			$article=new app_article;
			if(isset($_GET['delete'])&&isset($_GET['id'])&&$user->status=='superadmin'){
				$article->deleteid($_GET['id']);
			}
			if(isset($_GET['id'])){
				$article->initelse("id='$_GET[id]'");
				$article->one();
				if($article->active=='on')$checked='checked';
				else $checked='';
				include_once('forms/articleedit.php');
			}else{
				if(isset($_GET['subcat']))$article->initelse("subcat='$_GET[subcat]'");
				else $article->init();
				include('forms/articlelist.php');
			}
		}break;
		case 'cat':{
			$title="Категория";
			$article=new app_category;
			if(isset($_GET['delete'])&&isset($_GET['id'])&&$user->status=='superadmin'){
				$article->deleteid($_GET['id']);
			}
			if(isset($_GET['id'])){
				$article->initelse("id='$_GET[id]'");
				$article->one();
				if($article->active=='on')$checked='checked';
				else $checked='';
				include_once('forms/articleedit.php');
			}
		}break;
		case 'subcat':{
			$title="Подкатегория";
			$article=new app_subcat;
			if(isset($_GET['delete'])&&isset($_GET['id'])&&$user->status=='superadmin'){
				$article->deleteid($_GET['id']);
			}
			if(isset($_GET['id'])){
				$article->initelse("id='$_GET[id]'");
				$article->one();
				if($article->active=='on')$checked='checked';
				else $checked='';
				include_once('forms/articleedit.php');
			}
		}break;
		case 'news':{
			$title="Новости";
			$news=new app_new;
			if(isset($_GET['delete'])&&isset($_GET['id'])){
				$news->deleteid($_GET['id']);
			}
			$news->init();
			include("forms/newsadd.php");
		}break;
		default:
			include("forms/admin_form.php");
		break;
	}
	require_once("foot.php");
?>
<script type="text/javascript" src="admin.js"></script>