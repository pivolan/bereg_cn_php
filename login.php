<?php if($_SESSION['auth']==false):?>
					<div class="login">
					
<script src="http://vkontakte.ru/js/api/openapi.js" type="text/javascript"></script>

<div id="login_button" onclick="VK.Auth.login(authInfo, 2);"></div>

<script language="javascript">
VK.init({
  apiId: 2114231

});
function authInfo(response) {
  if (response.session) {
    alert('user: '+response.session.user.first_name);
	//print_r(response);
	//alert(23432);
	//VK.api('getProfiles',{uids:'5764292', fields:'photo, nickname, domain, sex, bdate, city, country, timezone, photo, photo_medium, photo_big, has_mobile, rate, contacts, education'}, function(data){print_r(data.response);});
	getInitData();
	//vas = VK.Api('getProfiles',{uids: VK.API.getVariable({key: 1280}), fields: "photo"})[0];
	//vasya = VK.Api.getProfiles({uid:5764292});
	alert('vasya!');
	
	alert(VK.getUserSettings());
  } else {
    alert('not auth');
  }
}
function getInitData() {
  var code;
  code = 'return {';
  code += 'me: API.getProfiles({uids: API.getVariable({key: 1280}), fields: "photo"})[0]';
  code += ',info: API.getGroupsFull({gids:1})[0]';
  code += ',news: API.pages.get({gid:1, pid: 2424933, need_html: 1})';
  code += ',friends: API.getProfiles({uids: API.getFriends(), fields: "photo"})';
  code += '};';
  VK.Api.call('execute', {'code': code}, function(data){print_r(data.response);});
}
function print_r(theObj){
  if(theObj.constructor == Array ||
     theObj.constructor == Object){
    document.write("<ul>")
    for(var p in theObj){
      if(theObj[p].constructor == Array||
         theObj[p].constructor == Object){
document.write("<li>["+p+"] => "+typeof(theObj)+"</li>");
        document.write("<ul>")
        print_r(theObj[p]);
        document.write("</ul>")
      } else {
document.write("<li>["+p+"] => "+theObj[p]+"</li>");
      }
    }
    document.write("</ul>")
  }
}
 

//VK.Auth.getLoginStatus(authInfo);
VK.UI.button('login_button');
</script>

            <form name="login" action="login_auth.php" method="POST">
              <input id="login" class="login" name="login" value="" placeholder="Логин">
              <input id="pass" class="login" type="password" name="pass" value="" placeholder="Пароль">
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
<?if($user->status=='admin'||$user->status=='superadmin'):?><a class="blue_login" href="admin.php">Администраторство(<?=$user->num_feedbacks();?>)</a><br /><?endif;?>
<form name="" action="login_auth.php?a=exit" method="post">
<input type="image" src="images/exit.png" value="Выйти">
</form>
</div>
<? endif?>