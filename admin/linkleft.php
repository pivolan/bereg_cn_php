<?php												// Добавить ссылку добавление в БАЗА
defined('_Padmine') or die('not included');
	if($_GET['act']=='add'){
		$sql="INSERT INTO linkleft (title,pageid,url,active,name,number, position) VALUES ('$_POST[title]','$_POST[pageid]','$_POST[url]','$_POST[active]','$_POST[name]','$_POST[number]','$_POST[position]')";
		mysql_query($sql);
		echo mysql_error();
	}
?>											<!-- END Добавить ссылку добавление в БАЗА -->
<?													//Удалить ссылку удаление из базы
	if($_GET['delete']!=''){
		$sql="DELETE FROM linkleft WHERE id='$_GET[delete]' LIMIT 1";
		mysql_query($sql);
	}
?>											<!-- END Удалить ссылку удаление из БАЗА -->
<?												// Редактировать ссылку ФОРМА
	if($_GET['edit']!=''){
		$sql="SELECT * FROM linkleft WHERE id='$_GET[edit]'";
		$result=mysql_query($sql);
		$line=mysql_fetch_array($result);
		if($line['active']=='ON')$checked='checked';
		else{$line['active']='OFF';$checked=NULL;}
	?>
		Редактировать ссылку:<br /><form name="linkleft" action="?a=linkleft&act=edit" method="post">
		Заголовок:<input name="title" type="text" value="<?=$line[title]?>"><br />
		Страница:<select size="1" name="name">
		<option value="0" selected="selected">Пусто</option>
			<?
				$sql="SELECT * FROM pages";
				$result1=mysql_query($sql) or die(mysql_error());
				while($line1=mysql_fetch_array($result1)){					if($line['name']==$line1['name'])$selected='selected="selected"';
					else $selected=NULL;
					echo "<option value=\"$line1[name]\" $selected>$line1[title]</option>";
				}
			?>
		</select><br />
		Cсылка:<input name="url" type="text" value="<?=$line['url']?>">*<br />
		Активна?:<input name="active" type="checkbox" value="<?=$line['active']?>" <?=$checked?>><br />
		<input name="id" type="hidden" value="<?=$line['id']?>>">
		Позиция:<select size="1" name="position">
			<option value="left" selected="selected">Left</option>
			<option value="top">Top</option>
		</select>
		Порядок:<table border="1"><tr><td>Порядок</td><td>Номер</td><td> Заголовок </td></tr>
		<?
		$sql="SELECT number,title FROM linkleft ORDER BY number ASC";
		$result=mysql_query($sql);
		$n=0;
		while($line1=mysql_fetch_array($result)){
			$number=$line1['number']+1;
			$n++;
			if($line1['number']!=$line['number']){
				echo "<tr><td>$n</td><td>$line1[number]</td><td>$line1[title]</td></tr>";
				echo "<tr><td>&nbsp;</td><td><input name=\"number\" type=\"radio\"
				 value=\"$number\"></td><td>$number</td></tr>";
			}else{				echo "<tr><td>$n</td><td>$line[number]<input name=\"number\" type=\"radio\"
				 value=\"$number\" checked></td><td><b>$line[title]</b></td></tr>";			}
		}
		$n++;
		$number+=100;
		echo "<tr><td>$n</td><td>$number<input name=\"number\"
		type=\"radio\" value=\"$number\"></td><td>Последний</td></tr>";
		?>
		</table>
		<input type="submit" value="Сохранить"><br />
		</form>

<?
	}
?>											<!-- END Редактировать ссылку ФОРМА -->
<?												// Редактировать ссылку БАЗА
	if($_GET['act']=='edit'){
		$sql="UPDATE linkleft SET title='$_POST[title]',
		name='$_POST[name]',url='$_POST[url]',active='$_POST[active]',
		position='$_POST[position]', number='$_POST[number]' WHERE id='$_POST[id]'";
		mysql_query($sql);
	}
?>											<!-- END Редактировать ссылку БАЗА -->
<?
if(!isset($_GET['edit'])):
?>
<b>Добавить ссылку слева</b>:<br /><form name="linkleft" action="?a=linkleft&act=add" method="post">
		Заголовок:<input name="title" type="text" value=""><br />
		Страница:<select size="1" name="name">
			<option value="0" selected="selected">Пусто</option>
				<?
					$sql="SELECT * FROM pages";
					$result=mysql_query($sql) or die(mysql_error());
					while($line=mysql_fetch_array($result)){
						echo "<option value=\"$line[name]\">$line[title]</option>";
					}
				?>
			</select><br />
		Cсылка:<input name="url" type="text" value="">*<br />
		Активна?:<input name="active" type="checkbox" value="ON" checked><br />
		Позиция:<select size="1" name="position">
  <option value="left" selected="selected">Left</option>
  <option value="top">Top</option>
</select>
		Порядок:<table border="1"><tr><td>&nbsp;</td><td>&nbsp;</td><td> Заголовок </td></tr>
				<?
					$sql="SELECT number,title FROM linkleft ORDER BY number";
					$result=mysql_query($sql) or die(mysql_error());
					$n=0;$number=NULL;
					while($line=mysql_fetch_array($result)){						$number=$line['number']+1;
						$n++;
						echo "<tr><td><b>$n</b></td><td><b>$line[number]</b></td><td><b>$line[title]</b></td></tr>";						echo "<tr><td>&nbsp;</td><td>$number<input name=\"number\" type=\"radio\"
						value=\"$number\"></td><td>&nbsp;</td></tr>";
					}
					$number+=100;
					$n++;
					echo "<tr><td><b>$n</b></td><td><b>$number</b><input name=\"number\" type=\"radio\"
					value=\"$number\" checked></td><td><b>Последний</b></td></tr>";
				?>
			</table>
		<input type="submit" value="Добавить"><br />
	</form>
<? endif;?>
<!-- Список ссылок ТАБЛИЦА --><div title="Список ссылок ТАБЛИЦА ">
<?php											// Список ссылок ТАБЛИЦА
	$sql="SELECT * FROM linkleft ORDER BY number";
	$result=mysql_query($sql) or die(mysql_error());
	echo "<table width=\"100%\" border=\"1\">";
	echo "<tr><td>Порядок</td><td>Номер</td><td>Позиция</td><td>Заголовок</td><td>Edit</td><td>Delete</td></tr>";
	$n=0;
		while($line=mysql_fetch_array($result)){			$n++;
			echo "<tr>";
			echo "
			<td>$n</td>
			<td><b>$line[number]</b></td>
			<td>$line[position]</td>
			<td>$line[title]</td>
			<td><a href='?a=linkleft&edit=$line[id]'>редактировать</a></td>
			<td><a href='?a=linkleft&delete=$line[id]'>удалить</a></td>
			";
			echo "<tr>";
		}
	echo "</table>";
?>											<!-- END Список ссылок ТАБЛИЦА -->
</div>											<!-- END Список ссылок ТАБЛИЦА -->