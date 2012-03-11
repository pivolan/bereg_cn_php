<?php
	defined("_pEXEC") or die('not include into index.php');
	echo "<h2><a href='admin.php?act=$_GET[act]'>$title</a></h2>\n";
		echo "<table id='tbnews' class='equip' cellpadding='0' cellspacing='0'>\n";
		echo "<tr class='row2'><td class='t-auth' style='text-align:center;'>Действия</td><td class='t-post' style='text-align:center;'>Страница</td></tr>\n";
		while($news->one()==true){
				$odd=($odd===1)?2:1;
				echo "
				<tr class='row$odd'> \n
					<td class='t-auth'> \n
						<a href='$_SERVER[PHP_SELF]?act=news&id=$news->id'>Edit(TinyMCE)</a><br />\n
						<a href='$_SERVER[PHP_SELF]?act=news&id=$news->id&tinymce=1'>Edit(НЕТ)</a><br />\n
						<a href='$_SERVER[PHP_SELF]?act=news&id=$news->id&delete=1'>Delete</a><br />\n
					</td>\n
					<td class='t-post'> <a href='$news->url'>$news->title</a><div>".app_common::short_news($news->text,50)."</div></td>\n
				</tr>\n";
		}
		echo "</table>\n";
?>
<form id="newsformadd" name="" action="admin_react.php" method="post">
Заголовок:<br />
<input name="title" type="text" value="" style="width:100%;"><br />
Текст:<br />
<textarea name="text" rows=5 cols=30 wrap="on" style="width:100%;"></textarea>
<input type="submit" value="добавить асинхронно">
<input name="act" type="hidden" value="<?=$_GET['act']?>">
</form>