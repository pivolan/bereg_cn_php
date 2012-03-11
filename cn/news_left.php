          <div class="news">
<?php
$sql="SELECT * FROM news ORDER BY id DESC LIMIT 3";
$result=mysql_query($sql);
while($line=mysql_fetch_array($result)){
	$text=app_common::short_news($line['text'],30);
	$line['date']=date("d.m.Y",$line['date']);
	echo "<div class=\"title\">$line[title]</div>\n";
	echo "<div class=\"text\">$text...</div>\n";
	echo "<a class='links' href='news.php?id=$line[id]'>Читать далее</a>";
}
?> 
          </div>