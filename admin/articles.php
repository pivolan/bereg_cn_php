<h1><a href="index.php?a=articles">Article Статьи</a></h1>
<?php
defined('_Padmine') or die('not included');
	$art=new app_article;
	if($_GET['act']=='add'){
		$art->add($_POST);
	}
	if($_GET['delete']!=''){
		$art->deleteid($_GET['delete']);
	}
	if($_GET['edit']!=''){
		$art->init($_GET['edit']);
		$art->one();
		echo "<h2>Редактировать</h2> Описание оборудования:";
		echo "<form name=\"edit\" action=\"?a=articles&act=edit\" method=\"post\">
					Дата:<input name=\"date\" type=\"text\" value=\"$art->date2\"><br />
					Заголовок:<input name=\"title\" type=\"text\" value=\"$art->title\"><br />
					Название:<input name=\"name\" type=\"text\" value=\"$art->name\"><br />
					<input name=\"oldname\" type=\"hidden\" value=\"$art->name\"><br />
					Текст:<textarea name=\"text\" rows=15 cols=80 wrap=\"on\">$art->text</textarea><br />
					Логин:<input name=\"login\" type=\"text\" value=\"$art->login\"><br />
					Категория:<select size=\"1\" name=\"category\">";
		$cat=new app_subcat;
		$cat->init();
		while($cat->one()==true)
		if($cat->name==$art->cat)echo "<option value=\"$cat->name\" selected='selected'>$cat->title</option>";
		else echo "<option value=\"$cat->name\">$cat->title</option>";
		echo "</select>
					<input name=\"id\" type=\"hidden\" value=\"$art->id\">
					<input type=\"submit\" value=\"Отправить\"><br />
					</form>\n";
	}
	if($_GET['act']=='edit'){
		$art->edit($_POST);
	}
?>

<?php if(!isset($_GET['edit'])):?>
<h2>Добавить</h2> Описание обрудования:<br />
<form name="pages" action="?a=articles&act=add" method="post">
	Дата:<input name="date" type="text" value="<?=$date?>"><?=$date_int?>, <?=$date_str?><br />
	Title:<input name="title" type="text" value=""><br />
	Name:<input name="name" type="text" value=""><br />
	Текст:<textarea name="text" rows=15 cols=80 wrap="on"></textarea><br />
	Логин:<input name="login" type="text" value="Admin"><br />
	<?php
		echo "Категория:<select size=\"1\" name=\"category\">";
		$cat=new app_subcat;
		$cat->init();
		while($cat->one()==true)
		echo "<option value=\"$cat->name\">$cat->title</option>";
		echo "</select>";
	?>
	Активна?:<input name="active" type="checkbox" value="ON" checked><br />
	<input type="submit" value="Отправить"><br />
</form>
<?endif;?>

<?php
	$art->init();
	echo "<table width=\"100%\" border=\"1\">";
	echo "<tr><td>Дата</td><td>Название</td><td>Заголовок</td><td>Edit</td><td>Delete</td></tr>";
	$num=0;
		while($art->one()==true){
			echo "<tr>";
			$num++;
			echo "
			<td><b>$num</b></td>
			<td><b>$art->date</b></td>
			<td>$art->name </td>
			<td>$art->title</td>
			<td><a href='?a=articles&edit=$art->id'>редактировать</a></td>
			<td><a href='?a=articles&delete=$art->id'>удалить</a></td>
			";
			echo "<tr>";
		}
	echo "</table>";
?>