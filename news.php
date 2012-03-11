<?php
define( '_pEXEC', 1 );
	include("config/config.php");
	include("header.php");
	include("head.php");
	include("left.php");
	include("body.php");
?>
<?php
echo "<h1> Новости </h1>";
if($_GET['id']!=''){
	$sql="SELECT * FROM news WHERE id='$_GET[id]'";
	$result=mysql_query($sql);
	$line=mysql_fetch_array($result);
	if($line==''){
		$sql="SELECT * FROM news ORDER BY date";
		$result=mysql_query($sql);
		while($line2=mysql_fetch_array($result)){
			echo "<h2>$line2[title]</h2>";
			$line2['text']=app_common::short_news($line2['text'],50);
			$line2['date']=date('d.m.Y',$line2['date']);
			echo "$line2[text]";
			echo "<h3>Автор: $line2[login]</h3>";
			echo "<h3>Дата: $line2[date]</h3>";
		}
	}else{
		echo "<h2>$line[title]</h2>";
		$line['date']=date('d.m.Y',$line['date']);
		echo "$line[text]";
		echo "<h3>Автор: $line[login]</h3>";
		echo "<h3>Дата: $line[date]</h3>";
		echo "<a href='news.php'> Все новости </a>";
	}

}else{
	$sql="SELECT * FROM news ORDER BY date";
	$result=mysql_query($sql);
	while($line2=mysql_fetch_array($result)){
		echo "<h2><a href=\"news.php?id=$line2[id]\">$line2[title]</a></h2>";
		$line2['text']=app_common::short_news($line2['text'],50);
		$line2['date']=date('d.m.Y',$line2['date']);
		echo "$line2[text]";
		echo "<h3>Автор: $line2[login]</h3>";
		echo "<h3>Дата: $line2[date]</h3>";
	}
}
?>
<?php
	include("foot.php");
?>