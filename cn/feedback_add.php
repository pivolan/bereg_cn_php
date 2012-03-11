<?php
define( '_pEXEC', 1 );
	include("config/config.php");
	if($_POST['act']=='add'){
		if($_POST['email']==''){
			$_SESSION['act']='Введите E-mail';
			header("location: feedback.php");
			die();
		}
		$date=mktime();
		$toid=1;
		$tologin='admin';
		$fromid='';
		if($_SESSION['auth']==true)$fromid=$user->id;
		$parent=0;
		$sql="INSERT INTO feedback (title, text, fio, date, company, email, toid, tologin, ip, fromid, parent, adress)
		VALUES ('$_POST[title]','$_POST[text]','$_POST[fio]','$date','$_POST[company]','$_POST[email]','$toid','$tologin',
		'$_SERVER[REMOTE_ADDR]','$fromid','$parent', '$_POST[adress]')";
		if(isset($_SESSION['id'])){
			$order=new app_order;
			$_POST['userid']=$_SESSION['id'];
			$order->add($_POST);
		}
		$result=mysql_query($sql) or $error=mysql_error();
		if($error==''){
			$_SESSION['act']='Сообщение успешно отправлено';
			$mail_msg="Тема: $_POST[title];
			Текст: $_POST[text];
			от: ФИО: $_POST[fio]; email: $_POST[email]";
			$mail_title="$_POST[title] - $_POST[fio]";
			$mail_to=$ADMIN_MAIL;
			mail($mail_to, $mail_title, $mail_msg);
			header("location: $_SERVER[HTTP_REFERER]");
		}else{
			$_SESSION['act']=$error;
			header("location: $_SERVER[HTTP_REFERER]");
		}
	}else{
		header("location: feedback.php");
	}
?>