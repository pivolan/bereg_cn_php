<?php
define( '_pEXEC', 1 );
	include("config/config.php");
	if($_POST['act']=='add'&&isset($_SESSION['id'])){
		$order=new app_order;
		$order->add($_POST);
		header("location: $_SERVER[HTTP_REFERER]");
	}else{
		header("location: feedback.php");
	}
?>