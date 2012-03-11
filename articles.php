<?php
	define( '_pEXEC', 1 );
	define( '_Project', 1 );
	$modules['tree']=true;
	ob_start("ob_gzhandler");
	$title1="Статьи";
	$title="Статьи";
	$url="articles.php";
	include("config/config.php");
//	$art=new app_article;
//	$art->create_db();
	$article=new app_article;
	if(!empty($_GET['article'])){
		$article->one($_GET['article']);
		$keywords=$article->title;
		$title_text=$article->title;
	}
	$ad='nomore';
	include("header.php");
	include("head.php");
	include("left.php");
	include("body.php");

//	$art->first_start();
//	unset($art);
//	$cat->create_db();
//	$cat->first_start();
	$subcat=new app_subcat;
	$link=new app_menuLeft;
	$cat->reset1();
	if(empty($_GET['cat'])){
		echo "<h1>$title</h1>";
		$link->initelse("title='$title'");
		$article=new app_subcat;
		echo "<p>$link->text</p>\n ";
		echo "<table class='equip' cellpadding='0' cellspacing='0'>";
		echo "<tr class='row2'><td class='t-auth' style='text-align:center;'>&nbsp;</td><td class='t-post' style='text-align:center;'>Категория</td></tr>";
		while($cat->one()==true){
			$article->initelse("parent='$cat->name' AND active='on'");
			if($cat->active=='on'){
				$odd=($odd===1)?2:1;
				echo "
				<tr class='row$odd'>
					<td class='t-auth'>$cat->icon</td>
					<td class='t-post'> <a href='$cat->url'>$cat->title</a> <i>(".$article->num().")</i><div>$cat->text</div></td>
				</tr>";
			}
		}
		echo "</table>";
	}
	if(isset($_GET['article'])&&isset($_GET['cat'])&&isset($_GET['subcat'])){
		$article=new app_article;
		$article->one($_GET['article']);
		$cat->one($_GET['cat']);
		$subcat->one($_GET['subcat']);
		echo "<span class='h1'><a href='$url'>$title</a></span>=> ";
		echo "<span><a href='$cat->url'>$cat->title</a></span>=> ";
		echo "<span><a href='$cat->url$subcat->url'>$subcat->title</a></span>=> ";
		if($user->status=='admin'||$user->status=='superadmin')echo "<div style='float:right;'><a href='admin.php?act=app_article&id=$article->id'>Редактировать</a></div>\n ";
		echo "<h2>$article->title</h2><p></p>\n";
		echo "<p>";
		include('feedback.php');
		echo "</p>";
		echo "<p>$article->text</p>";
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"main.css\"/>";
		echo "<h3>Дата: $article->date</h3>";

	}elseif(isset($_GET['cat'])&&isset($_GET['subcat'])){
		$article=new app_article;
		$article->initelse("subcat='$_GET[subcat]' AND active='on'");
		$subcat->one($_GET['subcat']);
		$cat->one($_GET['cat']);
		echo "<span class='h1'><a href='$url'>$title</a></span>=>";
		echo "<span><a href='$cat->url'>$cat->title</a></span>=>";
		echo "<span>$subcat->title</span><p></p>\n";
		echo "<table class='equip' cellpadding='0' cellspacing='0'>";
		echo "<tr class='row2'><td class='t-auth' style='text-align:center;'>&nbsp;</td><td class='t-post' style='text-align:center;'></td></tr>";
		while($article->one()==true){
			if($article->active=='on'){
				$odd=($odd===1)?2:1;
				echo "
				<tr class='row$odd'>
					<td class='t-auth'>$article->icon</td>
					<td class='t-post'>
						<a href='".$cat->url.$subcat->url.$article->url."'>$article->title</a>
						<div>".$article->desc ."</div>
					</td>
				</tr>";
			}
		}
		echo "</table>";
		echo "<p>$subcat->text</p>\n ";

	}elseif(isset($_GET['cat'])){
		$cat->one($_GET['cat']);
		echo "<span class='h1'><a href='$url'>$title</a></span>=><span>$cat->title</span><p></p>\n";
		echo "<table class='equip' cellpadding='0' cellspacing='0'>\n";
		echo "<tr class='row2'><td class='t-auth' style='text-align:center;'>&nbsp;</td><td class='t-post' style='text-align:center;'>Подкатегория</td></tr>\n";
		$subcat->initparent($_GET['cat']);
		$art=new app_article;
		while($subcat->one()==true){
			$art->initelse("subcat='$subcat->name' AND active='on'");
			if($subcat->active=='on'){
				$odd=($odd===1)?2:1;
				echo "
				<tr class='row$odd'>
					<td class='t-auth'>$subcat->icon</td>
					<td class='t-post'>
						<a href='$cat->url$subcat->url'>$subcat->title</a><i>(".$art->num().")</i>
						<div>$subcat->desc</div>
					</td>
				</tr>";
			}
		}
		echo "</table>";
		echo "<p>$cat->text</p>\n ";
	}
	include("foot.php");
	ob_end_flush();
?>