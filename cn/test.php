<?php
	define('_pEXEC',1);
	include('config/config.php');
	include('header.php');
	echo "<h1>Тестовая страница</h1>\n ";
	$cont=new app_content;
	$cont->create_db();
	$date=mktime();
	$post=array("title"=>"Новый документ $date","text"=>"Текст нового документа, <b>возможно</b> оформление",
	"date"=>"$date");
	$cont->add($post);
	$cont->one("id='1'");
	$post['parent']=1;
	$cont->add($post);
	$post['parent']=2;
	$cont->add($post);
	$cont->one("id='3'");
	$output.="id=$cont->id<br />";
	$output.="title=$cont->title<br />";
	$output.="name=$cont->name<br />";
	$output.="text=$cont->text<br />";
	$output.="date=$cont->date<br />";
	$output.="parent=$cont->parent<br />";
	$output.="parents=".$cont->parents[0]."<br />";
	echo $output;
?>