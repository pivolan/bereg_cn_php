<?php
define( '_pEXEC', 1 );
	include("config/config.php");
	include("header.php");
	include("head.php");
	include("left.php");
	include("body.php");
?>
<?php
	if($_SESSION['auth']==true){		header("location:user.php");
		die();
	}
	if($_GET['a']=='success'){		echo "<h1> Регистрация </h1>";
		echo "Регистрация успешно завершена.";
	}else{echo $_SESSION['error'];unset($_SESSION['error']);
?>
<h1> Регистрация </h1>
<table border="0" class="register">
<tr><td></td><td><form name="" action="register_add.php" method="post"></td></tr>
<tr><td>Логин<span style="color:red">*</span>: </td><td><input name="login" type="text" value=""></td></tr>
<tr><td>Пароль<span style="color:red">*</span>: </td><td><input id="password" name="password" type="password" value=""></td></tr>
<tr><td>Подтверждение<span style="color:red">*</span>: <br />пароля: </td><td><input id="valpass" name="valpass" type="password" value=""></td></tr>
<tr><td>ФИО<span style="color:red">*</span>: </td><td> <input id="fio" name="fio" type="text" value=""> </td></tr>
<tr><td>Фамилия: </td><td><input id="lastname" name="lastname" readonly="readonly" type="text" value=""></td></tr>
<tr><td>Имя: </td><td><input id="name" name="name" readonly="readonly" type="text" value=""></td></tr>
<tr><td>Отчество: </td><td><input id="sername" readonly="readonly" name="sername" type="text" value=""></td></tr>
<tr><td>Email<span style="color:red">*</span>: </td><td><input name="email" type="text" value=""></td></tr>
<tr><td>Компания: </td><td><input name="company" type="text" value=""></td></tr>
<tr><td>Дата рождения: </td><td><input name="birthdate" type="text" value=""></td></tr>
<tr><td>Адрес: </td><td><input name="adress" type="text" value=""></td></tr>
<tr><td>Телефон: </td><td><input name="tel" type="text" value=""></td></tr>
<tr><td>Код антибот<span style="color:red">*</span>:</td><td><input name="keystring" type="text" value=""></td></tr>
<tr><td colspan="2"><img src="./modules/kcaptcha/index.php" alt="" width="120" height="60" border="0"></td></tr>
<tr><td><input name="act" type="hidden" value="add">
</td><td><input type="submit" value="Далее"></form></td></tr>
</table>
<p><span style="color:red">*</span> - поля обязательные для заполнения.</p>
<script type="text/javascript" src="register_pivo.js"></script>
<?php
	}
$_SESSION['a']=NULL;
	include("foot.php");
?>
