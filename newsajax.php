<?php
define("_pEXEC",1);
require_once("config/config.php");
$news=new app_new;
$news->initelse("id!=0 ORDER BY id DESC LIMIT 1");
while($news->one()==true){
		$odd=($odd===1)?2:1;
		echo "
		<tr> \n
			<td class='t-auth'> \n
				<a href='$_SERVER[PHP_SELF]?act=news&id=$news->id'>Edit(TinyMCE)</a><br />\n
				<a href='$_SERVER[PHP_SELF]?act=news&id=$news->id&tinymce=1'>Edit(НЕТ)</a><br />\n
				<a href='$_SERVER[PHP_SELF]?act=news&id=$news->id&delete=1'>Delete</a><br />\n
			</td>\n
			<td class='t-post'> <a href='$news->url'>$news->title</a><div>".app_common::short_news($news->text,50)."</div></td>\n
		</tr>\n";
}
?>