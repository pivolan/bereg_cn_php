<?php
	define( '_pEXEC', 1 );
	require_once("config/config.php");
	#if($user->status!='superadmin')die('You are not ADMIN');
	$art=new app_article;
	$Category = new app_category;
	$Content =new app_content;
	$Linksleft = new app_menuLeft;
	$News = new app_new;
	$Pages = new app_page;
	$Subcat = new app_subcat;
	$Users = new app_user;
	$Orders = new app_order;

	$art->create_db();
	echo 1;
	$Category->create_db();
	echo 2;
	$Content->create_db();
	echo 3;
	$Linksleft->create_db();
	echo 4;
	$News->create_db();
	echo 5;
	$Pages->create_db();
	echo 6;
	$Subcat->create_db();
	echo 7;
	$Users->create_db();
	$Orders->create_db(); 
	echo "8<br> all good";	
?>