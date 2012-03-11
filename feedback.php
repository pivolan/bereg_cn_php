<?php
	if(!defined('_Project')){
		define( '_pEXEC', 1 );
		include("config/config.php");
		include("header.php");
		include("head.php");
		include("left.php");
		include("body.php");
		echo "<h1> Обратная связь </h1>";
		echo "<font color='red'>$_SESSION[act]</font>";
		unset($_SESSION['act']);
		//unset($class);
	}else{
		echo "<font color='red'>$_SESSION[act]</font>";
		unset($_SESSION['act']);
		echo "<a class='order' href=\"javascript:coll()\" style=\"float:right;\">Заказать</a>\n";
		$class='style="display:none"';
	}
?>
<div id="feedback" <?=$class?>>
<p>Компания ООО "Берег"</p>

<p>Тел.: +7(3412) 508-008<br>
Факс.: +7(3412)21-78-05</p>

<p><b>E-mail:</b> pvt@bereg-cn.ru</p>

<p><b><i>Для получения более подробной информации, заполните, пожалуйста,
форму и менеджер нашей компании свяжется с Вами в ближайшее время.</i></b></p>
<table class="feedback" border="0" width="100%">
<tr><td><form name="feedback" action="feedback_add.php" method="post"></td></tr>
<tr><td>Наименование организации</td></tr>
<tr><td><input name="company" type="text" value="<?=$user->company ?>"></td></tr>

<tr><td>Адрес<font color="red">*</font></td></tr>
<tr><td><input name="adress" type="text" value="<?=$user->adress ?>"></td></tr>

<tr><td>Контактный телефон<font color="red">*</font></td></tr>
<tr><td><input name="tel" type="text" value="<?=$user->tel ?>"></td></tr>

<tr><td>Ваше Ф.И.О.</td></tr>
<tr><td><input name="fio" type="text" value="<?=$user->fio ?>"></td></tr>

<tr><td>Ваш e-mail<font color="red">*</font></td></tr>
<tr><td><input name="sdkfi" type="text" value="<?=$user->email ?>"></td></tr>

<tr><td>Тема<font color="red">*</font></td></tr>
<tr><td><input name="title" type="text" value="<?=$article->title ?>"></td></tr>

<tr><td>Ваши пожелания</td></tr>
<tR><td><textarea name="text" rows=10 cols=50 wrap="on"><?=$article->title;?><?="\n"?></textarea></td></tr>
<input name="act" type="hidden" value="add">
<input name="fromid" type="hidden" value="<?=$user->id ?>">
<tr><td><input class="send" type="submit" value="Отправить"></form></td></tr>
</table>
</div>
<script>
$("input[class='send']").click(function(){$("input[name='sdkfi']").attr('name','email')})
</script>
<?php
	if(!defined('_Project')){
		include("foot.php");
	}
?>