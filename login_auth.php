<?php
define( '_pEXEC', 1 );
	include("config/config.php");
	if($_GET['a']=='exit'){
		session_unset();
		setcookie('login','',$expire);
		setcookie('pass','',$expire);
		setcookie('id','',$expire);
		setcookie('vk_app_2114231','',time()-360000,'/','.bereg-cn.ru');
		//unset($_COOKIE);
		header("location: index.php");
	}

	if($_POST['login']!=''){
		$login=strip_tags($_POST['login']);
		$pass=strip_tags($_POST['pass']);
		$sql="SELECT * FROM users WHERE login='$login'";
		$result=mysql_query($sql) or header("location: index.php?act=error_auth");
		$line=mysql_fetch_array($result);
		if($_POST['login']==$line['login']&&md5($_POST['pass'])==$line['pass']){
			$user=new app_user;
			$_SESSION['id']=$line['id'];
			$user->init();
			$_SESSION['user']=$user;
			$_SESSION['auth']=true;
			$expire=time()+60*60*24*100;
			$md=md5($line['login']);
			setcookie('login',$md,$expire);
			setcookie('pass',$line['pass'],$expire);
			setcookie('id',$line['id'],$expire);
			header("location: index.php?act=succ_auth");
		}else{
			header("location: index.php?act=error_auth");
		}
	}else{
		header("location: index.php");
	}
?>