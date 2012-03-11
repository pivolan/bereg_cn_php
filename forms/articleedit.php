<?php
	defined("_pEXEC") or die('not include into index.php');
	echo "<h2><a href='admin.php?act=$_GET[act]'>$title</a></h2>\n";
	$links=new app_menuLeft;
	$subcat=new app_subcat;
	$cat=new app_category;
	if($_GET['id']==0){
		switch($_GET['act']){
			case 'cat':$article->parent=$_GET['parent'];break;
			case 'subcat':
				$cat->initelse("name='$_GET[parent]'");$cat->one();
				$article->cat=$cat->name;
				$article->parent=$cat->parent;
			break;
			case 'app_article':
				$article->subcat=$_GET['subcat'];
				$subcat->initelse("name='$_GET[subcat]'");$subcat->one();
				$cat->initelse("name='$subcat->parent'");$cat->one();
				$article->cat=$cat->name;
				$article->subcat=$subcat->name;
				$article->parent=$cat->parent;
			break;
		}

	}
	$links->initelse("folder='1'");
	$tlink.=($_GET['act']=='app_article'||$_GET['act']=='cat')?"<select size=\"1\" name2='parent' name=\"parent\">\n":"<select size=\"1\" name2='parent' name=\"vasya\">\n";
	$tcat.=($_GET['act']!='subcat')?"<select size=\"1\" name2='category' name=\"category\">\n":"<select size=\"1\" name2='category' name=\"parent\">\n";
	$tsubcat.="<select size=\"1\" name2='subcat' name=\"subcat\">\n";
	while($links->one()){
		$select=($article->parent==$links->title)?"selected='selected'":"";
		$cat->initelse("parent='$links->title'");
		$tlink.="<option merom='jjfu' value=\"$links->title\" $select>$links->title <i>(".$cat->num().")</i></option>\n";


		while($cat->one()){
			$selected=($article->cat==$cat->name)?"selected='selected'":NULL;
			$subcat->initelse("parent='$cat->name'");
			$tcat.="<option merom=\"$links->title\" value=\"$cat->name\" $selected>$cat->title <i>(".$subcat->num().")</i></option>\n";


			while($subcat->one()){
				$selected=($article->subcat==$subcat->name)?"selected='selected'":"";
				$tsubcat.="<option merom=\"$cat->name\" value=\"$subcat->name\" $selected>$subcat->title</option>\n";
			}

		}

	}
	$tsubcat.="</select>\n";
	$tcat.="</select>\n";
	$tlink.="</select>\n";
	if($_GET[id]==0){
		$art=new app_article;
		$art->init();
		$art->one();
		$id=$art->id+1;
	}else $id=$_GET['id'];
	@mkdir("/home/u178448/bereg-cn.ru/www/content/$id",0777);
	$_SESSION['pathimg']="$id/";
?>
<link rel="stylesheet" href="admin.css" type="text/css">
<form id="form_editpage" name="edit_pages" action="admin_react.php" method="post">
<table class="actionButtons" cellpadding="0" cellspacing="0"><tbody><tr>
		<td id="Button1"><a href="#" onclick="documentDirty=false; document.forms['edit_pages'].submit();"><img src="images/save.gif"> Сохранить</a></td>
		<td id="Button2"><a href="<?=$_SERVER['PHP_SELF']."?act=$_GET[act]&delete=1&id=$_GET[id]" ?>" onclick="deletedocument();"><img src="images/delete.gif"> Удалить</a></td>
		<td id="Button5"><a href="admin.php?act=<?=$_GET[act]?>"><img src="images/cancel.gif"> Отмена</a></td>
		<td id="Button6"><input type="submit" value="Сохранить асинхронно"></td>
</tr></tbody></table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr style="height: 44px;">
      <td align="left" width="100"><span class="warning">Заголовок</span></td>
      <td><input name="title" maxlength="255" value="<?=$article->title;?>" class="inputBox" style="width: 300px;" onchange="documentDirty=true;" spellcheck="true" type="text">
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Введите имя/заголовок документа. Нежелательно использовать при этом обратный слэш (\)" onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
    <tr style="height: 44px;">
      <td align="left" width="100"><span class="warning">Псевдоним</span></td>
      <td><input name="name" maxlength="255" value="<?=$article->name;?>" class="inputBox" style="width: 300px;" onchange="documentDirty=true;" spellcheck="true" type="text">
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Введите псевдоним документа. Использовать только латинские буквы. Нежелательно использовать при этом обратный слэш (\). ПРМЕЧАНИЕ: Если оставить поле пустым, то оно сгенерируется автоматически из заголовка. " onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
<?if($_GET['act']=='app_article'||$_GET['act']=='subcat'||$_GET['act']=='cat'):?>
    <tr style="height: 44px;">
      <td align="left" width="100"><span class="warning">Главный родитель</span></td>
      <td><?=$tlink;?>
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Выберете главного родителя документа. Использовать только латинские буквы. Нежелательно использовать при этом обратный слэш (\)." onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
<?endif;?>
<?if($_GET['act']=='app_article'||$_GET['act']=='subcat'):?>
    <tr style="height: 44px;">
      <td align="left" width="100"><span class="warning">Категория</span></td>
      <td><?=$tcat;?>
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Выберете категорию документа. Использовать только латинские буквы. Нежелательно использовать при этом обратный слэш (\)." onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
<?endif;?>
<?if($_GET['act']=='app_article'):?>
    <tr style="height: 44px;">
      <td align="left" width="100"><span class="warning">Подкатегория</span></td>
      <td><?=$tsubcat;?>
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Выберете подкатегорию документа. Использовать только латинские буквы. Нежелательно использовать при этом обратный слэш (\)." onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
<?endif;?>
    <tr style="height: 44px;">
      <td align="left" width="100"><span class="warning">Иконка</span></td>
      <td><textarea id="icon" name="icon" style="width:300px;height:300px;"><?=$article->icon;?></textarea>
      <span id="icon"><?=$article->icon?></span>
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Картинка отображаемая в списке статей." onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
    <tr style="height: 44px;">
      <td align="left" width="100"><span class="warning">Активна</span></td>
      <td><input name="active" type="checkbox" value="on" <?=$checked?>>
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Отображать или нет эту статью." onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
    <tr>
    	<td colspan="2" style="text-align:center;">
	    	<a href="admin.php?<?="act=$_GET[act]&id=$_GET[id]" ?>&tinymce=1">Скрыть редактор</a>
	    	//
	    	<a href="admin.php?<?="act=$_GET[act]&id=$_GET[id]" ?>">Показать редактор</a>
				\\<a href="javascript:;" onmousedown="tinyMCE.get('ta').show();">[Show]</a>
				||<a href="javascript:;" onmousedown="tinyMCE.get('ta').hide();">[Hide]</a>
    	</td>
    </tr>
    <tr class='row2'>
    <td colspan="2" class='t-post'>Содержимое документа</td>
    </tr>
    <tr class='row1'>
      <td colspan="2" class='t-post'>
        <textarea id="ta" name="text" style="width: 180%; height: 400px;" onchange="documentDirty=true;"><?=$article->text;?></textarea>
      </td>
    </tr>
  </tbody>
</table>
<input name="id" type="hidden" value="<?=$article->id?>">
<input name="act" type="hidden" value="<?=$_GET['act']?>">
<?if($_GET['id']==0):?>
<input name="add" type="hidden" value="add">
<?endif;?>
</form>
<?if($_GET['tinymce']!=1):?>
<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
        tinyMCE.init({
                // General options
                mode : "exact",
                theme : "advanced",
                width : "100%",
                height : "400",
                document_base_url : "/",
                plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",
                elements:"ta",
                // Theme options
                theme_advanced_buttons3 : "",
                theme_advanced_buttons1 : "undo,redo,selectall,separator,pastetext,pasteword,separator,search,replace,separator,nonbreaking,hr,charmap,separator,image,insertimage,link,unlink,anchor,media,separator,cleanup,removeformat,separator,fullscreen,print,code,help",
                theme_advanced_buttons2 : "tablecontrols,hr,bold,italic,underline,strikethrough,sub,sup,separator,blockquote,separator,bullist,numlist,outdent,indent,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,styleselect,formatselect,separator,styleprops",
                theme_advanced_buttons4 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true,
                language : "ru",

                // Example content CSS (should be your site CSS)
                content_css : "main.css",

                // Drop lists for link/image/media/template dialogs
                template_external_list_url : "examples/lists/template_list.js",
                external_link_list_url : "examples/lists/link_list.js",
                external_image_list_url : "examples/lists/image_list.js",
                media_external_list_url : "examples/lists/media_list.js",

                // Replace values for the template plugin
                template_replace_values : {
                        username : "Some User",
                        staffid : "991234"
                }
        });
				tinyMCE.init({
                // General options
                mode : "exact",
                theme : "advanced",
                width : "200",
                height : "200",
                document_base_url : "/",
                plugins : "imagemanager,advimage",
                elements:"icon",
                // Theme options
                theme_advanced_buttons1 : "insertimage,image",
                theme_advanced_buttons2 : "",
                theme_advanced_buttons3 : "",
                theme_advanced_buttons4 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "center",
                theme_advanced_resizing : true,
                theme_advanced_statusbar_location : "bottom",
                language : "ru",

                // Example content CSS (should be your site CSS)
                content_css : "main.css",

                // Drop lists for link/image/media/template dialogs
                template_external_list_url : "examples/lists/template_list.js",
                external_link_list_url : "examples/lists/link_list.js",
                external_image_list_url : "examples/lists/image_list.js",
                media_external_list_url : "examples/lists/media_list.js",

                // Replace values for the template plugin
        });
</script>
<!-- /TinyMCE -->
<?endif;?>