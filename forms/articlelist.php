<?php
	defined("_pEXEC") or die('not include into index.php');
		echo "<h2><a href='admin.php?act=$_GET[act]'>$title</a></h2>\n";
		echo "<table class='equip' cellpadding='0' cellspacing='0'>\n";
		echo "<tr class='row2'><td class='t-auth' style='text-align:center;'>Действия</td><td class='t-post' style='text-align:center;'>Материал</td></tr>\n";
						echo "
				<tr class=''> \n
					<td class='t-auth' style='font-size:100%; vertical-align=middle;'> \n
						<a href='$_SERVER[REQUEST_URI]&parent=$title&id=0'>Добавить</a><br />\n
					</td>\n
					<td class='t-post'> &nbsp;</td>\n
				</tr>\n";
		$cat=new app_category;
		$subcat=new app_subcat;

		while($article->one()==true){
			$odd=($odd===1)?2:1;
			$cat->initelse("name='$article->cat'");$cat->one();
			$subcat->initelse("name='$article->subcat'");$subcat->one();

			echo "
			<tr class='row$odd'> \n
				<td class='t-auth'> \n
					<a href='$_SERVER[REQUEST_URI]&id=$article->id'>Edit(TinyMCE)</a><br />\n
					<a href='$_SERVER[REQUEST_URI]&id=$article->id&tinymce=1'>Edit(НЕТ)</a><br />\n
					<a href='$_SERVER[REQUEST_URI]&id=$article->id&delete=1'>Delete</a><br />\n
				</td>\n
				<td class='t-post'> <a href='$article->url'>$article->title</a>\n
					<div>$article->parent=>$cat->title=>$subcat->title</div>\n
					<div>".app_common::short_news($article->text,50)."</div>\n
					</td>\n
			</tr>\n";
		}
		echo "</table>\n";
?>
