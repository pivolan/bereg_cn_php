<?php
defined('_Padmine') or die('not included');
	if($_GET['act']=='add'){		$_POST['date']=strtotime($_POST['date']);
		$sql="INSERT INTO pages (date,title,text,login,name) VALUES ('$_POST[date]','$_POST[title]','$_POST[text]','$_POST[login]','$_POST[name]')";
		mysql_query($sql);
		echo mysql_error();
	}
	if($_GET['delete']!=''){
		$sql="DELETE FROM pages WHERE id='$_GET[delete]' LIMIT 1";
		mysql_query($sql);
	}
	if($_GET['edit']!=''){
		$sql="SELECT * FROM pages WHERE id='$_GET[edit]'";
		$result=mysql_query($sql);
		$line=mysql_fetch_array($result);
		echo "Редактировать новость:";
		echo "<form name=\"edit\" action=\"?a=pages&act=edit\" method=\"post\">
					Дата:<input name=\"date\" type=\"text\" value=\"$line[date]\"><br />
					Название:<input name=\"name\" type=\"text\" value=\"$line[name]\"><br />
					Заголовок:<input name=\"title\" type=\"text\" value=\"$line[title]\"><br />
					Текст:<div class=\"main_content\"><textarea class=\"main_content\" style=\"width:100%\" name=\"text\" rows=25 cols=100 wrap=\"on\">$line[text]</textarea></div><br />
					<a href=\"javascript:;\" onmousedown=\"tinyMCE.get('text').show();\">[Show]</a>
					<a href=\"javascript:;\" onmousedown=\"tinyMCE.get('text').hide();\">[Hide]</a>
					Логин:<input name=\"login\" type=\"text\" value=\"$line[login]\">    <br />
					<input name=\"id\" type=\"hidden\" value=\"$_GET[edit]\">
					<input type=\"submit\" value=\"Отправить\"><br />
					</form>\n";
	}
	if($_GET['act']=='edit'){
		$sql="UPDATE pages SET date='$_POST[date]',title='$_POST[title]',text='$_POST[text]',login='$_POST[login]', name='$_POST[name]' WHERE id='$_POST[id]'";
		mysql_query($sql);
	}
	$sql="SELECT * FROM pages";
	$result=mysql_query($sql);
?>
<? if(!isset($_GET['edit'])):?>
<div class="main_content">
	Добавить страницу:<br />
	<form name="pages" action="?a=pages&act=add" method="post">
		Дата:<input name="date" type="text" value="<?=$date?>"><?=$date_int?>, <?=$date_str?><br />
		Название:<input name="name" type="text" value=""><br />
		Заголовок:<input name="title" type="text" value=""><br />
		Текст:<textarea class="main_content" name="text" rows=15 cols=80 wrap="on"></textarea><br />
		<a href="javascript:;" onmousedown="tinyMCE.get('text').show();">[Show]</a>
		<a href="javascript:;" onmousedown="tinyMCE.get('text').hide();">[Hide]</a>
		Логин:<input name="login" type="text" value="Admin"><br />
		<input type="submit" value="Отправить"><br />
	</form>
</div>
<? endif;?>
<?php
echo "<table width=\"100%\" border=\"1\">";
echo "<tr><td>Дата</td><td>Название</td><td>Заголовок</td><td>Edit</td><td>Delete</td></tr>";
	while($line=mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td><b>$line[date]</b></td>
		<td> $line[name] </td>
		<td>$line[title]</td>
		<td><a href='?a=pages&edit=$line[id]'>редактировать</a></td>
		<td><a href='?a=pages&delete=$line[id]'>удалить</a></td>
		";
		echo "<tr>";
	}
echo "</table>";
?>