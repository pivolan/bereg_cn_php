<?php
define("_pEXEC",1);
	include("config/config.php");
	app_common::LoginQuery();
	include("header.php");
	include("head.php");
	include("left.php");
	include("body.php");
?>
<center>
<a href="user.php?a=settings">Настройки</a>||
<a href="user.php?a=pm">Личные сообщения</a>||
<a href="user.php?a=order">Заказы</a>||
<a href="user.php?a=recycle">корзина</a>|
</center>
<?php
if($_GET['a']=='settings'){
?>
<h1>Настройки профиля </h1>
<span><?=$_SESSION['a'];?></span>
<table border="0" class="register">
<tr><td></td><td><form name="" action="user_edit.php?a=update" method="post"></td></tr>
<tr><td>Логин: </td><td><input name="login" type="text" value="<?=$user->login?>"></td></tr>
<tr><td>Пароль: </td><td><input id="password" name="password" type="password" value=""></td></tr>
<tr><td>Подтверждение: <br />пароля: </td><td><input id="valpass" name="valpass" type="password" value=""></td></tr>
<!--<tr><td>ФИО: </td><td> <input id="fio" name="fio" type="text" value="<?=$user->fio?>"> </td></tr> -->
<tr><td>Фамилия: </td><td><input  name="lastname" type="text" value="<?=$user->lastname?>"></td></tr>
<tr><td>Имя: </td><td><input  name="name" type="text" value="<?=$user->name?>"></td></tr>
<tr><td>Отчество: </td><td><input name="sername" type="text" value="<?=$user->sername?>"></td></tr>
<tr><td>Статус:</td><td><input name="status" type="text" readonly="readonly" value="<?=$user->status?>"></td></tr>
<tr><td>Email: </td><td><input name="email" type="text" value="<?=$user->email?>"></td></tr>
<tr><td>Компания: </td><td><input name="company" type="text" value="<?=$user->company?>"></td></tr>
<tr><td>Дата регистрации: </td><td><input name="date" type="text" readonly="readonly" value="<?=$user->date2?>"></td></tr>
<tr><td>Дата рождения: </td><td><input name="birthdate" type="text" value="<?=$user->birthdate2?>"></td></tr>
<tr><td>Адрес: </td><td><input name="adress" type="text" value="<?=$user->adress?>"></td></tr>
<tr><td>Телефон: </td><td><input name="tel" type="text" value="<?=$user->tel?>"></td></tr>

<tr><td><input name="act" type="hidden" value="update"><input id="fio" name="fio" type="hidden" value="<?=$user->fio?>">
</td><td><input type="submit" value="Сохранить"></form></td></tr>
</table>
<?
}elseif($_GET['a']=='pm'){
?>
<h1> Личные сообщение </h1>
<?
}elseif($_GET['a']=='order'){
	$order=new app_order;
	$order->init($user->id);
	echo "<h1> Заказы </h1>";
	if(empty($_GET['num'])){
		echo "<ol>";
		while($order->one()==true){
			echo "<li><a href='$_SERVER[REQUEST_URI]&num=$order->id'>$order->title</a></li>";
		}
		echo "</ol>";
	}elseif(isset($_GET['num'])){
		echo "<table class='equip' cellpadding='0' cellspacing='0'>";
		echo "<tr class='row2'><td class='t-auth' style='text-align:center;'>Автор</td><td class='t-post' style='text-align:center;'>Сообщение</td></tr>";
		if($order->one($_GET['num'],$user->id)){
			if($order->trace=='in')
				echo "
				<tr class='row2'>
					<td class='t-auth'>
						$admin->login<br>
						<img src=\"$admin->image\">
					</td>
					<td class='t-post'>
						<div class='date'><a href='#' class='gensmall'>$order->date</a></div>
						<h4>$order->title</h4>
						<span class='postbody'>$order->text</span>
					</td>
				</tr>";
			else
				echo "<tr class='row1'>
					<td class='t-auth' style='text-align:center;'>$user->login</td>
					<td class='t-post'><span class='postbody'>Тема: </span><a href=''>$order->title</a></td>
				</tr>";
				echo "<tr class='spacerow'><td class='t-auth' style='text-align:center;'></td><td class='t-post' style='text-align:center;'></td></tr>";
				echo "
				<tr class='row1'>
					<td class='t-auth'>
						$user->login<br>
						<img src=\"$user->image\">
					</td>
					<td class='t-post'>
						<div class='date'><a href='#' class='gensmall'>$order->date</a></div>
						<span class='postbody'>$order->text</span>
					</td>
				</tr>";
			while($order->onechain()){
				if($order->trace=='in')
				echo "
				<tr class='row2'>
					<td class='t-auth'>
						$admin->login<br>
						<img src=\"$admin->image\">
					</td>
					<td class='t-post'>
						<div class='date'><a href='#' class='gensmall'>$order->date</a></div>
						<span class='postbody'>$order->text</span>
					</td>
				</tr>";
				else
				echo "
				<tr class='row1'>
					<td class='t-auth'>
						$user->login<br>
						<img src=\"$user->image\">
					</td>
					<td class='t-post'>
						<div class='date'><a href='#' class='gensmall'>$order->date</a></div>
						<span class='postbody'>$order->text</span>
					</td>
				</tr>";
			}
		}
		echo "</table>";
		$order->show_form();
	}
}elseif($_GET['a']=='recycle'){
?>
<h1> Корзина </h1>
<?
}
?>
<?php
$_SESSION['a']=NULL;
	include("foot.php");
?>