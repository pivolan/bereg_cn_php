<?php
define( '_pEXEC', 1 );
	include("config/config.php");
?>
<?php
	if(isset($_SESSION['id'])){
		header("location:user.php");
		die();
	}
	$user=new app_user;
	$user->register($_POST);
?>