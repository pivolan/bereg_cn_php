<?php
define( '_pEXEC', 1 );
	include("config/config.php");
	include("header.php");
	include("head.php");
	include("left.php");
	include("body.php");
?>
<?php
	echo "<h1> Поиск </h1>";
	echo "<p>Результаты по запросу <b>$_POST[search]</b></p>";
	if(mb_strlen($_POST['search'],'UTF-8')>=2){
		$search=new app_search;
		$search->init($_POST['search']);
		//$search->show_news_title();
		echo $search->show_news_text();
		$search->show_pages_title();
		echo $search->show_pages_text();
		$search->show_cat();
		$search->show_subcat();
		$search->show_article_title();
		echo $search->show_article_text();
	}else{
		echo "<p>Ошибка: количество символов должно быть более 1</p>";
?>
      <div>
        <form name="search" action="search.php" method="POST" >
          <input name="search" type="text" value="">
          <input type="submit" name="search_button" value="Поиск">
        </form>
      </div>

<?
	}
?>
<?php
	include("foot.php");
?>