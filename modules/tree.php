<div class="tree">
<?php
	if($modules['tree']){
		$cat=new app_category;
		$subcat=new app_subcat;
		$article=new app_article;
		$cat->initelse("parent='$title1' AND active='on'");
		echo "<ol class='tree'>$title1";
		while($cat->one()==true&&$cat->active=='on'){
			$subcat->initelse("parent='$cat->name' AND active='on'");
			if($cat->name==$_GET['cat'])
				echo "<li><a class='tree-active' href='$cat->url'>$cat->title</a>(".$subcat->num().")<ul class='subtree'>";
			else
				echo "<li><a href='$cat->url'>$cat->title</a>(".$subcat->num().")<ul class='subtree-nd'>";

			while($subcat->one()==true&&$subcat->active=='on'){
				$article->initelse("subcat='$subcat->name' AND active='on'");
				if($subcat->name==$_GET['subcat']){
					echo "<li ><a class='tree-active' href='$cat->url$subcat->url'>$subcat->title</a>(".$article->num().")<ul class='subtree'>";
				}else{
					echo "<li><a href='$cat->url$subcat->url'>$subcat->title</a>(".$article->num().")<ul class='subtree'>";
				}

				while($article->one()&&$article->active=='on')
					if($article->name==$_GET['article'])
						echo "<li class='article'><a class='tree-active' href='".$cat->url.$subcat->url.$article->url."'>$article->title</a></li>";
					else
						echo "<li class='article'><a href='".$cat->url.$subcat->url.$article->url."'>$article->title</a></li>";
				echo "</ul></li>";
			}
			echo "</ul></li>";
		}
		echo "</ol>";
	}
?>
</div>