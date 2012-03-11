<?php
define("_pEXEC",1);
	include("config/config.php");
	if($_GET['a']=='update'&&$_POST['act']=='update'){
		$_SESSION['a']=$user->update($_POST);
		$_SESSION['user']=$user;
		header("location: user.php?a=settings");
	}else{
		header("location: user.php");
	}
?>