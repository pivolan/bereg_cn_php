<?php
	defined('_Padmine') or die('not included');
	if($_GET['act']=='add'){		$_POST['date']=strtotime($_POST['date']);
		$sql="INSERT INTO users (date,fio, name, login, pass) VALUES ('$_POST[date]','$_POST[fio]','$_POST[name]','$_POST[login]','$_POST[pass]')";
		mysql_query($sql);
		echo mysql_error();
	}
	if($_GET['delete']!=''){
		$sql="DELETE FROM users WHERE id='$_GET[delete]' LIMIT 1";
		mysql_query($sql);
	}
	if($_GET['edit']!=''){
		$sql="SELECT * FROM users WHERE id='$_GET[edit]'";
		$result=mysql_query($sql);
		$line=mysql_fetch_array($result);
		echo "Редактировать Пользователя:";
		echo "<form name=\"edit\" action=\"?a=users&act=edit\" method=\"post\">
					Дата:<input name=\"date\" type=\"text\" value=\"$line[date]\"><br />
					ИМЯ:<input name=\"name\" type=\"text\" value=\"$line[name]\"><br />
					ФИО:<input name=\"fio\" type=\"text\" value=\"$line[fio]\"><br />
					Логин:<input name=\"login\" type=\"text\" value=\"$line[login]\"><br />
					статус:<input name=\"login\" type=\"text\" value=\"$line[status]\"><br />
					email:<input name=\"login\" type=\"text\" value=\"$line[email]\"><br />
					adress:<input name=\"login\" type=\"text\" value=\"$line[adress]\"><br />
					company:<input name=\"login\" type=\"text\" value=\"$line[company]\"><br />
					Телефон:<input name=\"login\" type=\"text\" value=\"$line[tel]\"><br />
					Пароль:<input name=\"pass\" type=\"text\" value=\"$line[pass]\"><br />
					<input name=\"id\" type=\"hidden\" value=\"$_GET[edit]\">
					<input type=\"submit\" value=\"Отправить\"><br />
					</form>\n";
	}
	if($_GET['act']=='edit'){		$_POST['pass']=md5($_POST['pass']);
		$sql="UPDATE users SET date='$_POST[date]',name='$_POST[name]',fio='$_POST[fio]',
		login='$_POST[login]', pass='$_POST[pass]' WHERE id='$_POST[id]'";
		mysql_query($sql);
	}
	$sql="SELECT * FROM users";
	$result=mysql_query($sql);
?>
Добавить пользователя:<br />
<form name="pages" action="?a=users&act=add" method="post">
Дата:<input name="date" type="text" value="<?=$date?>"><?=$date_int?>, <?=$date_str?><br />
ФИО:<input name="fio" type="text" value=""><br />
login:<input name="login" type="text" value=""><br />
pass:<input name="pass" type="text" value=""><br />
Имя:<input name="name" type="text" value=""><br />
<input type="submit" value="Отправить"><br />
</form>
<?php
echo "<table width=\"100%\" border=\"1\">";
echo "<tr><td>Дата</td><td>ID</td><td>Имя</td><td>ФИО</td><td>Логин</td><td>Пароль</td><td>Edit</td><td>Delete</td></tr>";
	while($line=mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td><b>$line[date]</b></td>
		<td>$line[id]</td>
		<td> $line[name] </td>
		<td>$line[fio]</td>
		<td>$line[login]</td>
		<td>$line[pass]</td>
		<td><a href='?a=users&edit=$line[id]'>редактировать</a></td>
		<td><a href='?a=users&delete=$line[id]'>удалить</a></td>
		";
		echo "<tr>";
	}
echo "</table>";
?>