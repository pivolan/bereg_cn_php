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
	if($_GET['a']=='success'){		echo "<h1> Восстановление пароля </h1>";
		echo "Ваш новый пароль отправлен на ваш почтовый ящик $_SESSION[email].";
		unset( $_SESSION['email']);
	}else{
?>
		<h1> Восстановление пароля </h1>
		<?=$_SESSION['error'];?>
		<p>Введите свои email и логин</p>
		<p>
			<form name="" action="recoverypass_act.php" method="post">
				Email:<input id="email" name="email" type="text" value=""><br />
				Логин:<input name="login" type="text" value=""><br />
				<input type="submit" value="Отправить">
				<input name="act" type="hidden" value="rec">
			</form>
		</p>
		<p>Новый пароль будет выслан вам на email.</p>
		<script type="text/javascript" src="password_recovery_pivo.js"></script>
<?php
	}
	$_SESSION['a']=NULL;
	unset($_SESSION['error']);
	include("foot.php");
?>
