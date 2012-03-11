<?php if($_SESSION['auth']==false):?>
					<div class="login">
            <form name="login" action="login_auth.php" method="POST">
              <input id="login" class="login" name="login" value="Логин">
              <input id="pass" class="login" type="password" name="pass" value="Пароль">
              <input class="submit_login" type="image" name="sublogin" src="images/Login.png" width="76" height="24">
              <a class="blue_login" href="recoverypass.php">Забыли пароль?</a>
              <a class="blue_reg" href="register.php">Регистрация</a>
            </form>
					</div>
<? else:?>
<div class="login">
Здравствуйте, <? echo $user->name;?>.<br>

<a class="blue_login" href="user.php?a=settings">Настройки профиля</a>
<a class="blue_login" href="user.php?a=pm">Личные сообщения</a>
<a class="blue_login" href="user.php?a=order">Заказы(<?=$user->num_orders();?>)</a>
<a class="blue_login" href="user.php?a=recycle">Корзина</a>
<?if($user->status=='admin'||$user->status=='superadmin'):?><a class="blue_login" href="admin.php">Администраторство</a><br /><?endif;?>
<form name="" action="login_auth.php?a=exit" method="post">
<input type="image" src="images/exit.png" value="Выйти">
</form>
</div>
<? endif?>