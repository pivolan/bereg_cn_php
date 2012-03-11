<?php
	defined("_pEXEC") or die('not include into index.php');
	$result=mysql_query("SELECT * FROM feedback ORDER BY date DESC LIMIT 5");
	while($line=mysql_fetch_array($result)){
		$date=date("d.m.Y H:i:s", $line['date']);
		$history=urldecode($line['history']);
		echo "<p name='feedback' title='$line[text]'><b>$line[title]</b> <a href='mailto:$line[email]'>$line[email]</a> - <span title='$line[text]'>$date </span><a name='delete' href='#' id='$line[id]'>Удалить?</a> <a title='$history' onclick='alert(this.title)'>Статистика</a></p>";
	} 
?>
<script type="text/javascript" src="jquery.jstree.js"></script>
<script type="text/javascript" src="jquery.cookie.js"></script>
<script>
$("a[name='delete']").click(function(){
	var id=$(this).attr('id');
	var title=$(this).parent().attr('title');
	var this1=$(this).parent();
	if(confirm(title+'\n Удалить?'))
	$.ajax({
		type: "POST",
		url: "admin_react.php",
		data: "id="+id+"&act=deletefeedback",
		success: function(msg){
			if(msg=="true"){
				$(this1).fadeOut();
			}else{alert(msg);}
	   }
	});
});

</script>
<?php
	$pages=new app_page;
	$article=new app_article;
	$art=new app_article;
	$cat=new app_category;
	$subcat=new app_subcat;
	$cat->init();
	$article->init();
	$outequip="<ul>";$outproj="<ul>";
	$indextree=2;
	while($cat->one()){
		$subcat->initelse("parent='$cat->name'");
		$subcat->one();
		if($cat->parent=='Оборудование'){
			$indextree++;
			$outequip.="<li id='jstree_$indextree'>
				<a href='$_SERVER[PHP_SELF]?act=cat&id=$cat->id'>$cat->title
				<i>(".$subcat->num().")</i></a>";

			if($subcat->num()>0){
				$outequip.="<ul>";
				$subcat->reset1();
				while($subcat->one()){
					$art->initelse("subcat='$subcat->name'");
					$indextree++;
					$outequip.="<li id='jstree_$indextree'>
					<a href='$_SERVER[PHP_SELF]?act=subcat&id=$subcat->id'>$subcat->title
					<i>(".$art->num().")</i></a><ul>";
					while($art->one()){
						$indextree++;
						$outequip.="<li id='jstree_$indextree'><a href='?act=app_article&subcat=$subcat->name&id=$art->id'>$art->title</a></li>";
					}
					$outequip.="</ul></li>";

				}
				$outequip.="</ul>";
			}
			$outequip.="</li>";
		}
		if($cat->parent=='Проекты'){
			$indextree++;

			$outproj.="<li id='jstree_$indextree'>
			<a href='$_SERVER[PHP_SELF]?act=cat&id=$cat->id'>$cat->title
			<i>(".$subcat->num().")</i></a>";

			if($subcat->num()>0){
				$outproj.="<ul>";
				$subcat->reset1();
				while($subcat->one()){
					$art->initelse("subcat='$subcat->name'");
					$indextree++;

					$outproj.="<li id='jstree_$indextree'>
					<a href='$_SERVER[PHP_SELF]?act=subcat&id=$subcat->id'>$subcat->title<i>(".$art->num().")</i></a>
					<ul>";
					while($art->one()){
						$indextree++;
						$outproj.="<li id='jstree_$indextree'><a href='?act=app_article&subcat=$subcat->name&id=$art->id'>$art->title</a></li>";
					}
					$outproj.="</ul></li>";

				}
				$outproj.="</ul>";
			}
			$outproj.="</li>";
		}
	}
	$outequip.="</ul></li>";$outproj.="</ul></li></ul>";
	$cat->initelse("parent='Оборудование'");
	echo "<a href='$_SERVER[PHP_SELF]?act=pages'>Страницы</a><em>(".$pages->numall().")</em><br /><br />";
	echo "<div class='jstree'><ul><li id='jstree_1'><a href='#'>Оборудование<em>(".$cat->num().")</em></a>";
	echo $outequip;
	$cat->initelse("parent='Проекты'");
	echo "<li id='jstree_2'><a href='#'>Проекты<em>(".$cat->num().")</em></a>";
	echo $outproj;
	echo "</div>";
	echo "<a href='$_SERVER[PHP_SELF]?act=app_article'>Все статьи (Без фильтра)</a><em>(".$article->num().")</em><br /><br />";
	echo "<a href='$_SERVER[PHP_SELF]?act=news'>Новости</a>";
?>
<script>
$(function () {
	$("div.jstree").jstree({ 
		"core":{"animation":0},
		"plugins" : [ "themes", "html_data", "cookies", "contextmenu","crrm"],
		"themes":{"theme":"classic"}
	});
});
</script>
