<h1><a href="index.php?a=subcat">Subсat Подкатегории</a></h1>
<?php
	defined('_Padmine') or die('not included');
	$art=new app_subcat;
	if($_GET['act']=='add'){
		$art->add($_POST);
	}
	if($_GET['delete']!=''){
		$art->deleteid($_GET['delete']);
	}
	if($_GET['edit']!=''){
		$art->init($_GET['edit']);
		$art->one();
		$link=new app_category;
		$link->init();
		$parenttext=NULL;
		while($link->one()==true)
			if($link->name==$art->parent)
				$parenttext.="<option value=\"$link->name\" selected=\"selected\">$link->title($link->parent)</option>\n";
			else
				$parenttext.="<option value=\"$link->name\">$link->title($link->parent)</option>\n";
		echo "<h2>Редактировать</h2> Описание оборудования:";
		echo "<form name=\"edit\" action=\"?a=subcat&act=edit\" method=\"post\">
					Заголовок:<input name=\"title\" type=\"text\" value=\"$art->title\"><br />
					Название:<input name=\"name\" type=\"text\" value=\"$art->name\"><br />
					Текст:<textarea name=\"text\" rows=15 cols=80 wrap=\"on\">$art->text</textarea><br />
					Родитель:<select size=\"1\" name=\"parent\">
						$parenttext
					</select>\n
					<input name=\"id\" type=\"hidden\" value=\"$art->id\">
					<input type=\"submit\" value=\"Отправить\"><br />
					</form>\n";
	}
	if($_GET['act']=='edit'){
		$art->edit($_POST);
	}
?>

<?php if(!isset($_GET['edit'])):
		$cat=new app_category;
		$cat->init();
		$parenttext=NULL;
		while($cat->one()==true)
			$parenttext.="<option value=\"$cat->name\">$cat->title($cat->parent)</option>\n";
?>
<h2>Добавить</h2> Описание обрудования:<br />
<form name="pages" action="?a=subcat&act=add" method="post">
	Title:<input name="title" type="text" value=""><br />
	Name:<input name="name" type="text" value=""><br />
	Текст:<textarea name="text" rows=15 cols=80 wrap="on"></textarea><br />
<?
echo "Родитель:<select size=\"1\" name=\"parent\">
						$parenttext
					</select>\n";
?>
	Активна?:<input name="active" type="checkbox" value="on" checked><br />
	<input type="submit" value="Отправить"><br />
</form>
<?endif;?>

<?php
	$art->init();
	echo "<table width=\"100%\" border=\"1\">";
	echo "<tr><td>Дата</td><td>Название</td><td>Заголовок</td><td>PARENT</td><td>Edit</td><td>Delete</td></tr>";
		while($art->one()==true){
			echo "<tr>";
			echo "<td><b>$art->date</b></td>
			<td>$art->name </td>
			<td>$art->title</td>
			<td>$art->parent</td>
			<td><a href='?a=subcat&edit=$art->id'>редактировать</a></td>
			<td><a href='?a=subcat&delete=$art->id'>удалить</a></td>
			";
			echo "<tr>";
		}
	echo "</table>";
?>