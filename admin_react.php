<?php
	define("_pEXEC",1);
	require_once("config/config.php");
	if($user->status!='admin'&&$user->status!='superadmin')header("location:index.php") or die();
	switch($_POST['act']){
		case 'deletefeedback':
			if($user->status=='superadmin')
			mysql_query("DELETE FROM feedback WHERE id='$_POST[id]' LIMIT 1") or die('false');
			else die('false');
			echo 'true';
		break;
		case 'pages':
			$pages=new app_page;
			$_SESSION['error']=$pages->update($_POST);
			header("location:admin.php") or die();
		break;
		case 'app_article':
			$article=new app_article;
			$_SESSION['error']=$article->update($_POST);
			header("location:admin.php") or die();
		break;
		case 'cat':
			$article=new app_category;
			$_SESSION['error']=$article->update($_POST);
			header("location:admin.php") or die();
		break;
		case 'subcat':
			$article=new app_subcat;
			$_SESSION['error']=$article->update($_POST);
			header("location:admin.php") or die();
		break;
		case 'news':
			$news=new app_new;

			$news->add($_POST);
			header("location:$_SERVER[HTTP_REFERER]") or die();
		break;
		default:header("location:admin.php?error");break;
	}
?>