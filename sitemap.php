<?php
	define( '_pEXEC', 1 );
	define( '_Project', 1 );
	include("config/config.php");
//	$art=new app_article;
//	$art->create_db();
	include("header.php");
/*	include("head.php");
	include("left.php");
	include("body.php");*/

	$pages=new app_page;
	$article=new app_article;
	$art=new app_article;
	$cat=new app_category;
	$subcat=new app_subcat;
	$cat->init();
	$article->init();
	$outequip="<ol>";$outproj="<ol>";
	while($cat->one()){
		$subcat->initelse("parent='$cat->name'");
		$subcat->one();
		if($cat->parent=='Оборудование'){

			$outequip.="<li value=\"$cat->name\">
				<a href=\"equipment.php?cat=$cat->name\">$cat->title</a>
				<i>(".$subcat->num().")</i>";

			if($subcat->num()>0){
				$outequip.="<ol id='$subcat->name' class='sc'>";
				$subcat->reset1();
				while($subcat->one()){
					$art->initelse("subcat='$subcat->name'");

					$outequip.="<li value=\"$subcat->name\">
					<a href=\"equipment.php?cat=$cat->name&subcat=$subcat->name\">$subcat->title</a>
					<i>(".$art->num().")</i><ul>";
					while($art->one()){
						$outequip.="<li><a href='equipment.php?cat=$cat->name&subcat=$subcat->name&article=$art->name'>$art->title</a></li>";
					}
					$outequip.="</ul></li>";

				}
				$outequip.="</ol>";
			}
			$outequip.="</li>";
		}
		if($cat->parent=='Проекты'){

			$outproj.="<li value=\"$cat->name\">
			<a href=\"projects.php?cat=$cat->name\">$cat->title</a>
			<i>(".$subcat->num().")</i>";

			if($subcat->num()>0){
				$outproj.="<ol id='$subcat->name' class='sc'>";
				$subcat->reset1();
				while($subcat->one()){
					$art->initelse("subcat='$subcat->name'");

					$outproj.="<li value=\"$subcat->name\">
					<a href=\"projects.php?cat=$cat->name&subcat=$subcat->name\">$subcat->title</a>
					<i>(".$art->num().")</i><ul>";
					while($art->one()){
						$outproj.="<li><a href='projects.php?cat=$cat->name&subcat=$subcat->name&article=$art->name'>$art->title</a></li>";
					}
					$outproj.="</ul></li>";

				}
				$outproj.="</ol>";
			}
			$outproj.="</li>";
		}
	}
	$outequip.="</ol>";$outproj.="</ol>";
	$cat->initelse("parent='Оборудование'");
	echo "<a>Страницы</a><em>(".$pages->numall().")</em><br /><br />";
	$links=new app_menuLeft;
	$links->init();
	while($links->one()){
		echo "<a href='".$links->url()."'>$links->title</a><br />";
	}
	echo "<a href=\"equipment.php\">Оборудование</a><em>(".$cat->num().")</em>";
	echo $outequip;
	$cat->initelse("parent='Проекты'");
	echo "<a href=\"projects.php\">Проекты</a><em>(".$cat->num().")</em>";
	echo $outproj;
	echo "<a href='news.php'>Новости</a>";

//	include("foot.php");
?>