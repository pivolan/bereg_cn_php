<?php
defined('_Padmine') or die('not included');
	if($_GET['act']=='add'){		$_POST['date']=strtotime($_POST['date']);
		$sql="INSERT INTO news (date,title,text,login) VALUES ('$_POST[date]','$_POST[title]','$_POST[text]','$_POST[login]')";
		mysql_query($sql);
		echo mysql_error();
	}
	if($_GET['delete']!=''){
		$sql="DELETE FROM news WHERE id='$_GET[delete]' LIMIT 1";
		mysql_query($sql);
	}
	if($_GET['edit']!=''){
		$sql="SELECT * FROM news WHERE id='$_GET[edit]'";
		$result=mysql_query($sql);
		$line=mysql_fetch_array($result);
		echo "Редактировать новость:";
		echo "<form name=\"edit\" action=\"?a=news&act=edit\" method=\"post\">
					Дата:<input name=\"date\" type=\"text\" value=\"$line[date]\"><br />
					Заголовок:<input name=\"title\" type=\"text\" value=\"$line[title]\"><br />
					Текс:<textarea name=\"text\" rows=15 cols=80 wrap=\"on\">
					$line[text]
					</textarea><br />
					Логин:<input name=\"login\" type=\"text\" value=\"$line[login]\">    <br />
					<input name=\"id\" type=\"hidden\" value=\"$_GET[edit]\">
					<input type=\"submit\" value=\"Отправить\"><br />
					</form>\n";
	}
	if($_GET['act']=='edit'){
		$sql="UPDATE news SET date='$_POST[date]',title='$_POST[title]',text='$_POST[text]',login='$_POST[login]' WHERE id='$_POST[id]'";
		mysql_query($sql);
	}
	$sql="SELECT * FROM news";
	$result=mysql_query($sql);
?>
Добавить новость:<br />
<form name="news" action="?a=news&act=add" method="post">
Дата:<input name="date" type="text" value="<?=$date?>"><?=$date_int?>, <?=$date_str?><br />
Заголовок:<input name="title" type="text" value=""><br />
Текс:<textarea name="text" rows=15 cols=80 wrap="on">

</textarea><br />
Логин:<input name="login" type="text" value="Admin"><br />
<input type="submit" value="Отправить"><br />
</form>
<?php
echo "<table width=\"100%\" border=\"1\">";
echo "<tr><td>Дата</td><td>Заголовок</td><td>Edit</td><td>Delete</td></tr>";
	while($line=mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td><b>$line[date]</b></td>
		<td>$line[title]</td>
		<td><a href='?a=news&edit=$line[id]'>редактировать</a></td>
		<td><a href='?a=news&delete=$line[id]'>удалить</a></td>
		";
		echo "<tr>";
	}
echo "</table>";
?>