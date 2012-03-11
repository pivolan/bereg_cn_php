<?php
	defined("_pEXEC") or die('not include into index.php');
	echo "<h2><a href='admin.php?act=$_GET[act]'>$title</a></h2>\n";
		echo "<table class='equip' cellpadding='0' cellspacing='0'>\n";
		echo "<tr class='row2'><td class='t-auth' style='text-align:center;'>Действия</td><td class='t-post' style='text-align:center;'>Страница</td></tr>\n";
		while($pages->one()==true){
				$odd=($odd===1)?2:1;
				echo "
				<tr class='row$odd'> \n
					<td class='t-auth'> \n
						<a href='$_SERVER[REQUEST_URI]&id=$pages->id'>Edit(TinyMCE)</a><br />\n
						<a href='$_SERVER[REQUEST_URI]&id=$pages->id&tinymce=1'>Edit(НЕТ)</a><br />\n
						<a href='$_SERVER[REQUEST_URI]&id=$pages->id&delete=1'>Delete</a><br />\n
					</td>\n
					<td class='t-post'> <a href='$pages->url'>$pages->title</a><div>".app_common::short_news($pages->text,50)."</div></td>\n
				</tr>\n";
		}
		echo "</table>\n";
?>
