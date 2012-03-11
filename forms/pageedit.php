<?php
	defined("_pEXEC") or die('not include into index.php');
	echo "<h2><a href='admin.php?act=$_GET[act]'>$title</a></h2>\n";
?>
<link rel="stylesheet" href="admin.css" type="text/css">
<form name="edit_pages" action="admin_react.php" method="post">
<table class="actionButtons" cellpadding="0" cellspacing="0"><tbody><tr>
		<td id="Button1"><a href="#" onclick="documentDirty=false; document.forms['edit_pages'].submit();"><img src="images/save.gif"> Сохранить</a></td>
		<td id="Button2"><a href="#" onclick="deletedocument();"><img src="images/delete.gif"> Удалить</a></td>
		<td id="Button5"><a href="admin.php?act=pages"><img src="images/cancel.gif"> Отмена</a></td>
</tr></tbody></table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr style="height: 24px;">
      <td align="left" width="100"><span class="warning">Заголовок</span></td>
      <td><input name="title" maxlength="255" value="<?=$pages->title;?>" class="inputBox" style="width: 300px;" onchange="documentDirty=true;" spellcheck="true" type="text">
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Введите имя/заголовок документа. Нежелательно использовать при этом обратный слэш (\)" onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
    <tr style="height: 24px;">
      <td align="left" width="100"><span class="warning">Псевдоним</span></td>
      <td><input name="name" maxlength="255" value="<?=$pages->name;?>" class="inputBox" style="width: 300px;" onchange="documentDirty=true;" spellcheck="true" type="text">
      &nbsp;&nbsp;<img src="images/b02_trans.gif" onmouseover="this.src='images/b02.gif';" onmouseout="this.src='images/b02_trans.gif';" alt="Введите псевдоним документа. Использовать только латинские буквы. Нежелательно использовать при этом обратный слэш (\). ПРМЕЧАНИЕ: Если оставить поле пустым, то оно сгенерируется автоматически из заголовка. " onclick="alert(this.alt);" style="cursor: help;"></td>
    </tr>
    <tr>
    	<td colspan="2" style="text-align:center;">
	    	<a href="admin.php?<?="act=$_GET[act]&id=$_GET[id]" ?>&tinymce=1">Скрыть редактор</a>
	    	//
	    	<a href="admin.php?<?="act=$_GET[act]&id=$_GET[id]" ?>">Показать редактор</a>
    	</td>
    </tr>
    <tr class='row2'>
    <td colspan="2" class='t-post'>Содержимое документа</td>
    </tr>
    <tr class='row1'>
      <td colspan="2" class='t-post'>
        <textarea id="ta" name="text" style="width: 100%; height: 400px;" onchange="documentDirty=true;"><?=$pages->text;?></textarea>
      </td>
    </tr>
  </tbody>
</table>
<input name="id" type="hidden" value="<?=$pages->id?>">
<input name="act" type="hidden" value="<?=$_GET[act]?>">
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
                plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",
                elements:"ta",
                // Theme options
                theme_advanced_buttons3 : "",
                theme_advanced_buttons1 : "undo,redo,selectall,separator,pastetext,pasteword,separator,search,replace,separator,nonbreaking,hr,charmap,separator,image,insertimage,link,unlink,anchor,media,separator,cleanup,removeformat,separator,fullscreen,print,code,help",
                theme_advanced_buttons2 : "bold,italic,underline,strikethrough,sub,sup,separator,blockquote,separator,bullist,numlist,outdent,indent,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,styleselect,formatselect,separator,styleprops",
                theme_advanced_buttons4 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true,
                language : "en",

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
</script>
<!-- /TinyMCE -->
<?endif;?>