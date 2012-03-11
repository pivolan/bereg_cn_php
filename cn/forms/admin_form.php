<?php
	defined("_pEXEC") or die('not include into index.php');

	$pages=new app_page;
	$article=new app_article;
	$art=new app_article;
	$cat=new app_category;
	$subcat=new app_subcat;
	$cat->init();
	$article->init();
	$outequip="<ol id='eq' class='eq'>";$outproj="<ol id='pr' class='eq'>";
	while($cat->one()){
		$subcat->initelse("parent='$cat->name'");
		$subcat->one();
		if($cat->parent=='Оборудование'){

			$outequip.="<li value=\"$cat->name\">
				<a href=\"javascript:collapsElement('$subcat->name')\">$cat->title</a>
				<i>(".$subcat->num().")</i>
				<a href=\"$_SERVER[PHP_SELF]?act=cat&id=$cat->id\">
					<img src='./images/edit.png' alt='Редактировать'>
				</a>
				<a href=\"$_SERVER[PHP_SELF]?act=subcat&parent=$cat->name&id=0\">
						<img src='./images/folder_page_add.png' alt='Добавить'>
				</a>";

			if($subcat->num()>0){
				$outequip.="<ol id='$subcat->name' class='sc'>";
				$subcat->reset1();
				while($subcat->one()){
					$art->initelse("subcat='$subcat->name'");

					$outequip.="<li value=\"$subcat->name\">
					<a href=\"$_SERVER[PHP_SELF]?act=app_article&subcat=$subcat->name\">$subcat->title</a>
					<i>(".$art->num().")</i>
					<a href=\"$_SERVER[PHP_SELF]?act=subcat&id=$subcat->id\">
						<img src='./images/edit.png' alt='Редактировать'>
					</a>
					<a href=\"$_SERVER[PHP_SELF]?act=app_article&subcat=$subcat->name&id=0\">
						<img src='./images/folder_page_add.png' alt='Добавить'>
					</a><ul>";
					while($art->one()){
						$outequip.="<li><a href='?act=app_article&subcat=$subcat->name&id=$art->id'>$art->title</a><img src='images/blank.gif' alt='загрузка'></li>";
					}
					$outequip.="</ul></li>";

				}
				$outequip.="</ol>";
			}
			$outequip.="</li>";
		}
		if($cat->parent=='Проекты'){

			$outproj.="<li value=\"$cat->name\">
			<a href=\"javascript:collapsElement('$subcat->name')\">$cat->title</a>
			<i>(".$subcat->num().")</i>
			<a href=\"$_SERVER[PHP_SELF]?act=cat&id=$cat->id\">
						<img src='./images/edit.png' alt='Редактировать'>
					</a>
					<a href=\"$_SERVER[PHP_SELF]?act=subcat&parent=$cat->name&id=0\">
						<img src='./images/folder_page_add.png' alt='Добавить'>
					</a>";

			if($subcat->num()>0){
				$outproj.="<ol id='$subcat->name' class='sc'>";
				$subcat->reset1();
				while($subcat->one()){
					$art->initelse("subcat='$subcat->name'");

					$outproj.="<li value=\"$subcat->name\">
					<a href=\"$_SERVER[PHP_SELF]?act=app_article&subcat=$subcat->name\">$subcat->title</a>
					<i>(".$art->num().")</i>
					<a href=\"$_SERVER[PHP_SELF]?act=subcat&id=$subcat->id\">
						<img src='./images/edit.png' alt='Редактировать'>
					</a>
					<a href=\"$_SERVER[PHP_SELF]?act=app_article&subcat=$subcat->name&id=0\">
						<img src='./images/folder_page_add.png' alt='Добавить'>
					</a><ul>";
					while($art->one()){
						$outproj.="<li><a href='?act=app_article&subcat=$subcat->name&id=$art->id'>$art->title</a><img src='images/blank.gif' alt='загрузка'></li>";
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
	echo "<a href='$_SERVER[PHP_SELF]?act=pages'>Страницы</a><em>(".$pages->numall().")</em><br /><br />";
	echo "<a href=\"javascript:collapsElement('eq')\">Оборудование</a><em>(".$cat->num().")</em>
					<a href=\"$_SERVER[PHP_SELF]?act=cat&parent=Оборудование&id=0\">
						<img src='./images/folder_page_add.png' alt='Добавить'>
					</a><br /><br />";
	echo $outequip;
	$cat->initelse("parent='Проекты'");
	echo "<a href=\"javascript:collapsElement('pr')\">Проекты</a><em>(".$cat->num().")</em>
					<a href=\"$_SERVER[PHP_SELF]?act=cat&parent=Проекты&id=0\">
						<img src='./images/folder_page_add.png' alt='Добавить'>
					</a><br /><br />";
	echo $outproj;
	echo "<a href='$_SERVER[PHP_SELF]?act=app_article'>Все статьи (Без фильтра)</a><em>(".$article->num().")</em><br /><br />";
	echo "<a href='$_SERVER[PHP_SELF]?act=news'>Новости</a>";
?>
