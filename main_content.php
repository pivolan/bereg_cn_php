<?php
	if($_GET['act']=='')$_GET['act']='main';
	$sql="SELECT * FROM pages WHERE name='$_GET[act]'";
	$result=mysql_query($sql);
	$line=mysql_fetch_array($result);
	if($line==''){		$sql="SELECT * FROM pages WHERE name='main'";
		$result=mysql_query($sql);
		$line=mysql_fetch_array($result);
	}
	echo "<h1>$line[title]</h1>";
	echo $line['text'];
?>