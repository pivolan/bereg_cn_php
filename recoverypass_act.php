<?php
define( '_pEXEC', 1 );
	include("config/config.php");
?>
<?php
	if($_SESSION['auth']==true){
		header("location:user.php");
		die();
	}
	if($_POST['act']=='rec'){
		$user=new app_user;
		$user->recovery_password($_POST['email'],$_POST['login']);
	}
?>